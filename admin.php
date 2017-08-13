<?php

session_start();
require "dbconfig/config.php";

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
                    <div class = 'navbar-right' style="margin-top:10px; margin-right:30px; color: white; font-size: 30px;">
               
                        Admin Page
               
              
                   </div>
        

            </div>
    </nav>
        
        <! End of Navigation Bar--------------------------------------------------------------------------------------------->
    
        <div class='container' >
            <div class="row">
                <div class="col-md-2"></div>
                <div class='col-md-8'>
                    <div class='panel panel-default' style="background-color: #f8f8f8;">
        <! Start of forms----------------------------------------------------------------->
                        <div style="margin:50px;">
                       <div id='formSubmitError' class="alert alert-danger collapse">
                        			<a id='linkCloseAlert' href="#" class='close' >&times;</a>
                        			<strong>ERROR! </strong> Please fill in all the feilds
						          </div>
                        
                  

                        <form method="post" action="admin.php" id='uploadQuestion'>

                                        <div class="form-group"><center>
                                             <label for='division'>Difficulty Level<br>

                                                
                                                 <label class="radio-inline">
                                                    <input type="radio" name="inlineRadioOptionsLevel" id="inlineRadio1" value="easy" required="required"> Easy 
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="inlineRadioOptionsLevel" id="inlineRadio2" value="intermediate" required="required"> Intermediate 
                                                 </label>
                                                 <label class="radio-inline">
                                                    <input type="radio" name="inlineRadioOptionsLevel" id="inlineRadio3" value="difficult" required="required"> Difficult 
                                                 </label>     
                                                 

                                            </label>
                                            </center>
                                        </div>

                                    <div class="form-group">
                                      <label for="question">Question</label>
                                         <textarea name='question' class="form-control" id="question" rows='5' placeholder="Enter Question here" required></textarea>
                                    </div>

                                        <div class="form-group">
                                                <label for="option1">Option 1</label>
                                            <textarea name='option1' class="form-control" id="option1" rows='1' placeholder="Enter Option 1" required></textarea>
                                        </div>

                                    <div class="form-group">
                                      <label for="option2">Option 2</label>
                                         <textarea name='option2' class="form-control" id="option2" rows='1' placeholder="Enter Option 2"></textarea>
                                    </div>
                            
                                     <div class="form-group">
                                            <label for="option3">Option 3</label>
                                            <textarea name='option3' class="form-control" id="option3" rows='1' placeholder="Enter Option 3"></textarea>
                                        </div>

                                       <div class="form-group">
                                            <label for="option4">Option 4</label>
                                            <textarea name='option4' class="form-control" id="option4" rows='1' placeholder="Enter Option 4"></textarea>
                                        </div> 

                                        <div class="form-group"><center>
                                             <label for='correctOption'>Correct Option<br>

                                                
                                                 <label class="radio-inline">
                                                    <input type="radio" name="inlineRadioOptionsCorrect" id="inlineRadio1" value="A" required="required"> A 
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="inlineRadioOptionsCorrect" id="inlineRadio2" value="B" required="required"> B 
                                                 </label>
                                                 <label class="radio-inline">
                                                    <input type="radio" name="inlineRadioOptionsCorrect" id="inlineRadio3" value="C" required="required"> C 
                                                 </label>     
                                                 <label class="radio-inline">
                                                    <input type="radio" name="inlineRadioOptionsCorrect" id="inlineRadio4" value="D" required="required"> D 
                                                 </label> 

                                            </label>
                                            </center>
                                        </div>

                                            <br>
                                       <button name='submit-btn' type="submit" id='submitBtn' class="btn btn-success btn-block">Submit</button>

                                        
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
                        

                          if(!validateForm("question")){
                          	$('#formSubmitError').show('fade');
                            return false;
                          }
                          if(!validateForm("option1")){
                          	$('#formSubmitError').show('fade');
                            return false;
                          }
                          if(!validateForm("option2")){
                          	$('#formSubmitError').show('fade');
                            return false;
                          }
                          if(!validateForm("option3")){
                          	$('#formSubmitError').show('fade');
                            return false;
                          }
                          if(!validateForm("option4")){
                          	$('#formSubmitError').show('fade');
                            return false;
                          }
                         

                          $("form#uploadQuestion").submit();


            });

            $('#linkCloseAlert').click(function(){
            	$('#formSubmitError').hide('fade');
            });

          }

        );

    </script>
        
<!End of Javascript>
        
    </body>
    
<! End of body ---------------------------------------------------------------------------------------------------------------------->

</html>


<?php

$_SESSION['easyNo']=0;
$difficultNo=0;
$interNo=0;

 if(isset($_POST['submit-btn'])){
               
                $question = $_POST['question'];
                $option1 = $_POST['option1'];
                $option2 = $_POST['option2'];
                $option3 = $_POST['option3'];
                $option4 = $_POST['option4'];
                $level = $_POST['inlineRadioOptionsLevel'];
                $correct = $_POST['inlineRadioOptionsCorrect'];
                // End of Initialisation--------------------------------------------------------------------

                if($level=='easy'){

               
                        $query = "insert into $level values ($easyNo,'$question','$option1','$option2','$option3','$option4','$correct')";
                        $query_run = mysqli_query($con,$query);

                        if($query_run){

                          $easyNo = $_SESSION['easyNo'];
                          $easyNo++;
                          
                          echo '<script type="text/javascript">
                          swal("Success", "The question has been stored in the database", "success")
                          $("#formSubmitSuccess").show("fade");
                            </script>';
                           $_SESSION['easyNo'] = $easyNo;
                
                        }
                        else{


                          echo '<script type="text/javascript">  swal("Error", "Please contact admin", "error")
                          $("#formSubmitError").show("fade");</script>';
                        }
              }

                else if($level=='intermediate'){

               
                        $query = "insert into $level values ($interNo,'$question','$option1','$option2','$option3','$option4','$correct')";
                        $query_run = mysqli_query($con,$query);

                        if($query_run){

                          echo '<script type="text/javascript">
                          swal("Success", "The question has been stored in the database", "success")
                          $("#formSubmitSuccess").show("fade");
                            </script>';
                            $interNo++;
                
                        }
                        else{


                          echo '<script type="text/javascript">  swal("Error", "Please contact admin", "error")
                          $("#formSubmitError").show("fade");</script>';
                        }
              }              

               else if($level=='difficult'){

               
                        $query = "insert into $level values ($difficultNo,'$question','$option1','$option2','$option3','$option4','$correct')";
                        $query_run = mysqli_query($con,$query);

                        if($query_run){

                          echo '<script type="text/javascript">
                          swal("Success", "The question has been stored in the database", "success")
                          $("#formSubmitSuccess").show("fade");
                            </script>';
                          $difficultNo++;
                        }
                        else{


                          echo '<script type="text/javascript">  swal("Error", "Please contact admin", "error")
                          $("#formSubmitError").show("fade");</script>';
                        }
              }              

              }




?>