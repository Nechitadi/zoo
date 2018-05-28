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
		<main class="element-container">
    <?php
      include("conn.php");

        class Animale {
          public $id_animal;
          public $fisier_imagine;
          public $imagine_mare;
          public $id_categ;
          public $nume_animal;
          public $descriere;
          public $raspandire;
          public $alimentatie;
        }

          if(isset($cnx)) {
              $idp = $_REQUEST['idanimal'];
              $cda = "select * from animale WHERE id_animal=$idp"; 
              $stmt = $cnx->prepare($cda);
              $stmt->execute();
              $animal = $stmt->fetchObject('Animale');
              echo "<div class='container'>";
              echo "<article class=\"animal\"><h1>$animal->nume_animal</h1>";
              echo "<div class='row'>";
              echo "<div class='col-6'>" ;                           
              echo "<div class=\"mostra\">";
              echo '<img src="imagini_animale/'.$animal->imagine_mare.'" alt="" />';
              echo "</div></div>";
              echo "<div class='col-6'>" ;                                         
              echo "<div class=\"descriere\">";
              echo "<h2>Descriere</h2><p>$animal->descriere</p>";
              echo "<h2>Răspândire</h2><p>$animal->raspandire</p>";
              echo "<h2>Alimentație</h2><p>$animal->alimentatie</p>";
              echo "</div></div>";

              echo "</article>";
              echo "</div>";
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