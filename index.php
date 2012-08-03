<?php
session_start();
include("scripts/identifiants.php");
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
      <li class="active"><a href="index.php">Home</a></li>
      <li><a href="membre.php">Membre</a></li>      
      <li class="last"><a href="contact.php">Contact</a></li>    
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
	</div>    	
    <div id="slide2">
        <img src="images/show2.jpg" alt="Slide 2 jFlow Plus" />        
    </div>   
	<div id="slide3">
        <img src="images/show3.jpg" alt="Slide 3 jFlow Plus" />
    </div>
	<div id="slide4">
        <img src="images/show4.jpg" alt="Slide 3 jFlow Plus" />
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
       </ul>
    </article>
    <article class="footbox last">
      <h2>We Are Social!</h2>
      <div id="social">
      <a href="#"><img src="images/ico-social-facebook.png" alt="" /></a>
      <a href="#"><img src="images/ico-social-twitter.png" alt="" /></a>
      <a href="#"><img src="images/ico-social-flickr.png" alt="" /></a>
      <a href="#"><img src="images/ico-social-linkedin.png" alt="" /></a>
      <a href="#"><img src="images/ico-social-delicious.png" alt="" /></a>
      <a href="#"><img src="images/ico-social-youtube.png" alt="" /></a>
      </div> 
    </article>
  <article class="latestgallery">
      <h2>Latest Work</h2>
      <ul>
		<li><a href="images/thumb.jpg" data-gal="prettyPhoto[gallery]" title="Title"><img src="images/thumb.jpg" alt="" width="150" height="95" /></a></li>
        <li><a href="images/thumb2.jpg" data-gal="prettyPhoto[gallery]" title="Title"><img src="images/thumb2.jpg" alt=""  width="150" height="95" /></a></li>
        <li><a href="images/thumb3.jpg" data-gal="prettyPhoto[gallery]" title="Title"><img src="images/thumb3.jpg" alt=""  width="150" height="95" /></a></li>
        <li><a href="images/thumb4.jpg" data-gal="prettyPhoto[gallery]" title="Title"><img src="images/thumb4.jpg" alt=""  width="150" height="95" /></a></li>       
      </ul>
    </article>
    
            <div class="clear"></div> 
        </div> 
        <div class="calloutoverlay"></div> 
        <div class="calloutoverlaybottom"></div> 
    </div> 
</div> </div> 
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
