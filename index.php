<!DOCTYPE html> 
<?php
	$mc = new Memcached();
	$mc->setOption(Memcached::OPT_BINARY_PROTOCOL, true);
	$mc->addServers(array_map(function($server) { return explode(':', $server, 2); }, explode(',', $_ENV['MEMCACHEDCLOUD_SERVERS'])));
	$mc->setSaslAuthData($_ENV['MEMCACHEDCLOUD_USERNAME'], $_ENV['MEMCACHEDCLOUD_PASSWORD']);
	session_start();
?>
<html lang="en">
	<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="SalaDeFilm reprezinta un mock-up pentru aplicatiile de cinema. In aceasta pagina sunt prezentate filmele care ruleaza, in prezent, in cinema.">
		<meta name="author" content="Mintas Alex">
		<meta name="keywords" content="SalaDeFilm, Filme, Heroku">
		<meta name="robots" content="all">
		<title>Program Filme - SalaDeFilm</title>
		<link rel="icon" href="img/icon.png">
		<link rel="stylesheet" href="css/style.css">

		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=G-HHS5CK4TF2"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());

			gtag('config', 'G-HHS5CK4TF2');
		</script>

	</head> 
	<body>

	<?php
	include 'db_connection.php';
	$conn = OpenCon();
	//echo "Connected Successfully";
	CloseCon($conn);
	?>

	<?php
    $link = mysqli_connect("eu-cdbr-west-02.cleardb.net", "bf17231366db58", "244fc2b2", "heroku_ac4c3e4e4267083");
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
		<div class="day">
			<?php
			if($result = mysqli_query($link, $sql)){
                            if(mysqli_num_rows($result) > 0){
                            	$row_cnt = $result->num_rows;
                                for ($i = 0; $i < $row_cnt; $i++){
                                    $row = mysqli_fetch_array($result);
									echo '<div class="mv">';
										echo '<img src="'.$row['imagine'].'" alt="Poster '.$row['nume'].'" title="'.$row['nume'].' ">';
										echo '<div class="mvc">';
											echo '<h2>'.$row['nume'].'</h2>';
											echo '<h3>'.$row['tip'].'&nbsp;&nbsp;&nbsp;'.$row['nota'].'&nbsp;&nbsp;&nbsp;'.$row['rating'].'&nbsp;&nbsp;&nbsp;'.$row['durata'].'</h3>';
											echo '<p>'.$row['genuri'].'</p>';
											  	echo'<a href="film.php?movId='.$row['id'].'" class="myButton">Detalii</a>';
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
						session_destroy();
                        ?>
		</div>
	<!--Div bg ?? --> 		
	</body> 
</html>