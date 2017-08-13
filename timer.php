<?php
 session_start();

	$con = mysqli_connect("localhost","root","") or die("Unable to Connect");
	mysqli_select_db($con,"login_db");

            $duration="";
            
            $res=mysqli_query($con,'select * from user');
            
            while($row=mysqli_fetch_array($res)){

            $duration = $row['timer'];
            
            }

            $_SESSION['duration']=$duration;
            $_SESSION['start_time']=date("Y-m-d H:i:s");

            $end_time = date('Y-m-d H:i:s',strtotime("+".$_SESSION['duration'].'minutes', strtotime($_SESSION['start_time'])));

            $_SESSION['end_time']=$end_time;

?>
			 <script type="text/javascript">window.location="question.php"</script>

