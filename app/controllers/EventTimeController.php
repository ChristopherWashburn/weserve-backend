<?php

include __DIR__.'/../../library/Database.php';

class EventTimeController {
    public function listAction() {

        $database = Database::connect();

        $result = $database->query('SELECT * FROM `ws_event_time`');
        //$result = $database->exec($query);

        return $result->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getAction() {
        $database = Database::connect();

        $result = $database->query('SELECT * FROM `ws_event_time` WHERE eventID = '.$_GET['eventId']);
        //$result = $database->exec($query);

        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function createAction() {
        $eventID = $_POST['eventID'];
        $day = $_POST['day'];
        $start_time = $_POST['startTime'];
        $end_time = $_POST['endTime'];
        $active = $_POST['active'];

        $database = Database::connect();

        $database->query('INSERT INTO `ws_event_time` (event_id, day, start_time, end_time, active) VALUES ("'.$eventID.'", "'.$day.'", "'.$start_time.'", "'.$end_time.'", "'.$active.'"');

        return [
            'id' => $database->lastInsertId(),
            'eventID' => $eventID,
            'day' => $day,
            'startTime' => $start_time,
            'endTime' => $end_time,
            'active' => $active
        ];
    }
}