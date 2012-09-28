<?php
session_start();
include("../scripts/identifiants.php");
?>

<!DOCTYPE html>
<title>Mozilla Tunisia | Home</title>
<head>
<meta http-equiv="Content-Language" content="fr,en" />
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr">
<link rel="stylesheet" href="../styles/elegant-press.css" type="text/css" />
<link rel="stylesheet" href="../styles/event.css" type="text/css" />
<script src="../scripts/elegant-press.js" type="text/javascript"></script>
<link rel="stylesheet" href="assets/css/styles.css" />
        <link rel="stylesheet" href="assets/js/chosen/chosen.css" />
<!--[if IE]><style>#header h1 a:hover{font-size:75px;}</style><![endif]-->
<link href="../tab/css/tabzilla.css" rel="stylesheet" />
<script src="../tab/js/tabzilla.js"></script>
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
<?php echo'<a href="../profil.php?m='.intval($_SESSION['id']).'">'.stripslashes(htmlspecialchars($_SESSION['prenom'])).' '.stripslashes(htmlspecialchars($_SESSION['nom'])).'</a>'; 
if (isset($_SESSION['pseudo'])) // Si le membre est connecté
{ 
?>
	[<a href="../deconnexion.php">Sign Out</a>]
<?php 
}
else
{?>	
	<a href="../connexion.php">Sign In</a> or <a href="../register.php">Join</a>
	<?php } ?> 
</div>

<div class="main-container">
  <div id="sub-headline">
    <!--<div class="tagline_left"><p id="tagline2">Tel: 123 333 4444 | Mail: <a href="mailto:email@website.com">email@website.com</a></p></div>-->
    <div class="tagline_right">
      <form action="#" method="post">
        <fieldset>
          <legend>Site Search</legend>
          <input type="text" value="Search Our Website&hellip;"   onfocus="if (this.value == 'Search Our Website&hellip;') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Search Our Website&hellip;';}"/>
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
      <li><a href="../">Home</a></li>
      <li><a href="../membre.php">Membre</a></li>
      <!--<li><a href="#">Layouts</a>
        <ul>
          <li><a href="#">Sidebar</a>
          <ul>
          <li><a href="right_sidebar.html">Right Sidebar</a>
          </li>
          </ul>
          <li><a href="full_width.html">Full Width</a></li>
        </ul>
      </li>
      <li><a href="portfolio.html">Portfolio</a></li>
      <li><a href="gallery.html">Gallery</a></li>-->      
	  <li class="active"><a href="./">Events</a></li>
	  <li><a href="../contact.php">Contact</a></li>
    </ul>
   </nav>
    <div class="clear"></div>
  </div>
</div>
<div class="main-container">
  <div class="container1">
   <div id="breadcrumb">
    <ul>
      <li class="first">You Are Here</li>
      <li>&#187;</li>
      <li><a href="../">Home</a></li>
      <li>&#187;</li>
      <li class="current"><a href="./">Events</a></li>
    </ul>
</div>
<br />
<br />

    <div class="box">
		<div class="content" style="width:100%">
        <h2>Events</h2>
		<hr size="3" />
		<?php if((int)$_SESSION['level']==4)
	  { ?>
			<div class="twelve align-right" style="margin-top:-55px; margin-bottom:30px;">
				<a class="small blue button nice radius" target="_blank" href="createvent.php">Create event</a>
			</div>
	<?php } 
//Requête
?>
<script src="http://code.jquery.com/jquery-1.6.3.min.js"></script>
		<script src="assets/js/chosen/chosen.jquery.min.js"></script>
		<script src="assets/js/script.js"></script>
<ul id="questions">	</ul>

		<div id="preloader"></div>
		
		<?php
$requete2 = mysql_query('SELECT * FROM event ORDER BY datedeb')
or die (mysql_error());
?>
<table id="events-table">
<?php

if (mysql_num_rows($requete2) > 0)
{
$i=0;

			 while ($data2 = mysql_fetch_assoc($requete2))
       {
	   $date = $data2['datedeb'];
	   
$Jour = array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi","Samedi");
$Mois = array("Janv", "Févr", "Mars", "Avri", " Mai", "Juin", "Juil", "Août", "Sept", "Octo", "Nove", "Déce");
$moisfr = $Mois[date('n',$data2['datedeb'])-1];

			$i++;
			if($i%2!=0)			
				echo '<tr><td class="event-td-date"><div class="events-table-date panel"><div class="date"><span class="day">'.date('d',$data2['datedeb']).'</span> <span class="month">'.$moisfr.'</span> <span class="year">'.date('Y',$data2['datedeb']).'</span></div></div></td>
					<td class="event-td-desc">
						<div class="events-table-name hide-on-phones"><a href="./detailsevent.php?e='.$data2['id'].'"> '.stripslashes(htmlspecialchars($data2['nomeve'])).'</a></div>
						<div class="events-table-decription">'.stripslashes(htmlspecialchars($data2['description'])).'</div>
					</td>
					<td class="event-td-lieu">
						<div class="events-table-owner">
							<span class="events-table-owner-tag"> Ville </span>
							<br>'.stripslashes(htmlspecialchars($data2['city'])).'	<br/>						 
							<span class="events-table-owner-tag"> Map </span>
							<br>
							<a href="'.stripslashes(htmlspecialchars($data2['map'])).'"> '.stripslashes(htmlspecialchars($data2['lieu'])).' </a>
						</div>
					</td>
				</tr>';
			else
				echo '<tr style="background: none repeat scroll 0 0 #F9F9F9;">
					<td class="event-td-date"><div class="events-table-date panel"><div class="date"><span class="day">'.date('d',$data2['datedeb']).'</span> <span class="month">'.$moisfr.'</span> <span class="year">'.date('Y',$data2['datedeb']).'</span></div></div></td>
					<td class="event-td-desc">
						<div class="events-table-name hide-on-phones"><a href="./detailsevent.php?e='.$data2['id'].'"> '.stripslashes(htmlspecialchars($data2['nomeve'])).'</a></div>
						<div class="events-table-decription"> '.stripslashes(htmlspecialchars($data2['description'])).' </div>
					</td>
					<td class="event-td-lieu">
						<div class="events-table-owner">
							<span class="events-table-owner-tag"> Ville </span>
							<br>'.stripslashes(htmlspecialchars($data2['city'])).'	<br/>						 
							<span class="events-table-owner-tag"> Map </span>
							<br>
							<a href="'.stripslashes(htmlspecialchars($data2['map'])).'"> '.stripslashes(htmlspecialchars($data2['lieu'])).' </a>
						</div>
					</td>
					</td>
				</tr>';
				}
				}
?>				
			</table>
		</div>

    <div class="clear"></div>
    </div>
    
 
 </div>
<div class="main-container">
 </div>
 
 <footer>
   <table>
	<tr>
	<td><img src="../images/logo.png" alt="Logo" /></td>
    <td><p class="tagline_left">Copyright &copy; 2012 - All Rights Reserved - <a href="http://mozilla-tunisia.org">Mozilla Tunisia</a></p></td>
	</tr>
	</table>
    <!--<p class="tagline_right">Design by <a href="http://www.priteshgupta.com/" title="Pritesh Gupta" target="_blank" >PriteshGupta.com</a></p>-->
    <br class="clear" />
  </footer>

<br />
<br />
<!-- Free template distributed by http://freehtml5templates.com -->
</div>
    </body>
</html>
