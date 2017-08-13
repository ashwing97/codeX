
 <?php
    session_start();
      require "dbconfig/config.php";


      

              if(isset($_POST['login-btn'])){
                $login_email = $_POST['loginEmailId'];
                $login_pass = $_POST['loginPassword'];

                    $query = "select * from user where email_id='$login_email' and password ='$login_pass' and login =0";
                    $query_run = mysqli_query($con,$query);
                    $user_variables = mysqli_fetch_array($query_run,MYSQL_ASSOC);
                    

                    if(mysqli_num_rows($query_run)>0){

                      $query = "update user set login=1 where email_id='$login_email'";
                      $query_run = mysqli_query($con,$query);

                      $_SESSION['username'] = $user_variables['name'];
                      header('location:timer.php');
                    }

                    else{
                      echo '<script type="text/javascript"> sweetAlert("Oops...", "E-mail and password do not match!", "error");</script>';
                    }

              }



?>









<html>
    
<! Start of head -------------------------------------------------------------------------------------------------------------->
    
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width" initial-scale=1.0>
        <title>Codeophile</title>
        <link href="css/bootstrap.min.css" rel='stylesheet'>
		<link rel="stylesheet" type="text/css" href="dist/sweetalert.css">

		<style>
			@font-face {
    			font-family: Montserrat;
    			src: url('fonts/Montserrat-Regular.ttf');
					   }
		        
            body
            {
                font-family: 'Montserrat', sans-serif;
            }                  
       
			.navbar
			{
				background-color:#191919;
			}
		</style>
    </head>
    
<! End of head ---------------------------------------------------------------------------------------------------------------->







    
<! Start of body -------------------------------------------------------------------------------------------------------------->
    
    <body style="background-image:url(img/bg1.jpg);">
        
        
    <! Start of Navigation Bar---------------------------------------------------------------------------------------->
        
        <nav class='navbar navbar-inverse navbar-static-top'>
      <div class='container-fluid'>
                <div class='navbar-header navbar-left'> <a class='navbar-brand' href='#' style="margin:5px;">Codeophile</a></div>
                    <div class = 'navbar-right' style="margin-top:10px; margin-right:30px;">
               

                <form class="form-inline" action="index.php" method='post'>
                <div class="form-group">
                    
                    <input type="email" class="form-control" name='loginEmailId' id="loginEmailId" placeholder="Email-Id" required>
                </div>
                <div class="form-group">
                    
                    <input type="password" class="form-control" name='loginPassword' id="loginPassword" placeholder="Password" required>
                </div>
                    <button name='login-btn' type="submit" class="btn btn-primary">Login</button>
                </form>
              
                   </div>
        

            </div>
    </nav>
        
        <! End of Navigation Bar--------------------------------------------------------------------------------------------->
    
        <div class='container' >
            <div class="row">
                <div class="col-md-3"></div>
                <div class='col-md-6'>
                    <div class='panel panel-default' style="background-color: #f8f8f8;">
        <! Start of forms----------------------------------------------------------------->
                        <div style="margin:50px;">
                       <div id='formSubmitError' class="alert alert-danger collapse">
                        			<a id='linkCloseAlert' href="#" class='close' >&times;</a>
                        			<strong>ERROR! </strong> Please fill in all the credentials
						</div>
                        
                        <div id='formSubmitSuccess' class="alert alert-success collapse">
                        			<a id='linkCloseAlertSuccess' href="#" class='close' >&times;</a>
                        			<strong>USER REGISTERED! </strong> Please login now.
						</div>

						<div id='formSubmitErrorPassword' class="alert alert-danger collapse">
                        			<a id='linkCloseAlertErrorPassword' href="#" class='close' >&times;</a>
                        			<strong>Password and Confirm Password do not match !</strong> 
                        </div>

                        <div id='formSubmitErrorRandom' class="alert alert-danger collapse">
                        			<a id='linkCloseAlertErrorRandom' href="#" class='close' >&times;</a>
                        			<strong>Some problem has occured !</strong> Please try again
                        </div>

                        <div id='formSubmitErrorUserExists' class="alert alert-danger collapse">
                        			<a id='linkCloseAlertErrorUserExists' href="#" class='close' >&times;</a>
                        			<strong>This user already exists!</strong> Please try again
                        </div>

                        <form method="post" action="index.php" id='signup'>
                                    <div class="form-group">
                                      <label for="Name">Full Name</label>
                                         <input type="text" name='signupName' class="form-control" id="signupNameid" placeholder="Your Full Name" required>
                                    </div>
                                        <div class="form-group">
                                             <label for='division'>Division<br>


                                                 <label class="radio-inline">
                                                    <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="1" required="required"> 1 
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="2" required="required"> 2
                                                 </label>
                                                 <label class="radio-inline">
                                                    <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="3" required="required"> 3
                                                 </label>     
                                                 <label class="radio-inline">
                                                    <input type="radio" name="inlineRadioOptions" id="inlineRadio4" value="4" required="required"> 4
                                                 </label>
                                                 <label class="radio-inline">
                                                    <input type="radio" name="inlineRadioOptions" id="inlineRadio5" value="5" required="required"> 5
                                                 </label>
                                                 

                                            </label>
                                        </div>
                                        <div class="form-group">
                                                <label for="rollNo">Roll Number</label>
                                            <input type="text" name='signupRollNo' class="form-control" id="signupRollNo" placeholder="Enter Your Roll-number" required>
                                        </div>

                                    <div class="form-group">
                                      <label for="email_id">E-Mail ID</label>
                                         <input type="email" name='signupEmailId' class="form-control" id="signupEmailId" placeholder="Enter Your E-mail Id">
                                    </div>
                            
                                     <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" name='signupPassword' class="form-control" id="signupPassword" placeholder="Enter Any Password ">
                                        </div>

                                       <div class="form-group">
                                            <label for="cpassword">Confirm Password</label>
                                            <input type="password" name='signupConfirmPassword' class="form-control" id="signupConfirmPassword" placeholder="Confirm Your Password.">
                                        </div> 
                                            <br>
                                        <button name='submit-btn' type="submit" id='submitBtn' class="btn btn-primary btn-block">Sign Up</button>

                                        
                       </form>
                        </div>
        <!End of Forms------------------------------------------------------------>
                    </div>

                </div>
            </div>
        </div>

<!Start of footer-------------------------------------------------------------------------------------------------------------------------------------------->

	<footer style='background-color: #222; color:#aaa; margin-top:30px; padding:15px;'>
	<div class="bottom-footer">
		Copyright 2017.
	</div>
	</footer>
	
    
<!End of footer---------------------------------------------------------------------------------------------------------------------------------------------->


<! Start of Javascript>
        
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="dist/sweetalert.min.js"></script>

    <script>

    function validateForm(id){

      if($("#"+id).val()==null || $("#"+id).val()==""){
        var div= $("#"+id).closest("div");
        div.addClass("has-error");
        div.addClass("has-feedback");
        div.append('<span id="glyph-error'+id+'" class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>');

        $("#glyph-ok"+id).remove();
        return false;
      }
      else{
        var div= $("#"+id).closest("div");
        div.removeClass("has-error");
        div.addClass("has-success has-feedback")
        div.append('<span id="glyph-ok'+id+'" class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>');
        $("#glyph-error"+id).remove();

        return true;
      }

    }
      
      $(document).ready(

          function(){

            $('#submitBtn').click(function(){
                        

                          if(!validateForm("signupNameid")){
                          	$('#formSubmitError').show('fade');
                            return false;
                          }
                          if(!validateForm("signupNameid")){
                          	$('#formSubmitError').show('fade');
                            return false;
                          }
                          if(!validateForm("signupRollNo")){
                          	$('#formSubmitError').show('fade');
                            return false;
                          }
                          if(!validateForm("signupEmailId")){
                          	$('#formSubmitError').show('fade');
                            return false;
                          }
                          if(!validateForm("signupPassword")){
                          	$('#formSubmitError').show('fade');
                            return false;
                          }
                          if(!validateForm("signupConfirmPassword")){
                          	$('#formSubmitError').show('fade');
                            return false;
                          }



                          $("form#signup").submit();


            });

            $('#linkCloseAlert').click(function(){
            	$('#formSubmitError').hide('fade');
            });

            $('#linkCloseAlertSuccess').click(function(){
            	$('#formSubmitSuccess').hide('fade');
            });

            $('#linkCloseAlertErrorRandom').click(function(){
            	$('#formSubmitErrorRandom').hide('fade');
            });

            $('#linkCloseAlertErrorPassword').click(function(){
            	$('#formSubmitErrorPassword').hide('fade');
            });

            $('#linkCloseAlertErrorUserExists').click(function(){
            	$('#formSubmitErrorUserExists').hide('fade');
            });

          }

        );

    </script>
        
<!End of Javascript>
        
    </body>
    
<! End of body ---------------------------------------------------------------------------------------------------------------------->

</html>

<?php


 if(isset($_POST['submit-btn'])){
                //Initialisation---------------------------------------------------------------------------
               //echo '<script type="text/javascript"> alert("Sign up button clicked")</script>'; 
                $name = $_POST['signupName'];
                $div = $_POST['inlineRadioOptions'];
                $roll_no = $_POST['signupRollNo'];
                $email_id = $_POST['signupEmailId'];
                $password = $_POST['signupPassword'];
                $cpassword = $_POST['signupConfirmPassword'];
                // End of Initialisation--------------------------------------------------------------------

                
                if($password==$cpassword){
                      $query = "select * from user where email_id = '$email_id'";
                      $query_run = mysqli_query($con,$query);

                      if(mysqli_num_rows($query_run)>0){
                        //USER ALREADY EXISTS!!!
                       echo '<script type="text/javascript">  $("#formSubmitErrorUserExists").show("fade");</script>';  
                      }
                      else{
                        $query = "insert into user values ('$name','$div','$roll_no','$email_id','$cpassword',30,0)";
                        $query_run = mysqli_query($con,$query);

                        if($query_run){

                          echo '<script type="text/javascript">
                          swal("Registered!", "Now login with your credentials!", "success")
                          $("#formSubmitSuccess").show("fade");
                          	</script>';
								
                        }
                        else{

                          echo '<script type="text/javascript">  $("#formSubmitErrorRandom").show("fade");</script>';
                        }
                      }
                }

                else{
                  echo '<script type="text/javascript"> $("#formSubmitErrorPassword").show("fade");</script>';
                }
              

              }

    //End of Registration--------------------------------------------------------------------------------------------------------------

                            if(isset($_POST['login-btn'])){
                $login_email = $_POST['loginEmailId'];
                $login_pass = $_POST['loginPassword'];

                    $query = "select * from user where email_id='$login_email' and password ='$login_pass' ";
                    $query_run = mysqli_query($con,$query);

                    if(mysqli_num_rows($query_run)>0){
                      $_SESSION['loginEmailId']=$login_email;
                      echo '<script type="text/javascript"> sweetAlert("Oops...", "Re-Login not allowed", "error");</script>';
                     // header('location:question.php');
                    }

                    else{
                      echo '<script type="text/javascript"> sweetAlert("Oops...", "E-mail and password do not match!", "error");</script>';
                    }

              }

?>