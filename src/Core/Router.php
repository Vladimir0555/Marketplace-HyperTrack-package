<?php

namespace Core;
use \Core\CustomModel;
if ( ! defined( 'RAPID_IN' ) ) exit( 'No direct script access allowed' );

/**
 * Base Model
 */
class Router
{
    private $packageName;
    private $blocks;
    private $custom;
    private $klein;

    public function __construct(
        $packageName,
        $blocks,
        $custom
    )
    {
        $this->packageName = $packageName;
        $this->blocks = $blocks;
        $this->custom = $custom;
        $this->klein = new \Klein\Klein();
        $this->http = new \GuzzleHttp\Client();
    }

    public function run()
    {
        // Metatdata
        // api/<Package_name>/
        $this->klein->respond('GET', INDEX_PATH . 'api/' . $this->packageName . '/?', function(){
            include_once dirname(__DIR__) . '/metadata/metadata.json';
        });
        foreach($this->blocks as $blockSettings){
            $this->setRoute($blockSettings);
        }
        $this->klein->dispatch();
    }

    private function setRoute($block)
    {
        $method = 'POST';
        if(
            isset($this->custom[$block['name']]['method'])&&
            in_array($this->custom[$block['name']]['method'], ['POST', 'GET', 'PATCH', 'DELETE'])
        ){
            $method = $this->custom[$block['name']]['method'];
        }else{
            throw new Exception('Wrong metadata.php format custom block method is miss');
            exit();
        }
        $param = $this->getParam($block);
        $routePath = INDEX_PATH . 'api/' . $this->packageName . '/' . $block['name'] . '/?';
        $blockName = $block['name'];
        $blockCustom = $this->custom[$block['name']];

        $this->klein->respond($method, $routePath, function()use($param, $blockName, $blockCustom, $method){
            $inputPram = $this->getInputPram($param['param']);
            if(is_string($inputPram)){
                echo $inputPram;
                exit(200);
            }
            $validateResult = $this->validateParam($inputPram, $param['required'], $param['json']);
            if($validateResult){
                echo $validateResult;
                exit(200);
            }

            $sendParam = $this->prepareParam($inputPram, $blockCustom['dictionary']);
            $apiKey = $sendParam['apiKey'];
            unset($sendParam['apiKey']);
            $sendBody = $sendParam;
            if(isset($blockCustom['custom'])){
                $sendBody = CustomModel::$blockName($sendParam);
            }else{
                $sendBody = json_encode($sendBody);
            }

            $vendorUrl = $blockCustom['vendorUrl'];
            $urlPart = [];
            preg_match('/\{\{[a-z]+\}\}/ui', $vendorUrl, $urlPart);
            if(count($urlPart)>0){
                $urlPart = str_replace('}}', '', str_replace('{{', '', $urlPart[0]));
                if(isset($sendParam[$urlPart])){
                    $vendorUrl = str_replace('{{'.$urlPart.'}}' , $sendParam[$urlPart], $vendorUrl);
                }else{
                    $response = [];
                    $response['callback'] = 'error';
                    $response['contextWrites']['to']['status_code'] = "REQUIRED_FIELDS";
                    $response['contextWrites']['to']['status_msg'] = "Please, check and fill in required fields.";
                    $response['contextWrites']['to']['fields'] = [$urlPart];

                    echo json_encode($response);
                    exit(200);
                }
            }

            // Make request
            $result = $this->httpRequest($vendorUrl, $method, $apiKey, $sendBody);
            echo json_encode($result);
            exit(200);
        });
        return true;
    }

    private function getParam($block)
    {
        $param = [];
        $required = [];
        $json = [];
        foreach($block['args'] as $oneParam){
            if($oneParam['required']){
                array_push($required, $oneParam['name']);
            }
            if($oneParam['type'] == 'JSON'){
                array_push($json, $oneParam['name']);
            }
            array_push($param, $oneParam['name']);
        }
        return [
            'param' => $param,
            'required' => $required,
            'json' => $json,
        ];
    }

    private function getInputPram($paramList)
    {
        $requestBody = file_get_contents('php://input');
        if(strlen($requestBody)>0){
            $requestBody = $this->normalizeJson($requestBody);
            $requestBody = str_replace('\"', '"', $requestBody);
            $requestBody = json_decode($requestBody, true);
            if(json_last_error() != 0) {
                $response = [];
                $response['callback'] = 'error';
                $response['contextWrites']['to']['status_code'] = 'JSON_VALIDATION';
                $response['contextWrites']['to']['status_msg'] = "Syntax error. Incorrect input JSON. Please, check fields withJSON input.";
                return json_encode($response);
            }
            $jsonParam = $requestBody['args'];
            $param = [];
            foreach($paramList as $oneParam){
                $param[$oneParam] = (isset($jsonParam[$oneParam]))?$jsonParam[$oneParam]:false;
            }

            return $param;
        }else{
            return [];
        }
    }

    protected function validateParam($inputParam, $requiredPram = [], $jsonParams = [])
    {
        if(count($requiredPram)>0){
            $requiredPramCheck = [];
            foreach($requiredPram as $oneParam){
                if(!isset($inputParam[$oneParam]) || $inputParam[$oneParam] == false){
                    array_push($requiredPramCheck, $oneParam);
                }
            }
            if(count($requiredPramCheck)>0){
                $response = [];
                $response['callback'] = 'error';
                $response['contextWrites']['to']['status_code'] = "REQUIRED_FIELDS";
                $response['contextWrites']['to']['status_msg'] = "Please, check and fill in required fields.";
                $response['contextWrites']['to']['fields'] = $requiredPramCheck;

                return json_encode($response);
            }
        }
        if(count($jsonParams)>0){
            $jsonParamsCheck = [];
            foreach($jsonParams as $oneParam){
                if(isset($inputParam[$oneParam]) && $inputParam[$oneParam] != false){
                    if(!is_array($inputParam[$oneParam])) {
                        array_push($jsonParamsCheck, $oneParam);
                    }
                }
            }
            if(count($jsonParamsCheck)>0){
                $response = [];
                $response['callback'] = 'error';
                $response['contextWrites']['to']['status_code'] = 'JSON_VALIDATION';
                $response['contextWrites']['to']['status_msg'] = "Syntax error. Incorrect input JSON. Please, check fields withJSON input.";
                $response['contextWrites']['to']['fields'] = $jsonParamsCheck;

                return json_encode($response);
            }
        }

        return false;
    }

    private function prepareParam($inputParam, $dictionary)
    {
        $result = [];
        foreach($inputParam as $paramName => $paramVal){
            if(count($dictionary)>0) {
                if ($paramVal != false && isset($dictionary[$paramName])) {
                    $result[$dictionary[$paramName]] = $paramVal;
                }
            }else{
                if ($paramVal != false) {
                    $result[$paramName] = $paramVal;
                }
            }
        }

        return $result;
    }

    protected function httpRequest($url, $method, $apiKey, $sendBody)
    {
        $result = [];
        try {
            $vendorResponse = $this->http->request($method, $url, [
                'headers' => [
                    'Authorization' => 'token ' . $apiKey,
                    'Content-Type' => 'application/json',
                ],
                'body' => $sendBody
            ]);
            $responseBody = $vendorResponse->getBody()->getContents();

            $result['callback'] = 'success';
            if(empty(json_decode($responseBody))) {
                $result['contextWrites']['to'] = $responseBody;
            } else {
                $result['contextWrites']['to'] = json_decode($responseBody, true);
            }
        } catch (\GuzzleHttp\Exception\ClientException $exception) {
            $responseBody = $exception->getResponse()->getBody()->getContents();
            if(empty(json_decode($responseBody))) {
                $out = $responseBody;
            } else {
                $out = json_decode($responseBody, true);
            }
            $result['callback'] = 'error';
            $result['contextWrites']['to']['status_code'] = 'API_ERROR';
            $result['contextWrites']['to']['status_msg'] = $out;
        } catch (\GuzzleHttp\Exception\UnhandledException $exception) {
            $responseBody = $exception->getResponse()->getBody()->getContents();
            if(empty(json_decode($responseBody))) {
                $out = $responseBody;
            } else {
                $out = json_decode($responseBody, true);
            }
            $result['callback'] = 'error';
            $result['contextWrites']['to']['status_code'] = 'API_ERROR';
            $result['contextWrites']['to']['status_msg'] = $out;
        } catch (\GuzzleHttp\Exception\ServerException $exception) {
            $responseBody = $exception->getResponse()->getBody()->getContents();
            if(empty(json_decode($responseBody))) {
                $out = $responseBody;
            } else {
                $out = json_decode($responseBody, true);
            }
            $result['callback'] = 'error';
            $result['contextWrites']['to']['status_code'] = 'API_ERROR';
            $result['contextWrites']['to']['status_msg'] = $out;
        } catch (\GuzzleHttp\Exception\ConnectException $exception) {
            $result['callback'] = 'error';
            $result['contextWrites']['to']['status_code'] = 'INTERNAL_PACKAGE_ERROR';
            $result['contextWrites']['to']['status_msg'] = 'Something went wrong inside the package.';
        }

        return $result;
    }

    private function normalizeJson($jsonObject)
    {
        return preg_replace_callback('~"([\[{].*?[}\]])"~s', function($match){
            return preg_replace('~\s*"\s*~', "\"", $match[1]);
        }, $jsonObject);
    }
}