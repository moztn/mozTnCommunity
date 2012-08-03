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
      <li><a href="./">Home</a></li>
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
 <?php   

$requete1 = mysql_query("SELECT COUNT(*) AS nbr FROM users");
$data1 = mysql_fetch_assoc($requete1);

$total = $data1['nbr'] +1;

?>
       <div id="gallery" class="box">
	   <h2 class="tit">Liste des membres</h2>
      <hr size="3" /><br />
	   <?php
//Requête

$requete2 = mysql_query('SELECT id, pseudo, nom, prenom, rang, avatar FROM users ORDER BY prenom')
or die (mysql_error());

if (mysql_num_rows($requete2) > 0)
{
?>
      <ul>
	  <?php
       //On lance la boucle
       while ($data2 = mysql_fetch_assoc($requete2))
       {
		   
       echo '
        <li><a href="./profil.php?m='.$data2['id'].'">
			<div class="panel grid-profile">
				<div class="row">
					<div class="three phone-one columns grid-profile-image">
						<img  class="profiles-people-avatar" src="./images/avatars/'.$data2['avatar'].'" alt="Ce membre n a pas d avatar" />
						</div>
						<div class="grid-profile-text">
						<h6>Prenom : '.stripslashes(htmlspecialchars($data2['prenom'])).'</h6>
						<h6>Nom : '.stripslashes(htmlspecialchars($data2['nom'])).'</h6>
						Pseudo : '.stripslashes(htmlspecialchars($data2['pseudo'])).'
					</div>
				</div>
			</div>
		</li></a>
        ';
		}
		?>        
      </ul>
	  <?php } ?>
      <br class="clear" />
	  <div align="center">
	  <?php echo"<h6 style=\"font-size:14px\">Nous avons "; echo $total-1; echo " membre(s)</h6>"; ?>
	  </div>
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
