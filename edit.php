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
	<script src="scripts/jquery.ui.datepicker.js"></script>
	<link rel="stylesheet" href="styles/demos.css">
	<script>
	$(function() {
		$( "#datepicker" ).datepicker({ minDate: "-90Y", maxDate: "-10Y" });
	});
	</script>
	<link rel="stylesheet" href="interet/colorbox/colorbox.css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script src="interet/colorbox/jquery.colorbox.js"></script>
	<script>
			$(document).ready(function(){
				//Examples of how to assign the ColorBox event to elements
				$(".group1").colorbox({rel:'group1'});
				$(".group2").colorbox({rel:'group2', transition:"fade"});
				$(".group3").colorbox({rel:'group3', transition:"none", width:"75%", height:"75%"});
				$(".group4").colorbox({rel:'group4', slideshow:true});
				$(".ajax").colorbox();
				$(".youtube").colorbox({iframe:true, innerWidth:425, innerHeight:344});
				$(".iframe").colorbox({iframe:true, width:"70%", height:"100%"});
				$(".inline").colorbox({inline:true, width:"50%"});
				$(".callbacks").colorbox({
					onOpen:function(){ alert('onOpen: colorbox is about to open'); },
					onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
					onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
					onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
					onClosed:function(){ alert('onClosed: colorbox has completely closed'); }
				});
				
				//Example of preserving a JavaScript event for inline calls.
				$("#click").click(function(){ 
					$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
					return false;
				});
			});
		</script>
		
		
	<script type="text/javascript" src="scripts/jquery.popin.js"></script>
	
	
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


if (isset($_SESSION['pseudo'])) // Si le membre est connect�
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
    <ul>
      <li class="active"><a href="index.php">Home</a></li>
      <li><a href="membre.php">Membre</a></li>      
      <!--<li><a href="portfolio.html">Portfolio</a></li>
      <li><a href="gallery.html">Gallery</a></li>-->
	  <li><a href="./events/">Events</a></li>
	  <li><a href="./calendar/all">Calendrier</a></li>
      <li class="last"><a href="contact.php">Contact</a></li>    
	  <?php if (isset($_SESSION['pseudo'])) // Si le membre est connect�
{ ?>
	  <li><a href="./mp.php">Messages(<?php echo $nbre_non_vus['nbre'];?>)</a>
        <ul>
          <li><a href="./mp.php">Boite de r�ception</a>          
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
 <form action='editprofil.php' method='post' enctype='multipart/form-data'>
       <div id="gallery" class="box">
	   
      
	<?php
		$membre = (int) $_GET['m'];
		if($membre == (int)$_SESSION['id'])
		{
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
			echo'<p class="profile-item"><strong class="white radius label">Nom d\'utilisateur :</strong> '.stripslashes(htmlspecialchars($data1['pseudo'])).'</p>';			
			echo'<p class="profile-item"><strong class="white radius label">Nouveau mot de Passe :</strong><input style="width:55%" name="password" type="password" id="password" value="" class="input-text big"/></p>';
            echo'<p class="profile-item"><strong class="white radius label">Confirmer le mot de passe :</strong><input style="width:50%" name="confirm" type="password" id="confirm" value="" class="input-text big"/></p>';
			echo'<p class="profile-item"><strong class="white radius label">Date d\'inscription : </strong>'.date('d/m/Y',$data1['dateinscri']).'</p>';
			echo'<p class="profile-item"><strong class="white radius label">Derniere Visite : </strong>'.date('d/m/Y',$data1['dervisit']).'</p>';
		?>	
			</div>
			<div class="profildroit" >
			<h6 align="center" style="font-size:14px;"><strong>Reseaux</strong></h6>
			<?php
			echo'<p class="profile-item"><strong class="white radius label">Twitter handle :</strong><input style="width:65%" tabindex="1" name="twitter" id="twitter" value="'.stripslashes(htmlspecialchars($data1['twitter'])).'" type="text" onblur="verifpseudo(this)" class="input-text big"/>  </p>';
			echo'<p class="profile-item"><strong class="white radius label">Facebook :</strong><input style="width:73%" tabindex="1" name="fb" id="fb" value="'.stripslashes(htmlspecialchars($data1['fb'])).'" type="text" onblur="verifpseudo(this)" class="input-text big"/>  </p>';
			echo'<p class="profile-item"><strong class="white radius label">Pseudo IRC :</strong><input style="width:70%" tabindex="1" name="irc" id="irc" value="'.stripslashes(htmlspecialchars($data1['irc'])).'" type="text" onblur="verifpseudo(this)" class="input-text big"/>  </p>';
			echo'<p class="profile-item"><strong class="white radius label">LinkedIn :</strong><input style="width:74%" tabindex="1" name="linkedin" id="linkedin" value="'.stripslashes(htmlspecialchars($data1['linkedin'])).'" type="text" onblur="verifpseudo(this)" class="input-text big"/>  </p>';
			echo'<p class="profile-item"><strong class="white radius label">Diaspora :</strong><input style="width:73%" tabindex="1" name="diaspora" id="diaspora" value="'.stripslashes(htmlspecialchars($data1['diaspora'])).'" type="text" onblur="verifpseudo(this)" class="input-text big"/>  </p>';
			echo'<p class="profile-item"><strong class="white radius label">Flickr :</strong><input style="width:77%" tabindex="1" name="flickr" id="flickr" value="'.stripslashes(htmlspecialchars($data1['flickr'])).'" type="text" onblur="verifpseudo(this)" class="input-text big"/>  </p>';
			echo'<p class="profile-item"><strong class="white radius label">Wiki :</strong><input style="width:78%" tabindex="1" name="wiki" id="wiki" value="'.stripslashes(htmlspecialchars($data1['wiki'])).'" type="text" onblur="verifpseudo(this)" class="input-text big"/>  </p>';
			
	   ?>
			</div>
			<div class="profildroit" >
	   
	   <?php
	   
	   echo'<p class="profile-item"><strong class="white radius label">A propos de vous : </strong><br /><textarea name="propos" id="propos" rows="auto" style="width:100%" class="input-text big">'.stripslashes(htmlspecialchars($data1['propos'])).'</textarea></p>';
	     
	   ?>
	   </div>	
		</td>
	   <td style="width:50%; vertical-align:top;">
	   <div class="profildroit" style="padding-top: 10px; padding-bottom: 5px; margin-top: 5px;">
          Changer votre avatar :
          <input type="file" name="avatar" id="avatar" />
          <br />
          Avatar actuel :
          
          <br /><br />
          
       
	   <?php
		echo'<p align="right" style="margin-right: 60%;"><a href="./images/avatars/'.$data1['avatar'].'"><img src="./images/avatars/'.$data1['avatar'].'" alt="Ce membre n\'a pas d\'avatar" style="width:150px;height:150px" /></a></p>';
		?>
	    <input type="checkbox" name="delete" id="delete" value="Delete" />
          Supprimer l'avatar
		  </div>
		   <div class="profildroit">
			<h6 align="center" style="font-size:14px;"><strong>Information Personelle</strong></h6>
	   <?php
	   
		
		echo'<p class="profile-item"><strong class="white radius label">Prenom :</strong><input tabindex="3" style="width:78%" name="prenom" id="username3" size="25" value="'.stripslashes(htmlspecialchars($data1['prenom'])).'" title="Pr�nom" type="text" onblur="verifnom(this)" class="input-text big" /></p>';
		echo'<p class="profile-item"><strong class="white radius label">Nom :</strong><input tabindex="2" style="width:83%" name="nom" id="username2" size="25" value="'.stripslashes(htmlspecialchars($data1['nom'])).'" title="Nom" type="text" onblur="verifnom(this)" class="input-text big" />  </p>';
		?>
		


		<?php
		echo'<p class="profile-item"><strong class="white radius label">Date de naissance :</strong> <input value="'.stripslashes(htmlspecialchars($data1['datenais'])).'" name="annee" type="text" id="datepicker" size="5" style="width:60%" class="input-text big"/></p>';
		echo'<p class="profile-item"><strong class="white radius label">Sexe :</strong>  ';
		
		if($data1['sexe']=="M")
		{?>
			<select name="sexe" id="sex">                
                <option selected="selected">M</option>
                <option>F</option>
              </select>
			  <?php
		}
		else
		{?>
			<select name="sexe" id="sex">                
                <option>M</option>
                <option selected="selected">F</option>
              </select>
			  <?php
		}
		?>
		</div>
		<div class="profildroit" >
		<h6 align="center" style="font-size:14px;"><strong>Contact</strong></h6>
		<?php
		echo'<p class="profile-item"><strong class="white radius label">Adresse E-Mail : </strong><input style="width:65%" name="email" id="email2" maxlength="100" value="'.stripslashes(htmlspecialchars($data1['email'])).'" title="Adresse e-mail" type="text" onblur="verifmail(this)" class="input-text big"/></p>';	
		echo'<p class="profile-item"><strong class="white radius label">Num�ro de t�l�phone :</strong> <input style="width:55%" name="tel" id="tel" maxlength="100" value="'.stripslashes(htmlspecialchars($data1['tel'])).'" title="Adresse e-mail" type="text" onblur="verifvide(this)" class="input-text big"/> </p>';
		echo'<p class="profile-item"><strong class="white radius label">Adresse :</strong> <textarea name="adresse" id="adresse" rows="2" style="width:100%" class="input-text big">'.stripslashes(htmlspecialchars($data1['adresse'])).'</textarea> </p>';
		echo'<p class="profile-item"><strong class="white radius label">Site Personel :</strong> <input style="width:70%" name="site" id="site" value="'.stripslashes(htmlspecialchars($data1['site'])).'" title="Adresse e-mail" type="text" onblur="verifvide(this)" class="input-text big"/> </p>';
       
	   }
	   
	?>
	</div>
      <div class="profildroit" >
	<h6 align="center" style="font-size:14px;"><strong>Int�rets</strong></h6>		
		<p><a class='iframe' href="interet/add.php">Modifier vos Int�r�t</a></p>
	</div>
	</td>
	
       </tr>
	   
	   </table>
	   
	<?php
	  if($membre == (int)$_SESSION['id'])
{
		echo '<table style="margin-left:70%; width:150px"><tr><td><input style="margin-left:85%" name="submit" type="button" class="cancel" id="submit" value="Cancel" onClick="window.location.replace(\'profil.php?m='.$_SESSION['id'].'\');" />';
	  echo '</td><td><input style="margin-left:85%" name="submit" type="submit" id="submit" value="Confirm" /></td></tr></table>';
		}
		}
		else
		{
		echo'D�sol� mais vous n\'avez pas le droit d\'�tre ici car vous ne pouvez modifier que votre profil<br />';
		if (isset($_SESSION['pseudo'])) // Si le membre est connect�
			echo'Cliquer <a href="edit.php?m='.(int)$_SESSION['id'].'"><strong>ICI</strong></a> pour modifier votre propre profil';
		else
			echo'Cliquer <a href="connexion.php"><strong>ICI</strong></a> pour vous connectez et modifier votre propre profil';
		}
	?>
    
	</div>
	
	</form>
 </div>
<div class="main-container">
 </div>
 <div style="position:fixed;left:30px;top:90%;" title="Clickez pour signaler un probl�me">
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
