<?php
include 'Connect.php';

ini_set("display_errors", "1");
error_reporting(E_ALL);
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of castPopulator
 *
 * @author IT
 */
class castPopulator {
    //put your code here
    protected $connection;
    
    public function __construct() {
        $p = new Connect();
        $this->connection = $p->connect();
    }
    
    public function populate_ui(){
            $pscode = $_SESSION['pscode'];
            $sql = "select distinct evoting_party.id,evoting_party.logo_path,evoting_party.logo_name,evoting_party.party_name,const_ps.const_code,vote_ps.ps_code
                    from evoting_party ,const_ps, admins, vote_ps
                    where admins.ps_code = '$pscode' AND vote_ps.ps_code = '$pscode' AND const_ps.ps_code = '$pscode' 
                    AND evoting_party.party_name IN (select pname from vote_ps where ps_code = '$pscode');";
            
            $result = mysqli_query($this->connection, $sql) or die("envlalid query " . mysqli_error($this->connection));
            $this->rowsReturned = mysqli_affected_rows($this->connection);
            while ($party = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
                $pid = $party['id'];
                $lpath = $party['logo_path'];
                $lname = $party['logo_name'];
                $pname = $party['party_name'];
                $psCode = $party['ps_code'];
                $conCode = $party['const_code'];
                              
                echo "<div class='open-confirmDialog col-md-4' data-toggle='modal' data-id='$pid' data-pname='$pname' data-concode='$conCode'"
                        . " data-ps='$psCode' data-target='#confirm'>";
                        
                //echo "<input type='hidden' value='$pid'/>";
                echo "<img class='img-rounded' src='../Evoting-admin/upload/$lpath' width='95%' height='95%'>";
                echo "<p class='label label-danger'>";
                echo "Party Name: <span class='label label-info'>$pname</span><br>";
                echo "ConstCode: <span class='label label-info'>$conCode</span><br>";
                echo "Logo Name: <span class='label label-info'>$lname</span><br>";
                echo "</p>";
                echo "</div>";
                                
                echo "<script type='text/javascript'>"
            . "document.getElementById('conCode').innerHTML = ': $conCode';"
                        . "document.getElementById('psCode').innerHTML = ': $psCode';</script>";
                
                
            }
    }
}
