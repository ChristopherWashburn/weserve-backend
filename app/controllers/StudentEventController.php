<?php

include __DIR__.'/../../library/Database.php';

class StudentEventController {
    public function listAction() {

        $database = Database::connect();

        $result = $database->query('SELECT * FROM `ws_student_event`');
        //$result = $database->exec($query);

        return $result->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getAction() {
        $database = Database::connect();

        $result = $database->query('SELECT * FROM `ws_student_event` WHERE event_id = '.$_GET['eventID'] ."AND student_id = " .$_GET['studentID']);
        //$result = $database->exec($query);

        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function createAction() {
        $eventID = $_POST['eventID'];
        $studentID = $_POST['studentID'];

        $database = Database::connect();

        $database->query('INSERT INTO `ws_student_event` (event_id, student_id) VALUES ("'.$eventID.'", "'.$studentID.'"');

        return [
            'id' => $database->lastInsertId(),
            'eventID' => $eventID,
            'studentID' => $studentID
        ];
    }
}