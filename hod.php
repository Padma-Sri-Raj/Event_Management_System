<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);
    
?>
<?php 

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$event_name = $_POST['event_name'];
		$details = $_POST['details'];
        $date = $_POST['event_date'];
        $time = $_POST['event_time'];
        $stud_coord = $_POST['stud_coord'];

		if(!empty($event_name) && !empty($details) && !empty($event_date) && !empty($event_time) && !empty($stud_coord))
		{

			//save to database
			$event_id = random_num(20);
			$query = "insert into eventdetails (event_name,event_id,details,event_date,event_time,stud_coord) values ('$event_name','$event_id','$details','$event_date','$event_time','$stud_coord')";

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
<html lang="en">

<head>
	<style>

		/* Styling the body */
		body {
			margin: 0;
			padding: 0;
		}
		
		/* Styling section, giving background
			image and dimensions */
		section {
			width: 100%;
			height: 100vh;
			background:
url('Sathyabama_Institute_of_Science_and_Technology_logo.png');
background-repeat: no-repeat;
		}
		
		/* Styling the left floating section */
		section .leftBox {
			width: 50%;
			height: 100%;
			float: left;
			padding: 50px;
			box-sizing: border-box;
		}
		
		/* Styling the background of
			left floating section */
		section .leftBox .content {
			color: #fff;
			background: rgba(0, 0, 0, 0.5);
			padding: 40px;
			transition: .5s;
		}
		
		/* Styling the hover effect
			of left floating section */
		section .leftBox .content:hover {
			background: #41033b;
		}
		
		/* Styling the header of left
			floating section */
		section .leftBox .content h1 {
			margin: 0;
			padding: 0;
			font-size: 50px;
			text-transform: uppercase;
		}
		
		/* Styling the paragraph of
			left floating section */
		section .leftBox .content p {
			margin: 10px 0 0;
			padding: 0;
		}
		
		/* Styling the three events section */
		section .events {
			position: relative;
			width: 50%;
			height: 100%;
			background: rgba(0, 0, 0, 0.5);
			float: right;
			box-sizing: border-box;
		}
		
		/* Styling the links of
		the events section */
		section .events ul {
			position: absolute;
			top: 50%;
			transform: translateY(-50%);
			margin: 0;
			padding: 40px;
			box-sizing: border-box;
		}
		
		/* Styling the lists of the event section */
		section .events ul li {
			list-style: none;
			background: #fff;
			box-sizing: border-box;
			height: 200px;
			margin: 15px 0;
		}
		
		/* Styling the time class of events section */
		section .events ul li .time {
			position: relative;
			padding: 20px;
			background: #262626;
			box-sizing: border-box;
			width: 30%;
			height: 100%;
			float: left;
			text-align: center;
			transition: .5s;
		}
		
		/* Styling the hover effect
			of events section */
		section .events ul li:hover .time {
			background: #41033b;
		}
		
		/* Styling the header of time
			class of events section */
		section .events ul li .time h2 {
			position: absolute;
			margin: 0;
			padding: 0;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			color: #fff;
			font-size: 60px;
			line-height: 30px;
		}
		
		/* Styling the texts of time
		class of events section */
		section .events ul li .time h2 span {
			font-size: 30px;
		}
		
		/* Styling the details
		class of events section */
		section .events ul li .details {
			padding: 20px;
			background: #fff;
			box-sizing: border-box;
			width: 70%;
			height: 100%;
			float: left;
		}
		
		/* Styling the header of the
		details class of events section */
		section .events ul li .details h3 {
			position: relative;
			margin: 0;
			padding: 0;
			font-size: 22px;
		}
		
		/* Styling the lists of details
		class of events section */
		section .events ul li .details p {
			position: relative;
			margin: 10px 0 0;
			padding: 0;
			font-size: 16px;
		}
		
		/* Styling the links of details
		class of events section */
		section .events ul li .details a {
			display: inline-block;
			text-decoration: none;
			padding: 10px 15px;
			border: 1.5px solid #262626;
			margin-top: 8px;
			font-size: 18px;
			transition: .5s;
		}
		
		/* Styling the details class's hover effect */
		section .events ul li .details a:hover {
			background: #41033b;
			color: #fff;
			border-color: #41033b;
		}
	</style>
</head>

<body>
<a href="logout.php">Log out</a>
	<section>
		<div class="leftBox">
			<div class="content">
				<h1>
					Events and Shows
				</h1>
				
<p>
					With the idea of imparting programming
					knowledge, Mr. Sandeep Jain, an IIT
					Roorkee alumnus started a dream,
					GeeksforGeeks. Whether programming
					excites you or you feel stifled,
					wondering how to prepare for
					interview questions or
					how to ace data structures and
					algorithms, GeeksforGeeks is a
					one-stop solution. With every
					tick of time, we are adding arrows
					in our quiver. From articles on
					various computer science subjects
					to programming problems for practice,
					from basic to premium courses, from
					technologies to entrance examinations,
					we have been building ample content
					with superior quality. In a short
					span, we have built a community of
					1 Million+ Geeks around the world, 20,000+
					Contributors and 500+ Campus Ambassadors
					in various colleges across the nation.
					Our success stories include a lot of
					students who benefitted in their
					placements and landed jobs at tech
					giants. Our vision is to build a gigantic
					network of geeks and we are only a
					fraction of it yet.
				</p>

			</div>
		</div>

		<div class="events">
			<ul>
				<li>
					<div class="time">
						<h3 style="color:white">
                        <?php 
                        $sql = "SELECT id, event_name, details, event_date, event_time, stud_coord FROM eventdetails";
                        $result = $con->query($sql);
                        
                        if ($result->num_rows > 0) {
                          // output data of each row
                          while($row = $result->fetch_assoc()) {
                            echo $row["event_date"]."\n". $row["event_time"];
                          }
                        } else {
                          echo "0 results";
                        }?>
						</h3>
					</div>
					<div class="details">
						<h3>
                        <?php 
                        $sql = "SELECT id, event_name, details, event_date, event_time, stud_coord FROM eventdetails";
                        $result = $con->query($sql);
                        
                        if ($result->num_rows > 0) {
                          // output data of each row
                          while($row = $result->fetch_assoc()) {
                            echo $row["event_name"];
                          }
                        } else {
                          echo "0 results";
                        }
                        
                        
                        ?>
						</h3>
						
<p>
<?php 
                        $sql = "SELECT id, event_name, details, event_date, event_time, stud_coord FROM eventdetails";
                        $result = $con->query($sql);
                        
                        if ($result->num_rows > 0) {
                          // output data of each row
                          while($row = $result->fetch_assoc()) {
                            echo $row["details"];
                          }
                        } else {
                          echo "0 results";
                        }?>
						</p>


						<form method='post'> <input id="button" type="submit" value="Approve"> <input id="button" type="submit" value="Deny"></form>
					</div>
					<div style="clear: both;"></div>
				</li>

				
			</ul>
		</div>
	</section>
</body>

</html>
