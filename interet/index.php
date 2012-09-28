<?php
session_start();
include("../scripts/identifiants.php");
$nbr_non_vus = mysql_query("SELECT COUNT(*) AS nbre FROM mp WHERE destinataire='".$_SESSION['pseudo']."' AND vu='0' AND (efface='0' OR efface='2')")or die(mysql_error());
$nbre_non_vus = mysql_fetch_assoc($nbr_non_vus);
?>
<!DOCTYPE html>
<title>Mozilla Tunisia | Membre</title>
<head>
<meta http-equiv="Content-Language" content="fr,en" />
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr">
<link rel="stylesheet" href="../styles/elegant-press.css" type="text/css" />
<link rel="stylesheet" href="../styles/elegant-press.css" type="text/css" />
<script src="../scripts/elegant-press.js" type="text/javascript"></script>
<!--[if IE]><style>#header h1 a:hover{font-size:75px;}</style><![endif]-->

<link href="../tab/css/tabzilla.css" rel="stylesheet" />
<script src="../tab/js/tabzilla.js"></script>
</head>
<body>
<a href="http://www.mozilla.org/" id="tabzilla">mozilla</a>
<div class="main-container">
  <header>
    <h1><a href="../">Mozilla Tunisia</a></h1>
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
      <li><a href="../">Home</a></li>
      <li>&#187;</li>
      <li class="current"><a href="../membre.php">Membre</a></li>
    </ul>
</div>
<br />
<br />
 <?php   
	//A partir d'ici, on va compter le nombre de members
//pour n'afficher que les 25 premiers

$inter = $_GET['i'];
$requete1 = mysql_query('SELECT COUNT(*) AS nbr FROM interet where nomint=\''.$inter.'\'');
$data1 = mysql_fetch_assoc($requete1);

$total = $data1['nbr'];

?>
       <div id="gallery" class="box">
	   <h2 class="tit">Liste des membres Par Interet</h2>
      <hr size="3" /><br />
	  
	  
	  <?php
		$requete2 = mysql_query('SELECT * FROM interet WHERE nomint=\''.$inter.'\'');
      if (mysql_num_rows($requete2) < 1)
	   {
			echo'<h6>Aucun membre n\'appartient à ce groupe d\'interet.</h6>';
	   }
	   else
	   {	  	  
		 while ($data2 = mysql_fetch_assoc($requete2))
        {
			$requete3 = mysql_query('SELECT * FROM users WHERE id='.stripslashes(htmlspecialchars($data2['iduser'])).' ORDER BY pseudo');
			?><ul><?php
			while ($data3 = mysql_fetch_assoc($requete3))
        {
		
			echo '
        <li><a href="../profil.php?m='.$data3['id'].'">
			<div class="panel grid-profile">
				<div class="row">
					<div class="three phone-one columns grid-profile-image">
						<img  class="profiles-people-avatar" src="../images/avatars/'.$data3['avatar'].'" alt="Ce membre n\'a pas d\'avatar" />
						</div>
						<div class="grid-profile-text">
						<h6>Prenom : '.stripslashes(htmlspecialchars($data3['prenom'])).'</h6>
						<h6>Nom : '.stripslashes(htmlspecialchars($data3['nom'])).'</h6>
						Pseudo : '.stripslashes(htmlspecialchars($data3['pseudo'])).'
					</div>
				</div>
			</div>
		</li></a>
        ';
		
		
		}
		?>        
      </ul>
	  <?php
		}
	   }
	   
	    ?>
      <br class="clear" />
	  <div align="center">
	  <?php echo"<h6 style=\"font-size:14px\">Nous avons "; echo $total; echo " membre(s)</h6>"; ?>
	  </div>
    </div>  
 
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
