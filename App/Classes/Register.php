<?php

/**
 * @title : Register.php
 * 
 * @author : Guillaume RISCH
 * @author : Matthis HOULES
 * 
 */

require_once(__DIR__.'./Database.php');

class Register extends Database {

    protected $email;
    protected $firstname;
    protected $surname;
    protected $affiliation;
    protected $morning;
    protected $lunch;
    protected $afternoon;


    /**
     * @name : __construct
     * 
     * @param string email
     * @param string firstname
     * @param string surname
     * @param string affiliation
     * @param bool morning
     * @param bool lunch
     * @param bool afternoon
     * 
     * @return void
     * 
     * @brief : Register class constructor
     * 
     */
    function __construct($email, $firstname, $surname, $affiliation, $morning, $lunch, $afternoon) {
        $this->email = $email;
        $this->firstname = $firstname;
        $this->surname = $surname;
        $this->affiliaation = $affiliation;
        $this->morning = $morning;
        $this->lunch = $lunch;
        $this->afternoon = $afternoon;

    } // function __construct($email, $firstname, $surname, $affiliation, $morning, $lunch, $afternoon)


    /**
     * 
     * @name : createRegister
     * 
     * @param string email
     * @param string firstname
     * @param string surname
     * @param string affiliation
     * @param bool morning
     * @param bool lunch
     * @param bool afternoon
     * 
     * @return void
     * 
     * @brief : insert in DB a new registration
     */
    public static function createRegister($email, $firstname, $surname, $affiliation, $morning, $lunch, $afternoon) {
        $DB = static::DBConnect();

        $stmt = $DB->prepare('INSERT INTO `register` (`id`, `email`, `firstname`, `surname`, `affiliation`, `morning`, `lunch`, `afternoon`) 
                          VALUES (NULL, ?, ?, ?, ?, ?, ?, ?);');
        $stmt->execute(array(
            $email,
            $firstname,
            $surname,
            $affiliation,
            $morning,
            $lunch,
            $afternoon
        ));


    } // public static function createRegister($email, $firstname, $surname, $affiliation, $morning, $lunch, $afternoon)


    /**
     * @name : isMailExist
     * 
     * @param string email
     * 
     * @return bool true if exist, false instead
     * 
     * @brief : is user mail is already registered
     * 
     */
    public static function isMailExist($email) {

        $DB = static::DBConnect();
        $stmt = $DB->prepare('SELECT * FROM `register` WHERE `email` = ? ');
        $stmt->execute(array(
            $email
        ));

        $result = $stmt->fetchAll();

        if (sizeof($result) == 0) {
            return false;
        } else {
            return true;
        }
        
    } // public static function isMailExist($email)

    /**
     * 
     * @name : getAll
     * 
     * @param : void
     * 
     * @return array{Register}
     * 
     * @brief : get all registrations.
     * 
     */
    public static function getAll() {

        $DB = static::DBConnect();

        $stmt = $DB->prepare('select * from register');
        $stmt->execute();
        $result = $stmt->fetchAll();

        $listRegistration = array();
        foreach ($result as $key => $value) {
            
            array_push(
                $listRegistration,

                new Register(
                    $value['email'],
                    $value['firstname'],
                    $value['surname'],
                    $value['affiliation'],
                    $value['morning'],
                    $value['lunch'],
                    $value['afternoon']
                )

            );
            
        }

        return $listRegistration;
 
    } // public static function getAll()


    /**
     * 
     * @name : isRegistrationsFull
     * 
     * @param array{string => int}
     * @param Parameters
     * 
     * @return bool
     * 
     * @brief : are registrations full
     * 
     */
    public static function isRegistrationsFull($countReg, $params) {

        if ($countReg['morning'] >= $params->getNumberRegistrationMorning()
            && $countReg['afternoon'] >= $params->getNumberRegistrationAfternoon()
            && $countReg['lunch'] >= $params->getNumberRegistrationLunch()) {
            
            return true;
        
        }
        return false;

    } // public static function isRegistrationsFull($countReg)


    /**
     * 
     * @name : getCountRegistrations
     * 
     * @param : void
     * @return array{string => int} string : morning lunch afternoon, int : number of registrations
     * 
     * @brief : get number of registrations
     */
    public static function getCountRegistrations() {
        $DB = static::DBConnect();
        $stmt = $DB->prepare('SELECT DISTINCT
                                (SELECT count(*) FROM register WHERE morning = 1) as morningC,
                                (SELECT count(*) FROM register WHERE afternoon = 1) as afternoonC,
                                (SELECT count(*) FROM register WHERE lunch = 1) as lunchC
                            FROM `register`');
        $stmt->execute();

        $result = $stmt->fetch();

        return array(
            'morning' => $result['morningC'],
            'afternoon' => $result['afternoonC'],
            'lunch' => $result['lunchC'],
        );

    }

    public function getEmail(){
		return $this->email;
	}

	public function getFirstname(){
		return $this->firstname;
	}

	public function getSurname(){
		return $this->surname;
	}

	public function getAffiliation(){
		return $this->affiliation;
    }
    
	public function getMorning(){
		return $this->morning;
	}

	public function getLunch(){
		return $this->lunch;
	}

	public function getAfternoon(){
		return $this->afternoon;
	}



}

?>