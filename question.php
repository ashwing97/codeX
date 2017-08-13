<?php

           session_start();
           require "dbconfig/config.php";

           if(!isset($_SESSION['username'])) { //if not yet logged in
              header("Location: index.php");// send to login page
          exit;
            }


            $num=0;
            $query1='select * from easy where easy.queNo="$num"';
            $query1_run = mysqli_query($con,$query1);
            
            $user_variables = mysqli_fetch_array($query1_run,MYSQL_ASSOC);

           

?>

<html>
    
<! Start of head -------------------------------------------------------------------------------------------------------------->
    
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width" initial-scale=1.0>
        <title>Codeophile</title>
        <link href="css/bootstrap.min.css" rel='stylesheet'>
        <link href='css/custom.css' rel='stylesheet'>

       

        <style>
            @font-face {
             font-family: Montserrat;
             src: url('fonts/Montserrat-Regular.ttf');
            }
            body
            {
                font-family: 'Montserrat', sans-serif;
            }     

            .timer{
                  
                  font-size: 40px;
                  color:#8d8d8d;
                  }  
            .panel{
                  padding: 5px;
            }                 
        </style>
    </head>
    
<! End of head ---------------------------------------------------------------------------------------------------------------->
    
<! Start of body -------------------------------------------------------------------------------------------------------------->
    
    <body>
        
        
    <! Start of Navigation Bar---------------------------------------------------------------------------------------->
            

            <nav class="navbar navbar-inverse navbar-static-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Codeophile</a>
    </div>
 
    <ul class="nav navbar-nav navbar-right">
    
      
    
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo '<b>'.$_SESSION['username'].'</b>';?></a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>

        <! End of Navigation Bar--------------------------------------------------------------------------------------------->

<div class ='row'>
<form method='post' action='question.php' id='questionForm'>
<div class='col-md-8' >
<div class='panel panel-default' style='padding: 20px; margin:10px; background-color: #353535;'>

                                    

<div  style='padding-left: 10px;padding-right:10px;'><pre><span style="font-family: 'Montserrat';"><b><?php  echo $user_variables['question'];?></b></span></pre></div> 
<div style='padding-left: 10px;padding-right:10px;'><pre><span style="font-family: 'Montserrat';"><input type='radio' name='option' id='option' value='A'><?php  echo $user_variables['option1'];?></span></pre></div>
<div style='padding-left: 10px;padding-right:10px;'><pre><span style="font-family: 'Montserrat';"><input type='radio' name='option' id='option' value='A'><?php  echo $user_variables['option2'];?></span></pre></div>
<div style='padding-left: 10px;padding-right:10px;'><pre><span style="font-family: 'Montserrat';"><input type='radio' name='option' id='option' value='A'><?php  echo $user_variables['option3'];?></span></pre></div>
<div style='padding-left: 10px;padding-right:10px;'><pre><span style="font-family: 'Montserrat';"><input type='radio' name='option' id='option' value='A'><?php  echo $user_variables['option4'];?></span></pre></div>
<div class='btn-group btn-group-justified'><div class='col-md-4'></div><div class='col-md-2'>
<button class='btn btn-primary btn-block btn-inline' name='next-btn'>Next</button></div>
<div class='col-md-2'><button class='btn btn-danger btn-block btn-inline' name='end-btn'>End Test</button></div>
</div>
</div>
</div>
</form>


<div class='col-md-1'></div>
<div class='col-md-2'><center>
<div class='panel panel-default' style="background-color: #1e1e1e;">
<div id='response' class='timer '></div>
</div></center>
</div>
</div>
        
        
<! Start of Javascript>
        
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type='text/javascript'>

        var count=0;

        setInterval(function(){
            count++;
            if(count >= 1000){
                window.location="logout.php";
            }
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open('GET','response.php',false);
            xmlhttp.send(null);
            document.getElementById('response').innerHTML=xmlhttp.responseText;

        },1000);

       

    </script>

        
<!End of Javascript>
        
    </body>
    
<! End of body ---------------------------------------------------------------------------------------------------------------------->

</html>