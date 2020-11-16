<?php

/**
 * @title : User.php
 * 
 * @author : Guillaume RISCH
 * @author : Matthis HOULES
 * 
 */

require_once(__DIR__.'./Database.php');

class User extends Database {

    protected $id;
    protected $username;

    /**
     * @name : __construct
     * 
     * @param int id
     * @param string username
     * 
     * @return void
     *
     * @brief : User class constructor 
     *
     */
    function __construct($id, $username) {
        $this->id = $id;
        $this->username = $username;

    } // function __construct($id, $username)



    /**
     *  @name : isUserExist
     * 
     *  @param string username
     *  @param string pwd
     * 
     *  @return User if user exist, false instead
     * 
     */
    public static function isUserExist($username, $pwd) {

        // check mail
        $DB = static::DBConnect();
        $stmt = $DB->prepare('SELECT * FROM user WHERE username = ?');
        $stmt->execute([$username]);

        $userResult = $stmt->fetchAll();

        if (sizeof($userResult) == 0) {
            return false;
        }

        // check password
        if (!password_verify($pwd, $userResult[0]['password'])) {
            return false;
        }


        return new User (
            $userResult[0]['id'],
            $userResult[0]['username']
        );


    } // public static function isUserExist($email, $pwd)



}


?>