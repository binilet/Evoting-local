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
    protected $pscode;
    protected $connection;

    public function __construct() {
        $p = new Connect();
        $this->connection = $p->connect();
    }

    public function check_creds() {
        $entered_user_name = filter_input(INPUT_POST, 'user_name');
        $entered_password = filter_input(INPUT_POST, 'password');

        $query = "select * from admins where USER_NAME = '$entered_user_name'";// AND PASSWORD = '$hashed_password'";
        $askDB = mysqli_query($this->connection, $query) or die("Invalid Query: 38 " . mysqli_error($this->connection));
        if (mysqli_affected_rows($this->connection) == 1) {
            $result = mysqli_fetch_assoc($askDB);
            $this->pscode = $result['PS_CODE'];
            $this->user_name = $result['USER_NAME'];
            $this->password = $result['PASSWORD'];
            $this->authenticate($entered_user_name, $entered_password, $this->user_name, $this->password);
        } else {
            header("Location: login.php");
            echo "<script type='text/javascript'>"
            . "document.getElementById('error').innerHTML = 'envalid username or password';</script>";
            //echo "nothing returned";
        }

        if (isset($_POST['login']) && $_SESSION['login'] !== true) {
            header("Location: login.php");
            echo "<script type='text/javascript'>"
            . "document.getElementById('error').innerHTML = 'envalid username or password';</script>";
            
        }
    }

    public function authenticate($username, $password, $dbuname, $dbpaswd) {
        if (isset($_POST['login'])) {
            //session_start();
            if ($username === $dbuname) {
                if(password_verify($password, $dbpaswd)){
                    $_SESSION['login'] = true;
                    $_SESSION['uname'] = $this->user_name;
                    $_SESSION['password'] = $this->password;
                    $_SESSION['pscode'] = $this->pscode;
                    header("Location: castTest.php");
                }
            } else {
                // header("Location: login.php");

                echo "error AUTH";
            }
        }
    }

}

$login = new login_auth();
$login->check_creds();
