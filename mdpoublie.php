<?php
session_start();
include("scripts/identifiants.php");
$nbr_non_vus = mysql_query("SELECT COUNT(*) AS nbre FROM mp WHERE destinataire='".$_SESSION['pseudo']."' AND vu='0' AND (efface='0' OR efface='2')")or die(mysql_error());
$nbre_non_vus = mysql_fetch_assoc($nbr_non_vus);
?>
<!DOCTYPE html>
<title>Mozilla Tunisia | Membre</title>
<head>
<meta http-equiv="Content-Language" content="fr,en" />
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr">
<link rel="stylesheet" href="styles/elegant-press.css" type="text/css" />
<link rel="stylesheet" href="styles/elegant-press.css" type="text/css" />
<script src="scripts/elegant-press.js" type="text/javascript"></script>
<!--[if IE]><style>#header h1 a:hover{font-size:75px;}</style><![endif]-->

<link href="tab/css/tabzilla.css" rel="stylesheet" />
<script src="tab/js/tabzilla.js"></script>
</head>
<body>
<a href="http://www.mozilla.org/" id="tabzilla">mozilla</a>
<div class="main-container">
  <header>
    <h1><a href="index.php">Mozilla Tunisia</a></h1>
    <p id="tagline"><strong>Mozilla Tunisia Member</strong></p>
  </header>
</div>

<div id="login-box" class="ten columns phone-three pull-one-phone pull-two">
<?php echo'<a href="./profil.php?m='.intval($_SESSION['id']).'">'.stripslashes(htmlspecialchars($_SESSION['prenom'])).' '.stripslashes(htmlspecialchars($_SESSION['nom'])).'</a>'; 
if (isset($_SESSION['pseudo'])) // Si le membre est connecté
{ 
?>
	[<a href="deconnexion.php">Sign Out</a>]
<?php 
}
else
{?>	
	<a href="connexion.php">Sign In</a>
	<?php } ?> 
</div>


<div class="main-container">
  <div id="sub-headline">
    <!--<div class="tagline_left"><p id="tagline2">Tel: 123 333 4444 | Mail: <a href="mailto:email@website.com">email@website.com</a></p></div>-->
    <div class="tagline_right">
      <form action="#" method="post">
        <fieldset>
          <legend>Site Search</legend>
          <input type="text" value="Search Our Website&hellip;"   onfocus="if (this.value == 'Search Our Website&hellip;') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Search Our Website&hellip;';}" />
          <input type="submit" name="go" id="go" value="Search" />
        </fieldset>
      </form>
    </div>
    <br class="clear" />
  </div>
</div>
<div class="main-container">
  <div id="nav-container">
   <nav> 
    <ul class="nav">
      <li><a href="index.php">Home</a></li>
      <li><a href="membre.php">Membre</a></li>      
      <!--<li><a href="portfolio.html">Portfolio</a></li>
      <li><a href="gallery.html">Gallery</a></li>-->
	  <li><a href="./events/">Events</a></li>
	  <li><a href="./calendar/all">Calendrier</a></li>
      <li class="last"><a href="contact.php">Contact</a></li>    
	  <?php if (isset($_SESSION['pseudo'])) // Si le membre est connecté
{ ?>
	  <li><a href="./mp.php">Messages(<?php echo $nbre_non_vus['nbre'];?>)</a>
        <ul>
          <li><a href="./mp.php">Boite de réception</a>          
          <li><a href="./mp.php?action=ecrire">Nouveau Message</a></li>          
          <li><a href="./mp.php?action=LireMpRecu">Message Envoyer</a></li>
		  <li><a href="./mp.php?action=Corbeil">Message Supprimer</a></li>
        </ul>
      </li>
	  <?php }?>
    </ul>
   </nav> 
    <div class="clear"></div>
  </div>
</div>
<div class="main-container">
  <div class="container1">
   <div id="breadcrumb">
    <ul>
      <li class="first">Vous ete ici</li>
      <li>&#187;</li>
      <li><a href="index.php">Home</a></li>
      <li>&#187;</li>
      <li class="current"><a href="mdpoublie.php">Mot De Passe Perdu</a></li>
    </ul>
</div>
<br />
<br />

       <div id="gallery" class="box">
	   <h2 class="tit">Mot De Passe Perdu</h2>
      <hr size="3" /><br />
	   
      <h6 align="center" style="font-size:14px">Si vous avez perdu votre mot de passe, vous pouvez utiliser ce formulaire pour le réinitialiser.<br />
	  Saisissez votre nom d'utilisateur et votre adresse email dans les champs ci-dessous.
	<br/>Une fois le formulaire soumis, vous recevrez un email contenant votre nouveau mot de passe. </h6><br />
	
	
	
	
	
	<form method="post">	
			<table style="width:310px;margin : 10px auto auto auto; " border="0" class="tablee">
				<tr>
					<td>Pseudo :</td>
					<td><input type="text" name="pseudo" class="input-text big" style="width: 227px;" /></td>
				</tr>
				<tr>
					<td>E-Mail :</td>
					<td><input type="text" name="email" class="input-text big" style="width: 227px;" /></td>					
				</tr>
				<tr>
					<td colspan="2" align="center"><input type="submit" name="BT_Recuperermotdepasse" value="Valider" /></td>
				</tr>				
			</table>	
<br/>			
</form>


<?php
if(isset($_POST["BT_Recuperermotdepasse"]))
{
 if($_POST["email"] !='')
  {  
  $retour = mysql_query
  ("SELECT COUNT(*) AS nbre_entrees FROM
  users
  WHERE
  email ='". $_POST["email"] ."' AND  pseudo ='". $_POST["pseudo"] ."'");
  $donnees = mysql_fetch_array($retour);
  $nbtrouver = $donnees['nbre_entrees'];
  
  
   if($nbtrouver == 0){   
   $message = "Désolé mais l'adresse email <strong>'". $_POST["email"] ."'</strong> n'existe pas.";
   }
   else
   { 
   
   $reponse = mysql_query("SELECT * FROM users WHERE
   email='".$_POST["email"]."' 
   AND pseudo ='". $_POST["pseudo"] ."'");
   $donnees = mysql_fetch_array($reponse);
   $pseudo = $donnees['pseudo'];
   
      
	$string = "";
	$chaine = "abcdefghijklmnpqrstuvwxy0123456789";
	srand((double)microtime()*1000000);
	for($i=0; $i<8; $i++) 
	{
		$string .= $chaine[rand()%strlen($chaine)];
	}

	$mdp = $string;

   $TO = mysql_real_escape_string($_POST['email']);
   $message_mail = "Recuperation de mot de passe
   Bonjour '".$pseudo."',
   --------------------------------------------------------------------------------------------
   Votre mot de passe : '".$mdp."'
   -------------------------------------------------------------------------------------------- ";
	$subject = "[MozTn] Récupération Mot De Passe";

	$from = "From: MozillaTunisia <hajjejfiras@gmail.com>\n";	
    mail($TO, $subject, $message_mail, $from);
	mysql_query("UPDATE users SET mdp='".md5($mdp)."'  WHERE pseudo='" .$pseudo. "' AND email='".$_POST["email"]."'");
    echo "Votre mot de passe vient être réinitialisé et envoyé par mail. Consultez votre boite de récéption pour le nouveau mot de passe !";
   } 
  }
   else
  {
  $message = "Adresse email invalide !<br>Merci de bien remplir le champ ci dessous.";
  }
  echo $message;
}
?>
	
	
	
	
	
	
	
	
      <br class="clear" />
	  <div align="center">
	  
	  </div>
    </div>  
 
 </div>
<div class="main-container">
 </div>
<div style="position:fixed;left:30px;top:90%;" title="Clickez pour signaler un problème">
<a href="404/bug.php"><img src="images/bug.png" alt="Logo" /></a>
</div>
 <footer>
  <table>
	<tr>
	<td><img src="images/logo.png" alt="Logo" /></td>
    <td><p class="tagline_left">Copyright &copy; 2012 - All Rights Reserved - <a href="http://mozilla-tunisia.org">Mozilla Tunisia</a></p></td>
	</tr>
	</table>
    <!--<p class="tagline_right">Design by <a href="http://www.priteshgupta.com/" title="Pritesh Gupta" target="_blank" >PriteshGupta.com</a></p>-->
    <br class="clear" />
  </footer>

<br />
<br />
<!-- Free template distributed by http://freehtml5templates.com -->
    </body>
</html>
