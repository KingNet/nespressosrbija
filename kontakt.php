<?php 
error_reporting(E_ALL);
ini_set('display_errors', '0');
// NISTA NE BRISATI!

//$status ="Error"; ovo/ je da javlja gresku, naravno treba definisati sta smatramo pog gresku

// Definisanje status u poslato
if ($_GET['status']=="sent") {
	$status="sent";
}
if(isset($_POST['submit_form'])){
// Ako nije popunio polje nema slanja maila, ovde mogu da se provere ostala polja (validacija sa serverske strane)
if (isset($_POST['SenderName']) && isset($_POST['SenderEmail'])
	&& preg_match("/^[a-z0-9&\'\.\-_\+]+@[a-z0-9\-]+\.([a-z0-9\-]+\.)*+[a-z]{2}/is", $_POST['SenderEmail'])) {

// Učitavanje klase
require_once("class.phpmailer.php");
// Dodeljivanje vrednosti promenljivima iz polja forme
$SenderName = $_POST['SenderName']; 		// "SenderName" je "name" atribut inputa, isto vazi za ostale inpute
$SenderEmail = $_POST['SenderEmail'];	
$SenderMessage = $_POST['SenderMessage'];

	// Pokretanje i obrada PHPmailer skripte
	$mail = new PHPMailer();					// using php "mail()"
	$mail->IsMail();						// SendMail transport
	$mail->Subject  = "Poruka sa Nespresso sajta";	// subject maila (menjati po potrebi - za svakog klijenta njegovo ime i sl.)
	$mail->FromName = $SenderName;		
	$mail->From = $SenderEmail;	
	$mail->Body = $SenderMessage;
	$mail->WordWrap = 50;
	$mail->IsHTML(true);
	$mail->CharSet="utf-8";
	$mail->AddAddress("peraanciger@yahooo.com");	// mail na koji zelite da stize forma (vas mail za testiranje forme, kasnije mail klijenta)
	// $mail->AddBCC("nenad@krojac.com");		// ovo je opcionalni mail nalog na koji zelite poslati mail (Bcc)
	
	// Obrada slanja i provera
	if($status != "sent") {
		if($mail->Send()) {
echo '<script type="text/javascript">alert("Poruka je uspešno poslata.")</script>';
		} else {
echo '<script type="text/javascript">alert("Nešto nije u redu, pokušajte ponovo.")</script>';
		}
	}
}
else{
	echo '<script type="text/javascript">alert("Popunite obavezna polja!")</script>';
}
}
?> 
<!doctype html>
          <html lang="sr">
          <head>
          <meta name="description" content="Blic Jeftino - Oglasnik sa preko 100 000 oglasa."/>
          <meta name="keywords" content="Nespresso Srbija, prodaja nespresso kapusla, nespresso aparata"/>
          <script src="http://modernizr.com/downloads/modernizr-2.5.3.js"></script>
          <link rel="shortcut icon" href="favicon.ico">
          <script type='text/javascript' src="js/jquery-1.7.2.min.js"></script>
          <script src="js/jquery.nivo.slider.pack.js"></script>
           <script>
			$(document).ready(function(){
			$("#slider").nivoSlider({
			effect:"fade",
			prevText: "Prev",
			nextText: "Next"
			});

});
</script>

          <meta charset="utf-8">
          <meta name="Author" content="anciger.com">
          <title>Nespresso Srbija / Prodaja Nespresso Kapsula /</title>
          
         
         
          <link href="css/style.css" rel="stylesheet">
           
         


          </head>

<body>
<div id="container">
          <header id="main_header"><!--Start Header-->
                  
              <h1 id="logo"><a href="images/logo.png"><img src="images/logo.png" alt="Nespresso Srbija Logo"></a></h1>
              
               
                <nav ><!--Start Navigation-->
                  <ol>
                  <li><a href="#">Naslovna</a></li>
                      <li><a href="kapsule.php">Kapsule</a></li>
                      <li><a href="aparati.php">Aparati</a></li>
                      <li><a href="oprema.php">Oprema</a></li>
                      <li><a href="kontakt.php">Kontakt</a></li>
                        
                      
                  </ol>
              </nav>
             
          </header>
          <section id="main_section_kontakt" role="main"> <!--Start Main Section-->
              <div id="podnaslovi_tekst_kontakt">Kontakt</div>
              <h3>Ukoliko želite da stupite sa mnom u kontakt, molim vas da ispunite polja u formularu i pritisnite dugme POŠALJI.<br>
Odgovoriću vam na email adresu koju ste naveli.
  </h3>
  <h4>Kontakt informacije</h4>
    <article class="introtext3">
      
    </article>
      <form id="contact_form" method="post">
         
          <!-- Obično polje za tekst -->
          <div id="name">
            <label for="SenderName">Ime: <span class="stars" >*</span></label>
            <input type="text" name="SenderName" id="SenderName" class="required">
          </div>
          <div>
            <label for="SenderName">Prezime: <span class="stars" >*</span></label>
            <input type="text" name="SenderName" id="SenderName" class="required">
          </div>
          <div>
            <label for="SenderEmail">E-mail: <span class="stars">*</span></label>
            <input type="email" name="SenderEmail" id="SenderEmail" class="required email">
          </div>
          <div>
            <label for="SenderComment">Tekst: <span class="stars">*</span></label>
            <textarea name="SenderMessage" id="SenderComment"  rows="5" cols="40" class="required" ></textarea>
          </div>
          <div id="submit">
            <input id="submit_form" name="submit_form" value="Pošalji" type="submit">
          </div>
      </form>
  </div>
  </section>
         <footer>
  
  <div id="copy">Sva prava zadržava <span class="boldtekst">Blic Jeftino<span></div>
  <div id="navfooter"><!--Start Navigation-->
                  <ul>
                  <ol>
                   <li><a href="index.php">Kapsule</a></li>
                      <li><a href="kapsule.php">Kapsule</a></li>
                      <li><a href="aparati.php">Aparati</a></li>
                      <li><a href="oprema.php">Oprema</a></li>
                      <li><a href="kontakt.php">Kontakt</a></li>
                        
                      
                  </ol>
              </ul>
              </div>
            
		
  
  
 
  </footer>
</body>
</html>
