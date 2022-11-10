<?php

include __DIR__.'/../../library/Database.php';

class OrganizationEventController {
    public function listAction() {

        $database = Database::connect();

        $result = $database->query('SELECT * FROM `ws_organization_event`');
        //$result = $database->exec($query);

        return $result->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getAction() {
        $database = Database::connect();

        $result = $database->query('SELECT * FROM `ws_organization_event` WHERE event_id = '.$_GET['eventID'] ."AND organization_id = " .$_GET['organizationID']);
        //$result = $database->exec($query);

        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function createAction() {
        $eventID = $_POST['eventID'];
        $organizationID = $_POST['organizationID'];

        $database = Database::connect();

        $database->query('INSERT INTO `ws_organization_event` (event_id, organization_id) VALUES ("'.$eventID.'", "'.$organizationID.'"');

        return [
            'id' => $database->lastInsertId(),
            'eventID' => $eventID,
            'organizationID' => $organizationID
        ];
    }
}