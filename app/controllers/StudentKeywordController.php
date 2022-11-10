<?php

include __DIR__.'/../../library/Database.php';

class StudentKeywordController {
    public function listAction() {

        $database = Database::connect();

        $result = $database->query('SELECT * FROM `ws_student_keyword`');
        //$result = $database->exec($query);

        return $result->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getAction() {
        $database = Database::connect();

        $result = $database->query('SELECT * FROM `ws_student_keyword` WHERE student_id = '.$_GET['studentID'] ."AND keyword_id = " .$_GET['keywordID']);
        //$result = $database->exec($query);

        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function createAction() {
        $studentID = $_POST['studentID'];
        $keywordID = $_POST['keywordID'];

        $database = Database::connect();

        $database->query('INSERT INTO `ws_student_keyword` (student_id, keyword_id) VALUES ("'.$studentID.'", "'.$keywordID.'"');

        return [
            'id' => $database->lastInsertId(),
            'studentID' => $studentID,
            'keywordID' => $keywordID
        ];
    }
}