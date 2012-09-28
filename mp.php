<?php
session_start();
include("scripts/identifiants.php");
$nbr_non_vus = mysql_query("SELECT COUNT(*) AS nbre FROM mp WHERE destinataire='".$_SESSION['pseudo']."' AND vu='0' AND (efface='0' OR efface='2')")or die(mysql_error());
$nbre_non_vus = mysql_fetch_assoc($nbr_non_vus);
$requete2 = mysql_query('SELECT * FROM users')	or die (mysql_error());		
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

<script src="scripts/jquery.ui.core.js"></script>
	<script src="scripts/jquery.ui.widget.js"></script>
	<script src="scripts/jquery.ui.position.js"></script>
	<script src="scripts/jquery.ui.autocomplete.js"></script>
<link rel="stylesheet" href="styles/jquery.ui.all.css">
<link href="tab/css/tabzilla.css" rel="stylesheet" />
<script src="tab/js/tabzilla.js"></script>
	<script>
	$(function() {
		var availableTags = [
			<?php 		
			if (mysql_num_rows($requete2) > 0)
			{
			while ($data2 = mysql_fetch_assoc($requete2))
			{
				?>"<?php echo $data2['pseudo']?>",
			<?php 
			}
			}?>
		];
		$( "#tags" ).autocomplete({
			source: availableTags
		});
	});
	</script>
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
   <ul class="nav">
      <li><a href="index.php">Home</a></li>
      <li><a href="membre.php">Membre</a></li>      
      <!--<li><a href="portfolio.html">Portfolio</a></li>
      <li><a href="gallery.html">Gallery</a></li>-->
	  <li><a href="./events/">Events</a></li>
	  <li><a href="./calendar/all">Calendrier</a></li>
      <li class="last"><a href="contact.php">Contact</a></li>    
	  <?php if (isset($_SESSION['pseudo'])) // Si le membre est connecté
{ ?>
	  <li class="active"><a href="./mp.php">Messages(<?php echo $nbre_non_vus['nbre'];?>)</a>
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
      <li class="current"><a href="mp.php">Message</a></li>
    </ul>
</div>
<br />
<br />
 <?php   
	//A partir d'ici, on va compter le nombre de members
//pour n'afficher que les 25 premiers
$requete1 = mysql_query("SELECT COUNT(*) AS nbr FROM users where rang>1");
$data1 = mysql_fetch_assoc($requete1);

$total = $data1['nbr'] +1;

?>
       <div id="gallery" class="box">
	   <h2 class="tit">Message Privée</h2>
      <hr size="3" /><br />
	   
	 
	   
	   <?php
      if($_SESSION['pseudo'] == true AND !isset($_GET['mp']) AND !isset($_GET['action']))
      {
        $nbr_non_vus = mysql_query("SELECT COUNT(*) AS nbre FROM mp WHERE destinataire='".$_SESSION['pseudo']."' AND vu='0' AND (efface='0' OR efface='2')")or die(mysql_error());
        $nbre_non_vus = mysql_fetch_assoc($nbr_non_vus);
		$nb_vus = mysql_query("SELECT COUNT(*) AS nbree FROM mp WHERE destinataire='".$_SESSION['pseudo']."' AND efface='1'")or die(mysql_error());
        $nbree_vus = mysql_fetch_assoc($nb_vus);
		$nb = mysql_query("SELECT COUNT(*) AS nb FROM mp WHERE destinataire='".$_SESSION['pseudo']."' AND (vu='0' OR vu='1') AND (efface='0' OR efface='2')")or die(mysql_error());
        $nbbb = mysql_fetch_assoc($nb);
        $retour = mysql_query("SELECT id, sujet, expediteur, timestamp, vu FROM mp WHERE destinataire='".$_SESSION['pseudo']."' AND (efface='0' OR efface='2') ORDER BY id DESC");
        ?>
          <table align="center" width="100%" align="center" border="2">
            <caption align="center">Boîte de réception</caption>
            <tfoot align="center" bgcolor="#CAC9C9">
              <th align="center" width="42"><em>Lu</em>/<strong>Non lu(<?php echo $nbre_non_vus['nbre'];?>)</strong></th>
              <th align="center" width="50">Auteur</th>
			  <th align="center" width="200">Sujet</th>
              <th align="center" width="50">Date</th>
			  <th align="center" width="5">Supp</th>
			  <th align="center" width="10">Lu</th>
			  <th align="center" width="10">Non Lu</th>
            </tfoot>
            <tfoot align="center" bgcolor="#CAC9C9">
              <th align="center" width="40"><em>Lu</em>/<strong>Non lu(<?php echo $nbre_non_vus['nbre'];?>)</strong></th>
              <th align="center" width="50">Auteur</th>
			  <th align="center" width="200">Sujet</th>
              <th align="center" width="50">Date</th>
			  <th align="center" width="5">Supp</th>
			  <th align="center" width="10">Lu</th>
			  <th align="center" width="10">Non Lu</th>
            </tfoot>
            <tbody>
        <?php
        while($donnees = mysql_fetch_assoc($retour))
        {
// on enlève les slashs inutiles qui se seraient ajoutés
          $sujet = stripslashes($donnees['sujet']);
          $expediteur = stripslashes($donnees['expediteur']);
          $date = $donnees['timestamp'];
		  if($nbbb['nb'] == 0)
		  {
			echo'<tr align="center"><td align="center">Votre Boite De Reception Est Vide</td></tr>';
		  }
// si le message n'est pas lu, on le montre et on marque son sujet en gras 
          else if($donnees['vu'] == 0)
          {
// on crée une ligne sur le tableau 
            echo'<tr align="center"><td align="center"><img src="./images/email_add.png" alt="Non Lu" title="Nouveau MP" border="0" /></td>
			<td align="center">'.$expediteur.'</td>
			<td align="left"><strong><a href="mp.php?mp='.$donnees['id'].'&amp;action=lire">'.$sujet.'</a></strong></td>
			<td align="center">Le' .date('d/m/Y \à H\hi', $date).'</td>
			<td align="center" width="5"><a href="mp.php?action=supprimer&amp;suppr=1&amp;id='.$donnees['id'].'"><img src="./images/supprimer-source.png" alt="Supprimer" title="Supprime Message" border="0" /></a></td>
			<td align="center" width="10"><a href="mp.php?action=marquer&amp;marq=1&amp;id='.$donnees['id'].'"><img src="./images/marquernonlu.png" alt="Marquer Comme Lu" title="Marquer Comme Lu" border="0" /></a></td>
			<td align="center" width="10"><a href="mp.php?action=marquer&amp;marq=0&amp;id='.$donnees['id'].'"><img src="./images/marquerlu.png" alt="Marquer Comme Non Lu" title="Marquer Comme Non Lu" border="0" /></a></td></tr>';
          }
// sinon, on marque que le sujet a été lu, et on met en italique
          else
          {
// on crée une nouvelle ligne sur le tableau
            echo '<tr align="center"><td align="center"><img src="./images/email_open.png" alt="Lu" title="Message Lu" border="0" /></td>
			<td align="center">'.$expediteur.'</td>
			<td align="left"><strong><a href="mp.php?mp='.$donnees['id'].'&amp;action=lire">'.$sujet.'</a></strong></td>
			<td align="center">Le' .date('d/m/Y \à H\hi', $date).'</td>
			<td align="center" width="5"><a href="mp.php?action=supprimer&amp;suppr=1&amp;id='.$donnees['id'].'"><img src="./images/supprimer-source.png" alt="Supprimer" title="Supprime Message" border="0" /></a></td>
			<td align="center" width="10"><a href="mp.php?action=marquer&amp;marq=1&amp;id='.$donnees['id'].'"><img src="./images/marquernonlu.png" alt="Marquer Comme Lu" title="Marquer Comme Lu" border="0" /></a></td>
			<td align="center" width="10"><a href="mp.php?action=marquer&amp;marq=0&amp;id='.$donnees['id'].'"><img src="./images/marquerlu.png" alt="Marquer Comme Non Lu" title="Marquer Comme Non Lu" border="0" /></a></td></tr>';
          }
        }
        ?>
           
            </tbody>
          </table>
         
        <?php
// on ferme la condition
      }
// sinon si la variable $_GET['mp'] existe, si l'utilisateur est connecté,
// si la variable $_GET['action'] existe et contient 'lire' alors...
      elseif(isset($_GET['mp']) AND isset($_GET['action']) AND $_GET['action'] == 'lire' AND $_SESSION['pseudo'] == true)
      {
        $id_mp = $_GET['mp'];
// on récupère les données où l'id est égale à l'id envoyée par l'URL
        $retour = mysql_query("SELECT destinataire, sujet, expediteur, timestamp, message FROM mp WHERE id='".$id_mp."'")or die(mysql_error());
        $donnees = mysql_fetch_assoc($retour);
// vérification pour qu'une autre personne que le destinataire ne puisse voir le message
        if($donnees['destinataire'] == $_SESSION['pseudo'])
        {
          ?>
            <table width="100%">
              <thead>
              </thead>
              <tfoot>
              </tfoot>
              <tbody>
          <?php
// on enlève les slashs inutiles
          $sujet = stripslashes($donnees['sujet']);
          $expediteur = stripslashes($donnees['expediteur']); 
// on met la date au format Jour/mois/année à heure h minutes
          $date = date('d/m/Y \à H\hi', $donnees['timestamp']);
          $mp = stripslashes($donnees['message']);   
		
		$req = mysql_query("SELECT id FROM users WHERE pseudo='".$expediteur."'")or die(mysql_error());
        $don = mysql_fetch_assoc($req);
		
          echo '
		  <tr>
			<td width="20%"><strong>De : </strong><a href="profil.php?m='.intval($don['id']).'">'.$expediteur.'</a></td>
			<td><strong>Le : </strong>'.$date.'</td>
		</tr>	
		  <tr><td colspan="2"><h6 style="font-size:16px;">Sujet : '.$sujet.'</h6></td></tr>		  		  	  
		  <tr><td colspan="2"><strong>Message :</strong><br /><br/>'.$mp.'</td></tr>		  
		  <tr>
			<td colspan="2" style="text-align:right;"><a href="mp.php?action=ecrire&reponse='.$id_mp.'"><img style="display:inline;" src="images/repondre.gif"/></a>
			<a href="mp.php?action=ecrire"><img style="display:inline;" src="images/nouveau.gif"/></a>
			
		</tr>';

          mysql_query("UPDATE mp SET vu='1' WHERE id='".$id_mp."'")or die(mysql_error());
          ?>
              </tbody>
            </table>
          <?php
        }
        else
        {
          echo 'Ceci est un message privé qui ne s\'adresse pas à vous mais à '.$donnees['destinataire'].'';
        }
      }
		
// Sinon si l'URL indique qu'on veut envoyer un nouveau message ('ecrire'), on affiche un formulaire d'envoi.
      elseif(isset($_GET['action']) AND $_GET['action'] == 'ecrire' AND $_SESSION['pseudo'] == true)
      {
// si la variable $_GET['reponse'] n'existe pas, alors c'est un nouveau message
        if(!isset($_GET['reponse']))
        {
          ?>
            <form action="mp.php?action=traitement" method="post">              
               <table>
			   <tr>
				<td>Sujet :</td>
				<td><input type="text" name="sujet" class="input-text big" style="width: 400px;"/></td>
				</tr>
              <tr>
				<td>Destinataire :</td>
				<td><input id="tags" type="text" name="destinataire" class="input-text big" style="width: 400px;"/></td>
			</tr>
			  <tr>
				<td>Message :</td>
				<td><textarea name="message" rows="5" cols="40" class="input-text big" style="width: 600px;"></textarea></td>
			  </tr>
			  </table>
              <input type="submit" value="Envoyer le message" />
            </form>
          <?php
        }
// sinon, c'est une réponse
        else
        {
// on récupère les données du mp dont l'id est égale à celle du message auquel on veut répondre
          $retour_reponse = mysql_query("SELECT sujet, expediteur FROM mp WHERE id='".$_GET['reponse']."'");
          $donnees_reponse = mysql_fetch_assoc($retour_reponse);
		  
		  $req = mysql_query("SELECT id FROM users WHERE pseudo='".$donnees_reponse['expediteur']."'")or die(mysql_error());
        $don = mysql_fetch_assoc($req);
		
          ?>
            <form action="mp.php?action=traitement" method="post">
<!-- on met RE : devant le sujet auquel on répond -->              
              <table>
			  <tr>
				<td><strong>Sujet : </strong></td>
				<td>RE : <?php echo $donnees_reponse['sujet'];?><input type="hidden" class="input-text big" style="width: 400px;" name="sujet" value="RE : <?php echo $donnees_reponse['sujet'];?>"/></td>
			  </tr>
              <tr>
				<td><strong>Destinataire : </strong></td>
				<td><?php echo'<a href="profil.php?m='.intval($don['id']).'">' .$donnees_reponse['expediteur']. '</a>'; ?><input type="hidden" class="input-text big" style="width: 400px;" name="destinataire" value="<?php echo $donnees_reponse['expediteur']; ?>"/></td>
			  </tr>
			  <tr>
				<td><strong>Message :</strong></td>
				<td><textarea name="message" rows="3" cols="40" class="input-text big" style="width: 600px;"></textarea></td>
              </tr>
			  </table>
			  <input type="submit" value="Envoyer le message" />
            </form>
          <?php
        }
      }

      elseif(isset($_GET['action']) AND $_GET['action'] == 'traitement' AND $_SESSION['pseudo'] == true)
      {
        if(!empty($_POST['sujet']) AND !empty($_POST['destinataire']) AND !empty($_POST['message']))
        {
          $nbr_entree = mysql_query("SELECT COUNT(*) AS nbre_entrees FROM users WHERE pseudo='".$_POST['destinataire']."'")or die(mysql_error());
          $nbr_entrees = mysql_fetch_assoc($nbr_entree);
          if($nbr_entrees['nbre_entrees'] == 1)
          {
            $sujet = addslashes(htmlentities($_POST['sujet']));
            $destinataire = addslashes(htmlentities($_POST['destinataire']));
            $message = addslashes(nl2br(htmlentities($_POST['message'])));
            $expediteur = $_SESSION['pseudo'];
            $timestamp = time();
            $retour = mysql_query("SELECT destinataire, sujet, message FROM mp WHERE expediteur='$expediteur' ORDER BY id DESC LIMIT 0,1");
            $donnees = mysql_fetch_assoc($retour);
            if($donnees['destinataire'] == $destinataire AND $donnees['sujet'] == $sujet AND $donnees['message'] == $message)
            {
              echo 'Vous ne pouvez pas poster le même message 2 fois d\'affilée';
            }
            else
            {
              mysql_query("INSERT INTO mp(sujet, expediteur, destinataire, message, timestamp, vu, efface) VALUES('" . $sujet . "', '" . $expediteur . "', '" . $destinataire . "', '" . $message . "', '" . $timestamp . "', '0', '0')")or die(mysql_error());
              echo 'Votre message a bien été envoyé à '.$destinataire.'. Vous allez être redirigé vers votre boîte de réception dans une seconde.';
              redirection('mp.php');
            }
          }
          else
          {
            echo 'Le membre à qui vous souhaitez envoyer ce message n\'existe pas/plus. Vous allez être redirigé vers votre boîte de réception dans 2 secondes';
            redirection('mp.php');
          }
        }
// sinon tous les champs ne sont pas remplis
        else
        {
// alors on affiche un message d'erreur et un lien
          echo 'Vous devez remplir tous les champs. <a href="mp.php?action=ecrire">Recommencer</a>.';
        }
      }
// sinon si la variable $_GET['action'] est égale à 'LireMpRecu', on affiche la boîte d'envoi
      elseif($_GET['action'] == 'LireMpRecu' AND $_SESSION['pseudo'] == true AND !isset($_GET['mp']))
      {
// on récupère les messages qu'on a envoyés et que l'on n'a pas supprimés
        $retour = mysql_query("SELECT id, destinataire, sujet, timestamp FROM mp WHERE expediteur='".$_SESSION['pseudo']."' AND (efface='0' OR efface='1') ORDER BY id DESC")or die(mysql_error());
?>

		<table align="center" width="100%" align="center" border="2">
        <caption class="caption">Messages envoyés</caption>
            <tfoot align="center">
				<th align="center" bgcolor="#B0B0FF" width="90">Destinataire</th>  
              <th align="center" bgcolor="#B0B0FF" width="100">Date</th>
			  <th align="left" bgcolor="#B0B0FF" width="250">Sujet</th>
			  <th align="left" bgcolor="#B0B0FF"></th>
            </tfoot>
            <tfoot align="center">
				<th align="center" bgcolor="#B0B0FF" width="90">Destinataire</th>  
              <th align="center" bgcolor="#B0B0FF" width="100">Date</th>
			  <th align="left" bgcolor="#B0B0FF" width="250">Sujet</th>
			  <th align="center" bgcolor="#B0B0FF">Action</th>
            </tfoot>
            <tbody>
			
        <?php
// on crée une boucle avec les entrées de la table
        while($donnees = mysql_fetch_assoc($retour))
        {
// on enlève les éventuels slashs superflus
          $sujet = stripslashes($donnees['sujet']);
          $destinataire = stripslashes($donnees['destinataire']);   
          $date = $donnees['timestamp'];
// on ajoute une ligne au tableau pour chaque message
          echo'<tr>
		  <td>'.$destinataire.'</td><td class="td">Le' .date('d/m/Y \à H\hi', $date).'</td>
		  <td align="left"><a href="mp.php?mp='.$donnees['id'].'&amp;action=lire">'.$sujet.'</a></td>
		  <td width="20" align="center"><a href="mp.php?action=supprimer&amp;suppr=2&amp;id='.$donnees['id'].'"><img src="./images/supprimer-source.png" alt="Supprimer" title="Supprime Message" border="0" /></a></td></tr>';
		  
// on ferme la boucle
        }
        ?>
           
            </tbody>
          </table>
          <p><a href="mp.php">Boîte de réception</a>
          <a href="mp.php?action=ecrire">Écrire un nouveau message</a></p>
        <?php
// on ferme la condition
      }
	  
	  /**********************************************************************************************************************
	  /**********************************************************************************************************************
	  /**********************************************************************************************************************
	  /**********************CORBEIL************************************************/
	  
	  
		elseif($_GET['action'] == 'Corbeil' AND $_SESSION['pseudo'] == true AND !isset($_GET['mp']))
      {
		$nbr_non_vus = mysql_query("SELECT COUNT(*) AS nbre FROM mp WHERE destinataire='".$_SESSION['pseudo']."' AND vu='0' AND (efface='0' OR efface='2')")or die(mysql_error());
        $nbre_non_vus = mysql_fetch_assoc($nbr_non_vus);
        $retour = mysql_query("SELECT id, sujet, expediteur, timestamp, vu FROM mp WHERE destinataire='".$_SESSION['pseudo']."' AND (efface='1') ORDER BY id DESC");
        ?>
          <table align="center" width="75%" align="center" border="2">
            <caption align="center">Message Supprimés</caption>
            <thead align="center">
              <th align="center" bgcolor="#B0B0FF" width="70"><em>Lu</em>/<strong>Non lu (<?php echo $nbre_non_vus['nbre'];?>)</strong></th>
              <th align="center" bgcolor="#B0B0FF" width="70">Auteur</th>
			  <th align="center" bgcolor="#B0B0FF" width="200">Sujet</th>
              <th align="center" bgcolor="#B0B0FF" width="70">Date</th>
			  <th align="center" bgcolor="#B0B0FF" width="10"></th>
			  <th align="center" bgcolor="#B0B0FF" width="10"></th>
            </thead>
            <tfoot align="center">
              <th bgcolor="#B0B0FF" width="70"><em>Lu</em>/<strong>Non lu(<?php echo $nbre_non_vus['nbre'];?>)</strong></th>
              <th align="center" bgcolor="#B0B0FF" width="70">Auteur</th>
			  <th align="center" bgcolor="#B0B0FF" width="200">Sujet</th>
              <th align="center" bgcolor="#B0B0FF" width="70">Date</th>
			  <th align="center" bgcolor="#B0B0FF" width="10"></th>
			  <th align="center" bgcolor="#B0B0FF" width="10"></th>
            </tfoot>
            <tbody>
        <?php
		
        while($donnees = mysql_fetch_assoc($retour))
        {
// on enlève les slashs inutiles qui se seraient ajoutés
          $sujet = stripslashes($donnees['sujet']);
          $expediteur = stripslashes($donnees['expediteur']);
          $date = $donnees['timestamp'];
		 
// si le message n'est pas lu, on le montre et on marque son sujet en gras 
          if($donnees['vu'] == 0)
          {
// on crée une ligne sur le tableau 
            echo'<tr align="center"><td align="center"><img src="./images/email_add.png" alt="Non Lu" title="Nouveau MP" border="0" /></td>
			<td align="center">'.$expediteur.'</td>
			<td align="center"><strong><a href="mp.php?mp='.$donnees['id'].'&amp;action=lire">'.$sujet.'</a></strong></td>
			<td align="center">Le' .date('d/m/Y \à H\hi', $date).'</td>
			<td align="center" width="10"><a href="mp.php?action=supprimer&amp;suppr=0&amp;id='.$donnees['id'].'"><img src="./images/indexcopie.jpg" alt="Recycler" title="Recycler Message" border="0" /></a></td>
			<td align="center" width="10"><a href="mp.php?action=supprimer&amp;suppr=1&amp;id='.$donnees['id'].'"><img src="./images/index1copie.jpg" alt="Recycler" title="Supprimer Message" border="0" /></a></td></tr>';
          }
// sinon, on marque que le sujet a été lu, et on met en italique
          else 
          {
// on crée une nouvelle ligne sur le tableau
            echo '<tr align="center"><td align="center"><img src="./images/email_open.png" alt="Lu" title="Message Lu" border="0" /></td>
			<td align="center">'.$expediteur.'</td>
			<td align="center"><em><a href="mp.php?mp='.$donnees['id'].'&amp;action=lire">'.$sujet.'</a></em></td>
			<td align="center">Le' .date('d/m/Y \ê H\hi', $date).'</td>
			<td align="center" width="10"><a href="mp.php?action=supprimer&amp;suppr=0&amp;id='.$donnees['id'].'"><img src="./images/indexcopie.jpg" alt="Recycler" title="Recycler Message" border="0" /></a></td>
			<td align="center" width="10"><a href="mp.php?action=supprimer&amp;suppr=1&amp;id='.$donnees['id'].'"><img src="./images/index1copie.jpg" alt="Recycler" title="Supprimer Message" border="0" /></a></td></tr>';
		  }
	  }?>
	    </tbody>
          </table>
	 <?php //echo'</table>';
	}
// si la variable $_GET['id'] qui contient l'id du message existe,
// si la variable $_GET['suppr'] qui indique qui a supprimé le message (destinataire ou expéditeur) existe
// et si la variable $_GET['action'] est égale à 'supprimer' qui indique la suppression d'un message, alors on le supprime.
      elseif(isset($_GET['action']) AND isset($_GET['suppr']) AND isset($_GET['id']) AND $_GET['action'] == 'supprimer')
      {
        $id = $_GET['id'];
		
		//Rcycler
		 if($_GET['suppr'] == 0)
        {
            mysql_query("UPDATE mp SET efface='0' WHERE id='".$id."'")or die(mysql_error());
            echo 'Le message a été recycler avec succès. Vous allez être redirigé vers votre boîte de réception dans 2 secondes.';
            redirection('mp.php');
		}
		//Envoyer à la corbeille 
		else if($_GET['suppr'] == 1)
        {
            mysql_query("UPDATE mp SET efface='1' WHERE id='".$id."'")or die(mysql_error());
            echo 'Le message a été supprimé avec succès. Vous allez être redirigé vers votre boîte de réception dans 2 secondes.';
            redirection('mp.php');
		}
		else if($_GET['suppr'] == 2)
        {
			 mysql_query("DELETE FROM mp WHERE id='".$id."' AND expediteur='".$_SESSION['pseudo']."'")or die(mysql_error());
             echo 'Le message a été supprimé avec succès. Vous allez être redirigé vers votre boîte de réception dans 2 secondes.';
             redirection('mp.php');
		}
		
		/**
		
// si c'est l'expéditeur qui supprime le message
        if($_GET['suppr'] == 2)
        {
// alors on récupère les données où l'id du message à supprimer est égale à l'id d'un message         
            $retour = mysql_query("SELECT expediteur, efface FROM mp WHERE id='".$id."'")or die(mysql_error());
// on les met dans un array
            $donnees = mysql_fetch_assoc($retour);
// si l'expéditeur est bien le membre qui veut supprimer le message
            if($_SESSION['pseudo'] == $donnees['expediteur'])
            {
// et si le message a déjà été supprimé par le destinataire
              if($donnees['efface'] == 1)
              {
// on supprime l'entrée correspondante de la table
                mysql_query("DELETE FROM mp WHERE id='".$id."'")or die(mysql_error());
// on affiche un message
                echo 'Le message a été supprimé avec succès. Vous allez être redirigé vers votre boîte de réception dans 2 secondes.';
// et on redirige
                redirection('mp.php');

              }
// sinon si le message n'a pas été supprimé par le destinataire
              elseif($donnees['efface'] == 0)
              {
// alors on modifie le champ efface par 2 pour que le destinataire puisse encore voir le message
                mysql_query("UPDATE mp SET efface='2' WHERE id='".$id."'")or die(mysql_error());
// on affiche un message
                echo 'Le message a été supprimé avec succès. Vous allez être redirigé vers votre boîte de réception dans 2 secondes.';
// et on redirige
                redirection('mp.php');

              }
// sinon
              else
              {
// on affiche un message d'erreur
              echo 'Une erreur est survenue lors de votre demande. Veuillez recommencer ultèrieurement.';
              } 
             }
// sinon, le membre qui veut supprimer le message n'est pas l'expéditeur
             else
             {
// donc on affiche un message d'erreur
              echo 'Vous ne pouvez pas supprimer un message que vous n\'avez pas envoyé vous-même.';
             }       
        }
// sinon si c'est le destinataire qui veut supprimer un message
        elseif($_GET['suppr'] == 1)
        {
// on récupère les données sur le message que l'on veut supprimer
            $retour = mysql_query("SELECT destinataire, efface FROM mp WHERE id='".$id."'")or die(mysql_error());
// on les met dans un array
            $donnees = mysql_fetch_assoc($retour);
// si le destinataire du message est bien le membre qui veut supprimer le message
            if($_SESSION['pseudo'] == $donnees['destinataire'])
            {
// et si le message a été supprimé par l'expéditeur
              if($donnees['efface'] == 2)
              {
// alors on supprime l'entrée correspondante de la table
                mysql_query("DELETE FROM mp WHERE id='".$id."'")or die(mysql_error());
// on affiche un message
                echo 'Le message a été supprimé avec succès. Vous allez être redirigé vers votre boîte de réception dans 2 secondes.';
// et on redirige
                redirection('mp.php');

              }
// sinon si le message n'a pas été supprimé par l'expéditeur
              elseif($donnees['efface'] == 0)
              {
// alors on modifie la valeur de efface par 1 pour que l'expéditeur puisse encore voir le message
                mysql_query("UPDATE mp SET efface='1' WHERE id='".$id."'")or die(mysql_error());
// on affiche un message
                echo 'Le message a été supprimé avec succès. Vous allez être redirigé vers votre boîte de réception dans 2 secondes.';
//et on redirige
                redirection('mp.php');

              }
// sinon
              else
              {
// on affiche un message d'erreur
              echo 'Une erreur est survenue lors de votre demande. Veuillez recommencer ultérieurement.';
              } 
             }
// sinon le membre qui veut supprimer le message n'est pas le destinataire de celui-ci
             else
             {
// donc on affiche un message d'erreur
              echo 'Vous ne pouvez pas supprimer un message qui ne vous a pas été envoyé.';
             }   
        }
	

// sinon l'action demandée n'existe pas($_GET['action'])
        else
        {
// alors on affiche un message d'erreur
          echo 'Une erreur est survenue lors de votre demande. Veuillez recommencer ultérieurement.';
        }
		**/
      }
	  
	  
	  
	  elseif(isset($_GET['action']) AND isset($_GET['marq']) AND isset($_GET['id']) AND $_GET['action'] == 'marquer')
      {
        $id = $_GET['id'];
		
		//Rcycler
		 if($_GET['marq'] == 0)
        {
            mysql_query("UPDATE mp SET vu='0' WHERE id='".$id."'")or die(mysql_error());
            echo 'Le message a été recycler avec succès. Vous allez être redirigé vers votre boîte de réception dans 2 secondes.';
            redirection('mp.php');
		}
		//Envoyer à la corbeille 
		else if($_GET['marq'] == 1)
        {
            mysql_query("UPDATE mp SET vu='1' WHERE id='".$id."'")or die(mysql_error());
            echo 'Le message a été supprimé avec succès. Vous allez être redirigé vers votre boîte de réception dans 2 secondes.';
            redirection('mp.php');
		}
	
	}
// sinon on met un message d'erreur qui envoie un lien pour se connecter.
      else
      {
      echo 'Vous n\'êtes pas connecté ou une erreur est survenue lors de votre demande ; veuillez recommencer ultérieurement.<a href="connexion.php">Se connecter</a>';
      }

    ?>

		 
		
	   
	   
      <br class="clear" />
	  
    </div>  
 
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
