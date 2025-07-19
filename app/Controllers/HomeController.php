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

    public function download()
    {
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="myfile.pdf"');
        readfile(STORAGE_PATH . '/myfile.pdf');
    }

    public function upload()
    {
        $filePath = STORAGE_PATH . '/' . $_FILES['receipt']['name'];
        move_uploaded_file($_FILES['receipt']['tmp_name'],$filePath);

        header('Location: /');
        exit;
    }
}