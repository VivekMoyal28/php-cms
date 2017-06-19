<?php
 if (!defined('pageclassconst')){
    die('You cannot access this file directly!');
 }
class connectionClass extends mysqli{
    private $host="localhost",$dbname="cms",$dbpass="",$dbuser="root";
    public $con;
    
    public function __construct() {
       $this->con=$this->connect($this->host, $this->dbuser, $this->dbpass, $this->dbname);
    }
}
