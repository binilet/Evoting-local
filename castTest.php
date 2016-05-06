<?php
    include 'Connect.php';

    ini_set("display_errors", "1");
    error_reporting(E_ALL);
    session_start();
    if(isset($_SESSION['login']) !== true){
        header("Location: login.php");
    }  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Evoting Cast</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
      .top-buffer{
        margin-top: 50px;
      }
      body{
        background-color: #000;
        /*opacity: 0.5;*/
      }
      p{
        color: white;
      }
      img:hover{
          opacity: 0.5;
      }

    </style>
  </head>
  <body>
   <div class="row text-center">
      <div class="col-md-3">
        <p class="label label-primary">Constituency Code</p>
      </div>
      <div class="col-md-3"><p class="label label-primary">Constituency Code</p></div>
     
      <div class="col-md-3">
        <button class="label label-primary">Logout</button>
      </div>
	
      <div class="col-md-3">
        <button class="label label-primary">Result</button>
      </div>

   </div>

    <div class="row top-buffer text-center">
        <?php
            $p = new Connect();
            $connection = $p->connect();
            $sql = "SELECT * FROM evoting_party";
            $result = mysqli_query($connection, $sql) or die("envlalid query " . mysqli_error($connection));
            $rowsReturned = mysqli_affected_rows($connection);
            //echo "<h1 style='color:red;'>" . $rowsReturned . " rows returned</h1>";
            while ($party = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
                $pname = $party['PARTY_NAME'];
                $pcode = $party['PARTY_CODE'];
                $lname = $party['LOGO_NAME'];
                $lpath = $party['LOGO_PATH'];
                echo "<div class='col-md-4' data-toggle='modal' data-target='#confirm'>";
                echo "<img class='img-rounded' src='../Evoting-admin/upload/$lpath' width='95%' height='100%'>";
                echo "<p class='label label-danger'>";
                echo "Party Name: <span class='label label-info'>$pname</span><br>";
                echo "Candidate Name: <span class='label label-info'>$pcode</span><br>";
                echo "Logo Name: <span class='label label-info'>$lname</span><br>";
                echo "</p>";
                echo "</div>";
                
            }
        ?>
     <hr>
    </div>
      <div id="confirm" class="modal fade" role="dialog">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h3>Maregagecha</h3>
                  </div>
                  <div class="modal-body">
                      <h1>Are You Sure?</h1>
                  </div>
                  <div class="modal-footer">
                      <button class="btn btn-info btn-lg">Yes</button>
                      <button class="btn btn-danger btn-lg" data-dismiss="modal">No</button>
                      
                  </div>
              </div>
          </div>
      </div>
      
    
 
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>