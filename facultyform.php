<?php 
session_start();

	include("connection.php");
	include("functions.php");
    $user_data = check_login($con);


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$event_name = $_POST['event_name'];
		$details = $_POST['details'];
        $date = $_POST['event_date'];
        $time = $_POST['event_time'];
        $stud_coord = $_POST['stud_coord'];

		if(!empty($event_name))
		{

			//save to database
			$event_id = random_num(20);
			$query = "insert into eventdetails (event_name,event_id,details,event_date,event_time,stud_coord,event_status) values ('$event_name','$event_id','$details','$event_date','$event_time','$stud_coord','')";

			mysqli_query($con, $query);

			header("Location: staff.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Event Creation</title>
</head>
<body>

	<style type="text/css">
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: lightblue;
		border: none;
	}

	#box{

		background-color: grey;
		margin: auto;
		width: 300px;
		padding: 20px;
	}

	</style>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Event Creation</div>
            Event Name:
			<input id="text" type="text" name="event_name"><br><br>
            Event details:
			<input id="text" type="text" name="details"><br><br>
            Event date:
            <input id="text" type="text" name="event_date"><br><br>
            Event time:
			<input id="text" type="text" name="event_time"><br><br>
            Student coord:
            <input id="text" type="text" name="stud_coord"><br><br>

			<input id="button" type="submit" value="Get Approval"><br><br>

			<a href="login.php">Click to Login</a><br><br>
		</form>
	</div>
</body>
</html>