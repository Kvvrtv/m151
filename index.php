<!DOCTYPE html>
<html>
	<style>
	.table{
		margin-left:10%;
	}
	</style>
	<head>
		<link rel="stylesheet" href="bulma-0.8.0\css\bulma.min.css">
		<link rel="stylesheet" href="bulma-0.8.0\css\bulma.css">
	</head>
	<body>
		<?php
			session_start();

			//Variabel
			
			//database
			$servername = "127.0.0.1";
			$username = "root";
			$password = "";
			$dbname = "m151";
			//end database 
			
			//$apprenticeship;
			//$date;
			
			//end Variabel
		?>
		
		<!--Navbar -->
		<nav class="navbar" color="grey-light">
		  <div class="navbar-brand">
			<a class="navbar-item" href="http://localhost/m151/index.php">
			  <img src="Bilder\Logo.png" alt="IBV Logo">
			</a>
		  </div>
		</nav>
		<!-- end Navbar-->
		<!-- title/Spruch -->
		<div class="columns">
		  <div class="column is-one-fifth"></div>
		  <div <p class="title is-1">Jetzt kannst du noch entscheiden</p></div>
		</div>
		<div class="columns">
		  <div class="column is-two-fifths"></div>
		  <p class="subtitle is-2">Finde heraus was zu dir passt </p>
		</div>
		<!-- end title/motto -->
		<!-- text and picture -->
		<p style="margin-left:10%;"> 
		Wir möchten dir gerne zeigen, wie eine Lehre bei uns</br>
		aussehen könnte.</br>
		Melde dich jetzt bei uns an</br></br>
		</p>
		<!-- <figure style="margin-left:10%;" class="image is-256x256">
		  <img src="Bilder/bild1.jpg">
		</figure>
		<figure style="margin-left:10%;" class="image is-128x128">
		  <img src="Bilder/bild3.jpg">
		</figure>
		<figure style="margin-left:10%;" class="image is-128x128">
		  <img src="Bilder/bild2.jpg">
		</figure>  -->
		
		<!-- table -->
		<div>
			<table class="table">
				<thead>
					<tr>
					  <th>Datum</th>
					  <th>Beruf</th>
					  <th>freie Plätze</th>
					  <th>Anmeldung</th>
					</tr>
				</thead>
				<tbody>
					<?php
					// Create connection
					$conn = new mysqli($servername, $username, $password, $dbname);
					// Check connection
					if ($conn->connect_error) {
						die("Connection failed: " . $conn->connect_error);
					}
					

					$sql = "SELECT * FROM event";
					/*foreach ($conn->query($sql) as $row) {
					echo ".$row['Datum'].";
					}*/	
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
						// output data of each row
						while($row = $result->fetch_assoc()) {
							echo "					
							  <th>".$row['Datum']."</th>
							  <td>".$row['Beruf']."</td>
							  <td>".$row['freiePlaetze']." von ".$row['MaxPlaetze']." </td>
							  <td><a href='http://localhost/m151/schnupperlehreFormular.php?apprenticeship=" . $row['Beruf'] . "&date=" . $row['Datum'] . "'>
							  <input class='button is-link' type='submit' value='anmelden' /></a>
							</td>
							</tr>
							" ;
						} 
					}				
					?>
				</tbody>
			</table>
		</div>
		<!-- end table -->
		<!-- footer -->
		<footer class="footer">
		  <div class="content has-text-centered">
			<p>
			  <strong><a href="https://www.ibv.com">IBV</a></strong> Modul 151
			</p>
		  </div>
		</footer>
		<!-- end  footer -->
	</body>
</html>