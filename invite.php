<?php
session_start();
include("scripts/identifiants.php");
$nbr_non_vus = mysql_query("SELECT COUNT(*) AS nbre FROM mp WHERE destinataire='".$_SESSION['pseudo']."' AND vu='0' AND (efface='0' OR efface='2')")or die(mysql_error());
$nbre_non_vus = mysql_fetch_assoc($nbr_non_vus);

	$msg = '';
	$envoi = $_GET['envoi'];                
    $mail = $_GET['mail'];      
	$desc = $_GET['desc']; 
	$bot = $_GET['bot']; 
	$etat=0;
	$temps = time(); 
	
	if ($envoi == 'yes')
	{
		if($bot!="")
		{
			$msg+="<br/>Les bot ne sont pas autorisé à envoyer une invitation";
		}
		else
		{
			
			if(empty($mail))
			{
				$msg.='<br/>Veuillez saisir votre Mail';
			}				
			if(empty($desc))
			{
				$msg.='<br/>Veuillez saisir un message personnel';
			}						
			if($msg=='')
			{
				$code = md5(rand(1, 99999999));
				mysql_query('INSERT INTO users (code,email) VALUES ("'.$code.'" , "'.$mail.'") ') or die(mysql_error());
				$requete1 = mysql_query('SELECT * FROM users WHERE pseudo = "'.$_SESSION['pseudo'].'"') or die (mysql_error());
				$data1 = mysql_fetch_assoc($requete1);
				$message = 'Salut '.stripslashes(htmlspecialchars($_SESSION['prenom'])).' '.stripslashes(htmlspecialchars($_SESSION['nom'])).' ( '.$data1['email'].' )
				vous a invité à rejoindre la communauté Mozilla Tunisia et il a vous a envoyer le message suivant : <br/>
				
				<strong>Message personnel :</strong><br/>'.$desc.'<br/>
				
				Rejoindre Mozillians:  http://reps.mozilla-tunisia.org/register.php?code='.$code.'&mail='.$mail.' <br/>											
				
				Pour toute question veuillez nous contacter à contact@mozilla-tunisia.org
				
				Si jamais vous ne souhaitez pas nous rejoindre, veuillez nous envoyez un mail à contact@mozilla-tunisia.org en disant de supprimer l\'invitation.
				Merci
				---------------------------------------------
				Mozilla Tunisia 
				---------------------------------------------';
				$objet = "Invitation à rejoindre Mozilla Tunisia";

				$from = "From: MozillaTunisia <hajjejfiras@gmail.com>\n";
				mail($email,$objet,$message,$from);
								
				$msg.='<br/><span style="color:green">Invitation envoyée !<br/>'
				.$mail. 'a été invité à faire partie des Mozilliens. Ce mozillien recevra un courriel avec les instructions pour rejoindre le site. Vous pouvez inviter d\'autres Mozilliens si vous le souhaitez.</span>';
				
			}
		}
	}
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
      <li class="active"><a href="membre.php">Membre</a></li>      
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
      <li class="current"><a href="membre.php">Membre</a></li>
    </ul>
</div>
<br />
<br />
 
 
       <div id="gallery" class="box">
	   <h2 class="tit">Inviter des Mozilliens</h2>
      <hr size="3" /><br />
	  <?php
	  if (isset($_SESSION['pseudo'])) // Si le membre est connecté
{ 
?>
	  <h6>Si vous désirez inviter des Mozilliens à créer leur propre profil, saisissez leur adresse électronique ici : </h6>
	<form method="get" action="invite.php">		
	<input type="hidden" name="envoi" value="yes">
	<table style="width:50%; margin-left:8%;" class="well">
		<tr>
			<td colspan="2" style="text-align:left;color:#A3443E;">
				<span style="margin-left:60px; font-size:14px;"><?php echo $msg; ?></span>
			</td>
		</tr>
		<tr>
			<td style="width:20%;">Recipient : </td>
			<td><input type="text" class="input-text big" placeholder="Saisissez l'adresse E-mail de la personne à invité" name="mail" value=""/></td>
		</tr>
		<tr>
			<td>Message : </td>
			<td><textarea class="input-text big" placeholder="Envoyer un message personnel à la personne desirant l'invité." name="desc" rows="3"></textarea></td>
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
	<h6><strong>Note : votre nom et votre adresse de courriel seront communiqués à ceux que vous invitez.</strong></h6>
	<?php 
}
else
{?>	
	<h6>Vous devez etre connecté pour pouvoir invité des Mozilliens à rejoindre Mozilla Tunisia. Ciquez <a href="connexion.php">Sign In</a> pour vous connectez.</h6>
	<?php } ?> 


      <br class="clear" />
	  
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
