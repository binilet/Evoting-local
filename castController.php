<?php
include 'Connect.php';
ini_set("display_errors","1");
error_reporting(E_ALL);
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of castController
 *
 * @author IT
 */
class castController {
    //put your code here
    protected $connection;
    public function __construct() {
        $p = new Connect();
        $this->connection = $p->connect();
    }
    public function printHello(){
        echo "<h1>mfgr</h1>";
    }
}
$t = new castController();
$t->printHellO();