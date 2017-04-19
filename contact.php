<?php
$errorNume="";
$errorEmail="";
$errorTelefon="";
$errorMesaj="";
$info="";

	if (isset($_POST["trimite"])) {
		$nume = filter_var($_POST['nume'], FILTER_SANITIZE_STRING);
		$email = $_POST['email'];
    $telefon = $_POST['telefon'];
		$mesaj = filter_var($_POST['mesaj'], FILTER_SANITIZE_STRING);

    $from = 'Mesaj trimis prin formularul de contact.';
		$to = 'cipriancercel@yahoo.com';
		$subiect = 'Mesaj de pe asacoelectric.ro ';
		$body = "De la: $nume\n E-mail: $email\n Telefon: $telefon\n Mesaj:\n $mesaj";

		// Check if name has been entered
		if (!$_POST['nume']) {
			$errorNume = 'Numele este obligatoriu';
		}

		// Check if email has been entered and is valid
		if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errorEmail = 'Email ul este obligatoriu';
		}

    // Check if email has been entered and is valid
		if (!$_POST['telefon']) {
			$errorTelefon = 'Telefon ul este obligatoriu';
		}

		//Check if message has been entered
		if (!$_POST['mesaj']) {
			$errorMesaj = 'Care este mesajul dvs.?';
		}
		//Check if simple anti-bot test is correct
		/*if ($human !== 5) {
			$errHuman = 'Your anti-spam is incorrect';
		}*/

// If there are no errors, send the email
if (!$errorNume && !$errorEmail && !$errorMesaj) {
	if (mail ($to, $subiect, $body, $from)) {
		$info='<div class="alert alert-success">Multumim! Va vom contacta in cel mai scurt timp posibil.</div>';
	} else {
		$info='<div class="alert alert-danger">A aparut o eroare la trimiterea mesajului. Incercati mai tarziu sau sunati la 0751 658 566 sau trimiteti un email la asacoelectric@yahoo.com. </div>';
	}
}
}
?>

<!DOCTYPE  HTML>
<html lang="ro">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="SC AsaCoElectric SRL din Iasi, producator de aparate de distributie si control a electricitatii" >
	<meta name="keywords" content="electric, distributie, aparate, control, asacoelectric, delgaz, firide, bransament, masura, tablouri, amperi, BMPM , BMPT, FDCP/FDCE" >

<title>Contact | Asaco Electric SRL - Iasi</title>

<!-- CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">

<!-- jQuery library -->
	<script src="js/jquery-1.12.3.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>

<!-- JavaScript -->
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>

</head>
<body>

<!--  Meniul paginii -->
	<nav class="navbar navbar-inverse navbar-fixed-top normal">

      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html"><img class="img-responsive" src="imagini/sigla.png" alt=""></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">

          <ul class="nav navbar-nav navbar-right">
            <li><a href="index.html">Home</a></li>
            <li><a href="despre.html">Profil firma</a></li>
            <li><a href="produse.html">Produse si servicii</a></li>
			<li><a href="galerie.html">Galerie foto</a></li>
			<li class="active"><a href="contact.php">Contact</a></li>
          </ul>
        </div>
        <!--/.nav-collapse -->
      </div>
      <!--/.contatiner -->
    </nav>
<!--  Sfarsitul meniului -->

	<div class="titlu">
	    <div class="container">
            <h4 class="pull-left">Contactati-ne</h4>
		        <ul class="breadcrumb pull-right" style="background:none;">
				    <li><a href="index.html">Home</a></li>
					<li><a href="#">Contact</a></li>
				</ul>
	    </div>
	</div>
    
	<div class="row">
	    <div class="container" style="padding:25px auto;">	    
		    <div class="col-sm-5 col-xs-12">
			    <h4>Formular de contact</h4>

				    <form action="" method="post" enctype="multipart/form-data">
					    <div class="col-sm-4">
					        <div class="form-group">
						        <label for="nume">Nume*</label>
							    <input type="text" name="nume" id="nume" class="form-control" placeholder="Numele dvs.">
						    </div>
                            <p class="alert-danger"><?php echo $errorNume ?></p>
						</div>
						<div class="col-sm-4">
						    <div class="form-group">
						        <label for="email">Adresa de email*</label>
							    <input type="email" name="email" class="form-control" id="email" placeholder="Adresa dvs. de email">
						    </div>
                            <p class="alert-danger"><?php echo $errorEmail ?></p>
						</div>
						<div class="col-sm-4">
				            <div class="form-group">
					            <label for="telefon">Numar de telefon*</label>
					            <input type="text" name="telefon" class="form-control" id="telefon" placeholder="Nr. dvs. de telefon">
				            </div>
                            <p class="alert-danger"><?php echo $errorTelefon ?></p>
						</div>
						<div class="form-group">
					        <label for="mesaj">Mesajul dvs.*</label>
					        <textarea name="mesaj" class="form-control" rows="5" id="mesaj"></textarea>
				        </div>
                        <p class="alert-danger"><?php echo $errorMesaj ?></p>
                        <p class="alert-success"><?php echo $info ?></p>
                        <p>*Toate campurile sunt obligatorii.</p>
						<input type="submit" value="Trimite" name="trimite" class="buton" style="margin-bottom:20px;">
				    </form>
			</div> <!--  col-sm-5 -->
			
			<div class="col-sm-4">
			    <h4>Vezi pe harta</h4>
					<div id="map" style="height:300px;"></div>
                <script>
                    function Harta() {
				        var myCenter = new google.maps.LatLng(47.129421, 27.719621);
                        var coordonate = {
                            center : new google.maps.LatLng(47.129421, 27.719621),
                            zoom: 13,
                            mapTypeId: google.maps.MapTypeId.ROADMAP
                         }
                        var map = new google.maps.Map(document.getElementById("map"),
				            coordonate);
				        var marker = new google.maps.Marker({position:myCenter});
				         marker.setMap(map);
				    }
                </script>
                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDnQIoyTFtoikZugT6tVpeiUMiFdzvWDww&callback=Harta">
                </script>
			</div>
			
			<div class="col-sm-3 col-xs-12">
			    <h4>Date de contact</h4>
				<div class="row">
				    <p class="col-sm-4 col-xs-4">Adresa</p><p class="col-sm-8 col-xs-8">Str. Stupinelor nr. 17B, Com. Tomesti, Jud. Iasi</p>
				</div>
				<div class="row">
                    <p class="col-sm-4 col-xs-4">Telefon mobil</p><p class="col-sm-8 col-xs-8"> 0751 658 566</p>
				</div>
				<div class="row">
                    <p class="col-sm-4 col-xs-4">Adresa de email</p><p class="col-sm-8 col-xs-8"> asacoelectric@yahoo.com</p>
				</div>
			</div>
		</div> <!-- /container -->
    </div> <!-- row -->


<!--  Inceputul subsolului -->
<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-sm-4 col-xs-12 footerleft ">
        <div class="logofooter">Contactati-ne</div>
        <p>Personalul societatii noastre (proiectare, ofertare, executie productie) are experienta de 8-10 ani in fabricarea echipamentelor electrice, tablourilor electrice unicate si a produselor din gama serie si derivate din serie, Delgaz Grid si beneficiar.</p>
        <p><i class="glyphicon glyphicon-map-marker"></i> Str. Stupinelor nr. 17B, Com. Tomesti, Jud. Iasi, Romania</p>
        <p><i class="glyphicon glyphicon-earphone"></i> Telefon (Romania) : +40 751 658 566</p>
        <p><i class="glyphicon glyphicon-envelope"></i> E-mail: asacoelectric@yahoo.com</p>
        
      </div>
      <div class="col-md-4 col-sm-4 col-xs-12 paddingtop-bottom">
        <h6 class="heading7">Legaturi utile</h6>
        <ul class="footer-ul">
          <li><a href="https://www.delgaz-grid.ro/ro.html" target="_blank"> Delgaz GRID (E.ON)</a></li>
          <li><a href=" http://www.delgaz-grid.ro/ro/energie-electrica/specificatii-tehnice.html" target="_blank"> Specificatii tehnice DelGaz Grid</a></li>
          <li><a href="http://www.anre.ro/" target="_blank"> A.N.R.E. (Autoritatea Nationala de Reglementare in Domeniul Energiei)</a></li>
          <li><a href="http://www.anaf.ro" target="_blank"> A.N.A.F.(Agentia Nationala de Administrare Fiscala)</a></li>
          <li><a href="http://retele-iasi.ro/acte-necesare-delgaz/" target="_blank"> Acte necesare racordare DeglGaz Grid</a></li>
          <li><a href="http://protectservice.ro/servicii-ssm/" target="_blank"> Servicii S.S.M.(Securitate si Sanatate in Munca)</a></li>
          <li><a href="http://www.anpc.gov.ro/" target="_blank"> A.N.P.C.(Autoritatea Nationala pentru Protectia Consumatorilor)</a></li>
		  <li><a href="http://www.e-licitatie.ro/" target="_blank"> E-licitatie - Sistemul Electronic de Achizitii Publice</a></li>
        </ul>
      </div>
      <div class="col-md-4 col-sm-4 col-xs-12 paddingtop-bottom">
        <div class="fb-page" data-href="https://www.facebook.com/facebook" data-tabs="timeline" data-height="300" data-small-header="false" style="margin-bottom:15px;" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
          <div class="fb-xfbml-parse-ignore">
            <blockquote cite="https://www.facebook.com/facebook"><a href="https://www.facebook.com/facebook" target="_blank">Facebook</a></blockquote>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<!--footer start from here-->

<div class="copyright">
  <div class="container">
    <div class="col-md-6 col-xs-12">
      <p>SC AsaCoElectric SRL - Iasi © 2017 - Toate drepturile rezervate</p>
    </div>
    <div class="col-md-6 col-xs-12">
      <ul class="bottom_ul">
        <li><a href="http://www.asacoelectric.ro">asacoelectric.ro</a></li>
        <li><a href="despre.html">Despre noi</a></li>
        <li><a href="produse.html">Produse</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="#">Site Map</a></li>
      </ul>
    </div>
  </div>
</div>

<script>
$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){

        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });

  $(window).scroll(function() {
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
          $(this).addClass("slide");
        }
    });

	if ($(document).scrollTop() > 150) {
			$('.navbar').addClass('shrink');
			}
			else {
			$('.navbar').removeClass('shrink'); }
  });
})
</script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-7794030-16', 'auto');
  ga('send', 'pageview');

</script>

</body>
</html>
