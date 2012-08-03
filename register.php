<?php
session_start();
include("scripts/identifiants.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<title>Mozilla Tunisia | Register</title>
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
	<link rel="stylesheet" href="styles/feuilledestyle.css" type="text/css" />
	
	<script type="text/javascript" src="scripts/jquery.formvalidation.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		$("#ab").formValidation({
			alias		: "name",
			required	: "accept",
			err_list	: true
		}); 
               
	});
	</script>
	<link rel="stylesheet" href="styles/demos.css">
	<script>
	$(function() {
		$( "#datepicker" ).datepicker();
	});
	</script>
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
      <li><a href="membre.php">Membre</a></li>     
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
      <li class="current"><a href="register.php">Register</a></li>
    </ul>
</div>
<br />
<br />

    
    <div id="gallery" class="box">
	<?php
	if (!isset($_SESSION['pseudo'])) // Si le membre est connecté
{ ?>
		<form id="ab" action="registerok.php" method="post" enctype="multipart/form-data" >
		<h2>Inscription</h2>
  <hr size="3" />
  <p class="error"></p>
			<table border="0" class="tablee" style="width:550px;margin : 10px auto auto auto; ">				
				<tr>
					<td>Nom d'utilisateur :</td>
					<td><input tabindex="1" required="true" mask="pseudo" name="pseudo" id="username" size="25" value="" title="Nom d'utilisateur" type="text" class="input-text big"/></td>
				</tr>
				<tr>
					<td>Nom :</td>
					<td><input tabindex="2" required="true" mask="txt" name="nom" id="username2" size="25" value="" title="Nom" type="text" class="input-text big" /></td>
				</tr>
				<tr>
					<td>Prénom : </td>
					<td><input tabindex="3" required="true" mask="txt" name="prenom" id="username3" size="25" value="" title="Prénom" type="text" class="input-text big" /></td>
				</tr>
				<tr>
					<td>Sexe : </td>
					<td>
						<select name="sexe" id="sex" tabindex="4" required="true">
							<option selected="selected"></option>
							<option>M</option>
							<option>F</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Date de naissance : </td>
					<td><input required="true" name="annee" type="text" id="datepicker" size="5" style="width:150px" class="input-text big"/></td>
				</tr>
				<tr>
					<td>Adresse e-mail :</td>
					<td><input required="true" mask="email" name="email" id="email" maxlength="100" value="" title="email" type="text" class="input-text big"/></td>
				</tr>
				<tr>
					<td>Confirmation de l'adresse e-mail :</td>
					<td><input required="true" mask="email" equal="email" name="confirmemail" id="confirmemail" value="" title="confirmemail" type="text" class="input-text big" /></td>
				</tr>
				<tr>
					<td>Mot de passe :</td>
					<td><input required="true" mask="password" name="password" id="password" value="" title="Nom d'utilisateur" type="password" class="input-text big" /></td>
				</tr>
				<tr>
					<td>Confirmer le mot de passe :</td>
					<td><input required="true" mask="password" equal="password" name="confirmpassword" id="confirmpassword" value="" title="Nom d'utilisateur" type="password" class="input-text big" /></td>
				</tr>
				<tr>
					<td>Question secrete : </td>
					<td> 
					<div class="custom dropdown" style="width: 374px;">
						<select name="question" id="question">
							  <option>Meilleur ami?</option>
							  <option>Votre premier animal?</option>
							  <option>Le prenom de votre petit ami(e)?</option>
							  <option>Votre acteur preferé?</option>
						</select>
						</div>
					</td>
				</tr>
				<tr>
					<td>Reponse : </td>
					<td><input tabindex="7" required="true" mask="txt" name="reponse" id="password_confirm3" value="" title="Confirmation du mot de passe" type="text" class="input-text big" /></td>
				</tr>
				<tr>
					<td><label for="avatar">Image :</label></td>
					<td><input type="file" name="avatar" id="avatar" /></td>
				</tr>
				<tr>
					<td><label for="propos">A propos de vous :</label></td>
					<td><textarea required="true" mask="password" name="propos" id="propos" rows="3" style="width:300px" class="input-text big"></textarea></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>
						<input type="reset" name="button" id="button" value="Réinitialiser" />
						<input type="submit" value="Enregistrer" onclick="verifvide()"/>
					</td>					
				</tr>
			</table>
		</form>
		<?php } 
		else
			echo'Vous ête déjà inscrit';
			?>
		<br class="clear" />
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
