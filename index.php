<!DOCTYPE html> 
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Program</title>
		<link rel="icon" href="img/icon.png">
		<link rel="stylesheet" href="css/style.css">
	</head> 
	<body>

	<?php
	include 'db_connection.php';
	$conn = OpenCon();
	//echo "Connected Successfully";
	CloseCon($conn);
	?>

	<?php
    $link = mysqli_connect("localhost", "root", "", "saladefilm");
    $sql = "SELECT * FROM FILM";

    ?>

	<!--Div bg ?? -->
		<div class="banner"> 
			<div class="icon">
				<img src="img/icon.png" alt="CinemaApp">
			</div>
			<h1>Filme</h1>
		</div>
	<br>

		<!-- Meniu pentru zile -->

		<div class="day">

			
			<?php

			if($result = mysqli_query($link, $sql)){
                            if(mysqli_num_rows($result) > 0){
                            	$row_cnt = $result->num_rows;
                                for ($i = 0; $i < $row_cnt; $i++){
                                    $row = mysqli_fetch_array($result);
									echo '<div class="mv">';
										echo '<img src="'.$row['imagine'].'">';
										echo '<div class="mvc">';
											echo '<h1>'.$row['nume'].'</h1>';
											echo '<h2>'.$row['tip'].'&nbsp;&nbsp;&nbsp;'.$row['nota'].'&nbsp;&nbsp;&nbsp;'.$row['rating'].'&nbsp;&nbsp;&nbsp;'.$row['durata'].'</h2>';
											echo '<p>'.$row['genuri'].'</p>';
											echo '<div class="time">';  
											  	echo'<a href="booking.php?movId='.$row['id'].'" class="myButton">Detalii</a>';
											echo '</div>';
										echo'</div>';
									echo'</div>';
								}
                                mysqli_free_result($result);
                            } else{
                                echo '<h4 class="no-annot">No Booking to our movies right now</h4>';
                            }
                        } else{
                            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                        }
                        
                        // Close connection
                        mysqli_close($link);
                        ?>

            
		</div>

	
		

	<!--Div bg ?? --> 		
	</body> 
</html>