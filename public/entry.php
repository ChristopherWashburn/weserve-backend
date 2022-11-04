<?php

$requestUrl = $_SERVER['REDIRECT_URL'];

$response = [];

$urlParts = explode('/', $requestUrl); // 2 => controller, 3 => action
$controllerName = ucfirst($urlParts[2]).'Controller';
$actionName = $urlParts[3].'Action';

include '../app/controllers/'.$controllerName.'.php';

if (class_exists($controllerName) && method_exists($controllerName, $actionName)) {
    $controller = new $controllerName();
    $response = $controller->{$actionName}();
} else {
    $response = ['error' => 'Method not found'];
}

echo json_encode($response);