<?php
session_start();
include("../scripts/identifiants.php");
$nbr_non_vus = mysql_query("SELECT COUNT(*) AS nbre FROM mp WHERE destinataire='".$_SESSION['pseudo']."' AND vu='0' AND (efface='0' OR efface='2')")or die(mysql_error());
$nbre_non_vus = mysql_fetch_assoc($nbr_non_vus);
$eve = (int) $_GET['e'];
?>

<!DOCTYPE html>
<title>Mozilla Tunisia | Home</title>
<head>
<meta http-equiv="Content-Language" content="fr,en" />
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr">
<link rel="stylesheet" href="../styles/elegant-press.css" type="text/css" />
<link rel="stylesheet" href="../styles/event.css" type="text/css" />
<link rel="stylesheet" href="../styles/leaflet.css" type="text/css" />
<script src="../scripts/elegant-press.js" type="text/javascript"></script>
<script src="../scripts/leaflet.js" type="text/javascript"></script>
<!--[if IE]><style>#header h1 a:hover{font-size:75px;}</style><![endif]-->
<link href="../tab/css/tabzilla.css" rel="stylesheet" />
<script src="../tab/js/tabzilla.js"></script>

	<link rel="stylesheet" href="../styles/jquery.ui.all.css">
	<script src="../scripts/jquery-1.7.2.js"></script>
	<script src="../scripts/external/jquery.bgiframe-2.1.2.js"></script>
	<script src="../scripts/jquery.ui.core.js"></script>
	<script src="../scripts/jquery.ui.widget.js"></script>
	<script src="../scripts/jquery.ui.mouse.js"></script>
	<script src="../scripts/jquery.ui.button.js"></script>
	<script src="../scripts/jquery.ui.draggable.js"></script>
	<script src="../scripts/jquery.ui.position.js"></script>
	<script src="../scripts/jquery.ui.resizable.js"></script>
	<script src="../scripts/jquery.ui.dialog.js"></script>
	<script src="../scripts/jquery.effects.core.js"></script>

<link rel="stylesheet" type="text/css" href="lightbox/css/jquery.lightbox-0.5.css" />
<link rel="stylesheet" type="text/css" href="demo.css" />

<script type="text/javascript" src="lightbox/js/jquery.lightbox-0.5.pack.js"></script>
<script type="text/javascript" src="script.js"></script>
	
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
      <!--<li><a href="portfolio.html">Portfolio</a></li>
      <li><a href="gallery.html">Gallery</a></li>-->
	  <li class="active"><a href="../events/">Events</a></li>
	  <li><a href="../calendar/all">Calendrier</a></li>
      <li class="last"><a href="contact.php">Contact</a></li>    
	  <?php if (isset($_SESSION['pseudo'])) // Si le membre est connecté
{ ?>
	  <li><a href="../mp.php">Messages(<?php echo $nbre_non_vus['nbre'];?>)</a>
        <ul>
          <li><a href="../mp.php">Boite de réception</a>          
          <li><a href="../mp.php?action=ecrire">Nouveau Message</a></li>          
          <li><a href="../mp.php?action=LireMpRecu">Message Envoyer</a></li>
		  <li><a href="../mp.php?action=Corbeil">Message Supprimer</a></li>
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
      <li class="first">You Are Here</li>
      <li>&#187;</li>
      <li><a href="../">Homepage</a></li>
      <li>&#187;</li>
      <li><a href="../events">Events</a></li>
	  <li>&#187;</li>
	  <li class="current"><a href="../events/detailsevent.php">Détails Events</a></li>
    </ul>
</div>
<br />
<br />
 <?php
		$eve = (int) $_GET['e'];
		$requete1 = mysql_query('SELECT * FROM event WHERE id='.$eve);
       if ($data1 = mysql_fetch_assoc($requete1))
       {?>
    <div class="box">
           <div class="content" style="width:100%">
        <h3 align="left"><strong> <?php echo stripslashes(htmlspecialchars($data1['nomeve'])); ?> </strong></h3>
		
				
		<?php if(isset($_SESSION['pseudo']))
	  { ?>
  <div class="twelve align-right" style="margin-top:-50px; margin-bottom:15px;margin-right:15%;">
  <script type='text/javascript'>
     
       function writediv(texte) {
         document.getElementById('pseudobox').innerHTML = texte;
       }
	   function participe(user,event,part) {	   
         if (texte = file('./participe.php?user='+escape(user)+'&event='+escape(event)+'&part='+escape(part))) { // C'est ici que tout se joue !
             if(document.getElementById("part").value=="Participer")
				document.getElementById("part").value="Annuler";
			else
				document.getElementById("part").value="Participer";
         }
       }
		
       function file(fichier) {
         if (window.XMLHttpRequest) // FIREFOX
           xhr_object = new XMLHttpRequest();
         else if(window.ActiveXObject) // IE
           xhr_object = new ActiveXObject("Microsoft.XMLHTTP" );
         else
           return(false);
         xhr_object.open("GET", fichier, false);
         xhr_object.send(null);
         if (xhr_object.readyState == 4)
           return xhr_object.responseText;
         else
           return false;
       }
     
     </script>	
	 

	</div>
			<?php
			}
	if((int)$_SESSION['level']==4)
	  { ?>
			<div class="twelve align-right" style="margin-top:-47px; margin-bottom:15px;">
			<?php
	 $exist = mysql_result(mysql_query('SELECT COUNT(*) FROM eventuser WHERE iduser = "'.$_SESSION['id'].'" and idevent = '.$eve.''), 0);
if ($exist == 0)
{
	 echo '<input type="button" class="small blue button nice radius" name="part" id="part" value="Participer" onClick="participe('.$_SESSION['id'].' , '.$eve.',this.value)"/>';				
}
else
{
	
echo'<input type="button" class="small blue button nice radius" name="part" id="part" value="Annuler" onClick="participe('.$_SESSION['id'].' , '.$eve.',this.value)"/>	';			 
} 

			if((int)$_SESSION['level']==4)
	  { ?>
	  
	  
	  <script>
	$(function() {
		// a workaround for a flaw in the demo system (http://dev.jqueryui.com/ticket/4375), ignore!
		$( "#dialog:ui-dialog" ).dialog( "destroy" );
		
		var name = $( "#name" ),
			email = $( "#email" ),
			password = $( "#password" ),
			allFields = $( [] ).add( name ).add( email ).add( password ),
			tips = $( ".validateTips" );

		function updateTips( t ) {
			tips
				.text( t )
				.addClass( "ui-state-highlight" );
			setTimeout(function() {
				tips.removeClass( "ui-state-highlight", 1500 );
			}, 500 );
		}

		function checkLength( o, n, min, max ) {
			if ( o.val().length > max || o.val().length < min ) {
				o.addClass( "ui-state-error" );
				updateTips( "Length of " + n + " must be between " +
					min + " and " + max + "." );
				return false;
			} else {
				return true;
			}
		}

		function checkRegexp( o, regexp, n ) {
			if ( !( regexp.test( o.val() ) ) ) {
				o.addClass( "ui-state-error" );
				updateTips( n );
				return false;
			} else {
				return true;
			}
		}
		
		$( "#dialog-form" ).dialog({
			autoOpen: false,
			height: 300,
			width: 350,
			modal: true,
			buttons: {
				"Delete Event": function() {
					var bValid = true;
					allFields.removeClass( "ui-state-error" );	
						if ( bValid ) {
						
						texte = file('./participe.php?user=<?php echo $_SESSION['id'] ?>&event=<?php echo  $eve ?>&part=Supprimer');
							<?php 							
							//mysql_query("delete from event where id='".$eve."' ")or die(mysql_error()); 
							//header('Location: /reps/events/');
							?>
							window.location = "./";
						$( this ).dialog( "close" );						
					}
				},
				Cancel: function() {
					$( this ).dialog( "close" );
				}
			},
			close: function() {
				allFields.val( "" ).removeClass( "ui-state-error" );
			}
		});

		$( "#delete-event" )
			.button()
			.click(function() {
				$( "#dialog-form" ).dialog( "open" );
			});
	});
	</script>
	  
	  
	  
	  
	  <div id="dialog-form" title="Delete Event">	
	<form>
	<fieldset>
		Êtes-vous sûr de vouloir supprimer définitivement cet événement ?
	</fieldset>
	</form>
</div>
	  <div class="twelve align-right" style="margin-bottom: 15px; display: inline;">
	  <?php echo'<input type="button" class="small red button nice radius" name="part" id="delete-event" style="padding-top: 6.5px;" value="Supprimer"/>';?> 	
      </div>
	  <?php } ?>
				<a class="small blue button nice radius" target="_blank" style="padding-top: 10.5px; padding-bottom: 10px;" href="createvent.php">Edit event</a>
			</div>
	<?php }
$mois[1] = "Janv";  
$mois[2] = "Févr";  
$mois[3] = "Mars";  
$mois[4] = "Avri";  
$mois[5] = "Mai ";  
$mois[6] = "Juin";  
$mois[7] = "Juil";  
$mois[8] = "Aout";  
$mois[9] = "Sept";  
$mois[10] = "Octo";  
$mois[11] = "Nove";  
$mois[12] = "Déce"; 

 
$jour[1] = "lundi";  
$jour[2] = "mardi";  
$jour[3] = "mercredi";  
$jour[4] = "Jeudi";  
$jour[5] = "vendredi";  
$jour[6] = "samedi";    
$jour[0] = "dimanche"; 
$date = $data1['datedeb'];
	   preg_match('`^(\d{4})(\d{2})(\d{2})`', $date);

$moisfr = $mois[intval(date('m',$data1['datedeb']))]; 
$jourfr = $jour[date('w',$data1['datedeb'])];

	?>
  <hr size="3" />
  
      </div>
	   <table style="width:100%;">
	   <tr>
		<td style="width:50%; vertical-align:top; padding-top: 0px;">
			<div class="event-single-date panel">
				<div class="row">
					<div class="three phone-one columns">
						<div class="event-single-date-number"><?php echo date('d',$data1['datedeb']); ?></div>
					</div>
				<div class="columns">
					<div class="event-single-date-month"> <?php echo $moisfr.' ' .date('Y',$data1['datedeb']); ?> </div>
					<div class="event-single-date-day"> <?php echo $jourfr;?> </div>
				</div>
				<div class="four phone-one columns end">
					<div id="datetime-tip" class="event-single-date-times tip-bottom has-tip" title="">
						<div class="event-single-date-time-start" title="Heure de début de l'événement"> <?php echo stripslashes(htmlspecialchars($data1['heuredeb'])); ?> </div>
						<div class="event-single-date-time-end" title="Heure de fin de l'événement"> <?php echo stripslashes(htmlspecialchars($data1['heurefin'])); ?> </div>						
					</div>
				</div>
				</div>
			</div>
		<div class="profildroit" style="padding-top: 10px; padding-bottom: 5px; margin-top: 15px;">
				
		<?php
			echo'<p class="profile-item"><strong class="white radius label">Nom de l\'événement :</strong>  '.stripslashes(htmlspecialchars($data1['nomeve'])).'</p>';
			echo'<p class="profile-item"><strong class="white radius label">HashTag :</strong>  '.stripslashes(htmlspecialchars($data1['hashtag'])).'</p>';
			echo'<p class="profile-item"><strong class="white radius label">Ville : </strong>'.stripslashes(htmlspecialchars($data1['city'])).'</p>';
			echo'<p class="profile-item"><strong class="white radius label">Lieu : </strong><a href="'.stripslashes(htmlspecialchars($data1['map'])).'"> '.stripslashes(htmlspecialchars($data1['lieu'])).' </a></p>';
			echo'<p class="profile-item"><strong class="white radius label">Date début : </strong>'.date('d',$data1['datedeb']).' '.$moisfr.' '.date('Y',$data1['datedeb']).' à '.stripslashes(htmlspecialchars($data1['heuredeb'])).'</p>';
			echo'<p class="profile-item"><strong class="white radius label">Date fin : </strong>'.date('d',$data1['datefin']).' '.$moisfr.' '.date('Y',$data1['datefin']).' à '.stripslashes(htmlspecialchars($data1['heurefin'])).'</p>';
			echo'<p class="profile-item"><strong class="white radius label">Nombre de participant : </strong>'.stripslashes(htmlspecialchars($data1['nbpart'])).'</p>';
			echo'<p class="profile-item"><strong class="white radius label">Autre Information : </strong><a href="'.stripslashes(htmlspecialchars($data1['lien'])).'"> Wiki </a></p>';
		?>	
			</div>
			
			
	  
		</td>
 
	   <td style="width:50%; vertical-align:top;">
	   
	   <?php echo '<iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="'.stripslashes(htmlspecialchars($data1['map'])).'"></iframe>';
		  	
	   }
	?>
	<div style="position:fixed;left:50px;top:30%;">
	<a name="fb_share" type="box_count" share_caption='nofollow' share_url="http://reps.mozilla-tunisia.org/events/detailsevent.php?e=<?php echo $eve?>"></a>
<br/><br/>	
	<script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
<a href="https://twitter.com/share" class="twitter-share-button" data-count="vertical" data-url="http://reps.mozilla-tunisia.org/events/detailsevent.php?e=<?php echo $eve?>" data-text="<?php echo stripslashes(htmlspecialchars($data1['nomeve'])); ?>" data-via="MozillaTunisia" data-lang="fr" data-hashtags="<?php echo stripslashes(htmlspecialchars($data1['hashtag'])); ?>">Tweeter</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	<br/>		<br/>		
<!-- Place this tag in your head or just before your close body tag. -->
<script type="text/javascript" src="https://apis.google.com/js/plusone.js">
  {lang: 'fr'}
</script>

<!-- Place this tag where you want the share button to render. -->
<div class="g-plus" data-action="share" data-annotation="vertical-bubble" data-height="60" data-href="http://reps.mozilla-tunisia.org/events/detailsevent.php?e=&lt;?php echo $eve?&gt;"></div>

	</div>
		
	</div>
	
	</td>
       </tr>
	   </table>	
    
	   <div class="profildroit" >
	   <?php
	   
	   echo'<p class="profile-item"><strong class="white radius label">Déscription : </strong><br />'.stripslashes(nl2br($data1['description'])).'</p>';
	   
	   
	   ?>
	  </div>	
	  <div class="profildroit" >
	  <div id="gallery">

<?php

//===============================================================================
//
//  UPLOAD HTTP - Sub0 - 08/07/05
//
//===============================================================================
$maxfiles = 1000;
$maxsize = 1000000000;
$finaldir = 'gallery/'.$eve;

//===============================================================================
//  TRAITEMENT DU FORMULAIRE
//===============================================================================
if(isset($_POST['valider'])){
 
  //=============================================================================
  //  TEST DU NOMBRE DE FICHIERS POSTES
  //=============================================================================
  $nbr=0;
  for($x=0;$x<$maxfiles;$x++) 
    if(!empty($_FILES['userfile']['name'][$x])) $nbr++;
  if($nbr<=0) die("Aucun fichier spécifié !<br/>"); 
 
  //=============================================================================
  //  CREATION DE L'ARBORESCENCE POUR LE DOSSIER DESTINATION
  //=============================================================================
  if(!empty($finaldir)) { 
     if(substr($finaldir,strlen($finaldir)-1,1)=='/') $finaldir.='/'; 
     $dir=explode('/',$finaldir); 
     $finaldir=''; 
     for($x=0;$x<count($dir);$x++) { 
        $finaldir.=$dir[$x].'/'; 
        if(!@is_dir($finaldir)) @mkdir($finaldir,0777); 
     } 
     if(!@is_dir($finaldir)) die("Le dossier $finaldir est invalide !<br/>"); 
  } 
 
  //=============================================================================
  //  TELECHARGEMENT DES FICHIERS
  //=============================================================================
  for($x=1;$x<=$maxfiles;$x++) {
    $errorhttp=$_FILES['userfile']['error'][$x-1];
    $filenamehttp=$_FILES['userfile']['name'][$x-1];
    $typehttp=$_FILES['userfile']['type'][$x-1]; 
    $sizehttp=$_FILES['userfile']['size'][$x-1];
    $tmpfilehttp=$_FILES['userfile']['tmp_name'][$x-1];
    if (($errorhttp)and(!empty($filenamehttp))) { 
      switch ($errorhttp){ 
        case 1: echo "Erreur : Le fichier n°$x est trop grand !<br/>";break; 
        case 2: echo "Erreur : Le fichier n°$x est trop grand !<br/>";break; 
        case 3: echo "Erreur : Transfert du fichier n°$x interrompu !<br/>";break; 
        case 4: echo "Erreur : Le fichier n°$x est vide !<br/>";break; 
      } 
    } else {      
      if((!empty($filenamehttp))and($sizehttp>0)) {
        if($sizehttp<=$maxsize){
          if(@is_uploaded_file($tmpfilehttp)) { 
             if(@eregi('.php',$filenamehttp)) $filenamehttp.='.txt'; 
             if(filesize($tmpfilehttp)==$sizehttp) {
               if(@move_uploaded_file($tmpfilehttp,$finaldir.$filenamehttp)) { 
                  @chmod($filenamehttp,0777); 
                  echo "Fichier n°$x uploadé : ".basename($filenamehttp).
                       " (".round(max($sizehttp,1024)/1024)." ko)<br/>";
               } else echo "Erreur de téléchargement du fichier n°$x !<br/>"; 
             } else echo "Erreur de téléchargement du fichier n°$x !<br/>";
          } else echo "Erreur de téléchargement du fichier n°$x !<br/>"; 
        } else echo "Erreur : Le fichier n°$x est trop grand !<br/>"; 
      } // else echo "Le fichier n°$x est introuvable ou vide !<br/>";
    }
  }
 
  die ("Opération terminée.<br/>");
}
 
//===============================================================================
//  FORMULAIRE HTML
//===============================================================================
echo'<span class="profile-item"><strong class="white radius label">Album photos : </strong></span>';
$directory = 'gallery/'.$eve;
$octet=0;
	  

	  if((int)$_SESSION['level']==4)
	  { 
	  
echo '<form method="post" enctype="multipart/form-data"'.
     ' onSubmit="document.getElementById(\'valider\').style.visibility=\'hidden\';">'. 
     '<input type="hidden" name="MAX_FILE_SIZE" value="'.$maxsize.'"/>';
//for($x=1;$x<=max($maxfiles,1);$x++)
 // echo ' Fichier n°'.$x.' : <input type="file" name="userfile[]" size="20"/><br/>';
  echo'<input type="file" name="userfile[]" multiple>';
echo '<input type="submit" name="valider" style="margin-left:40px;" value="Envoyer..."/>'.
     '</form>';
 }
 
//===============================================================================
if(!@is_dir($finaldir))
mkdir("gallery/".$eve); 
$directory = 'gallery/'.$eve;

$allowed_types=array('jpg','jpeg','gif','png');
$file_parts=array();
$ext='';
$title='';
$i=0;

$dir_handle = @opendir($directory) or die("There is an error with your image directory!");
echo'<br /><br />';

while ($file = readdir($dir_handle)) 
{
	if($file=='.' || $file == '..') continue;
						
	$file_parts = explode('.',$file);
	$ext = strtolower(array_pop($file_parts));

	$title = implode('.',$file_parts);
	$title = htmlspecialchars($title);
	
	$nomargin='';
	
	if(in_array($ext,$allowed_types))
	{			
		echo '
		<div class="pic '.$nomargin.'" style="background:url('.$directory.'/'.$file.') no-repeat 50% 50%;">
		<a href="'.$directory.'/'.$file.'" title="'.$title.'" target="_blank">'.$title.'</a>		
		</div>';		
		$i++;
		
	}
	
}
if ($i<1) 
echo '<br/><br/><h6>Aucun album photo trouvé pour cet événement.</h6>';
closedir($dir_handle);

?>
	  
	  <div class="clear"></div>
    </div>
    
 
 </div>
 </div>
<div class="main-container">
 </div>
 <div style="position:fixed;left:30px;top:90%;" title="Clickez pour signaler un problème">
<a href="../404/bug.php"><img src="../images/bug.png" alt="Logo" /></a>
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
