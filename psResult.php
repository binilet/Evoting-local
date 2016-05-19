<?php
//include 'Connect.php';

ini_set("display_errors", "1");
error_reporting(E_ALL);
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates 
 * and open the template in the editor.
 */

/**
 * Description of psResult
 *
 * @author BiNI
 */
class psResult {
    //put your code here
    protected $connection;
    
    public function __construct() {
        $p = new Connect();
        $this->connection = $p->connect();
    }
    public function pullPsResult(){
        $pscode = $_SESSION['pscode'];
        $query = "SELECT * FROM cast_result where ps_code = '$pscode' order by vote_count DESC";
        $queryResult = mysqli_query($this->connection, $query) or die("Invalid error:psResult.php".mysqli_error($this->connection));
        while($result = mysqli_fetch_array($queryResult,MYSQL_ASSOC)){
            echo "<tr class='odd gradeX'>";
            echo "<td>".$result['party_name']."</td>";
            echo "<td>".$result['const_code']."</td>";
            echo "<td>".$result['ps_code']."</td>";
            echo "<td>".$result['vote_count']."</td></tr>";
        }
    }
}
