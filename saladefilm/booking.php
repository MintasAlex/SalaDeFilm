<!DOCTYPE html> 
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Film</title>
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
		<!--
		<?php
			$locuri = array("A1","A2","A3","A4","A5","A6","A7","A8","A9","A10","B1","B2","B3","B4","B5","B6","B7","B8","B9","B10","C1","C2","C3","C4","C5","C6","C7","C8","C9","C10","D1","D2","D3","D4","D5","D6","D7","D8","D9","D10","E1","E2","E3","E4","E5","E6","E7","E8","E9","E10","F1","F2","F3","F4","F5","F6","F7","F8","F9","F10","G1","G2","G3","G4","G5","G6","G7","G8","G9","G10","H1","H2","H3","H4","H5","H6","H7","H8","H9","H10","I1","I2","I3","I4","I5","I6","I7","I8","I9","I10","J1","J2","J3","J4","J5","J6","J7","J8","J9","J10");
			
		?>
		-->
		<?php
		    $link = mysqli_connect("localhost", "root", "", "saladefilm");
		    $sql = "SELECT * FROM FILM WHERE (id = $movId)";
	    ?>
	    <!--
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
		-->

		<div class="backButton">
			<a href="index.php"> < Inapoi </a>
		</div>
		<div class="book">

			<?php
			
			if($result = mysqli_query($link, $sql)){
                          if(mysqli_num_rows($result) > 0){
                            	$row_cnt = $result->num_rows;
                                // $i = $movId; 
                                    $row = mysqli_fetch_array($result);
										echo '<img src="'.$row['imagine'].'">';
										echo '<div class="mvc">';
											echo '<h1>'.$row['nume'].'</h1>';
											
											echo '<h2>'.$row['tip'].'&nbsp;&nbsp;&nbsp;'.$row['nota'].'&nbsp;&nbsp;&nbsp;'.$row['rating'].'&nbsp;&nbsp;&nbsp;'.$row['durata'].'</h2>';
											echo '<p class="thick">Genuri: '.$row['genuri'].'</p>';
											echo '<p>Descriere:<br>'.$row['descriere'].'</p>';
											
											
											$sql1 = "SELECT * FROM Afisare WHERE (film_id = $movId) ORDER BY DATA";
											if($result1 = mysqli_query($link, $sql1)){
					                          if(mysqli_num_rows($result1) > 0){
					                            	$row_cnt1 = $result1->num_rows;

					                            
					                        echo'<form action="rezervare.php?movId='.$movId.'" method="post">';
					                        echo'<label for="afisare">Alege o afisare:  </label>';
											echo'<select name="afisare" required>';
							                        echo'<option value="" disabled selected>Afisare</option>';
							                        for ($i = 0; $i < $row_cnt1; $i++){
							                        	$row1 = mysqli_fetch_array($result1);
							                        echo $row1['afisare.id'];
							                        echo '<option value="'.$row1['id'].'">'.$row1['data'].' '.$row1['ora'].'</option>';
							                    }

							                    echo'<p><input type="submit" value="Confirma"/></p>';
												echo'</form>';}}
												mysqli_free_result($result1);


											/*
											echo '<div class="rezerv">';
											
												
												echo'<form action="action.php" method="post">';
												echo'<p>Your name: <input type="text" name="name" /></p>';
												echo'<p>Your age: <input type="text" name="age" /></p>';
												echo'<select name="loc" required>';
							                        echo'<option value="" disabled selected>LOC</option>';
							                        for ($i = 0; $i < 99; $i++){
							                        echo '<option value="'.$locuri[$i].'">'.$locuri[$i].'</option>';}  
							                    echo'</select>';
												 echo'<p><input type="submit" /></p>';
												echo'</form>';

												
											  	

											echo '</div>';
											*/
											//echo'<a href="rezervare.php?movId='.$row['id'].'" class="myButton">Rezerva un bilet</a>';
										echo'</div>';
									
								
                                mysqli_free_result($result);
                            
                            }
                        }
                        
                        
                        // Close connection
                        mysqli_close($link);
                        ?>

                        
		</div>
	<br>


	</body> 
</html>