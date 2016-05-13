<?php
    include 'castPopulator.php';

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
        <p class="label label-primary">PollStation Code<span class="label label-danger" id="psCode">::</span></p>
      </div>
      <div class="col-md-3">
          <p class="label label-primary">Constituency Code<span class="label label-danger" id="conCode">::</span></p>
      </div>
     
      <div class="col-md-3">
          <form action="logout.php" method="post">
              <button name="logout" class="label label-primary">Logout</button>
          </form>
      </div>
	
      <div class="col-md-3">
        <button class="label label-primary">Result</button>
      </div>

   </div>

    <div class="row top-buffer text-center">
        <?php
            $populate = new castPopulator();
            $populate->populate_ui(); 
        ?>
    
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
                         <form action="castController.php" method="post">
                         
                         <input type="hidden" id="castPid" name="castPid" value="" />
                         <input type="hidden" id="pname" name="pname" value="" />
                         <input type="hidden" id="concode" name="concode" value=""/>
                         <input type="hidden" id="pscode" name="pscode" value=""/>
                         <button class="btn btn-info btn-lg" name="submit">Yes</button>
                         <button class="btn btn-danger btn-lg" data-dismiss="modal">No</button>
                         </form>
                      
                  </div>
              </div>
          </div>
      </div>
        
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/evoting-local.js"></script>

  </body>
</html>