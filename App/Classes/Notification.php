<?php


/**
 *  @title : Notification.php
 *  @author : Guillaume RISCH
 *  @author : Matthis HOULES
 * 
 *  @brief : Modals Notifications
 */

class Notification {

    protected $category;
    protected $message;


    /**
     *  @name : __construct
     *  
     *  @param : $category : string : error or success
     *  @param : $message
     * 
     *  @return : void
     * 
     *  @brief : modal Notification constructor
     */
    function __construct($category, $message) {

        $this->category = $category;
        $this->message = $message;


    } // function __construct($categoryC, $messageC)



    /**
     * 
     *  @name : display
     *  
     *  @param : void
     *  @return string : html popup
     * 
     *  @brief : return the HTML display of a modal.
     */
    public function display() {    
        if ($this->category == 'error') {
            return '<div class="notification error">
                        <div class="iconContainer">
                            <i class="fas fa-exclamation"></i>
                        </div>
                        <div class="message">
                            <p>
                                '.$this->message.'
                            </p>
                        </div>
                    </div>';

        } else if($this->category == 'success') {
            return '<div class="notification success">
                        <div class="iconContainer">
                            <i class="fas fa-check"></i>
                        </div>
                        <div class="message">
                            <p>
                                '.$this->message.'
                            </p>
                        </div>
                    </div>';
                               

        } 

    } // public function display() 

}