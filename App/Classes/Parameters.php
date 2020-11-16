<?php

/**
 * @title : Register.php
 * 
 * @author : Guillaume RISCH
 * @author : Matthis HOULES
 * 
 */

require_once(__DIR__.'./Database.php');

class Parameters extends Database {

    protected $startRegistration;
    protected $endRegistration;
    protected $numberRegistrationMorning;
    protected $numberRegistrationLunch;
    protected $numberRegistrationAfternoon;


    /**
     * 
     * @name : __construct
     * 
     * @param date startRegistration
     * @param date endRegistration
     * @param int numberRegistrationMorning
     * @param int numberRegistrationLunch
     * @param int numberRegistrationAfternoon
     * 
     * @return void
     * 
     * @brief Parameter class constructor
     */
    function __construct($startRegistration, $endRegistration, $numberRegistrationMorning, $numberRegistrationLunch, $numberRegistrationAfternoon) {
        $this->startRegistration = date('d/m/Y', strtotime($startRegistration));
        $this->endRegistration = date('d/m/Y', strtotime($endRegistration));
        $this->numberRegistrationMorning = $numberRegistrationMorning;
        $this->numberRegistrationLunch = $numberRegistrationLunch;
        $this->numberRegistrationAfternoon = $numberRegistrationAfternoon;

    } // function __construct($startRegistration, $endRegistration, $numberRegistrationMorning, $numberRegistrationLunch, $numberRegistrationAfternoon)



    /**
     * 
     * @name : getParameters
     * 
     * @param : void
     * @return Parameters
     * 
     * @brief : get parameters
     */
    public static function getParameters() {

        $DB = static::DBConnect();
        $stmt = $DB->prepare('SELECT * FROM parameters');
        $stmt->execute();
        $result = $stmt->fetchAll();

        return new Parameters(
            $result[0]['startRegistration'],
            $result[0]['endRegistration'],
            $result[0]['numberRegistrationMorning'],
            $result[0]['numberRegistrationLunch'],
            $result[0]['numberRegistrationAfternoon']                 
        );
    
    } // public static function getParameters()

    

    /*
        Getters / Setters
    */
    public function getStartRegistration(){
		return $this->startRegistration;
	}

	public function setStartRegistration($startRegistration){
        $DB = static::DBConnect();
        $stmt = $DB->prepare('UPDATE parameters SET startRegistration = ?');
        $stmt->execute(array($startRegistration));


		$this->startRegistration = $startRegistration;
	}

	public function getEndRegistration(){
		return $this->endRegistration;
	}

	public function setEndRegistration($endRegistration){
        $DB = static::DBConnect();
        $stmt = $DB->prepare('UPDATE parameters SET endRegistration = ?');
        $stmt->execute(array($endRegistration));
		$this->endRegistration = $endRegistration;
	}

	public function getNumberRegistrationMorning(){
        return $this->numberRegistrationMorning;
	}
    
	public function setNumberRegistrationMorning($numberRegistrationMorning){
        $DB = static::DBConnect();
        $stmt = $DB->prepare('UPDATE parameters SET numberRegistrationMorning = ?');
        $stmt->execute(array($numberRegistrationMorning));
		$this->numberRegistrationMorning = $numberRegistrationMorning;
	}

	public function getNumberRegistrationLunch(){
		return $this->numberRegistrationLunch;
	}

	public function setNumberRegistrationLunch($numberRegistrationLunch){
        $DB = static::DBConnect();
        $stmt = $DB->prepare('UPDATE parameters SET numberRegistrationLunch = ?');
        $stmt->execute(array($numberRegistrationLunch));
		$this->numberRegistrationLunch = $numberRegistrationLunch;
	}

	public function getNumberRegistrationAfternoon(){
		return $this->numberRegistrationAfternoon;
	}

	public function setNumberRegistrationAfternoon($numberRegistrationAfternoon){
        $DB = static::DBConnect();
        $stmt = $DB->prepare('UPDATE parameters SET numberRegistrationAfternoon = ?');
        $stmt->execute(array($numberRegistrationAfternoon));
		$this->numberRegistrationAfternoon = $numberRegistrationAfternoon;
	}
}




?>