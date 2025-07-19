<?php
declare(strict_types=1);

use App\Controllers\HomeController;
use App\Controllers\InvoiceController;
use App\Exceptions\RouteNotFoundException;
use App\Router;
use App\View;
require_once __DIR__ . '/../vendor/autoload.php';

define('STORAGE_PATH', __DIR__ . '/../storage');
define('VIEWS_PATH', __DIR__ . '/../views');



try {
    $router = new Router();

    $router
    ->get('/',[HomeController::class, 'index'])
    ->get('/download',[HomeController::class,'download'])
    ->post('/upload',[HomeController::class,'upload'])
    ->get('/invoices',[InvoiceController::class, 'index'])
    ->get('/invoices/create',[InvoiceController::class, 'create'])
    ->post('/invoices/create',[InvoiceController::class, 'store']);

    echo $router->resolve(
        $_SERVER['REQUEST_URI'],
        strtolower($_SERVER['REQUEST_METHOD'])
    );

} catch (RouteNotFoundException $e){
    http_response_code(404);
    echo View::make('errors/404');
}