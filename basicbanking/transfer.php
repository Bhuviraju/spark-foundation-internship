<?php
$conn = mysqli_connect("localhost", "root", "", "banking");
if($conn-> connect_error){
	die("connection failed:". $conn-> connect_error);
}
$sql = "SELECT name, email, credit FROM users";
error_reporting(0);
$result = mysqli_query($conn,"SELECT *  FROM users");
$resul1 = mysqli_query($conn,"SELECT *  FROM users");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/home.css">
    <title>transferprocess</title>
  </head>
  <body>
  <header class="header">
    <h1 class="logo"><img src="images/bankicon.png" alt="" width="30" height="24" class="d-inline-block align-top">
            <span class="tie">ABC BANKING</span></h1>
      <ul class="main-nav">
          <li><a href="index.php">Home</a></li>
          <li><a href="history.php">History</a></li>
      </ul>
  </header> 
  <style>
img {
  float:left;
  margin: 0px 0px 15px 40px;
}
div {
  text-align: justify;
  text-justify: inter-word;
  font-size: 20px;
}
</style>
<br><br><br>
<p><img src="images/transbg.jpg" width="700"></p>
     <div class="H-Container">
        <div class="forms-container">
          <div class="signin-signup">
            <form action="" method="GET">
              <h2 class="title">Transfer</h2>
               <div class="input-field">
                <i class="fas fa-user"></i>
                <center><input type="text" name="u1" placeholder="Enter sender name" required>
              </div><br>
              <div class="input-field">
                <i class="fas fa-user"></i>
                <center><input type="text" name="u2" placeholder="Enter recepient name" required />
              </div><br>
              <div class="input-field">
                <i class='fas fa-rupee-sign'></i></i>
                <center><input type="text" name="amt" placeholder="Enter the amount" required />
              </div><br>
              <form action="" class="was-validated">
              <input type="submit" name="submit" value="Transfer" class="btn solid"/><br>
              <a class="social-text" href="viewusers.php"><i class='fas fa-arrow-circle-left'></i>Back</a>
          </form>
    
  </form>
        </div>
      </div>
    </div>
  </form>
  </body>
</html>


	<?php
	
			if($_GET['submit'])
			{
			$u1=$_GET['u1'];
			$u2=$_GET['u2'];
			$amt=$_GET['amt'];


			if($u1!="" && $u2!="" && $amt!="")
			{
				//update transaction changes in database
				$query1= "UPDATE users  SET credit = credit + '$amt' WHERE Name = '$u2' ";
				$data1= mysqli_query($conn, $query1);
				$query2= "UPDATE  users SET credit = credit  - '$amt' WHERE Name = '$u1' ";
				$data2= mysqli_query($conn, $query2);
				    $query1 = "INSERT INTO transferhistory (from_user,to_user,Credit) VALUES('$u1','$u2','$amt')";
                                    $res2 = mysqli_query($conn,$query1);
				
                                          if($res2){
		                           	 $user1 = "SELECT * FROM students WHERE  Name='$u1' ";
                                                 $res=mysqli_query($conn,$user1);
                                                 $row_count=mysqli_num_rows($res);
			                      }
				
            

				     if ($data1 && $data2)
				     {
					$message="Transaction is successful!!!";
                                        echo "<script type='text/javascript'>alert('$message');
                                        </script>";
				}
				else
				{
					$message="Transaction is Failed";
					echo "<script type='text/javascript'>alert('$message');
                                        </script>";
				}

			}

			else
			{
				$message="Please enter valid one!!!";
				echo "<script type='text/javascript'>alert('$message');
                    </script>";
			}
		}
		

	?>
</div>	
</body>
</html>