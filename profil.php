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
<script src="scripts/elegant-press.js" type="text/javascript"></script>
<script src="scripts/verifinscri.js" type="text/javascript"></script>
<!--[if IE]><style>#header h1 a:hover{font-size:75px;}</style><![endif]-->
<link rel="stylesheet" href="styles/jquery.ui.all.css">
	<script src="scripts/jquery-1.7.2.js"></script>
	<script src="scripts/jquery.ui.core.js"></script>
	<script src="scripts/jquery.ui.widget.js"></script>
	<script src="scripts/jquery.ui.accordion.js"></script>
	<link rel="stylesheet" href="styles/demos.css">
<link href="tab/css/tabzilla.css" rel="stylesheet" />
<script src="tab/js/tabzilla.js"></script>
<script>
	$(function() {
		$( "#accordion" ).accordion({
			collapsible: true
		});
	});
	</script>
</head>
<body onLoad="create_champ();">
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
{
?>	
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
	   
      
	<?php
		$membre = (int) $_GET['m'];
		$requete1 = mysql_query('SELECT * FROM users WHERE id='.$membre);
       if ($data1 = mysql_fetch_assoc($requete1))
       {
       //On affiche les infos sur le membre
 
       echo'<h4 class="tit">Profil de '.stripslashes(htmlspecialchars($data1['pseudo'])).'</h4><hr size="3" /><br />';
       
       
       
	   ?>
	   <table style="width:100%;">
	   <tr>
		<td style="width:50%; vertical-align:top; padding-top: 0px;">
		<div class="profildroit" style="padding-top: 10px; padding-bottom: 5px; margin-top: 5px;">
		<h6 align="center" style="font-size:14px;"><strong>Information Du Compte</strong></h6>
		<?php
			echo'<p class="profile-item"><strong class="white radius label">Nom d\'utilisateur :</strong>  '.stripslashes(htmlspecialchars($data1['pseudo'])).'</p>';
	   
			echo'<p class="profile-item"><strong class="white radius label">Date d\'inscription : </strong>'.date('d/m/Y',$data1['dateinscri']).'</p>';
			echo'<p class="profile-item"><strong class="white radius label">Derniere Visite : </strong>'.date('d/m/Y',$data1['dervisit']).'</p>';
		?>	
			</div>
			<div class="profildroit" >
			<h6 align="center" style="font-size:14px;"><strong>Reseaux</strong></h6>
			<?php
			echo'<p class="profile-item"><strong class="white radius label">Twitter handle :</strong>  <a href="'.stripslashes(htmlspecialchars($data1['twitter'])).'">'.stripslashes(htmlspecialchars($data1['twitter'])).'</a> </p>';
			echo'<p class="profile-item"><strong class="white radius label">Facebook :</strong> <a href="'.stripslashes(htmlspecialchars($data1['fb'])).'">'.stripslashes(htmlspecialchars($data1['fb'])).'</a></p>';
			echo'<p class="profile-item"><strong class="white radius label">Pseudo IRC :</strong> '.stripslashes(htmlspecialchars($data1['irc'])).' </p>';
			echo'<p class="profile-item"><strong class="white radius label">LinkedIn :</strong> <a href="'.stripslashes(htmlspecialchars($data1['linkedin'])).'">'.stripslashes(htmlspecialchars($data1['linkedin'])).'</a> </p>';
			echo'<p class="profile-item"><strong class="white radius label">Diaspora :</strong> <a href="'.stripslashes(htmlspecialchars($data1['diaspora'])).'">'.stripslashes(htmlspecialchars($data1['diaspora'])).'</a> </p>';
			echo'<p class="profile-item"><strong class="white radius label">Flickr :</strong> <a href="'.stripslashes(htmlspecialchars($data1['flickr'])).'">'.stripslashes(htmlspecialchars($data1['flickr'])).'</a> </p>';
			echo'<p class="profile-item"><strong class="white radius label">Wiki :</strong> <a href="'.stripslashes(htmlspecialchars($data1['wiki'])).'">'.stripslashes(htmlspecialchars($data1['wiki'])).'</a> </p>';
			
	   ?>
			</div>
			<div class="profildroit" >
	   
	   <?php
	   
	   echo'<p class="profile-item"><strong class="white radius label">A propos de vous : </strong><br />'.stripslashes(nl2br($data1['propos'])).'</p>';
	   
	   
	   ?>
	   </div>
		 <div class="profildroit" >
		<h6 align="center" style="font-size:14px;"><strong>Intérets</strong></h6>
		<?php
		$requete2 = mysql_query('SELECT * FROM interet WHERE iduser='.$membre.' ORDER BY id');
      if (mysql_num_rows($requete2) < 1)
	   {
			echo'<h6>Aucun Interet</h6>';
	   }
	   else
	   {
		echo '<p class="profile-item"><strong class="white radius label">Vos Intérets :</strong>';
		 while ($data2 = mysql_fetch_assoc($requete2))
        {
			echo'<a style="font-size:12px" href="interet/index.php?i='.stripslashes(htmlspecialchars($data2['nomint'])).'"> '.stripslashes(htmlspecialchars($data2['nomint'])).' </a> , ';			
		
		}
		echo '</p>';
	   }
	   
	   ?>
		
	</div>
		
		</td>
		
		
	   
	   <td style="width:50%; vertical-align:top;">
	   
	   <?php
	   if(!empty($data1['avatar']))
		echo'<p align="right" style="margin-right: 60%;"><a href="./images/avatars/'.$data1['avatar'].'"><img src="./images/avatars/'.$data1['avatar'].'" alt="Ce membre n\'a pas d\'avatar" style="width:150px;height:150px" /></a></p>';
		else
		echo'<p align="right" style="margin-right: 60%;"><a href="./images/avatars/pasimage.jpg"><img src="./images/avatars/pasimage.jpg" alt="Ce membre n\'a pas d\'avatar" style="width:150px;height:150px" /></a></p>';
		?>
	   
		   <div class="profildroit">
			<h6 align="center" style="font-size:14px;"><strong>Information Personelle</strong></h6>
	   <?php
	   
		
		echo'<p class="profile-item"><strong class="white radius label">Prenom :</strong>  '.stripslashes(htmlspecialchars($data1['prenom'])).'</p>';
		echo'<p class="profile-item"><strong class="white radius label">Nom :</strong>  '.stripslashes(htmlspecialchars($data1['nom'])).'</p>';
		echo'<p class="profile-item"><strong class="white radius label">Date de naissance :</strong>  '.stripslashes(htmlspecialchars($data1['datenais'])).'</p>';
		echo'<p class="profile-item"><strong class="white radius label">Sexe :</strong>  ';
		if($data1['sexe']=="M")
			echo'Male</p>';
		else
			echo'Femelle</p>';
		?>
		</div>
		<div class="profildroit" >
		<h6 align="center" style="font-size:14px;"><strong>Contact</strong></h6>
		<?php
		echo'<p class="profile-item"><strong class="white radius label">Adresse E-Mail : </strong>
		<a href="mailto:'.stripslashes($data1['email']).'">
		'.stripslashes(htmlspecialchars($data1['email'])).'</a></p>';	
		echo'<p class="profile-item"><strong class="white radius label">Numéro de téléphone :</strong> '.stripslashes(htmlspecialchars($data1['tel'])).' </p>';
		echo'<p class="profile-item"><strong class="white radius label">Adresse :</strong> '.stripslashes(htmlspecialchars($data1['adresse'])).' </p>';
		echo'<p class="profile-item"><strong class="white radius label">Site Personel :</strong> <a href="'.stripslashes(htmlspecialchars($data1['site'])).'">'.stripslashes(htmlspecialchars($data1['site'])).'</a>  </p>';
       
	   }
	?>
      
	</div>
	<div class="profildroit" >
		<h6 align="center" style="font-size:14px;"><strong>Events</strong></h6>
		<div class="demo">
		
		<?php
		$requete2 = mysql_query('SELECT * FROM eventuser WHERE iduser='.$membre.' ORDER BY idevent');
      if (mysql_num_rows($requete2) < 1)
	   {
			echo'<h6>Pas D\'événement</h6>';
	   }
	   else
	   {
	   echo'<div id="accordion">';
	   $old = -1;
	   $cmp=0;
		 while ($data2 = mysql_fetch_assoc($requete2))
        {
			$requete3 = mysql_query('SELECT * FROM event WHERE id='.stripslashes(htmlspecialchars($data2['idevent'])).' ORDER BY datedeb');
			
			while ($data3 = mysql_fetch_assoc($requete3))
        {
		
			$mois[1] = "Janv";  
			$mois[2] = "Févr";  
			$mois[3] = "Mars";  
			$mois[4] = "Avri";  
			$mois[5] = "Mai ";  
			$mois[6] = "Juin";  
			$mois[7] = "Juil";  
			$mois[8] = "Aout";  
			$mois[9] = "Sept";  
			$mois[10] = "Octo";  
			$mois[11] = "Nove";  
			$mois[12] = "Déce"; 
			$date = $data3['datedeb'];
			
			$moisfr = $mois[intval(date('m',$data3['datedeb']))]; 
			
			if(date('Y',$data3['datedeb'])!=$old)
			{				
				if($cmp==0)
				{
					echo '<h6><a href="#">'.date('Y',$data3['datedeb']).'</a></h6><div>';
					$cmp++;
				}
				else
					echo '</div><h6><a href="#">'.date('Y',$data3['datedeb']).'</a></h6><div>';
				$old=date('Y',$data3['datedeb']);
			}
			echo'<p class="profile-item"><strong class="white radius label">Nom Event :</strong><a style="font-size:12px" href="events/detailsevent.php?e='.stripslashes(htmlspecialchars($data3['id'])).'">'.stripslashes(htmlspecialchars($data3['nomeve'])).' ('.date('d',$data3['datedeb']).' '.$moisfr.' '.date('Y',$data3['datedeb']).')</a></p>';			
		}
		}
	   }
	   
	   ?>
	   </div>
	   
	   </div>
	   
	</td>
	
       </tr>
	   </table>
	<?php
	  if($membre == (int)$_SESSION['id'])
	  {
		echo '<input style="margin-left:85%" name="submit" type="submit" id="submit" value="Edit Profil" onClick="window.location.replace(\'edit.php?m='.$_SESSION['id'].'\');"/>';
		}
	?>
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
