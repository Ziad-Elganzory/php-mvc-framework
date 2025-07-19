<?php
declare(strict_types=1);

namespace App\Controllers;

use App\View;

class HomeController
{
    public function index(): View
    {
        return View::make('index',[
            'title' => 'Welcome to My Site',
            'username' => 'John Doe',
            'message' => 'Hello World!'
        ]);
    }

    public function upload()
    {
        echo '<pre>';
        print_r($_FILES['receipt']);
        echo '</pre>';

        $filePath = STORAGE_PATH . '/' . $_FILES['receipt']['name'];
        move_uploaded_file($_FILES['receipt']['tmp_name'],$filePath);

        echo '<pre>';
        print_r(pathinfo($filePath));
        echo '</pre>';
    }
}