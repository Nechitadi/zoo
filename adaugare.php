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
		<main class="adaugare-container">
      <h1 class="italic centrat"><span class="litera italic">A</span>dăugare</h1><br />
        <form name="formular" enctype="multipart/form-data" method="post" action="inserare.php" class="centrat">
          <table class="login centrat">
            <tr>
              <td class="label">Categoria:</td>
              <td> 
                <select name="combo" class="field">
                    <option selected value="initial">(Alege categoria)</option>
                    <?php
                      include("conn.php");

                      class Categorii {
                        public $id_categ;
                        public $categoria;
                      }

                      if(isset($cnx)) {
                        $cda= "SELECT * FROM categorii";
                        $stmt = $cnx->prepare($cda);
                        $stmt->execute();
                        while ($categ = $stmt->fetchObject('Categorii')) {
                          echo '<option value="' . $categ->id_categ . '">' . $categ->categoria . '</option>\n';
                        }
                        $cnx = null;
                      }
                      ?>
                      </select>
              </td>
            </tr>

            <tr>
              <td class="label">Selectați imaginea:</td>
              <td class="field file-field"><input type="file" name="fisier" class="btn btn-default" /></td>
						</tr>
						
						<tr id="imaginea-mare">
							<td class="label">Imaginea mare: </td>
							<td class="field file-field"><input type="file" name="mare" class="btn btn-default"/></td>
						</tr>

						<tr>
							<td class="label">Numele animalului: </td>
							<td><input type="text" name="nume" class="field"/></td>
						</tr>

						<tr>
							<td class="label">Descriere:</td>
							<td><textarea name="descriere" rows="5"></textarea></td>
						</tr>

						<tr>
							<td class="label">Raspandire:</td>
							<td><textarea name="raspandire" rows="2"></textarea></td>
						</tr>

						<tr>
							<td class="label">Alimentație:</td>
							<td><textarea name="alimentatie" rows="2"></textarea></td>
						</tr>

            <tr>
              <td></td>
              <td>
                <input type="submit" name="Submit" value="Adauga"  class="btn btn-dark">
                <input type="reset" name="Reset" value="Sterge" class="btn btn-dark">
              </td>
            </tr>
        </table>
      </form>
    </main>
		<!--////////////////////////////////////Footer-->
		<footer>
			<div class="zerogrid wrap-footer">
				<!-- <div class="row">
					<div class="col-1-3 col-footer-1">
						<div class="wrap-col">
							<h3 class="widget-title">Despre noi</h3>
							<p>O oază de linişte, ideală pentru odihnă, recreere şi refacere vă aşteaptă la Grădina Zoologică Nature Park, unde doar ambientul special al vietăţiilor noastre extrem de primitoare, căldura şi profesionalismul personalului fac diferenţa şi rămân mărturie.</p>
						</div>
					</div>
					<div class="col-1-3 col-footer-2">
						<div class="wrap-col">
						</div>
					</div>
					<div class="col-1-3 col-footer-3">
						<div class="wrap-col">
							<h3 class="widget-title">Tag Cloud</h3>
							<a href="#">animale</a>
							<a href="#">urs</a>
							<a href="#">leu</a>
							<a href="#">vulpe</a>
							<a href="#">strut</a>
							<a href="#">crocodil</a>
							<a href="#">girafa</a>
							<a href="#">hipopotam</a>
							<a href="#">sarpe</a>
							<a href="#">maimuta</a>
							<a href="#">koala</a>
							<a href="#">tigru</a>
							<a href="#">pantera</a>
							<a href="#">salbaticie</a>
							<a href="#">natura</a>
							<a href="#">calatorie</a>
							<a href="#">copaci</a>
							<a href="#">zoo</a>
						</div>
					</div>
				</div>
			</div>
			<div class="copyright">
				<div class="zerogrid wrapper">
					Copyright @ Nature Prak Zoo - Designed by <a href="https://nechitadi.github.io/">Adrian Nechita</a>
				</div>
			</div> -->
		</footer>
	</div>
</body>
</html>