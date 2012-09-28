<?php
session_start();
include("scripts/identifiants.php");
$nbr_non_vus = mysql_query("SELECT COUNT(*) AS nbre FROM mp WHERE destinataire='".$_SESSION['pseudo']."' AND vu='0' AND (efface='0' OR efface='2')")or die(mysql_error());
$nbre_non_vus = mysql_fetch_assoc($nbr_non_vus);
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
    <ul>
      <li class="active"><a href="index.php">Home</a></li>
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
      <li class="current"><a href="register.php">Register</a></li>
    </ul>
</div>
<br />
<br />

    
    <div id="gallery" class="box">
		
<?php
		

//On récupère les variables
$i = 0;
$temps = time(); 
for($k=0;$k<$_GET['compteur'];$k++)
$nomevent.$k = mysql_real_escape_string($_POST['nomevent'.$k]);
$cmp=0;
$mdp = $_POST['mdp'];
$conmdp = $_POST['conmdp'];

?>
<div id="corps_forum">
         <h2>Inscription Reussite</h2>
  		<hr size="3" />
		<script language="JavaScript"> 
<!-- Debut
   /* var texte_dans_inputText = "texte texte texte texte texte";
    document.write('<form action="" method="">');
    document.write('Info : <input type="text" name="info" value="' + compteur + '"><br />');
    document.write('</form>');*/
// fin -->
</script>
        <?php
		

$mdp_erreur = NULL;
$email_erreur1 = NULL;
$email_erreur2 = NULL;
$nom_erreur = NULL;
$signature_erreur = NULL;
$avatar_erreur = NULL;
$avatar_erreur1 = NULL;
$avatar_erreur2 = NULL;
$avatar_erreur3 = NULL;


//Encore est toujours notre belle variable $i :p
$i = 0;
$temps = time(); 

$email = mysql_real_escape_string($_POST['email']);
$nom = mysql_real_escape_string($_POST['nom']);
$prenom = mysql_real_escape_string($_POST['prenom']);
$question = mysql_real_escape_string($_POST['question']);
$reponse = mysql_real_escape_string($_POST['reponse']);
$pass = md5($_POST['password']);
$confirm = md5($_POST['confirm']);
$sexe = mysql_real_escape_string($_POST['sexe']);
$nais =mysql_real_escape_string($_POST['annee']);
$twitter = mysql_real_escape_string($_POST["twitter"]);
$fb = mysql_real_escape_string($_POST["fb"]);
$irc = mysql_real_escape_string($_POST["irc"]);
$linkedin = mysql_real_escape_string($_POST["linkedin"]);
$diaspora = mysql_real_escape_string($_POST["diaspora"]);
$flickr = mysql_real_escape_string($_POST["flickr"]);
$wiki = mysql_real_escape_string($_POST["wiki"]);
$propos = mysql_real_escape_string($_POST["propos"]);
$tel = mysql_real_escape_string($_POST["tel"]);
$adresse = mysql_real_escape_string($_POST["adresse"]);
$site = mysql_real_escape_string($_POST["site"]);
$del = mysql_real_escape_string($_POST['delete']);
//Vérification du mdp
if ($_POST['password'] != $_POST['confirm'] && (!empty($_POST['password']) || !empty($_POST['confirm'])))
{
$mdp_erreur = "Votre mot de passe et votre confirmation diffèrent";
$i++;
}

//Vérification de l'adresse email

//Il faut que l'adresse email n'ait jamais été utilisée (sauf si elle n'a pas été modifiée)
if (strtolower($data1['email']) != strtolower($email))
{
        $nombremail = mysql_result(mysql_query("SELECT COUNT(*) FROM users WHERE email = '".$email."' AND id != ".$_SESSION['id']), 0);

        if ($nombremail!= 0)
        {
        $email_erreur1 = "Votre adresse email est déjà utilisée par un membre";
        $i++;
        }

        //On vérifie la forme maintenant
        if (!preg_match("#^[a-z0-9A-Z._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email) || empty($email))
        {
        $email_erreur2 = "Votre nouvelle adresse E-Mail n'a pas un format valide";
        $i++;
        }
}
 
//Vérification de l'avatar
 
        if (!empty($_FILES['avatar']['size']))
        {
        //On définit les variables :
        $maxsize = 30072; //Poid de l'image
        $maxwidth = 500; //Largeur de l'image
        $maxheight = 500; //Longueur de l'image
        //Liste des extensions valides
        $extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png', 'bmp' );
 
        if ($_FILES['avatar']['error'] > 0)
        {
        $avatar_erreur = "Erreur lors du tranfsert de l'avatar : ";
        }
        if ($_FILES['avatar']['size'] > $maxsize)
        {
        $i++;
        $avatar_erreur1 = "Le fichier est trop gros :
        (<strong>".$_FILES['avatar']['size']." Octets</strong>
        contre <strong>".$maxsize." Octets</strong>)";
        }
 
        $image_sizes = getimagesize($_FILES['avatar']['tmp_name']);
        if ($image_sizes[0] > $maxwidth OR $image_sizes[1] > $maxheight)
        {
        $i++;
        $avatar_erreur2 = "Image trop large ou trop longue :
        (<strong>".$image_sizes[0]."x".$image_sizes[1]."</strong> contre
        <strong>".$maxwidth."x".$maxheight."</strong>)";
        }
 
        $extension_upload = strtolower(substr(  strrchr($_FILES['avatar']['name'], '.')  ,1));
        if (!in_array($extension_upload,$extensions_valides) )
        {
                $i++;
                $avatar_erreur3 = "Extension de l'avatar incorrecte";
        }
}
		
		if ($i == 0) // Si $i est vide, il n'y a pas d'erreur
{
        if (!empty($_FILES['avatar']['size']))
        {
                //On déplace l'avatar
                $avatar = time();
                $nomavatar = str_replace(' ','',$avatar).".".$extension_upload;
                $avatar = "./images/avatars/".str_replace(' ','',$avatar).".".$extension_upload;
                move_uploaded_file($_FILES['avatar']['tmp_name'],$avatar);
                mysql_query("UPDATE users
                SET avatar = '".$nomavatar."' 
                WHERE id = '".$_SESSION['id']."'");
        }
 
		$vide="";
        //Une nouveauté ici : on peut choisisr de supprimer l'avatar
        if (!empty($del))
        {
                mysql_query("update users set avatar = '".$vide."'
                WHERE id = '".intval($_SESSION['id'])."'") or die (mysql_error());
        }
 
        echo'<h1>Modification terminée</h1>';
        echo'<p>Votre profil a été modifié avec succès !</p>';
        echo'<p>Cliquez <a href="./index.php">ici</a> 
        pour revenir à la page d\'accueil</p>';
 
        //On modifie la table
		if(empty($_POST['password']) && empty($_POST['confirm']))
		{
			mysql_query("
			UPDATE users
			SET  email = '".$email."' ,
			nom = '".$nom."' , prenom = '".$prenom."',
			datenais = '".$nais."' , 			
			twitter = '".$twitter."', fb = '".$fb."', irc = '".$irc."', linkedin = '".$linkedin."',
			diaspora = '".$diaspora."', flickr = '".$flickr."', wiki = '".$wiki."', propos = '".$propos."',
			tel = '".$tel."', adresse = '".$adresse."', site = '".$site."'
			WHERE id = '".intval($_SESSION['id'])."'") or die (mysql_error());
		}
		else
		{
			mysql_query("
			UPDATE users
			SET  mdp ='".$pass."' , email = '".$email."' ,
			nom = '".$nom."' , prenom = '".$prenom."',
			datenais = '".$nais."' , 			
			twitter = '".$twitter."', fb = '".$fb."', irc = '".$irc."', linkedin = '".$linkedin."',
			diaspora = '".$diaspora."', flickr = '".$flickr."', wiki = '".$wiki."', propos = '".$propos."',
			tel = '".$tel."', adresse = '".$adresse."', site = '".$site."'
			WHERE id = '".intval($_SESSION['id'])."'") or die (mysql_error());
		}
        //Et on définit de nouvelles variables de sesssion
        //Pour celà on a besoin de la bdd
        $requete = mysql_query('
        SELECT id, rang
        FROM users
        WHERE id = '.$_SESSION['id']);
 
        if ($data = mysql_fetch_assoc($requete))
        {
        $_SESSION['id'] = $data['id'];
        $_SESSION['level'] = $data['rang'];
        }
}
else
{
        echo'<h1>Modification interrompue</h1>';
        echo'<p>Une ou plusieurs erreurs se sont produites pendant la modification du profil</p>';
        echo'<p>'.$i.' erreur(s)</p>';
        echo'<p>'.$mdp_erreur.'</p>';
        echo'<p>'.$email_erreur1.'</p>';
        echo'<p>'.$email_erreur2.'</p>';
        echo'<p>'.$nom_erreur.'</p>';
        echo'<p>'.$signature_erreur.'</p>';
        echo'<p>'.$avatar_erreur.'</p>';
        echo'<p>'.$avatar_erreur1.'</p>';
        echo'<p>'.$avatar_erreur2.'</p>';
        echo'<p>'.$avatar_erreur3.'</p>';
        echo'<p> Cliquez
 <a href="edit.php?m='.$_SESSION[id].'">ici</a> pour recommencer</p>';
}
		
		
		
		
		
/*foreach($_POST as $key => $val)
{
 echo '$_POST["'.$key.'"]='.$val.'<br />';
 $cmp++;
 }

  echo 'cmp = '.$cmp;*/
  
mysql_close();
?>
</div>
	
		<br class="clear" />
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
