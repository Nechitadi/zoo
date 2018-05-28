<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

    <!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>Nature Park Zoo</title>
	<meta name="description" content="Free Responsive Html5 Css3 Templates | Zerotheme.com">
	<meta name="author" content="www.zerotheme.com">
	
    <!-- Mobile Specific Metas
	================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <!-- CSS
	================================================== -->
  	<link rel="stylesheet" href="css/zerogrid.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/lightbox.css">
	<link rel="stylesheet" href="css/general.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	
	<link rel="stylesheet" href="css/menu.css">
	<script src="js/jquery1111.min.js" type="text/javascript"></script>
	<script src="js/script.js"></script>
	
	<!--[if lt IE 8]>
       <div style=' clear: both; text-align:center; position: relative;'>
         <a href="http://windows.microsoft.com/en-US/internet-explorer/Items/ie/home?ocid=ie6_countdown_bannercode">
           <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
        </a>
      </div>
    <![endif]-->
    <!--[if lt IE 9]>
		<script src="js/html5.js"></script>
		<script src="js/css3-mediaqueries.js"></script>
	<![endif]-->
	
</head>

<body class="login-page">
	<div class="wrap-body">
		<div class="header">
			<div id='cssmenu' >
				<ul>
				   <li class="active"><a href='index.html'><span>Nature Park Zoo</span></a></li>
				   <li class=' has-sub'><a href='#'><span>Category</span></a>
					  <ul>
						 <li class='has-sub'><a href='#'><span>Item 1</span></a>
							<ul>
							   <li><a href='#'><span>Sub Item</span></a></li>
							   <li class='last'><a href='#'><span>Sub Item</span></a></li>
							</ul>
						 </li>
						 <li class='has-sub'><a href='#'><span>Item 2</span></a>
							<ul>
							   <li><a href='#'><span>Sub Item</span></a></li>
							   <li class='last'><a href='#'><span>Sub Item</span></a></li>
							</ul>
						 </li>
					  </ul>
				   </li>
				   <li><a href='archive.html'><span>Archive</span></a></li>
				   <li><a href='single.html'><span>About</span></a></li>
				   <li class='last'><a href='contact.html'><span>Contact</span></a></li>
				</ul>
			</div>
		<!--////////////////////////////////////Container-->
		<main>
			<?php
				function testare($data) {
						$data = trim($data); 
						$data = stripslashes($data); 
						$data = htmlspecialchars($data); 
						return $data; 
				}
				if (testare($_FILES["fisier"]["error"]) > 0) {
						echo "Error: " . $_FILES["fisier"]["error"] . "
			"; 
						exit; 
				}
				if (testare($_FILES["mare"]["error"]) > 0) {
						echo "Error: " . $_FILES["mare"]["error"] . "
			";
						exit; 
				}
				$numeimagine = testare($_FILES["fisier"]["name"]); 
				$poz = strrpos($numeimagine, "."); 
				$extensie = substr ($numeimagine, $poz); 
				$nmtmp = $_FILES["fisier"]["tmp_name"]; 
				$numeimaginemare = testare($_FILES["mare"]["name"]); 
				$pozm = strrpos($numeimaginemare, "."); 
				$extensiem = substr ($numeimaginemare, $pozm); 
				$nmtmpm = $_FILES["mare"]["tmp_name"]; 
				$categoria = testare($_REQUEST["combo"]); 
				$nume = testare($_REQUEST["nume"]); 
				$descriere = testare($_REQUEST["descriere"]); 
				$raspandire = testare($_REQUEST["raspandire"]); 
				$alimentatie = testare($_REQUEST["alimentatie"]); 
				
				include("conn.php");
				if(isset($cnx)) {
				$cda= "INSERT INTO animale (id_animal, fisier_imagine, imagine_mare, id_categ, nume_animal, descriere, raspandire, alimentatie) VALUES (null, :numeimagine, :numeimaginemare, :idcateg, :numeanimal, :descriere, :raspandire, :alimentatie)";
				$stmt = $cnx->prepare($cda); 
				$stmt->bindParam(':numeimagine', $numeimagine, PDO::PARAM_STR);
				$stmt->bindParam(':numeimaginemare', $numeimaginemare, PDO::PARAM_STR);
				$stmt->bindParam(':idcateg', $categoria, PDO::PARAM_STR); 
				$stmt->bindParam(':numeanimal', $nume, PDO::PARAM_STR); 
				$stmt->bindParam(':descriere', $descriere, PDO::PARAM_STR);
				$stmt->bindParam(':raspandire', $raspandire, PDO::PARAM_STR);
				$stmt->bindParam(':alimentatie', $alimentatie, PDO::PARAM_STR);
				// se foloseste PARAM_STR chiar si pentru numere 
				$stmt->execute(); 
				// Preiau ID-ul pozei introduse in baza si construiesc un nou nume 
				$id = $cnx->lastInsertId(); 
				$numeimaginenou = "imagine".$id.$extensie; 
				$numeimaginemarenou = "imagine".$id."M".$extensie; 
				$cda = "UPDATE animale SET fisier_imagine='$numeimaginenou' WHERE id_animal = $id";
				$stmt = $cnx->prepare($cda); 
				$stmt->execute();
				// Construiesc calea pe care sa incarc fisierul 
				$cale = "imagini_animale/$numeimaginenou"; 
				$rezultat = move_uploaded_file($nmtmp, $cale); 
				if (!$rezultat) { 
						echo "Eroare la incarcarea fisierului"; 
						exit; 
				} 
				$cda = "UPDATE animale SET imagine_mare='$numeimaginemarenou' WHERE id_animal = $id";
				$stmt = $cnx->prepare($cda); 
				$stmt->execute(); 
				$calem = "imagini_animale/$numeimaginemarenou"; 
				$rezultat = move_uploaded_file($nmtmpm, $calem); 
				if (!$rezultat) { 
						echo "Eroare la incarcarea fisierului"; 
						exit; 
				}
				
				echo "<p class=\"inserare centrat\">";
				echo "<h1 class=\"italic centrat\"><span class=\"litera italic\">P</span>rodusul<br />s-a adaugat in baza de date</h1><br />";
				echo "<form class=\"centrat\"><input type=button value=\"Alt produs\"
						onClick=\"location.href='adaugare.php'\">";
				echo "<input type=button value=\"Home\" onClick=\"location.href='index.html'\"></form>";
				echo "</p><br /><br />";
				echo "<p class=\"inserare centrat\">Numele vechi al fisierului: $numeimagine</p>";
				echo "<p class=\"inserare centrat\">Numele vechi al fisierului mare:   $numeimaginemare</p>";
				echo "<p class=\"inserare centrat\">Categoria fisierului: $categoria</p>";
				echo "<p class=\"centrat inserare\">Noul nume al fisierului: $numeimaginenou</p>";
				echo "<p class=\"inserare centrat\">Imaginea mare: $numeimaginemarenou</p>"; 
				$cnx = null;
			}
			?>
		</main>
		<!--////////////////////////////////////Footer-->
		<footer>
			<div class="zerogrid wrap-footer"></div>
		</footer>
	</div>
</body>
</html>