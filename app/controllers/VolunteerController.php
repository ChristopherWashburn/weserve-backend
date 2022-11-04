<?php

include __DIR__.'/../../library/Database.php';

class VolunteerController {
    public function listAction() {

        $database = Database::connect();

        $result = $database->query('SELECT * FROM `ws_person`');

        return $result->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getAction() {
        $database = Database::connect();

        $result = $database->query('SELECT * FROM `ws_person` WHERE TUID = '.$_GET['volunteerId']);

        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function createAction() {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $year = $_POST['year'];
        $major = $_POST['major'];
        $hours = $_POST['hours'];
        $profilePicture = $_POST['profilePicture'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        $database = Database::connect();

        $database->query('INSERT INTO `ws_person` (name, description) 
        VALUES ("'.$firstName.'", "'.$lastName.'", "'.$year.'" , "'.$major.'", "'.$hours.'", "'.$profilePicture.'", "'.$username.'", "'.$password.'")');

        return [
            'id' => $database->lastInsertId(),
            'firstName' => $firstName,
            'lastName' => $lastName,
            'year' => $year,
            'major' => $major,
            'hours' => $hours,
            'profilePicture' => $profilePicture,
            'username' => $username,
            'password' => $password
        ];
    }
}