<?php

require_once __DIR__ . '/MainController.php';

$routes = require __DIR__ . '/routes.php';

// Получаем путь из адресной строки без начального и конечного слэша
$route = trim(urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)), '/');

$isRouteFound = false;

foreach ($routes as $pattern => $controllerAndAction) {
    preg_match($pattern, $route, $matches);
    if (!empty($matches)) {
        $isRouteFound = true;
        break;
    }
}

if (!$isRouteFound) {
    http_response_code(404);
    echo 'Страница не найдена!';
    return;
}

// Убираем полное совпадение, оставляем только параметр ($name)
unset($matches[0]);

$controllerName = $controllerAndAction[0];
$actionName = $controllerAndAction[1];

$controller = new $controllerName();
$controller->$actionName(...$matches);
