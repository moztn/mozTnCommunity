<?php
session_start();
include("scripts/identifiants.php");
?>

<!DOCTYPE html>
<title>Mozilla Tunisia | Connexion</title>
<head>
<meta http-equiv="Content-Language" content="fr,en" />
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
      <li class="current"><a href="index.php">Home</a></li>
    </ul>
</div>
<br />
<br />
    <div id="gallery" class="box">
		
		<h2>Connexion</h2>
      <hr size="3" /></td>
	  <?php
	if (!isset($_SESSION['pseudo'])) // Si le membre est connecté
	{ 	
    
		if (empty($_POST['pseudo']) || empty($_POST['password']) ) //Oublie d'un champ
		{
				$message = '<p>Une erreur s\'est produite pendant votre identification.
				Vous devez remplir tous les champs
				Cliquez <a href="./connexion.php">ici</a> pour revenir</p>';
		}
	else
	{
        $pseudo = mysql_real_escape_string($_POST['pseudo']);
        $password = mysql_real_escape_string($_POST['password']);
        
        $requete1 = mysql_query('SELECT * FROM users WHERE email = "'.$pseudo.'"') 
        or die (mysql_error());
        $data1 = mysql_fetch_assoc($requete1);
 
        if ($data1['mdp'] == $password) // Acces OK !
        {
       			$_SESSION['nom'] = $data1['nom'];
				$_SESSION['prenom'] = $data1['prenom'];
                
                $_SESSION['level'] = $data1['rang'];
                $_SESSION['id'] = $data1['id'];
				$_SESSION['pseudo'] = $data1['pseudo'];
       			mysql_query('UPDATE users SET dervisit = '.time().' WHERE id = '.intval($_SESSION['id']).'');
                $message = '<p>Bonjour et bienvenue <strong><a href="./profil.php?m='.intval($_SESSION['id']).'">'.stripslashes(htmlspecialchars($_SESSION['prenom'])).' '.stripslashes(htmlspecialchars($_SESSION['nom'])).'</a></strong>
                vous êtes maintenant connecté!</p>
				Depuis cette page, vous pouvez voir ce qui à changé depuis votre dernière visite et modifier vos options ou votre profil.
                <p>Cliquez <a href="./index.php" class="a">ici</a> pour revenir à la page d\'accueil</p>';
				
       
         }
         else // Acces pas OK !
         {
                $message = '<p>Une erreur s\'est produite 
                pendant votre identification. 
                Le mot de passe ou le pseudo entré n\'est pas correcte.
                <br /><br />Cliquez <a href="./connexion.php">ici</a> 
                pour revenir à la page précédente
                <br /><br />
                Cliquez <a href="./index.php">ici</a> 
                pour revenir à la page d\'accueil</p>';
          }
}?>

<h6><?php echo $message; ?> </h6>		
		<?php } 
		else
			echo'Vous ête déjà connécté';
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
