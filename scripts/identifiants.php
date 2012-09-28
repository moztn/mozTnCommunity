<?php
//identifiants
session_start();
$adresse = 'localhost';
$nom = 'root';
$motdepasse = '';
$database = 'reps';
mysql_connect($adresse, $nom, $motdepasse);
mysql_select_db($database);
if ( strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE' ) !== FALSE )
	header('Location: /reps/404/iE.php');
	
	function redirection($url){
    echo "<script type=\"text/javascript\">\n"
    . "<!--\n"
    . "\n"
    . "function redirect() {\n"
    . "window.location='" . html_entity_decode($url) . "'\n"
    . "}\n"
    . "setTimeout('redirect()','2000');\n"
    . "\n"
    . "// -->\n"
    . "</script>\n";
     }
/*if(!isset($_COOKIE['pseudo']) && isset($_SESSION['pseudo'])) 
    { 
setcookie('pseudo', $_SESSION['pseudo'], time() + 365*24*3600, null, null, false, true); // On écrit un cookie
setcookie('mdp', $_SESSION['mdp'], time() + 365*24*3600, null, null, false, true); // On écrit un autre cookie...
setcookie('level', $_SESSION['level'], time() + 365*24*3600, null, null, false, true); // On écrit un autre cookie...
setcookie('id', $_SESSION['id'], time() + 365*24*3600, null, null, false, true); // On écrit un autre cookie
setcookie('nom', $_SESSION['nom'], time() + 365*24*3600, null, null, false, true); // On écrit un autre cookie
setcookie('prenom', $_SESSION['prenom'], time() + 365*24*3600, null, null, false, true); // On écrit un autre cookie

}
if(isset($_COOKIE['pseudo'])) 
    { 
		$_SESSION['nom'] = $_COOKIE['nom'];
		$_SESSION['prenom'] = $_COOKIE['prenom'];
        $_SESSION['mdp'] = $_COOKIE['mdp'];
        $_SESSION['level'] = $_COOKIE['level'];
        $_SESSION['id'] = $_COOKIE['id'];
		$_SESSION['pseudo'] = $_COOKIE['pseudo'];
	}*/
	
	
	?>



