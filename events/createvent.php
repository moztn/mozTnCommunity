<?php
session_start();
include("../scripts/identifiants.php");
$nbr_non_vus = mysql_query("SELECT COUNT(*) AS nbre FROM mp WHERE destinataire='".$_SESSION['pseudo']."' AND vu='0' AND (efface='0' OR efface='2')")or die(mysql_error());
$nbre_non_vus = mysql_fetch_assoc($nbr_non_vus);
?>

<!DOCTYPE html>
<title>Mozilla Tunisia | Home</title>
<head>
<meta http-equiv="Content-Language" content="fr,en" />
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr">
<link rel="stylesheet" href="../styles/elegant-press.css" type="text/css" />
<link rel="stylesheet" href="../styles/event.css" type="text/css" />
<script src="../scripts/elegant-press.js" type="text/javascript"></script>
<!--[if IE]><style>#header h1 a:hover{font-size:75px;}</style><![endif]-->
<link rel="stylesheet" href="../styles/jquery.ui.all.css">
<link rel="stylesheet" href="../styles/demos.css">
	<script src="../scripts/jquery-1.7.2.js"></script>
	<script src="../scripts/jquery.ui.core.js"></script>
	<script src="../scripts/jquery.ui.datepicker.js"></script>
	<script src="../scripts/jquery.ui.widget.js"></script>
	<script src="../scripts/jquery.ui.position.js"></script>
	<script src="../scripts/jquery.ui.autocomplete.js"></script>
	<link rel="stylesheet" href="../styles/feuilledestyle.css" type="text/css" />
	
	<script type="text/javascript" src="../scripts/jquery.formvalidation.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#ab").formValidation({
			alias		: "name",
			required	: "accept",
			err_list	: true
		}); 
               
	});
	</script>
	
	<script>
	$(function() {
		$( "#datepicker" ).datepicker({ minDate: "-2Y", maxDate: "+2Y" });
	});
	</script>
	<script>
	$(function() {
		$( "#datepicker1" ).datepicker({ minDate: "-2Y", maxDate: "+2Y" });
	});
	</script>
	<script>
	$(function() {
		var availableTags = [
			"Ariana",
			"Béja",
			"Ben Arous",
			"Bizerte",
			"Gabes",
			"Gafsa",
			"Jendouba",
			"Kairouan",
			"Kasserine",
			"Kébili",
			"Kef",
			"Mahdia",
			"Manouba",
			"Médenine",
			"Monastir",
			"Nabeul",
			"Sfax",
			"Sidi Bouzid",
			"Siliana",
			"Sousse",
			"Tataouine",
			"Tozeur",
			"Tunis",
			"Zaghouan"
		];
		$( "#tags" ).autocomplete({
			source: availableTags
		});
	});
	</script>
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
	  <li class="current"><a href="../events/createvent.php">Crreate Events</a></li>
    </ul>
</div>
<br />
<br />

    <div class="box">
           <div class="content" style="width:100%">
        <h2>Create Events</h2>
  <hr size="3" />

  <?php if((int)$_SESSION['level']==4)
	  { ?>
			
			
			<?php
	if (isset($_SESSION['pseudo'])) // Si le membre est connecté
{ ?>
		<form id="ab" action="neweventok.php" method="post">
		
  <p class="error"></p>
			<table border="0" style="width:500px; margin : 10px auto auto auto; ">				
				<tr>
					<td>Nom de l'événement :</td>
					<td><input tabindex="1" required="true" name="nomevent" id="nomevent" size="25" value="" title="Nom de l'événement" type="text" class="input-text big"/></td>
				</tr>
				<tr>
					<td>Description :</td>
					<td><textarea required="true" name="description" id="description" rows="3" style="width:300px" class="input-text big"></textarea></td>
				</tr>
				<tr>
					<td>Lien externe : </td>
					<td><input tabindex="3" required="true" mask="domain" name="lien" id="lien" size="25" value="" title="lien" type="text" class="input-text big" /></td>
				</tr>
				<tr>
					<td>Date Début : </td>
					<td>
						<input required="true" name="datedebut" type="text" id="datepicker" size="5" style="width:150px" class="input-text big"/>
						<select name="heuredebut" id="heuredebut" tabindex="4" required="true">							
							<option>00</option>
							<option>01</option>
							<option>02</option>
							<option>03</option>
							<option>04</option>
							<option>05</option>
							<option>06</option>
							<option>07</option>
							<option>09</option>
							<option>10</option>
							<option>11</option>
							<option>12</option>
							<option>13</option>
							<option>14</option>
							<option>15</option>
							<option>16</option>
							<option>17</option>
							<option>18</option>
							<option>19</option>
							<option>20</option>
							<option>21</option>
							<option>22</option>
							<option>23</option>							
						</select>
						:
						<select name="minutedebut" id="minutedebut" tabindex="4" required="true">							
							<option>00</option>
							<option>01</option>
							<option>02</option>
							<option>03</option>
							<option>04</option>
							<option>05</option>
							<option>06</option>
							<option>07</option>
							<option>09</option>
							<option>10</option>
							<option>11</option>
							<option>12</option>
							<option>13</option>
							<option>14</option>
							<option>15</option>
							<option>16</option>
							<option>17</option>
							<option>18</option>
							<option>19</option>
							<option>20</option>
							<option>21</option>
							<option>22</option>
							<option>23</option>			
							<option>24</option>
							<option>25</option>
							<option>26</option>
							<option>27</option>
							<option>28</option>
							<option>29</option>
							<option>30</option>
							<option>31</option>
							<option>32</option>
							<option>33</option>
							<option>34</option>
							<option>35</option>
							<option>36</option>
							<option>37</option>
							<option>38</option>
							<option>39</option>
							<option>40</option>
							<option>41</option>
							<option>42</option>
							<option>43</option>
							<option>44</option>
							<option>45</option>
							<option>46</option>	
							<option>47</option>
							<option>48</option>
							<option>49</option>
							<option>50</option>
							<option>51</option>
							<option>52</option>
							<option>53</option>
							<option>54</option>
							<option>55</option>
							<option>56</option>
							<option>57</option>
							<option>58</option>
							<option>59</option>
							<option>60</option>
						</select>						
					</td>
				</tr>
				<tr>
					<td>Date Fin : </td>
					<td>
						<input required="true" name="datefin" type="text" id="datepicker1" size="5" style="width:150px" class="input-text big"/>
						<select name="heurefin" id="heurefin" tabindex="4" required="true">							
							<option>00</option>
							<option>01</option>
							<option>02</option>
							<option>03</option>
							<option>04</option>
							<option>05</option>
							<option>06</option>
							<option>07</option>
							<option>09</option>
							<option>10</option>
							<option>11</option>
							<option>12</option>
							<option>13</option>
							<option>14</option>
							<option>15</option>
							<option>16</option>
							<option>17</option>
							<option>18</option>
							<option>19</option>
							<option>20</option>
							<option>21</option>
							<option>22</option>
							<option>23</option>							
						</select>
						:
						<select name="minutefin" id="minutefin" tabindex="4" required="true">							
							<option>00</option>
							<option>01</option>
							<option>02</option>
							<option>03</option>
							<option>04</option>
							<option>05</option>
							<option>06</option>
							<option>07</option>
							<option>09</option>
							<option>10</option>
							<option>11</option>
							<option>12</option>
							<option>13</option>
							<option>14</option>
							<option>15</option>
							<option>16</option>
							<option>17</option>
							<option>18</option>
							<option>19</option>
							<option>20</option>
							<option>21</option>
							<option>22</option>
							<option>23</option>			
							<option>24</option>
							<option>25</option>
							<option>26</option>
							<option>27</option>
							<option>28</option>
							<option>29</option>
							<option>30</option>
							<option>31</option>
							<option>32</option>
							<option>33</option>
							<option>34</option>
							<option>35</option>
							<option>36</option>
							<option>37</option>
							<option>38</option>
							<option>39</option>
							<option>40</option>
							<option>41</option>
							<option>42</option>
							<option>43</option>
							<option>44</option>
							<option>45</option>
							<option>46</option>	
							<option>47</option>
							<option>48</option>
							<option>49</option>
							<option>50</option>
							<option>51</option>
							<option>52</option>
							<option>53</option>
							<option>54</option>
							<option>55</option>
							<option>56</option>
							<option>57</option>
							<option>58</option>
							<option>59</option>
							<option>60</option>
						</select>						
					</td>
				</tr>				
				<tr>
					<td>Hash Tag :</td>
					<td><input name="hashtag" id="hashtag" value="" placeholder="Mettez votre hashtag sans # et séparer par des espaces" title="hashtag" type="text" class="input-text big"/></td>
				</tr>								
				<tr>
					<td>Ville : </td>
					<td> <input required="true" id="tags" name="ville" class="input-text big"/></td>
				</tr>
				<tr>
					<td>Lieu : </td>
					<td><input tabindex="7" required="true" name="lieu" id="lieu" value="" title="lieu" type="text" class="input-text big" /></td>
				</tr>
				<tr>
					<td><label for="avatar">Lien Map :</label></td>
					<td><input tabindex="7" name="map" id="map" value="" title="map" type="text" class="input-text big" /></td>
				</tr>				
				<tr>
					<td>&nbsp;</td>
					<td>
						<input type="reset" name="button" id="button" value="Réinitialiser" />
						<input type="submit" value="Enregistrer" onclick="verifvide()"/>
					</td>					
				</tr>
			</table>
		</form>
		<?php } 
			
	} 
	else
		echo'<h4>Vous n\'avez pas le droit de créer un événement<br /></h5>';
	?>
	

      </div>

      <div class="clear"></div>
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
