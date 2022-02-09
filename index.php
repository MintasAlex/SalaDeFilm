<!DOCTYPE html> 
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="SalaDeFilm este un proiect studentesc care a are scopul de a testa functionalitati SEO">
		<meta name="author" content="Mintas Alex">
		<meta name="keywords" content="SalaDeFilm, Filme, Heroku">
		<title>Program</title>
		<link rel="icon" href="img/icon.png">
		<link rel="stylesheet" href="css/style.css">
	</head> 
	<body>

	<?php
			class Movie {
				public $id, $nume, $durata, $tip, $nota, $genuri, $imagine, $rating, $descriere;
				function __construct($id, $nume, $durata, $tip, $nota, $genuri, $imagine, $rating, $descriere) {
					$this->id = $id;
					$this->nume = $nume;
					$this->durata = $durata;
					$this->tip = $tip;
					$this->nota = $nota;
					$this->genuri = $genuri; 
					$this->imagine = $imagine;
					$this->rating = $rating;
					$this->descriere = $descriere;
				}					

				function get_id() {
					return $this->id;
				}
	
				function get_nume() {
					return $this->nume;
				}
	
				function get_durata() {
					return $this->durata;
				}
	
				function get_tip() {
					return $this->tip;
				}
	
				function get_nota() {
					return $this->nota;
				}
	
				function get_genuri() {
					return $this->genuri;
				}
	
				function get_imagine() {
					return $this->imagine;
				}
	
				function get_rating() {
					return $this->rating;
				}
	
				function get_descriere() {
					return $this->descriere;
				}
			}

			

			$mv[1] = new Movie(1,"Tennet","2h 30min","2D","7.7","Actiune, Sci-Fi","img/movie-poster-1.jpg","PG-13","„Tenet\", semnat de Christopher Nolan, este o poveste epică a cărei acțiune debutează în lumea spionajului internațional.\nÎnarmat cu un singur cuvânt - Tenet - şi luptând pentru supraviețuirea întregii lumi, Protagonistul călătoreşte printr-o lume crepusculară a spionajului internaţional, într-o misiune a cărei acţiune se va desfăşura dincolo de timpul real. Nu călătorie în timp. Inversiune.");
			$mv[2] = new Movie(2,"Hard Kill","1h 38min","3D","4.1","Actiune, Thriller","img/movie-poster-2.jpg","R","Opera lui Donovan Chalmers, CEO al unui gigant tehnologic, este atât de importantă încât se vede nevoit să angajeze mercenari pentru a o proteja. O grupare teroristă, însă, îi răpește fiica pentru a-i forța mâna.");
			$mv[3] = new Movie(3,"The New Mutants","1h 34min","2D","5.3","Actiune, Horror, Sci-fi","img/movie-poster-3.jpg","PG-13","„Cinci tineri mutanţi, care abia îşi descoperă abilităţile în vreme ce sunt ţinuţi închişi într-o instituţie secretă, încearcă să se salveze, dar şi să se lepede de păcatele comise în trecut.");
			$mv[4] = new Movie(4,"Run","1h 30min","3D","6.7","Horror, Mister, Thriller","img/movie-poster-4.jpg","PG-13","„Se spune că de dragostea unei mame nu ai cum să scapi, dar, pentru Chloe, asta nu e o alinare, ci o... amenințare.\nÎn relația lui Chloe (debutanta Kiera Allen) cu mama sa, Diane (Sarah Paulson) e ceva nefiresc, ba chiar sinistru... Diane a crescut-o pe fiica sa în izolare completă, controlându-i fiecare mișcare de când s-a născut, dar acum Chloe a început să suspecteze că exagerat de protectoarea ei mamă îi ascunde ceva.\nScenariștii, producătorii și regizorul care au realizat filmul Căutarea ne prezintă Salvează-mă, un thriller plin de suspans, în care o mamă devine criminal de protectoare cu fiica ei.");
			$mv[5] = new Movie(5,"The Trial of the Chicago 7","2h 9min","2D","7.9","Drama, Istorie, Thriller","img/movie-poster-5.jpg","R","„Ceea ce trebuia să fie un protest pașnic la Convenția Națională a Partidului Democrat din 1968 s-a transformat într-o confruntare violentă cu poliția și Garda Națională. Organizatorii protestului, printre care Abbie Hoffman, Jerry Rubin, Tom Hayden și Bobby Seale, au fost acuzați de conspirație în vederea incitării la revoltă, iar procesul care a urmat a fost unul dintre cele mai notorii din istorie.");

				
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
				for ($i = 1; $i <= 5; $i++){
					echo '<div class="mv">';
						echo '<img src="'.$mv[$i]->get_imagine().'">';
						echo '<div class="mvc">';
							echo '<h1>'.$mv[$i]->get_nume().'</h1>';
							echo '<h2>'.$mv[$i]->get_tip().'&nbsp;&nbsp;&nbsp;'.$mv[$i]->get_nota().'&nbsp;&nbsp;&nbsp;'.$mv[$i]->get_rating().'&nbsp;&nbsp;&nbsp;'.$mv[$i]->get_durata().'</h2>';
							echo '<p>'.$mv[$i]->get_genuri().'</p>';
							echo '<div class="time">';  
								echo'<a href="booking.php?movId='.$mv[$i]->get_id().'" class="myButton">Detalii</a>';
							echo '</div>';
						echo'</div>';
					echo'</div>';	
				}
			?>
		</div>

		
	</body> 
</html>