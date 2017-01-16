<?php

namespace Core;

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
        foreach ($this->custom['blocks'] as $blockName => $blockSettings) {
            $this->setRoute($blockName, $blockSettings['method'], $blockSettings['vendorUrl']);
        }
        $this->klein->dispatch();
        var_dump(
            $this->packageName
            //$this->blocks,
            //$this->custom
        );
    }

    private function setRoute($blockName, $method, $url)
    {
        $routePath = INDEX_PATH . 'api/' . $this->packageName . '/' . $blockName . '/?';
        $this->klein->respond($method, $routePath, function()use($url){
            echo $hello;
            $sendingParam = $this->prepareParam();
            /*
            $this->param = $this->checkPram(['apiKey', 'reportHash', 'baseline', 'reportDate', 'sample']);
            // Validate Required and JSON fields
            $response = $this->validateParam(['apiKey'], ['filter']);
            if($response){
                return $response;
            }
            // Prepare parameter for sending
            $sendingParam = $this->prepareParam([
                'apiKey' => 'key',
                'twitterId' => 'twitter_id',
                'twitterHandle' => 'twitter_handle',
                'filter' => 'filter'
            ]);
            // Make request
            $result = $this->httpRequest('http://api.statsocial.com:80/api/reports/twitter/create/', $sendingParam);

            return json_encode($result);
            */
            echo '{"ok": "ok"}';
        });
    }
}