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

        $result = $database->query('SELECT username, password FROM `ws_person` WHERE username = '.$_GET['username']);
        //$result = $database->exec($query);

        return $result->fetch(PDO::FETCH_ASSOC);
    }

}