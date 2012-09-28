<?php
session_start();
include("../scripts/identifiants.php");

		$ch1 = "";
		$ch2 = "";
		$ch3 = "";
		$ch4 = "";
		$ch5 = "";
		$ch6 = "";
		$ch7 = "";
		$ch8 = "";
		$ch9 = "";
		$ch10 = "";
		$ch11 = "";
		$ch12 = "";
		
		$requete2 = mysql_query("SELECT * FROM interet WHERE iduser='" . intval($_SESSION['id'])."' ORDER BY id");
       while ($data2 = mysql_fetch_assoc($requete2))
        {
		if($data2['nomint']=="Dévelopement Web")
			$ch1 = "checked";		
		if($data2['nomint']=="Design")
			$ch2 = "checked";		
		if($data2['nomint']=="Graphics")
			$ch3 = "checked";		
		if($data2['nomint']=="HTML5")
			$ch4 = "checked";		
		if($data2['nomint']=="CSS3")
			$ch5 = "checked";		
		if($data2['nomint']=="JavaScript")	
			$ch6 = "checked";	
		if($data2['nomint']=="Addons")	
			$ch7 = "checked";
		if($data2['nomint']=="Apps")	
			$ch8 = "checked";	
		if($data2['nomint']=="Créatif")	
			$ch9 = "checked";
		if($data2['nomint']=="Recherche et B2G")	
			$ch10 = "checked";
		if($data2['nomint']=="Thunderbird")	
			$ch11 = "checked";
		if($data2['nomint']=="FireFox")	
			$ch12 = "checked";
	    }

            $envoi = $_GET['envoi'];                //aiguilleur
            $voiture = $_GET['voiture'];            //Nom de la voiture
            $options = $_GET['options'];            //Contenu des cases à cocher
     
              if ($envoi == 'yes') {
                   				
					mysql_query("DELETE FROM interet WHERE iduser = '" . intval($_SESSION['id'])."'")or die(mysql_error());
                      for ($i=0;$i<count($options);$i++)					  
						mysql_query("INSERT INTO interet(iduser, nomint) VALUES('" . intval($_SESSION['id']) . "', '" . $options[$i] . "')")or die(mysql_error());					  
         header("Location: add.php");

		 }
		 
?>
<!DOCTYPE html>
<title>Mozilla Tunisia | Membre</title>
<head>
<meta http-equiv="Content-Language" content="fr,en" />
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr">

<style type="text/css">
@font-face {
    font-family: "Open Sans";
    font-style: normal;
    font-weight: normal;
    src: url("//www.mozilla.org/img/fonts/OpenSans-Regular-webfont.eot?#iefix") format("embedded-opentype"), url("//www.mozilla.org/img/fonts/OpenSans-Regular-webfont.woff") format("woff"), url("//www.mozilla.org/img/fonts/OpenSans-Regular-webfont.ttf") format("truetype"), url("//www.mozilla.org/img/fonts/OpenSans-Regular-webfont.svg#OpenSansRegular") format("svg");
}
@font-face {
    font-family: "MetaBlack";
    font-weight: bold;
    src: local("?"), url("/media/fonts/MetaWebPro-Black.woff") format("woff");
}
@font-face {
    font-family: "MetaNormal";
    font-weight: bold;
    src: local("?"), url("/media/fonts/MetaWebPro-Normal.woff") format("woff");
}
@font-face {
    font-family: "MetaBold";
    font-weight: bold;
    src: local("?"), url("/media/fonts/MetaWebPro-Bold.woff") format("woff");
}
@font-face {
    font-family: "ModernPictogramsNormal";
    font-style: normal;
    font-weight: normal;
    src: url("/media/fonts/modernpics-webfont.eot?#iefix") format("embedded-opentype"), url("/media/fonts/modernpics-webfont.woff") format("woff"), url("/media/fonts/modernpics-webfont.ttf") format("truetype"), url("/media/fonts/modernpics-webfont.svg#ModernPictogramsNormal") format("svg");
}
@font-face {
    font-family: "Open Sans Light";
    font-style: normal;
    font-weight: normal;
    src: url("//www.mozilla.org/img/fonts/OpenSans-Light-webfont.eot?#iefix") format("embedded-opentype"), url("//www.mozilla.org/img/fonts/OpenSans-Light-webfont.woff") format("woff"), url("//www.mozilla.org/img/fonts/OpenSans-Light-webfont.ttf") format("truetype"), url("//www.mozilla.org/img/fonts/OpenSans-Light-webfont.svg#OpenSansLight") format("svg");
}
@font-face
{
	font-family: 'ChunkFive Regular';
	src: url('fonts/Chunkfive.eot');
	src: local('ChunkFive Regular'), local('ChunkFive'), url('fonts/Chunkfive.woff') format('woff'), url('fonts/Chunkfive.otf') format('opentype');
}
@font-face
{
	font-family: 'Artifika';
	font-style: normal;
	font-weight: normal;
	src: local('Artifika Medium'), local('Artifika-Medium'), url('fonts/Artifika-Regular.woff') format('woff'), url('fonts/Artifika-Regular.ttf') format('truetype');
}
</style>
</head>
      <body>     
      <form action="add.php" method="get">
	  
      <input type="hidden" name="envoi" value="yes">
	  <br />
	  <table style="margin:10px auto auto auto; width: 600px;">
	  <tr><td style="font-size: 28px;letter-spacing: -0.5px;color: #484848;
    display: block;
    font-family: 'Open Sans Light',sans-serif;
    font-weight: 300;
    line-height: 100%;
    margin: 0 0 12px;
    text-shadow: 0 1px 0 rgba(255, 255, 255, 0.75);">Précisez vos intérêts dans des domaines fonctionnels de Mozilla</td></tr>
	  <br />
	  <tr><td style="font-size: 26px;letter-spacing: -0.5px;color: #484848;
    display: block;
    font-family: 'Open Sans Light',sans-serif;
    font-weight: 300;
    line-height: 100%;
    margin: 0 0 12px;
    text-shadow: 0 1px 0 rgba(255, 255, 255, 0.75);">Domaines fonctionnels</td></tr>
	  <br />
	  </table>
	  
      <table style="margin:10px auto auto auto; width: 600px;">
		<tr style="height: 50px;">		
			<td><input type="checkbox" name="options[]" value="Dévelopement Web" <?php echo$ch1; ?> >Dévelopement Web</td>	  
            <td><input type="checkbox" name="options[]" value="Design" <?php echo$ch2; ?>>Design</td>		
			<td><input type="checkbox" name="options[]" value="Graphics" <?php echo$ch3; ?>>Graphics</td>
		</tr>
		<tr style="height: 50px;">
			  <td><input type="checkbox" name="options[]" value="HTML5" <?php echo $ch4; ?>>HTML5</td>
			  <td><input type="checkbox" name="options[]" value="CSS3" <?php echo$ch5; ?>>CSS3</td>
			  <td><input type="checkbox" name="options[]" value="JavaScript" <?php echo$ch6; ?>>JavaScript</td>
		</tr>
		<tr style="height: 50px;">
			  <td><input type="checkbox" name="options[]" value="Addons" <?php echo$ch7; ?> >Addons</td>
			  <td><input type="checkbox" name="options[]" value="Apps" <?php echo$ch8; ?> >Apps</td>
			  <td><input type="checkbox" name="options[]" value="Créatif" <?php echo$ch9; ?> >Créatif</td>
		</tr>
		<tr style="height: 50px;">
			  <td><input type="checkbox" name="options[]" value="Recherche et B2G" <?php echo$ch10; ?> >Recherche et B2G</td>
			  <td><input type="checkbox" name="options[]" value="Thunderbird" <?php echo$ch11; ?> >Thunderbird</td>
			  <td><input type="checkbox" name="options[]" value="FireFox" <?php echo$ch12; ?> >FireFox</td>
			  
		</tr>		
		<tr><td> <input type="submit"></td></tr>
	  </table>
     
      </form>
     
     

</body>
</html>
