<!DOCTYPE html> 
<?php
		$link = mysqli_connect("eu-cdbr-west-02.cleardb.net", "bf17231366db58", "244fc2b2", "heroku_ac4c3e4e4267083");
		$sql1 = "SELECT * FROM CLIENT";
		if($result1 = mysqli_query($link, $sql1)){
                            if(mysqli_num_rows($result1) > 0){
                            	$cli_nr = $result1->num_rows;
                            }else $cli_nr = 0;
        }
        $sql2 = "SELECT * FROM REZERVARE";
		if($result2 = mysqli_query($link, $sql2)){
                            if(mysqli_num_rows($result2) > 0){
                            	$rez_nr = $result2->num_rows;
                            }else $rez_nr = 0;
        }

        $afisareId = $_GET['afisareId'];
        $v_nume= htmlspecialchars($_POST['name']);
        $v_mail= htmlspecialchars($_POST['email']);
       	$cli_nr = $cli_nr+1; 
		$rez_nr = $rez_nr+1;
		$loc = $_POST['loc'];
?>

<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="robots" content="noindex, noarchive">
		<title>Booking</title>
		<link rel="icon" href="img/icon.png">
		<link rel="stylesheet" href="css/style.css">
	</head> 
	<body>
		<div class="backButton">
			<a href="index.php"> < Inapoi </a>
		</div>
		<?php
			$conn =mysqli_connect("eu-cdbr-west-02.cleardb.net", "bf17231366db58", "244fc2b2", "heroku_ac4c3e4e4267083");
			// Check connection
			if (!$conn) {
			      die("Connection failed: " . mysqli_connect_error());
			}
			/*
			echo "Connected successfully";
  			$sql= "INSERT INTO CLIENT (id, nume, email) VALUES (2,'asdfasdf','saasfsdf@ceva.com')";
  			if (mysqli_query($conn, $sql)) {
     			echo "New record created successfully";
     			
				}
				*/	


		?>
		<!--Hi <?php echo htmlspecialchars($_POST['name']); ?> cu emailul <?php echo htmlspecialchars($_POST['email'])?>.
		You have choosen seat <?php echo htmlspecialchars($_POST['loc']); ?> -->
		

		
	
		<?php
		//Creare de client
		$link = mysqli_connect("eu-cdbr-west-02.cleardb.net", "bf17231366db58", "244fc2b2", "heroku_ac4c3e4e4267083");
		$sql = "SELECT * FROM CLIENT WHERE email = '".$v_mail."'";
		if($result = mysqli_query($link, $sql)){
            if(mysqli_num_rows($result) > 0){
            	$row = mysqli_fetch_array($result);
     			//echo "Contul exista deja";
     			$cli_id = $row['id'];
     			//echo $cli_id;
     		} else {
     			
     			$sql= "INSERT INTO CLIENT (id, nume, email) VALUES (".$cli_nr.",'".$v_nume."','".$v_mail."')";
				if (mysqli_query($conn, $sql)) {
     				//echo "New record created successfully";
     				$cli_id = $cli_nr;
     			}
     		}
     	}

/*
     	$sql = "SELECT * FROM CLIENT WHERE email = '".$v_mail."'";
     	if($result = mysqli_query($link, $sql)){
     		if(mysqli_num_rows($result) > 0){
     		$row = mysqli_fetch_array($result);
     	$cli_id = $row['id'];
     	echo $cli_id;
     	}}	
     	*/

     	//Creare de rezervare
     	$sql= "INSERT INTO REZERVARE (id, loc, afisare_id, client_id1) VALUES (".$rez_nr.",'".$loc."','".$afisareId."','".$cli_id."')";
				if (mysqli_query($conn, $sql)) {
     				echo "<p>Rezervarea a fost realizată cu succes!</p>";
					echo "<p>Nume:".$v_nume."<br>Email: ".$v_mail."<br>Loc:".$loc."</p>";
     			}	

		?>
	</body>
</html>

