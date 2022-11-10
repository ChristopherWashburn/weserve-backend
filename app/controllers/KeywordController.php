<?php

include __DIR__.'/../../library/Database.php';

class KeywordController {
    public function listAction() {

        $database = Database::connect();

        $result = $database->query('SELECT * FROM `ws_keyword`');
        //$result = $database->exec($query);

        return $result->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getAction() {
        $database = Database::connect();

        $result = $database->query('SELECT * FROM `ws_keyword` WHERE TUID = '.$_GET['TUID']);
        //$result = $database->exec($query);

        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function createAction() {
        $keyword = $_POST['keyword'];

        $database = Database::connect();

        $database->query('INSERT INTO `ws_keyword` (keyword) VALUES ("'.$keyword.'"');

        return [
            'id' => $database->lastInsertId(),
            'keyword' => $keyword
        ];
    }
}