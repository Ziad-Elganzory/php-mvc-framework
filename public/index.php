<?php
declare(strict_types=1);

use App\Controllers\HomeController;
use App\Controllers\InvoiceController;
use App\Exceptions\RouteNotFoundException;
use App\Router;
require_once __DIR__ . '/../vendor/autoload.php';

define('STORAGE_PATH', __DIR__ . '/../storage');
define('VIEWS_PATH', __DIR__ . '/../views');

$router = new Router();

$router
    ->get('/',[HomeController::class, 'index'])
    ->post('/upload',[HomeController::class,'upload'])
    ->get('/invoices',[InvoiceController::class, 'index'])
    ->get('/invoices/create',[InvoiceController::class, 'create'])
    ->post('/invoices/create',[InvoiceController::class, 'store']);
try {
    echo $router->resolve(
        $_SERVER['REQUEST_URI'],
        strtolower($_SERVER['REQUEST_METHOD'])
    );
} catch (RouteNotFoundException $e){
    echo '<h1 style="color:red;">404 Not Found</h1>';
}