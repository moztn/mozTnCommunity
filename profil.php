<?php
session_start();
include("scripts/identifiants.php");
?>
<!DOCTYPE html>
<title>Mozilla Tunisia | Membre</title>
<head>
<meta http-equiv="Content-Language" content="fr,en" />
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr">
<link rel="stylesheet" href="styles/elegant-press.css" type="text/css" />
<link rel="stylesheet" href="styles/elegant-press.css" type="text/css" />
<script src="scripts/elegant-press.js" type="text/javascript"></script>
<script src="scripts/verifinscri.js" type="text/javascript"></script>
<!--[if IE]><style>#header h1 a:hover{font-size:75px;}</style><![endif]-->

<link href="tab/css/tabzilla.css" rel="stylesheet" />
<script src="tab/js/tabzilla.js"></script>
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
	<a href="connexion.php">Sign In</a> or <a href="register.php">Join</a>
	<?php } ?> 
</div>
<div class="main-container">
  <div id="sub-headline">    
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
      <li class="last"><a href="contact.php">Contact</a></li>
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
		<?php
		$requete2 = mysql_query('SELECT * FROM event WHERE iduser='.$membre);
      if (mysql_num_rows($requete2) < 1)
	   {
			echo'<h6>Pas D\'événement</h6>';
	   }
	   else
	   {
		 while ($data2 = mysql_fetch_assoc($requete2))
        {
			echo'<p class="profile-item"><strong class="white radius label">Nom Event :</strong><a href="'.stripslashes(htmlspecialchars($data2['lien'])).'">'.stripslashes(htmlspecialchars($data2['nomeve'])).'</a></p>';
			echo'<p class="profile-item"><strong class="white radius label">Description De L\'Event :</strong> <br />'.stripslashes(nl2br($data2['desc'])).' </p><hr size="3">';
		}
	   }
	   
	   ?>
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
 
 <footer>
  <table>
	<tr>
	<td><img src="images/logo.png" alt="Logo" /></td>
    <td><p class="tagline_left">Copyright &copy; 2012 - All Rights Reserved - <a href="http://mozilla-tunisia.org">Mozilla Tunisia</a></p></td>
	</tr>
	</table>    
    <br class="clear" />
  </footer>

<br />
<br />
    </body>
</html>
