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
        
        if(isset($_POST['submit'])){
            $this->id = filter_input(INPUT_POST, 'castPid');
            $this->pname = filter_input(INPUT_POST, 'pname');
            $this->concode = filter_input(INPUT_POST,'concode');
            $this->pscode = filter_input(INPUT_POST,'pscode');
        }else{
            echo "some error";
        }
    }
    public function processCast(){
        $query = "Select party_name from cast_result WHERE party_name = '$this->pname'";
        $result = mysqli_query($this->connection, $query) or die("Error processing query: ".  mysqli_error($this->connection));
        if(mysqli_affected_rows($this->connection) < 1){
            //echo "<h3> Currently there are no current results for $this->pname party </h3>";
            $this->insertFirstResult();
        }else{
            $this->updateCastResult();
            echo "surprisingly there is a record";
        }
    }
    public function insertFirstResult(){
        $query = "INSERT INTO cast_result(id,party_name,const_code,ps_code,vote_count) VALUES(1,'$this->pname','$this->concode','$this->pscode',"
                . "1)";
        $result = mysqli_query($this->connection, $query) or die("Error: ". mysqli_error($this->connection));
        if(mysqli_affected_rows($this->connection)){
            echo "Vote <B>Registerd</B>";
        }else{
            echo "Vote <B>Not</B> Registred";
        }
    }
    public function updateCastResult(){
        $query = "UPDATE cast_result "
                . "SET vote_count = vote_count + 1"
                . " WHERE party_name = '$this->pname'";
        $result = mysqli_query($this->connection, $query) or die ("Error in Query: ". mysqli_error($this->connection));
        if(mysqli_affected_rows($this->connection) >= 1){
            echo "Vote Incremented";
        }
    }
    public function printHello(){
        echo "<h1>party id ---> $this->id</h1>";
        echo "<h1>party name --> $this->pname</h1>";
        echo "<h1>con code --> $this->concode</h1>";
        echo "<h1>ps code --> $this->pscode</h1>";
        $this->processCast();
    }
}
$t = new castController();
$t->printHellO();