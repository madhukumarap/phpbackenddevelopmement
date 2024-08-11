<?php
declare(strict_types=1);

class Home
{
    public function index()
    {
        try {
            $db = new PDO('mysql:host=localhost;dbname=my_db', 'root', '', [
                PDO::ATTR_DEFAULT_FETCH_MODE  => PDO::FETCH_OBJ,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION // Enable exceptions
            ]);

            // User data
            $email = 'mawdhu12qw2@gmail.com';
            $name = 'madhu';
            $is_active = 1;
            $created_at = date('Y-m-d H:i:s', strtotime('07/08/2024 9:00PM'));

            // Insert user data
            $userQuery = 'INSERT INTO users (email, full_name, is_active, created_at, updated_at) 
                          VALUES (:email, :name, :active, :date, :date)';
            $stmt = $db->prepare($userQuery);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':name', $name);
            $stmt->bindParam(':active', $is_active, PDO::PARAM_BOOL);
            $stmt->bindValue(':date', $created_at);
            $stmt->execute();

            // Fetch the last inserted user ID
            $userId = $db->lastInsertId();

            // Fetch and display the inserted user
            $user = $db->query('SELECT * FROM users WHERE id = ' . $userId)->fetch();
            echo '<pre>';
            var_dump($user);
            echo '</pre>';

            // Invoice data
            $invoiceNumber = 'INV-' . rand(1000, 9999);
            $amount = 150.00;
            $invoiceDate = date('Y-m-d H:i:s');

            // Insert invoice data
            $invoiceQuery = 'INSERT INTO invoices (user_id, invoice_number, amount, invoice_date) 
                             VALUES (:user_id, :invoice_number, :amount, :invoice_date)';
            $stmt = $db->prepare($invoiceQuery);
            $stmt->bindValue(':user_id', $userId);
            $stmt->bindValue(':invoice_number', $invoiceNumber);
            $stmt->bindValue(':amount', $amount);
            $stmt->bindValue(':invoice_date', $invoiceDate);
            $stmt->execute();

            // Fetch and display the inserted invoice
            $invoiceId = $db->lastInsertId();
            $invoice = $db->query('SELECT * FROM invoices WHERE id = ' . $invoiceId)->fetch();
            echo '<pre>';
            var_dump($invoice);
            echo '</pre>';

        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), $e->getCode());
        }

        var_dump($db);
    }
}

$home = new Home();
$home->index();
