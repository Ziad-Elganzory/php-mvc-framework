<?php
declare(strict_types=1);

namespace App\Controllers;

use App\View;

class InvoiceController
{
    public function index()
    {
        return View::make('invoices/index');
    }

    public function create()
    {
        return View::make('invoices/create');
    }

    public function store()
    {
        $name = $_POST['name'] ?? '';

        var_dump($name);
    }
}