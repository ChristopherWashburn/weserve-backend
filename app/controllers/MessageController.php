<?php

include __DIR__.'/../../library/Database.php';

class MessageController {
    public function listAction() {

        $database = Database::connect();

        $result = $database->query('SELECT * FROM `ws_message`');
        //$result = $database->exec($query);

        return $result->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getAction() {
        $database = Database::connect();

        $result = $database->query('SELECT * FROM `ws_message` WHERE organizationID = '.$_GET['organizationID'] ."AND studentID = " .$_GET['studentID']);
        //$result = $database->exec($query);

        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function createAction() {
        $organizationID = $_POST['organizationID'];
        $studentID = $_POST['studentID'];
        $message = $_POST['message'];
        $datetime = $_POST['datetime'];
        $messageOrder = $_POST['messageOrder'];

        $database = Database::connect();

        $database->query('INSERT INTO `ws_message` (organization_id, student_id, message, datetime, message_order) VALUES ("'.$organizationID.'", "'.$studentID.'", "'.$message.'", "'.$datetime.'", "'.$messageOrder.'"');

        return [
            'id' => $database->lastInsertId(),
            'organizationID' => $organizationID,
            'studentID' => $studentID,
            'message' => $message,
            'datetime' => $datetime,
            'messageOrder' => $messageOrder
        ];
    }
}