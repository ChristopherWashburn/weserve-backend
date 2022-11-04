<?php

include __DIR__.'/../../library/Database.php';

class EventController {
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
        $eventName = $_POST['name'];
        $address = $_POST['address'];
        $description = $_POST['description'];

        $database = Database::connect();

        $database->query('INSERT INTO `ws_event` (name, description) VALUES ("'.$eventName.'", "'.$address.'", "'.$description.'")');

        return [
            'id' => $database->lastInsertId(),
            'name' => $eventName,
            'address' => $address,
            'description' => $description,
        ];
    }
}