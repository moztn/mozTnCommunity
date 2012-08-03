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
      <li class="current"><a href="register.php">Register</a></li>
    </ul>
</div>
<br />
<br />
    <div id="gallery" class="box">
		
<?php
	if (!isset($_SESSION['pseudo'])) // Si le membre est connecté
{ 	
		
$pseudo_erreur1 = NULL;
$pseudo_erreur2 = NULL;
$mdp_erreur = NULL;
$email_erreur1 = NULL;
$email_erreur2 = NULL;
$msn_erreur = NULL;
$signature_erreur = NULL;
$avatar_erreur = NULL;
$avatar_erreur1 = NULL;
$avatar_erreur2 = NULL;
$avatar_erreur3 = NULL;
$annee_erreur = NULL;
$nomm_erreur = NULL;
$prenom_erreur = NULL;
$mdp_erreur = NULL;
$mdp_erreur1 = NULL;
$mdp_erreur2 = NULL;
$quest_erreur = NULL;
$rep_erreur = NULL;
$propos_erreur = NULL;

//On récupère les variables
$i = 0;
$temps = time(); 
$nom = mysql_real_escape_string($_POST['nom']);
$pseudo = mysql_real_escape_string($_POST['pseudo']);
$email = mysql_real_escape_string($_POST['email']);
$confirmemail = mysql_real_escape_string($_POST['confirmemail']);
$prenom = mysql_real_escape_string($_POST['prenom']);
$sexe = mysql_real_escape_string($_POST['sexe']);
$question = mysql_real_escape_string($_POST['question']);
$reponse = mysql_real_escape_string($_POST['reponse']);
$jour = mysql_real_escape_string($_POST['jour']);
$mois = mysql_real_escape_string($_POST['mois']);
$annee = mysql_real_escape_string($_POST['annee']);
$propos = mysql_real_escape_string($_POST['propos']);
//$valid = mysql_real_escape_string($_POST['code']);
//$conmdp = md5($_POST['conmdp']);
//$mdp = md5($_POST['mdp']);
$mdp = $_POST['password'];
$conmdp = $_POST['confirmpassword'];

//Vérification du pseudo

if (strlen($pseudo) < 3 || strlen($pseudo) > 20)
{
        $pseudo_erreur2 = "Votre pseudo est soit trop grand, soit trop petit";
        $i++;
}

if (strlen($nom) < 3 || strlen($nom) > 20)
{
        $nom_erreur= "Votre nom est soit trop grand, soit trop petit";
        $i++;
}

if (strlen($prenom) < 3 || strlen($prenom) > 20)
{
        $prenom_erreur= "Votre prenom est soit trop grand, soit trop petit";
        $i++;
}
if (empty($mdp))
{
        $mdp_erreur= "Votre mot de passe est soit trop grand, soit trop petit";
        $i++;
}

if ($mdp != $conmdp || empty($conmdp))

{
        $mdp_erreur1= "confirmer votre mot de passe";
        $i++;
}

if (strlen($propos) < 3)
{
        $propos_erreur= "Remplir le champ <<A propos de vois>>";
        $i++;
}

if (strlen($question) < 3)
{
        $quest_erreur= "Remplir le champ question secrette";
        $i++;
}

if (strlen($reponse) < 3)
{
        $rep_erreur= "Remplir le champ reponse du question secrette";
        $i++;
}
$nombremail = mysql_result(mysql_query('SELECT COUNT(*) FROM users WHERE email = "'.$email.'"'), 0);

if ($nombremail != 0)
{
        $email_erreur1 = "Votre adresse email est déjà utilisée par un membre";
        $i++;
}
//On vérifie la forme maintenant
if (!preg_match("#^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,4}$#", $email) || empty($email))
{
        $email_erreur2 = "Votre adresse E-Mail n'a pas un format valide";
        $i++;
}

if (!empty($_FILES['avatar']['size']))
{
        //On définit les variables :
        $maxsize = 10024; //Poid de l'image
        $maxwidth = 500; //Largeur de l'image
        $maxheight = 500; //Longueur de l'image
        $extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png', 'bmp' ); //Liste des extensions valides
        
        if ($_FILES['avatar']['error'] > 0)
        {
                $avatar_erreur = "Erreur lors du tranfsert de l'avatar : ";
        }
        if ($_FILES['avatar']['size'] > $maxsize)
        {
                $i++;
                $avatar_erreur1 = "Le fichier est trop gros : (<strong>".$_FILES['avatar']['size']." Octets</strong>    contre <strong>".$maxsize." Octets</strong>)";
        }

        $image_sizes = getimagesize($_FILES['avatar']['tmp_name']);
        if ($image_sizes[0] > $maxwidth OR $image_sizes[1] > $maxheight)
        {
                $i++;
                $avatar_erreur2 = "Image trop large ou trop longue : (<strong>".$image_sizes[0]."x".$image_sizes[1]."</strong> contre <strong>".$maxwidth."x".$maxheight."</strong>)";
        }
        
        $extension_upload = strtolower(substr(  strrchr($_FILES['avatar']['name'], '.')  ,1));
        if (!in_array($extension_upload,$extensions_valides) )
        {
                $i++;
                $avatar_erreur3 = "Extension de l'avatar incorrecte";
        }
}

?>
<div id="corps_forum">
<?php
if ($i == 0) // Si i est vide, il n'y a pas d'erreur
{
	 
?>

         <h2>Inscription Reussite</h2>
  		<hr size="3" />
        <?php
        echo'<p>Bienvenue '.stripslashes(htmlspecialchars($_POST['prenom'])).' '.stripslashes(htmlspecialchars($_POST['nom'])).' vous êtes maintenant inscrit dans la communauté de Mozilla Tunisia</p>';
        echo'<p>Cliquez <a href="./index.php">ici</a> pour revenir à la page d\'accueil</p>';
              
    if (isset($_FILES['avatar']['size']))
        {

                $avatar = time();
                $nomavatar = str_replace(' ','',$avatar).".".$extension_upload;
                $avatar = "./images/avatars/".str_replace(' ','',$avatar).".".$extension_upload;
                move_uploaded_file($_FILES['avatar']['tmp_name'],$avatar);
        }
	if(empty($_FILES['avatar']['size']))
        {

                $avatar = "pasimage";
				$extension_upload = "jpg";
                $nomavatar = str_replace(' ','',$avatar).".jpg";
                $avatar = "./images/avatars/".str_replace(' ','',$avatar).".jpg";
               
        }
		
        mysql_query('
        INSERT INTO users (pseudo, mdp, email, avatar, nom, prenom, sexe, datenais, dateinscri, question, reponse, dervisit,propos) VALUES ("'.$pseudo.'" , "'.$mdp.'" , "'.$email.'" , "'.$nomavatar.'" , "'.$nom.'" , "'.$prenom.'" ,  "'.$sexe.'" , "'.$annee.'" , "'.$temps.'" , "'.$question.'" , "'.$reponse. '" , "'.$temps.'", "'.$propos. '" ) ') or die(mysql_error());
 	

        $_SESSION['pseudo'] = $pseudo;
        $_SESSION['id'] = mysql_insert_id();
        $_SESSION['level'] = 2;
	
      
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
