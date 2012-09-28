<?php
session_start();
include("../../scripts/identifiants.php");
$requete2 = mysql_query('SELECT * FROM event')
				or die (mysql_error());
$nbr_non_vus = mysql_query("SELECT COUNT(*) AS nbre FROM mp WHERE destinataire='".$_SESSION['pseudo']."' AND vu='0' AND (efface='0' OR efface='2')")or die(mysql_error());
$nbre_non_vus = mysql_fetch_assoc($nbr_non_vus);
?>
<!DOCTYPE html>
<title>Mozilla Tunisia | Membre</title>
<head>
<link rel='stylesheet' type='text/css' href='cupertino/theme.css' />
<link rel='stylesheet' type='text/css' href='../fullcalendar/fullcalendar.css' />
<link rel='stylesheet' type='text/css' href='../fullcalendar/fullcalendar.print.css' media='print' />
<script type='text/javascript' src='../jquery/jquery-1.7.1.min.js'></script>
<script type='text/javascript' src='../jquery/jquery-ui-1.8.17.custom.min.js'></script>
<script type='text/javascript' src='../fullcalendar/fullcalendar.js'></script>
<script type='text/javascript'>

	$(document).ready(function() {
				
		$('#calendar').fullCalendar({
			theme: true,
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			editable: true,
			events: [						
			
			<?php 		
			if (mysql_num_rows($requete2) > 0)
			{
			while ($data2 = mysql_fetch_assoc($requete2))
			{
				?>
				{
					title: '<?php echo $data2['nomeve']?>',
					start: new Date(parseInt("<?php echo date('Y',$data2['datedeb']) ?>"), parseInt("<?php echo date('n',$data2['datedeb']) ?>")-1, parseInt("<?php echo date('j',$data2['datedeb']) ?>")),
					end: new Date(parseInt("<?php echo date('Y',$data2['datefin']) ?>"), parseInt("<?php echo date('n',$data2['datefin']) ?>")-1, parseInt("<?php echo date('j',$data2['datefin']) ?>")),
					url: '../../events/detailsevent.php?e=<?php echo $data2['id']?>',
				},
				<?php 
			}
			}
			?>
			
			]
		});
		
	});

</script>
<style type='text/css'>

	body {
		margin-top: 40px;
		text-align: center;
		font-size: 13px;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		}

	#calendar {
		width: 900px;
		margin: 0 auto;
		}

</style>
<meta http-equiv="Content-Language" content="fr,en" />
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr">
<link rel="stylesheet" href="../../styles/elegant-press.css" type="text/css" />
<link rel="stylesheet" href="styles/elegant-press.css" type="text/css" />
<script src="scripts/elegant-press.js" type="text/javascript"></script>
<!--[if IE]><style>#header h1 a:hover{font-size:75px;}</style><![endif]-->

<link href="../../tab/css/tabzilla.css" rel="stylesheet" />
<script src="../../tab/js/tabzilla.js"></script>
</head>
<body>
<a href="http://www.mozilla.org/" id="tabzilla">mozilla</a>
<div class="main-container">
  <header>
    <h1><a href="../../">Mozilla Tunisia</a></h1>
    <p id="tagline"><strong>Mozilla Tunisia Member</strong></p>
  </header>
</div>

<div id="login-box" class="ten columns phone-three pull-one-phone pull-two">
<?php echo'<a href="../../profil.php?m='.intval($_SESSION['id']).'">'.stripslashes(htmlspecialchars($_SESSION['prenom'])).' '.stripslashes(htmlspecialchars($_SESSION['nom'])).'</a>'; 
if (isset($_SESSION['pseudo'])) // Si le membre est connecté
{ 
?>
	[<a href="../../deconnexion.php">Sign Out</a>]
<?php 
}
else
{?>	
	<a href="../../connexion.php">Sign In</a> or <a href="../../register.php">Join</a>
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
      <li><a href="../../">Home</a></li>
      <li><a href="../../membre.php">Membre</a></li>      
      <!--<li><a href="portfolio.html">Portfolio</a></li>
      <li><a href="gallery.html">Gallery</a></li>-->
	  <li><a href="../../events/">Events</a></li>
	  <li><a href="./">Calendrier</a></li>
      <li><a href="../../contact.php">Contact</a></li>    
	  <?php if (isset($_SESSION['pseudo'])) // Si le membre est connecté
{ ?>
	  <li><a href="../../mp.php">Messages(<?php echo $nbre_non_vus['nbre'];?>)</a>
        <ul>
          <li><a href="../../mp.php">Boite de réception</a>          
          <li><a href="../../mp.php?action=ecrire">Nouveau Message</a></li>          
          <li><a href="../../mp.php?action=LireMpRecu">Message Envoyer</a></li>
		  <li><a href="../../mp.php?action=Corbeil">Message Supprimer</a></li>
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
      <li><a>Calendrier</a></li>
	  <li>&#187;</li>
      <li class="current"><a href="./">All</a></li>
    </ul>
</div>
<br />
<br />
 
       <div id="gallery" class="box" style="background-color: #FFFFFF;">
	   <h2 class="tit">Calendrier</h2>
      <hr size="3" /><br />
	  
	  <div id='calendar'></div>
	  
      <br class="clear" />
	  
    </div>  
 
 </div>
<div class="main-container">
 </div>
<div style="position:fixed;left:30px;top:90%;" title="Clickez pour signaler un problème">
<a href="../../404/bug.php"><img src="../../images/bug.png" alt="Logo" /></a>
</div>
 <footer>
  <table>
	<tr>
	<td><img src="../../images/logo.png" alt="Logo" /></td>
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
