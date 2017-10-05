<?php
class Db{
    public static function getConnection(){
        $paramsPath = ROOT . '/config/db_params.php';
        $params = include($paramsPath);
        $options = array( PDO:: MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

        try {
            $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
            $db = new PDO($dsn, $params['user'], $params['password'], $options);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            SRC::redirect('/new-farmer/');
            //echo 'Подключение не удалось: ' . $e->getCode();
        }
        return $db;
    }
}