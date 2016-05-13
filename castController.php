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
    protected $id;
    protected $pname;
    protected $concode;
    protected $pscode;
    public function __construct() {
        $p = new Connect();
        $this->connection = $p->connect();
    }
    public function printHello(){
        $this->id = filter_input(INPUT_POST, 'castPid');
        $this->pname = filter_input(INPUT_POST, 'pname');
        $this->concode = filter_input(INPUT_POST,'concode');
        $this->pscode = filter_input(INPUT_POST,'pscode');
        echo "<h1>party id ---> $this->id</h1>";
        echo "<h1>party name --> $this->pname</h1>";
        echo "<h1>con code --> $this->concode</h1>";
        echo "<h1>ps code --> $this->pscode</h1>";
    }
}
$t = new castController();
$t->printHellO();