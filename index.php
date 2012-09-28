<?php
session_start();
include("scripts/identifiants.php");
$nbr_non_vus = mysql_query("SELECT COUNT(*) AS nbre FROM mp WHERE destinataire='".$_SESSION['pseudo']."' AND vu='0' AND (efface='0' OR efface='2')")or die(mysql_error());
$nbre_non_vus = mysql_fetch_assoc($nbr_non_vus);		
?>
<!DOCTYPE html>
<title>Mozilla Tunisia | Home</title>
<head>
<meta http-equiv="Content-Language" content="fr,en" />
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr">
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
  <div id="mySlides">
    <div id="slide1">    
        <img src="images/show1.jpg" alt="Slide 1 jFlow Plus" />
        <!--<span><b class="slideheading">First Featured Slide</b><br />Featured Text.....<a href="#" title="Coolness" class="readmore">Read More!</a></span>-->
	</div>    	
    <div id="slide2">
        <img src="images/show2.jpg" alt="Slide 2 jFlow Plus" />
        <!--<span><b class="slideheading">Second Featured Slide</b><br />Featured Text.....<a href="#" title="Coolness" class="readmore">Read More!</a></span>-->
    </div>   
	<div id="slide3">
        <img src="images/show3.jpg" alt="Slide 3 jFlow Plus" />
        <!--<span><b class="slideheading">Third Featured Slide</b><br />Featured Text.....<a href="#" title="Coolness" class="readmore">Read More!</a></span>-->
    </div>
	<div id="slide4">
        <img src="images/show4.jpg" alt="Slide 3 jFlow Plus" />
        <!--<span><b class="slideheading">Third Featured Slide</b><br />Featured Text.....<a href="#" title="Coolness" class="readmore">Read More!</a></span>-->
    </div>
</div>

<div id="myController">
   <span class="jFlowControl"></span>
   <span class="jFlowControl"></span>
   <span class="jFlowControl"></span>
   <span class="jFlowControl"></span>
</div>

<section class="jFlowPrev"><div></div></section>
<section class="jFlowNext"><div></div></section>
<br />
<br />

    <article class="box" id="home_featured21">
      <div class="block"><h2>About Mozilla</h2>
        <p> Nous sommes une communauté mondiale de personnes travaillant ensemble depuis 1998 pour façonner un Internet meilleur.
<br/>
Nous sommes une organisation à but non lucratif qui se consacre à la promotion de l'ouverture, de l'innovation et des possiblités que peut offrir le Web. <br />
<a href="http://www.mozilla.org/fr/about" class="read_more">Read More</a> 
</p>
      </div>
      <div class="block"><h2>About Mozilla Tunisia</h2>
      <img src="images/browsers.png" alt="Web Browsers" />
<br /><br />
        <ul id="list">
        <li>Dapiensociis temper donec auctortortis cumsan et curabitur.</li>
        <li>Condis lorem loborttis leo.</li>
        <li>Portortornec condimenterdum eget consectetuer condis.</li>
        <li>Puruselit mauris nulla hendimentesque elit semper nam a sapien urna sempus.</li>
        </ul>

      </div>
      <div class="block last"><h2>Mozilla Reps Program</h2>
        <p>The Mozilla Reps program aims to empower and support volunteer Mozillians who want to become official representatives of Mozilla in their region/locale.
<br/>
The program provides a simple framework and a specific set of tools to help Mozillians to organize and/or attend events, recruit and mentor new contributors, document and share activities, and support their local communities better. <br />

<a href="#" class="read_more">Read More</a></p><p></p>

      </div>
      <div class="clear"></div>
    </article>
    
 </div>
 
<!--<div class="callout"> 
    <div class="calloutcontainer"> 
        <div class="container_12"> 
            <div class="grid"> 
                <div class="alignleft">
                    <h3>Like it?  Download it for free!</h3> 
                    <p>At <a href="http://www.priteshgupta.com/templates/elegant-press">http://www.priteshgupta.com/templates/elegant-press</a></p> 
                </div> 
        <a href="http://www.priteshgupta.com/templates/elegant-press/" class="more" target="_blank">Download</a>
            </div> 
            <div class="clear"></div> 
        </div> 
        <div class="calloutoverlay"></div> 
        <div class="calloutoverlaybottom"></div> 
    </div> 
</div> 
<br /><br />

     <div class="container2">
     <article id="home_featured2">
      <ul>
        <li>
          <div class="imgholder"><a href="images/slide1.jpg" data-gal="prettyPhoto[featured]" title="First Featured Title"><img src="images/featured1.jpg" width="275" height="145" alt="" /></a></div>
          <h4>First Featured Title</h4>
          <p>Orciint erdum condimen terdum nulla mcorper elit nam curabitur laoreet met prae senean et iac ulum. Metridiculis cons eque quis iaculum aenean nunc aenean.</p>
        </li>
        <li>
          <div class="imgholder"><a href="images/slide2.jpg" data-gal="prettyPhoto[featured]" title="Second Featured Title"><img src="images/featured2.jpg" width="275" height="145" alt="" /></a></div>
          <h4>Second Featured Title</h4>
          <p>Orciint erdum condimen terdum nulla mcorper elit nam curabitur laoreet met prae senean et iac ulum. Metridiculis cons eque quis iaculum aenean nunc aenean.</p>
        </li>
        <li class="last">
          <div class="imgholder"><a href="images/slide3.jpg" data-gal="prettyPhoto[featured]" title="Third Featured Title"><img src="images/featured3.jpg" width="275" height="145" alt="" /></a></div>
          <h4>Third Featured Title</h4>
          <p>Orciint erdum condimen terdum nulla mcorper elit nam curabitur laoreet met prae senean et iac ulum. Metridiculis cons eque quis iaculum aenean nunc aenean.</p>
        </li>
      </ul>
      <br class="clear" />
    </article>
  </div>
</div>-->
<div class="main-container">

 </div>
 
<div class="callout"> 
    <div class="calloutcontainer"> 
        <div class="container_12"> 
            <div class="grid"> 
                 <article class="footbox">
      <h2>Liens Utils</h2>
      <ul>
        <li><a href="#">Site Web</a><br />
        Ceci est notre site web, vous y trouverez toute l'actualité
		</li>
        <li><a href="#">Wiki</a><br />
        Notre Wiki, il est en cours de construction ...
        </li>
       <li><a href="https://github.com/moztn">GitHub</a><br />
        Notre compte GitHub vous y trouverez tout nos projets ...
		</li> 
       </ul>
    </article>
    <article class="footbox last">
      <h2>Nous Suivre</h2>
      <div id="social">
      <a href="https://www.facebook.com/MozillaTunisia"><img src="images/ico-social-facebook.png" alt="" /></a>
      <a href="https://twitter.com/MozillaTunisia"><img src="images/ico-social-twitter.png" alt="" /></a>
      <a href="http://www.flickr.com/photos/mozillatunisia/"><img src="images/ico-social-flickr.png" alt="" /></a>
      <a href="https://github.com/moztn"><img src="images/github.png" style="width:28px;height:28px;padding-top: 2px;" alt="" /></a>
      <a href="https://www.youtube.com/MozillaTunisia"><img src="images/ico-social-youtube.png" alt="" /></a>
      </div> 
    </article>
	<?php $requete4 = mysql_query("SELECT * FROM users ORDER BY dateinscri DESC LIMIT 0, 4"); ?>
	<article class="latestgallery">
      <h2>Nouveaux Membres</h2>
      <ul>
	  <?php 
	   while ($data2 = mysql_fetch_assoc($requete4))
       {
		   
       echo '
        <li><a href="./profil.php?m='.$data2['id'].'">
			<div class="panel grid-profile">
				<div class="row">					
						<img  class="profiles-people-avatar" src="./images/avatars/'.$data2['avatar'].'" alt="Ce membre n\'a pas d\'avatar" />
						</div>
						<div class="grid-profile-text">						
						Pseudo : '.stripslashes(htmlspecialchars($data2['pseudo'])).'					
				</div>
			</div>
		</li></a>
        ';
		}?>
		 </ul>
    </article>
    
            <div class="clear"></div> 
        </div> 
        <div class="calloutoverlay"></div> 
        <div class="calloutoverlaybottom"></div> 
    </div> 
</div> </div> 
<div style="position:fixed;left:30px;top:90%;" title="Clickez pour signaler un problème">
	<a href="404/bug.php"><img src="images/bug.png" alt="Logo" /></a>
</div>
<div style="position:fixed;left:70px;top:90%;" title="Clickez pour inviter un mozilien">
	<a href="invite.php"><img src="images/adduser.png" alt="Logo" /></a>
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
