<?php
    include 'Connect.php';

    ini_set("display_errors", "1");
    error_reporting(E_ALL);
    session_start();
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login_auth
 *
 * @author BiNI
 */
class login_auth {
    //put your code here
    protected $user_name;
    protected $password;
    protected $connection;
    
    public function __construct() {
        $p = new Connect();
        $this->connection = $p->connect();
    }

    public function check_creds(){
        //$this->user_name = 'admin';
        //$this->password = '1234';
        
        $entered_user_name = filter_input(INPUT_POST,'user_name');
        $entered_password = filter_input(INPUT_POST,'password');
        
        
         $query = "select * from admins where USER_NAME = '$entered_user_name' AND PASSWORD = '$entered_password'";
         $askDB = mysqli_query($this->connection, $query) or die("Invalid Query: 38 " . mysqli_error($this->connection));
         if(mysqli_affected_rows($this->connection) == 1){
             $result = mysqli_fetch_row($askDB);
             $this->user_name = $result[2];
             $this->password = $result[3];
             $this->authenticate($entered_user_name,$entered_password);
         }else{
             /*header("Location: login.php");
             echo "<script type='text/javascript'>"
                    . "document.getElementById('error').innerHTML = 'envalid username or password';</script>";  */
             echo "nothing returned";
         }
        
        if(isset($_POST['login']) && $_SESSION['login'] !== true){
                    /*header("Location: login.php");
                    echo "<script type='text/javascript'>"
                    . "document.getElementById('error').innerHTML = 'envalid username or password';</script>";    */
             echo "error";
        }
    }
    public function authenticate($username,$password){
        if(isset($_POST['login'])){
            //session_start();
            if($username === $this->user_name && $password === $this->password){
                $_SESSION['login'] = true;
                $_SESSION['uname'] = $this->user_name;
                $_SESSION['password'] = $this->password;
                header("Location: castTest.php");
            }else{
               // header("Location: login.php"); 
                echo "error";
            }
            
        }
    }
}
$login = new login_auth();
$login->check_creds();
