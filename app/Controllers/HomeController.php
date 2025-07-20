<?php
declare(strict_types=1);

namespace App\Controllers;

use App\View;
use Exception;
use PDO;
use PDOException;
use Throwable;

class HomeController
{
    public function index(): View
    {
        try{
            $db = new PDO(
                'mysql:host='.$_ENV['DB_HOST'].';dbname='.$_ENV['DB_DATABASE'],
                $_ENV['DB_USER'],
                $_ENV['DB_PASS']
            );
        } catch(PDOException $e){
            throw new PDOException($e->getMessage());
        }

        $email = 'ziadm@objects.com';
        $name = 'Ziad Elganzory';
        $amount = 25;

        try{
            $db->beginTransaction();
            $userQuery = 'INSERT INTO users (email, full_name, is_active, created_at) VALUES (?, ?, 1, NOW())';
            $newUserStmt = $db->prepare($userQuery);
            
            $invoiceQuery = 'INSERT INTO invoices (amount, user_id) VALUES (?, ?)';
            $newInvoiceStmt = $db->prepare($invoiceQuery);

            $newUserStmt->execute([$email,$name]);
            $userId = (int) $db->lastInsertId();

            $newInvoiceStmt->execute([$amount, $userId]);
            $db->commit();
        } catch(Throwable $e){
            if($db->inTransaction()){
                $db->rollBack();
            }
            throw $e;
        }
        $fetchStmt = $db->prepare(
            'SELECT invoices.id AS invoice_id, amount, user_id, full_name
            FROM invoices
            INNER JOIN users ON user_id = users.id 
            WHERE email = ?'
        );

        $fetchStmt->execute([$email]);

        echo '<pre>';
        print_r($fetchStmt->fetch(PDO::FETCH_ASSOC));
        echo '</pre>';


        var_dump($db);
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