<?php

include __DIR__.'/../../library/Database.php';

class OrganizationController {
    public function listAction() {

        $database = Database::connect();

        $result = $database->query('SELECT * FROM `ws_organization`');
        //$result = $database->exec($query);

        return $result->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getAction() {
        $database = Database::connect();

        $result = $database->query('SELECT * FROM `ws_organization` WHERE TUID = '.$_GET['organizationID']);
        //$result = $database->exec($query);

        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function createAction() {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $database = Database::connect();

        $database->query('INSERT INTO `ws_organization` (name, description, email, password) 
                                    VALUES ("'.$name.'", "'.$description.'", "'.$email.'", "'.$password.'")');

        return [
            'id' => $database->lastInsertId(),
            'name' => $name,
            'description' => $description,
            'email' => $email,
            'password' => $password
        ];
    }
}