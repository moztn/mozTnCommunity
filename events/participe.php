<?php
     
   session_start();
include("../scripts/identifiants.php");
         
     if($_GET['part']=="Participer")
	 {
	 mysql_query("insert into eventuser (iduser,idevent) values('".$_GET['user']."','".$_GET['event']."')")or die(mysql_error());
	 mysql_query("update event set nbpart = nbpart+1 where id='".$_GET['event']."'")or die(mysql_error());
	 }
	 if($_GET['part']=="Annuler")
	 {
		mysql_query("delete from eventuser where idevent='".$_GET['event']."' and iduser = '".$_GET['user']."' ")or die(mysql_error());
		mysql_query("update event set nbpart = nbpart-1 where id='".$_GET['event']."'")or die(mysql_error());
	 }
	 if($_GET['part']=="Supprimer")
	 {
		mysql_query("delete from event where id='".$_GET['event']."' ")or die(mysql_error()); 
	 }
    ?>
	