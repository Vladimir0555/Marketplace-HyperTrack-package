<?php
return array (
    'root' => array (
        'vendorUrl' => 'https://app.hypertrack.io/api/v1/',
        'method' => 'GET',
    ),
    'createDriver' => array (
        'dictionary' => array (
            'apiKey' => 'apiKey',
            'vehicleType' => 'vehicle_type',
            'name' => 'name',
            'phone' => 'phone',
            'photo' => 'photo',
            'lookupId' => 'lookup_id',
            'fleetId' => 'fleet_id',
        ),
        'vendorUrl' => 'https://app.hypertrack.io/api/v1/drivers/',
        'method' => 'POST',
    ),
    'getSingleDriver' => array(
        'dictionary' => array(
            'apiKey' => 'apiKey',
            'driverId' => 'driverId',
        ),
        'vendorUrl' => 'https://app.hypertrack.io/api/v1/',
        'method' => 'GET',
    ),
    'updateDriver' => array(
        'dictionary' => array(
            'apiKey' => 'apiKey',
            'driverId' => 'driverId',
            'vehicleType' => 'vehicleType',
            'name' => 'name',
            'phone' => 'phone',
            'photo' => 'photo',
            'lookupId' => 'lookupId',
            'fleetId' => 'fleetId',
        ),
        'vendorUrl' => 'https://app.hypertrack.io/api/v1/',
        'method' => 'POST',
    ),
    'deleteDriver' => array(
        'dictionary' => array(
            'apiKey' => 'apiKey',
            'driverId' => 'driverId',
        ),
        'vendorUrl' => 'https://app.hypertrack.io/api/v1/',
        'method' => 'POST',
    ),
    'getDrivers' => array(
        'dictionary' => array(
            'apiKey' => 'apiKey',
            'pageSize' => 'pageSize',
            'name' => 'name',
            'id' => 'id',
            'fleetId' => 'fleetId',
            'bbox' => 'bbox',
            'minDate' => 'minDate',
            'maxDate' => 'maxDate',
        ),
        'vendorUrl' => 'https://app.hypertrack.io/api/v1/',
        'method' => 'POST',
    ),
    'getDriverOverview' => array(
        'dictionary' => array(
            'apiKey' => 'apiKey',
            'minDate' => 'minDate',
            'maxDate' => 'maxDate',
        ),
        'vendorUrl' => 'https://app.hypertrack.io/api/v1/',
        'method' => 'POST',
    ),
    'getDriversLocations' => array(
        'dictionary' => array(
            'apiKey' => 'apiKey',
            'fleetId' => 'fleetId',
            'pageSize' => 'pageSize',
            'minDate' => 'minDate',
            'maxDate' => 'maxDate',
        ),
        'vendorUrl' => 'https://app.hypertrack.io/api/v1/',
        'method' => 'POST',
    ),
    'assignTaskToDriver' => array(
        'dictionary' => array(
            'apiKey' => 'apiKey',
            'driverId' => 'driverId',
            'taskId' => 'taskId',
        ),
        'vendorUrl' => 'https://app.hypertrack.io/api/v1/',
        'method' => 'POST',
    ),
    'endTripForDriver' => array(
        'dictionary' => array(
            'apiKey' => 'apiKey',
            'driverId' => 'driverId',
        ),
        'vendorUrl' => 'https://app.hypertrack.io/api/v1/',
        'method' => 'POST',
    ),
    'endShiftForDriver' => array(
        'dictionary' => array(
            'apiKey' => 'apiKey',
            'driverId' => 'driverId',
        ),
        'vendorUrl' => 'https://app.hypertrack.io/api/v1/',
        'method' => 'POST',
    ),
    'createTrip' => array(
        'dictionary' => array(
            'apiKey' => 'apiKey',
            'driverId' => 'driverId',
            'startLocation' => 'startLocation',
            'tasks' => 'tasks',
            'vehicleType' => 'vehicleType',
            'hasOrderedTasks' => 'hasOrderedTasks',
            'isAutoEnded' => 'isAutoEnded',
        ),
        'vendorUrl' => 'https://app.hypertrack.io/api/v1/',
        'method' => 'POST',
    ),
    'endTrip' => array(
        'dictionary' => array(
            'apiKey' => 'apiKey',
            'tripId' => 'tripId',
            'endLocation' => 'endLocation',
            'endTime' => 'endTime',
        ),
        'vendorUrl' => 'https://app.hypertrack.io/api/v1/',
        'method' => 'POST',
    ),
    'getSingleTrip' => array(
        'dictionary' => array(
            'apiKey' => 'apiKey',
            'tripId' => 'tripId',
        ),
        'vendorUrl' => 'https://app.hypertrack.io/api/v1/',
        'method' => 'POST',
    ),
    'deleteTrip' => array(
        'dictionary' => array(
            'apiKey' => 'apiKey',
            'tripId' => 'tripId',
        ),
        'vendorUrl' => 'https://app.hypertrack.io/api/v1/',
        'method' => 'POST',
    ),
    'getTrips' => array(
        'dictionary' => array(
            'apiKey' => 'apiKey',
            'pageSize' => 'pageSize',
            'driverId' => 'driverId',
            'id' => 'id',
            'status' => 'status',
            'minDate' => 'minDate',
            'maxDate' => 'maxDate',
        ),
        'vendorUrl' => 'https://app.hypertrack.io/api/v1/',
        'method' => 'POST',
    ),
    'addTaskToTrip' => array(
        'dictionary' => array(
            'apiKey' => 'apiKey',
            'tripId' => 'tripId',
            'taskId' => 'taskId',
        ),
        'vendorUrl' => 'https://app.hypertrack.io/api/v1/',
        'method' => 'POST',
    ),
    'removeTaskFromTrip' => array(
        'dictionary' => array(
            'apiKey' => 'apiKey',
            'tripId' => 'tripId',
            'taskId' => 'taskId',
        ),
        'vendorUrl' => 'https://app.hypertrack.io/api/v1/',
        'method' => 'POST',
    ),
    'changeTripTasksSequence' => array(
        'dictionary' => array(
            'apiKey' => 'apiKey',
            'tripId' => 'tripId',
            'taskOrder' => 'taskOrder',
        ),
        'vendorUrl' => 'https://app.hypertrack.io/api/v1/',
        'method' => 'POST',
    ),
    'createTask' => array(
        'dictionary' => array(
            'apiKey' => 'apiKey',
            'destinationId' => 'destinationId',
            'action' => 'action',
            'orderId' => 'orderId',
            'committedEta' => 'committedEta',
        ),
        'vendorUrl' => 'https://app.hypertrack.io/api/v1/',
        'method' => 'POST',
    ),
    'createTaskWithNewDestination' => array(
        'dictionary' => array(
            'apiKey' => 'apiKey',
            'customerId' => 'customerId',
            'address' => 'address',
            'landmark' => 'landmark',
            'zipCode' => 'zipCode',
            'city' => 'city',
            'state' => 'state',
            'country' => 'country',
            'locationLatitude' => 'locationLatitude',
            'locationLongitude' => 'locationLongitude',
            'action' => 'action',
            'orderId' => 'orderId',
            'committedEta' => 'committedEta',
        ),
        'vendorUrl' => 'https://app.hypertrack.io/api/v1/',
        'method' => 'POST',
    ),
    'completeTask' => array(
        'dictionary' => array(
            'apiKey' => 'apiKey',
            'taskId' => 'taskId',
            'completionTime' => 'completionTime',
            'completionLocation' => 'completionLocation',
        ),
        'vendorUrl' => 'https://app.hypertrack.io/api/v1/',
        'method' => 'POST',
    ),
    'cancelTask' => array(
        'dictionary' => array(
            'apiKey' => 'apiKey',
            'taskId' => 'taskId',
            'cancelationTime' => 'cancelationTime',
        ),
        'vendorUrl' => 'https://app.hypertrack.io/api/v1/',
        'method' => 'POST',
    ),
    'getSingleTask' => array(
        'dictionary' => array(
            'apiKey' => 'apiKey',
            'taskId' => 'taskId',
        ),
        'vendorUrl' => 'https://app.hypertrack.io/api/v1/',
        'method' => 'POST',
    ),
    'updateDestinationLocation' => array(
        'dictionary' => array(
            'apiKey' => 'apiKey',
            'taskId' => 'taskId',
            'locationLatitude' => 'locationLatitude',
            'locationLongitude' => 'locationLongitude',
        ),
        'vendorUrl' => 'https://app.hypertrack.io/api/v1/',
        'method' => 'POST',
    ),
    'getTasks' => array(
        'dictionary' => array(
            'apiKey' => 'apiKey',
            'pageSize' => 'pageSize',
            'driverId' => 'driverId',
            'orderId' => 'orderId',
            'minDate' => 'minDate',
            'maxDate' => 'maxDate',
        ),
        'vendorUrl' => 'https://app.hypertrack.io/api/v1/',
        'method' => 'POST',
    ),
    'deleteTask' => array(
        'dictionary' => array(
            'apiKey' => 'apiKey',
            'taskId' => 'taskId',
        ),
        'vendorUrl' => 'https://app.hypertrack.io/api/v1/',
        'method' => 'POST',
    ),
    'createShift' => array(
        'dictionary' => array(
            'apiKey' => 'apiKey',
            'driverId' => 'driverId',
            'startLocation' => 'startLocation',
            'startedAt' => 'startedAt',
        ),
        'vendorUrl' => 'https://app.hypertrack.io/api/v1/',
        'method' => 'POST',
    ),
    'getSingleShift' => array(
        'dictionary' => array(
            'apiKey' => 'apiKey',
            'shiftId' => 'shiftId',
        ),
        'vendorUrl' => 'https://app.hypertrack.io/api/v1/',
        'method' => 'POST',
    ),
    'endShift' => array(
        'dictionary' => array(
            'apiKey' => 'apiKey',
            'shiftId' => 'shiftId',
        ),
        'vendorUrl' => 'https://app.hypertrack.io/api/v1/',
        'method' => 'POST',
    ),
    'deleteShift' => array(
        'dictionary' => array(
            'apiKey' => 'apiKey',
            'shiftId' => 'shiftId',
        ),
        'vendorUrl' => 'https://app.hypertrack.io/api/v1/',
        'method' => 'POST',
    ),
    'getShifts' => array(
        'dictionary' => array(
            'apiKey' => 'apiKey',
            'pageSize' => 'pageSize',
            'id' => 'id',
            'driverId' => 'driverId',
            'isActive' => 'isActive',
            'minDate' => 'minDate',
            'maxDate' => 'maxDate',
        ),
        'vendorUrl' => 'https://app.hypertrack.io/api/v1/',
        'method' => 'POST',
    ),
    'createDestination' => array(
        'dictionary' => array(
            'apiKey' => 'apiKey',
            'customerId' => 'customerId',
            'address' => 'address',
            'landmark' => 'landmark',
            'zipCode' => 'zipCode',
            'city' => 'city',
            'state' => 'state',
            'country' => 'country',
            'locationLatitude' => 'locationLatitude',
            'locationLongitude' => 'locationLongitude',
        ),
        'vendorUrl' => 'https://app.hypertrack.io/api/v1/',
        'method' => 'POST',
    ),
    'getSingleDestination' => array(
        'dictionary' => array(
            'apiKey' => 'apiKey',
            'destinationId' => 'destinationId',
        ),
        'vendorUrl' => 'https://app.hypertrack.io/api/v1/',
        'method' => 'POST',
    ),
    'updateDestination' => array(
        'dictionary' => array(
            'apiKey' => 'apiKey',
            'customerId' => 'customerId',
            'address' => 'address',
            'landmark' => 'landmark',
            'zipCode' => 'zipCode',
            'city' => 'city',
            'state' => 'state',
            'country' => 'country',
            'locationLatitude' => 'locationLatitude',
            'locationLongitude' => 'locationLongitude',
        ),
        'vendorUrl' => 'https://app.hypertrack.io/api/v1/',
        'method' => 'POST',
    ),
    'deleteDestination' => array(
        'dictionary' => array(
            'apiKey' => 'apiKey',
            'destinationId' => 'destinationId',
        ),
        'vendorUrl' => 'https://app.hypertrack.io/api/v1/',
        'method' => 'POST',
    ),
    'getDestinations' => array(
        'dictionary' => array(
            'apiKey' => 'apiKey',
            'pageSize' => 'pageSize',
            'customerId' => 'customerId',
            'minDate' => 'minDate',
            'maxDate' => 'maxDate',
        ),
        'vendorUrl' => 'https://app.hypertrack.io/api/v1/',
        'method' => 'POST',
    ),
    'createCustomer' => array(
        'dictionary' => array(
            'apiKey' => 'apiKey',
            'name' => 'name',
            'phone' => 'phone',
            'email' => 'email',
        ),
        'vendorUrl' => 'https://app.hypertrack.io/api/v1/',
        'method' => 'POST',
    ),
    'getSingleCustomer' => array(
        'dictionary' => array(
            'apiKey' => 'apiKey',
            'customerId' => 'customerId',
        ),
        'vendorUrl' => 'https://app.hypertrack.io/api/v1/',
        'method' => 'POST',
    ),
    'updateCustomer' => array(
        'dictionary' => array(
            'apiKey' => 'apiKey',
            'name' => 'name',
            'phone' => 'phone',
            'email' => 'email',
        ),
        'vendorUrl' => 'https://app.hypertrack.io/api/v1/',
        'method' => 'POST',
    ),
    'deleteCustomer' => array(
        'dictionary' => array(
            'apiKey' => 'apiKey',
            'customerId' => 'customerId',
        ),
        'vendorUrl' => 'https://app.hypertrack.io/api/v1/',
        'method' => 'POST',
    ),
    'getCustomers' => array(
        'dictionary' => array(
            'apiKey' => 'apiKey',
            'pageSize' => 'pageSize',
            'name' => 'name',
            'id' => 'id',
            'neighborhoodId' => 'neighborhoodId',
            'minDate' => 'minDate',
            'maxDate' => 'maxDate',
        ),
        'vendorUrl' => 'https://app.hypertrack.io/api/v1/',
        'method' => 'POST',
    ),
    'createFleet' => array(
        'dictionary' => array(
            'apiKey' => 'apiKey',
            'name' => 'name',
        ),
        'vendorUrl' => 'https://app.hypertrack.io/api/v1/',
        'method' => 'POST',
    ),
    'getSingleFleet' => array(
        'dictionary' => array(
            'apiKey' => 'apiKey',
            'fleetId' => 'fleetId',
        ),
        'vendorUrl' => 'https://app.hypertrack.io/api/v1/',
        'method' => 'POST',
    ),
    'updateFleet' => array(
        'dictionary' => array(
            'apiKey' => 'apiKey',
            'fleetId' => 'fleetId',
            'name' => 'name',
        ),
        'vendorUrl' => 'https://app.hypertrack.io/api/v1/',
        'method' => 'POST',
    ),
    'deleteFleet' => array(
        'dictionary' => array(
            'apiKey' => 'apiKey',
            'fleetId' => 'fleetId',
        ),
        'vendorUrl' => 'https://app.hypertrack.io/api/v1/',
        'method' => 'POST',
    ),
    'getFleets' => array(
        'dictionary' => array(
            'apiKey' => 'apiKey',
            'pageSize' => 'pageSize',
            'name' => 'name',
            'minDate' => 'minDate',
            'maxDate' => 'maxDate',
        ),
        'vendorUrl' => 'https://app.hypertrack.io/api/v1/',
        'method' => 'POST',
    ),
    'getSingleNeighborhood' => array(
        'dictionary' => array(
            'apiKey' => 'apiKey',
            'neighborhoodId' => 'neighborhoodId',
        ),
        'vendorUrl' => 'https://app.hypertrack.io/api/v1/',
        'method' => 'POST',
    ),
    'getNeighborhoods' => array(
        'dictionary' => array(
            'apiKey' => 'apiKey',
        ),
        'vendorUrl' => 'https://app.hypertrack.io/api/v1/',
        'method' => 'POST',
    ),
    'getSingleEvent' => array(
        'dictionary' => array(
            'apiKey' => 'apiKey',
            'eventId' => 'eventId',
        ),
        'vendorUrl' => 'https://app.hypertrack.io/api/v1/',
        'method' => 'POST',
    ),
    'getEvents' => array(
        'dictionary' => array(
            'apiKey' => 'apiKey',
        ),
        'vendorUrl' => 'https://app.hypertrack.io/api/v1/',
        'method' => 'POST',
    ),
    'createGPSLog' => array(
        'dictionary' => array(
            'apiKey' => 'apiKey',
            'driverId' => 'driverId',
            'locationLatitude' => 'locationLatitude',
            'locationLongitude' => 'locationLongitude',
            'recordedAt' => 'recordedAt',
            'locationAccuracy' => 'locationAccuracy',
            'speed' => 'speed',
            'bearing' => 'bearing',
            'altitude' => 'altitude',
            'activities' => 'activities',
            'activityConfidence' => 'activityConfidence',
        ),
        'vendorUrl' => 'https://app.hypertrack.io/api/v1/',
        'method' => 'POST',
    ),
    'createBulkGPSLogs' => array(
        'dictionary' => array(
            'apiKey' => 'apiKey',
            'gpsLogObjectsList' => 'gpsLogObjectsList',
        ),
        'vendorUrl' => 'https://app.hypertrack.io/api/v1/',
        'method' => 'POST',
    ),
    'getSingleGPSLog' => array(
        'dictionary' => array(
            'apiKey' => 'apiKey',
            'gpsLogObjectId' => 'gpsLogObjectId',
        ),
        'vendorUrl' => 'https://app.hypertrack.io/api/v1/',
        'method' => 'POST',
    ),
    'getFilteredGPSLogs' => array(
        'dictionary' => array(
            'apiKey' => 'apiKey',
            'pageSize' => 'pageSize',
            'driverId' => 'driverId',
            'minRecordedAt' => 'minRecordedAt',
            'maxRecordedAt' => 'maxRecordedAt',
            'minDate' => 'minDate',
            'maxDate' => 'maxDate',
        ),
        'vendorUrl' => 'https://app.hypertrack.io/api/v1/',
        'method' => 'POST',
    ),
    'deleteGPSLog' => array(
        'dictionary' => array(
            'apiKey' => 'apiKey',
            'gpsLogObjectId' => 'gpsLogObjectId',
        ),
        'vendorUrl' => 'https://app.hypertrack.io/api/v1/',
        'method' => 'POST',
    ),
);