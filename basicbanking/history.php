<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/home.css">
   <link rel="stylesheet" type="text/css" href="css/userstable.css">
  <title>users</title>
  </head>
<header class="header">
    <h1 class="logo"><img src="images/bankicon.png" alt="" width="30" height="24" class="d-inline-block align-top">
            <span class="tie">ABC BANKING</span></h1>
      <ul class="main-nav">
          <li><a href="index.php">Home</a></li>
          <li><a href="transfer.php">Transfer</a></li>
          <li><a href="#">History</a></li>
      </ul>
</header><br><br><center>
<body>
<div class="res-tab">
    <table>
    <tbody>
    <tr><th>Sender name</th><th>Recipient name</th><th>Amount credited</th></tr>
	<?php
	$conn = mysqli_connect("localhost", "root", "", "banking");
	if($conn-> connect_error){
		die("connection failed:". $conn-> connect_error);
	}

	$sql = "SELECT * FROM transferhistory";
	$result = $conn-> query($sql);

	if($result-> num_rows > 0){

		while ( $row = $result -> fetch_assoc()) {
			echo "<tr><td>". $row["from_user"] ."</td><td>".  $row["to_user"] ."</td><td>" .  $row["credit"] ."</td></tr>";
		}
		echo "</table>";

	}
	else {
		echo "no result";
	}
    $conn-> close();
	?>
</table>
</body>
</html>