<?php

include __DIR__.'/../../library/Database.php';

class OrganizationController {
    public function listAction() {

        $database = Database::connect();

        $result = $database->query('SELECT * FROM `ws_event`');
        //$result = $database->exec($query);

        return $result->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getAction() {
        $database = Database::connect();

        $result = $database->query('SELECT * FROM `ws_event` WHERE TUID = '.$_GET['eventId']);
        //$result = $database->exec($query);

        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function createAction() {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $database = Database::connect();

        $database->query('INSERT INTO `ws_event` (name, description) 
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