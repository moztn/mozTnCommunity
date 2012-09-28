<?php
session_start();
include("../scripts/identifiants.php");
$nbr_non_vus = mysql_query("SELECT COUNT(*) AS nbre FROM mp WHERE destinataire='".$_SESSION['pseudo']."' AND vu='0' AND (efface='0' OR efface='2')")or die(mysql_error());
$nbre_non_vus = mysql_fetch_assoc($nbr_non_vus);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<title>Mozilla Tunisia | Register</title>
<head>
<meta http-equiv="Content-Language" content="fr,en" />
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr">
<link rel="stylesheet" href="../styles/elegant-press.css" type="text/css" />
<script src="../scripts/elegant-press.js" type="text/javascript"></script>
<script src="../scripts/verifinscri.js" type="text/javascript"></script>
<!--[if IE]><style>#header h1 a:hover{font-size:75px;}</style><![endif]-->

<link href="../tab/css/tabzilla.css" rel="stylesheet" />
<script src="../tab/js/tabzilla.js"></script>
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
<?php echo'<a href="../profil.php?m='.intval($_SESSION['id']).'">'.stripslashes(htmlspecialchars($_SESSION['prenom'])).' '.stripslashes(htmlspecialchars($_SESSION['nom'])).'</a>'; 
if (isset($_SESSION['pseudo'])) // Si le membre est connecté
{ 
?>
	[<a href="../deconnexion.php">Sign Out</a>]
<?php 
}
else
{?>	
	<a href="../connexion.php">Sign In</a> or <a href="../register.php">Join</a>
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
      <li><a href="../">Home</a></li>
      <li><a href="../membre.php">Membre</a></li>      
      <!--<li><a href="portfolio.html">Portfolio</a></li>
      <li><a href="gallery.html">Gallery</a></li>-->
	  <li class="active"><a href="../events/">Events</a></li>
	  <li><a href="../calendar/all">Calendrier</a></li>
      <li class="last"><a href="contact.php">Contact</a></li>    
	  <?php if (isset($_SESSION['pseudo'])) // Si le membre est connecté
{ ?>
	  <li><a href="../mp.php">Messages(<?php echo $nbre_non_vus['nbre'];?>)</a>
        <ul>
          <li><a href="../mp.php">Boite de réception</a>          
          <li><a href="../mp.php?action=ecrire">Nouveau Message</a></li>          
          <li><a href="../mp.php?action=LireMpRecu">Message Envoyer</a></li>
		  <li><a href="../mp.php?action=Corbeil">Message Supprimer</a></li>
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
      <li><a href="../">Home</a></li>
      <li>&#187;</li>
      <li class="current"><a href="../register.php">Register</a></li>
    </ul>
</div>
<br />
<br />

    
    <div id="gallery" class="box">
		
<?php
	if (isset($_SESSION['pseudo'])&&(int)$_SESSION['level']==4) // Si le membre est connecté
{ 	
		//Maintenant, on se connecte à la base de données

//On récupère les variables
$i = 0;
$datedeb1 = mysql_real_escape_string($_POST['datedebut']);
$datefin1 = mysql_real_escape_string($_POST['datefin']);

$anneedeb = substr($datedeb1, 6, 4);
 $moisdeb = substr($datedeb1, 3, 2);
 $jourdeb = substr($datedeb1, 0, 2);  
 $datedeb1 = $anneedeb . '-' . $moisdeb . '-' . $jourdeb; 
$datedeb =  strtotime( $datedeb1 );

$anneefin = substr($datefin1, 6, 4);
 $moisfin = substr($datefin1, 3, 2);
 $jourfin = substr($datefin1, 0, 2);  
 $datefin1 = $anneefin . '-' . $moisfin . '-' . $jourfin; 
 $datefin =  strtotime( $datefin1 );
 

$nomevent = mysql_real_escape_string($_POST['nomevent']);
$description = mysql_real_escape_string($_POST['description']);
$lien = mysql_real_escape_string($_POST['lien']);

$heured = mysql_real_escape_string($_POST['heuredebut']);
$mind = mysql_real_escape_string($_POST['minutedebut']);
$heuredebut = $heured.' : '.$mind;

$heuref = mysql_real_escape_string($_POST['heurefin']);
$minf = mysql_real_escape_string($_POST['minutefin']);
$heurefin = $heuref.' : '.$minf;

$hashtag = mysql_real_escape_string($_POST['hashtag']);
$ville = mysql_real_escape_string($_POST['ville']);
$lieu = mysql_real_escape_string($_POST['lieu']);
$map = mysql_real_escape_string($_POST['map']);

//Vérification du pseudo

?>
<div id="corps_forum">
<?php
if ($i == 0) // Si i est vide, il n'y a pas d'erreur
{
	 
?>

         <h2>Evénénment Ajouter Avec succés</h2>
  		<hr size="3" />
		<h5>Votre événement a été ajouté avec succés</h5>
        <?php		
        mysql_query('INSERT INTO event (nomeve, lien, description, hashtag, datedeb, datefin, heuredeb, heurefin, city, lieu, map) VALUES ("'.$nomevent.'" , "'.$lien.'" ,"'.$description.'" , "'.$hashtag.'" , "'.$datedeb.'" , "'.$datefin.'" ,  "'.$heuredebut.'" , "'.$heurefin.'" , "'.$ville.'" , "'.$lieu.'" , "'.$map. '" ) ') or die(mysql_error());      
	
	  
}
else
{
	if($valid == false) { $i++;}
	?>
    	 <h2>Inscription interrompue</h2>
  <hr size="3" />
  <?php
        echo'<p>Une ou plusieurs erreurs se sont produites pendant l\'incription</p>';
        echo'<p>'.$i.' erreur(s)</p>';
        echo'<p>'.$pseudo_erreur1.'</p>';
        echo'<p>'.$pseudo_erreur2.'</p>';
        echo'<p>'.$mdp_erreur.'</p>';
        echo'<p>'.$email_erreur1.'</p>';
        echo'<p>'.$email_erreur2.'</p>';
        echo'<p>'.$msn_erreur.'</p>';
        echo'<p>'.$signature_erreur.'</p>';
        echo'<p>'.$avatar_erreur.'</p>';
        echo'<p>'.$avatar_erreur1.'</p>';
        echo'<p>'.$avatar_erreur2.'</p>';
        echo'<p>'.$avatar_erreur3.'</p>';
        echo'<p>'.$nom_erreur.'</p>';
		echo'<p>'.$prenom_erreur.'</p>';
		echo'<p>'.$mdp_erreur1.'</p>';
		echo'<p>'.$mdp_erreur2.'</p>';
		echo'<p>'.$quest_erreur.'</p>';
		echo'<p>'.$rep_erreur.'</p>';
		echo'<p>'.$propos_erreur.'</p>';
        echo'<p>Cliquez <a href="./register.php">ici</a> pour recommencer</p>';
}
mysql_close();
?>
</div>
	<?php } 
		else
			echo'<h5>Vous n\'avez pas le droit pour créer des événements. Seul l\'administrateur a ce droit <br /></h5>';
			?>
		<br class="clear" />
	</div>

<div class="main-container">
 </div>
  <div style="position:fixed;left:30px;top:90%;" title="Clickez pour signaler un problème">
<a href="../404/bug.php"><img src="../images/bug.png" alt="Logo" /></a>
</div>
 <footer>
   <table>
	<tr>
	<td><img src="../images/logo.png" alt="Logo" /></td>
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
