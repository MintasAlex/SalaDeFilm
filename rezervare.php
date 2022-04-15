<!DOCTYPE html> 
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Booking</title>
		<link rel="icon" href="img/icon.png">
		<link rel="stylesheet" href="css/style.css">
	</head> 
	<body>
	<!--Div bg ?? -->
		<?php
			//Using GET
			$movId = $_GET['movId'];


			//echo $movId;
		?>

		<?php 
			$afisareId = (int)($_POST['afisare']);
			//echo $afisareId; 
		?>

		<?php
			$locuri = array("A1","A2","A3","A4","A5","A6","A7","A8","A9","A10","B1","B2","B3","B4","B5","B6","B7","B8","B9","B10","C1","C2","C3","C4","C5","C6","C7","C8","C9","C10","D1","D2","D3","D4","D5","D6","D7","D8","D9","D10","E1","E2","E3","E4","E5","E6","E7","E8","E9","E10","F1","F2","F3","F4","F5","F6","F7","F8","F9","F10","G1","G2","G3","G4","G5","G6","G7","G8","G9","G10","H1","H2","H3","H4","H5","H6","H7","H8","H9","H10","I1","I2","I3","I4","I5","I6","I7","I8","I9","I10","J1","J2","J3","J4","J5","J6","J7","J8","J9","J10");
			
		?>

		<?php
		     $link = mysqli_connect("eu-cdbr-west-02.cleardb.net", "bf17231366db58", "244fc2b2", "heroku_ac4c3e4e4267083");
		    $sql = "SELECT * FROM FILM WHERE (id = $movId)";
	    ?>

	    <?php
			$nameErr = $emailErr = $locErr = "";
			$name = $email = $loc = "";

			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				if (empty($_POST["name"])) {
					$nameErr = "Name is required";
					} else {
						$name = test_input($_POST["name"]);
						// check if name only contains letters and whitespace
						if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
								$nameErr = "Only letters and white space allowed";
								}
							}
											  
				if (empty($_POST["email"])) {
					$emailErr = "Email is required";
					} else {
						$email = test_input($_POST["email"]);
						// check if e-mail address is well-formed
						if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
								$emailErr = "Invalid email format";
								}
							}
											    
				if (empty($_POST["loc"])) {
					$locErr = "Loc is required";
					} 
				
											  
			}	    	
	    ?>

		<div class="backButton">
			<a href="javascript:history.back()"> < Inapoi </a>
		</div>
		<div class="rezerv-fr">



			<?php
			//echo '<div class="rezerv-frr">';
			if($result = mysqli_query($link, $sql)){
                          if(mysqli_num_rows($result) > 0){
                            	$row_cnt = $result->num_rows;
                                // $i = $movId; 
                                    $row = mysqli_fetch_array($result);}}
				echo '<h2>'.$row['nume'].'</h2>';
				
				echo '<br>';
				$k = 0;
				echo '<table>';
				for ($i = 0; $i < 10; $i++){
					echo '<tr>';
					for ($j = 0; $j < 10; $j++){
						$link = mysqli_connect("localhost", "root", "", "saladefilm");
							$sql = "SELECT * FROM REZERVARE WHERE (afisare_id = '".$afisareId."' AND loc='".$locuri[$k]."')";
							if($result = mysqli_query($link, $sql)){
					            if(mysqli_num_rows($result) == 0){
					     			echo '<td style="background-color:#00FF00">'.$locuri[$k].'</td>';
					     		}else {
					     			echo '<td style="background-color:#FF0000">'.$locuri[$k].'</td>';
					     		}
				     		$k++; 
						}
	
		            }  
					echo '</tr>';
				}
				echo '</table>';

				echo'<form action="action.php?afisareId='.$afisareId.'" method="post">';
						echo'<p>Nume: <input type="text" name="name" /></p>';
						echo'<p>Email : <input type="text" name="email" /></p>';
						echo'<label for="loc">Alege un loc: </label>';
						echo'<select name="loc" required>';	
				            echo'<option value="" disabled selected>LOC</option>';
				                for ($i = 0; $i < 99; $i++){
								$link = mysqli_connect("localhost", "root", "", "saladefilm");
										$sql = "SELECT * FROM REZERVARE WHERE (afisare_id = '".$afisareId."' AND loc='".$locuri[$i]."')";
										if($result = mysqli_query($link, $sql)){
								            if(mysqli_num_rows($result) == 0){
								     			echo '<option value="'.$locuri[$i].'">'.$locuri[$i].'</option>';
								     		} 
								     	}
	
		                    	}  
			            echo'</select>';
						echo'<p><input type="submit" value="Confirma"/></p>';
				echo'</form>';
			//echo '</div>';
			?>
		</div>
</body>
</html>
