<?php
session_start();
include("../scripts/identifiants.php");
$nbr_non_vus = mysql_query("SELECT COUNT(*) AS nbre FROM mp WHERE destinataire='".$_SESSION['pseudo']."' AND vu='0' AND (efface='0' OR efface='2')")or die(mysql_error());
$nbre_non_vus = mysql_fetch_assoc($nbr_non_vus);
header('Content-Type: text/html; charset=ISO-8859-1');
		if($_POST["idniv"]=="pass")
		{
			$requete2 = mysql_query('SELECT * FROM event where datefin < "'.time().'" ORDER BY datedeb')
			or die (mysql_error());
		}
		if($_POST["idniv"]=="fut")
		{
			$requete2 = mysql_query('SELECT * FROM event where datefin > "'.time().'" ORDER BY datedeb')
			or die (mysql_error());
		}
		if($_POST["idniv"]=="tous")
		{
			$requete2 = mysql_query('SELECT * FROM event ORDER BY datedeb')
			or die (mysql_error());
		}		
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
</head>
<body>
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
				else
				{
					echo '<h4><br/>Désolé aucun événement trouvé !!!<br/></h4>';
				}
?>				
			</table>
			 </body>
</html>