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
<script src="scripts/jquery-1.7.2.js" type="text/javascript"></script>
<script type="text/javascript">
 
$(document).ready(function(){ // Quand le document est complètement chargé
 
	var load = false; // aucun chargement de commentaire n'est en cours
 
	/* la fonction offset permet de récupérer la valeur X et Y d'un élément
	dans une page. Ici on récupère la position du dernier div qui 
	a pour classe : ".commentaire" */
	var offset = $('.commentaire:last').offset(); 
 
	$(window).scroll(function(){ // On surveille l'évènement scroll
 
		/* Si l'élément offset est en bas de scroll, si aucun chargement 
		n'est en cours, si le nombre de commentaire affiché est supérieur 
		à 5 et si tout les commentaires ne sont pas affichés, alors on 
		lance la fonction. */
		if((offset.top-$(window).height() <= $(window).scrollTop()) 
		&& load==false && ($('.commentaire').size()>=3) && 
		($('.commentaire').size()!=$('.nb_com').text())){
 
			// la valeur passe à vrai, on va charger
			load = true;
 
			//On récupère l'id du dernier commentaire affiché
			var last_id = $('.commentaire:last').attr('id');
 
			//On affiche un loader
			$('.loadmore').show();
 
			//On lance la fonction ajax
			$.ajax({
				url: 'scripts/loadcontent.php',
				type: 'get',
				data: 'last='+last_id,
 
				//Succès de la requête
				success: function(data) {
 
					//On masque le loader
					$('.loadmore').fadeOut(500);
					/* On affiche le résultat après
					le dernier commentaire */
					$('.commentaire:last').after(data);
					/* On actualise la valeur offset
					du dernier commentaire */
					offset = $('.commentaire:last').offset();
					//On remet la valeur à faux car c'est fini
					load = false;
				}
			});
		}
 
 
	});
 
});
 
</script>
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
 <?php   
	//A partir d'ici, on va compter le nombre de members
//pour n'afficher que les 25 premiers
$requete1 = mysql_query("SELECT COUNT(*) AS nbr FROM users where rang>1");
$data1 = mysql_fetch_assoc($requete1);

$total = $data1['nbr'] +1;

?>
       <div id="gallery" class="box">
	   <h2 class="tit">Liste des membres</h2>
      <hr size="3" /><br />
	  <div class="cont_com">
	   <?php
//Requête

$requete2 = mysql_query('SELECT id, pseudo, nom, prenom, rang, avatar FROM users where rang>1 ORDER BY prenom LIMIT 0, 30')
or die (mysql_error());

if (mysql_num_rows($requete2) > 0)
{
?>
      <ul>
	  <?php
       //On lance la boucle
       while ($data2 = mysql_fetch_assoc($requete2))
       {
		   
       echo '<div class="commentaire" id="'.$data2['prenom'].'">
        <li><a href="./profil.php?m='.$data2['id'].'">
			<div class="panel grid-profile">
				<div class="row">
					<div class="three phone-one columns grid-profile-image">
						<img  class="profiles-people-avatar" src="./images/avatars/'.$data2['avatar'].'" alt="Ce membre n\'a pas d\'avatar" />
						</div>
						<div class="grid-profile-text">
						<h6>Prenom : '.stripslashes(htmlspecialchars($data2['prenom'])).'</h6>
						<h6>Nom : '.stripslashes(htmlspecialchars($data2['nom'])).'</h6>
						Pseudo : '.stripslashes(htmlspecialchars($data2['pseudo'])).'
					</div>
				</div>
			</div>
		</li></a>
        </div>';
		}
		?>
        <!--<li><a href="images/slide1.jpg" title="Image 1"><img src="images/featured1.jpg" alt="" /></a></li>
        <li><a href="images/slide2.jpg" title="Image 2"><img src="images/featured2.jpg" alt="" /></a></li>
        <li><a href="images/slide3.jpg" title="Image 3"><img src="images/featured3.jpg" alt="" /></a></li>
        <li><a href="images/slide1.jpg" title="Image 1"><img src="images/featured1.jpg" alt="" /></a></li>
        <li><a href="images/slide2.jpg" title="Image 2"><img src="images/featured2.jpg" alt="" /></a></li>
        <li><a href="images/slide3.jpg" title="Image 3"><img src="images/featured3.jpg" alt="" /></a></li>
		<li><a href="images/slide3.jpg" title="Image 3"><img src="images/featured3.jpg" alt="" /></a></li>-->
      </ul>
	  <?php } ?>
	  <br/>
	  
	  </div>
	  
      <br class="clear" />
	  <div class="loadmore" align="center">
		<br/><img src="images/ajax-loader.gif" />Chargement en cours...
	  </div>
	  <div align="center">
	  <?php echo"<h6 style=\"font-size:14px\">Nous avons "; echo $total-1; echo " membre(s)</h6>"; ?>
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
