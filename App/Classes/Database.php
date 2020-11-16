<?php


/**
 *  @title : Database.php
 *  @author : Guillaume RISCH
 *  @author : Matthis HOULES
 * 
 *  @brief : Database class
 */


require_once(__DIR__.'/Config.php');

abstract class Database {


    /**
     * @name : DBConnect
     * 
     * @param : void
     * @return PDO object
     * 
     * @brief : Connexion to the DB
     * 
     */
    protected static function DBConnect() {
        $dsn = 'mysql:host=' . Config::DB_HOST . ';dbname=' . Config::DB_NAME . ';charset=utf8';

        $database = new PDO($dsn, Config::DB_USER, Config::DB_PWD);

        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $database;

    } // protected static function DBConnect()


}


?>