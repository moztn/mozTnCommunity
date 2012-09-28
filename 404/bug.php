<?php
session_start();
include("../scripts/identifiants.php");
$nbr_non_vus = mysql_query("SELECT COUNT(*) AS nbre FROM mp WHERE destinataire='".$_SESSION['pseudo']."' AND vu='0' AND (efface='0' OR efface='2')")or die(mysql_error());
$nbre_non_vus = mysql_fetch_assoc($nbr_non_vus);	

	$msg = '';
	$envoi = $_GET['envoi'];                
    $mail = $_GET['mail'];      
	$url = $_GET['url']; 
	$titre = $_GET['titre']; 
	$desc = $_GET['desc']; 
	$prio = (int)$_GET['prio']; 
	$bot = $_GET['bot']; 
	$etat=0;
	$temps = time(); 
	
	if ($envoi == 'yes')
	{
		if($bot!="")
		{
			$msg+="<br/>Les bot ne sont pas autorisé à envoyer un bug";
		}
		else
		{
			if (isset($_SESSION['pseudo']))
			{
				$requete1 = mysql_query('SELECT * FROM users WHERE pseudo='.$_SESSION['pseudo']);
				if ($data1 = mysql_fetch_assoc($requete1))
				{
					$mail = stripslashes(htmlspecialchars($data1['pseudo']));
				}
			}
			else
			{
				if(empty($mail))
				{
					$msg.='<br/>Veuillez saisir votre Mail';
				}
				if(empty($url))
				{
					$msg.='<br/>Veuillez saisir l\'URL de la page où il y a erreur';
				}
				if(empty($titre))
				{
					$msg.='<br/>Veuillez saisir un titre à l\'erreur';
				}
				if(empty($desc))
				{
					$msg.='<br/>Veuillez saisir une bref description';
				}			
			}
			if($msg=='')
			{
				mysql_query('INSERT INTO bug (titre, url, descr, prio, mail, etat, datedec) VALUES ("'.$titre.'" , "'.$url.'" , "'.$desc.'" , "'.$prio.'" , "'.$mail.'" , "'.$etat.'" ,  "'.$temps.'" ) ') or die(mysql_error());
				$msg.='<br/><span style="color:green">Votre demande a été enregistrée et elle sera traité dans les brefs délais</span>';
			}
		}
	}
?>
<!DOCTYPE html>
<title>Mozilla Tunisia | Membre</title>
<head>
<meta http-equiv="Content-Language" content="fr,en" />
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr">
<link rel="stylesheet" href="../styles/elegant-press.css" type="text/css" />
<script src="../scripts/elegant-press.js" type="text/javascript"></script>
<!--[if IE]><style>#header h1 a:hover{font-size:75px;}</style><![endif]-->

<link href="../tab/css/tabzilla.css" rel="stylesheet" />
<script src="../tab/js/tabzilla.js"></script>
<style>
.alert-info{
    color: #3A87AD;
	background-color: #D9EDF7;
    border-color: #BCE8F1;
	border-radius: 4px 4px 4px 4px;
    margin-bottom: 18px;
    padding: 8px 35px 8px 14px;
    text-shadow: 0 1px 0 rgba(255, 255, 255, 0.5);
}
.well {
    background-color: #F5F5F5;
    border: 1px solid #EEEEEE;
    border-radius: 10px 10px 10px 10px;
    margin-bottom: 20px;
    min-height: 20px;
    padding: 19px;
}
</style>
</head>
<body>
<a href="http://www.mozilla.org/" id="tabzilla">mozilla</a>
<div class="main-container">
  <header>
    <h1><a href="../index.php">Mozilla Tunisia</a></h1>
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
	  <li><a href="../events/">Events</a></li>
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
      <li><a href="../index.php">Home</a></li>
      <li>&#187;</li>
      <li class="current"><a href="../404/bug.php">Signaler un bug</a></li>
    </ul>
</div>
<br />
<br />
 
       <div id="gallery" class="box" style="background-color: #FFFFFF;">
	   <h2 class="tit">Signaler un bug</h2>
      <hr size="3" /><br />
	 
	<form method="get" action="bug.php">		
	<input type="hidden" name="envoi" value="yes">
	<div class="alert-info" style="width:65%; margin : 10px auto auto auto; "> Si vous n'êtes pas connecté sur votre compte au moment où vous envoyez le rapport, les administrateurs sont dans l'impossibilité de vous contacter, à moins de fournir une adresse email ou le nom de votre compte (si vous êtes inscrit). </div>
		<table style="width:70%; margin : 10px auto auto auto; " class="well">
			<tr>
				<td colspan="2" style="text-align:left;color:#A3443E;">
					<span style="margin-left:60px; font-size:14px;"><?php echo $msg; ?></span>
				</td>
			</tr>
	<?php	if (!isset($_SESSION['pseudo']))
			{?>
				<tr>
					<td style="width:20%;">E-Mail : </td>
					<td><input type="text" class="input-text big" placeholder="Pour vous informez lors de résolution du problème" name="mail" value=""/></td>                                                                       
				</tr>
	<?php   }?>
			<tr>
				<td style="width:20%;">Adresse : </td>
				<td><input type="text" class="input-text big" placeholder="Adresse de la page où s'est produit le problème" name="url" value=""/></td>                                                                       
			</tr>
			<tr>
				<td style="width:20%;">Titre : </td>
				<td><input type="text" class="input-text big" placeholder="Donnez un titre au bug" name="titre" value=""/></td>                                                                       
			</tr>
			<tr>
				<td>Description :</td>
				<td><textarea class="input-text big" placeholder=" Décrivez précisément votre problème et essayez de préciser comment peut on le reproduire. Si vous ne savez pas le reproduire, dites-le, mais il est probable qu'on ne puisse rien faire pour votre bug." name="desc" rows="3"></textarea></td>
			</tr>
			<tr>
				<td>Priorité :</td>
				<td>
					<select id="priorite" name="prio" style="width:100px;">				
						<option selected="selected" value="0"> Basse </option>
						<option value="1"> Normal </option>
						<option value="2"> Haute </option>
						<option value="3"> Critique </option>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="2" style="text-align:center;">
					<input type="hidden" value="" name="bot">
					<input type="submit" value="Envoyer">
					<input type="reset" value="Annuler">
				</td>
			</tr>
		</table>		
    </form>	
						
      <br class="clear" />
	  <div align="center">	  
	  </div>
    </div>  
 
 </div>
<div class="main-container">
 </div>
 <div style="position:fixed;left:30px;top:90%;" title="Clickez pour signaler un problème">
<a href="bug.php"><img src="../images/bug.png" alt="Logo" /></a>
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
