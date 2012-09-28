<?php
session_start();
include("identifiants.php");

if($_GET['last']){

        $requete2 = mysql_query('SELECT * FROM users WHERE rang>1 and prenom > "'.$_GET['last'].'" ORDER BY prenom LIMIT 0, 30') or die (mysql_error());
        
		
		while ($data2 = mysql_fetch_assoc($requete2))
       {
		   
       echo '<div class="commentaire" id="'.$data2['prenom'].'">
        <li><a href="./profil.php?m='.$data2['id'].'">
			<div class="panel grid-profile">
				<div class="row">
					<div class="three phone-one columns grid-profile-image">
						<img  class="profiles-people-avatar" src="./images/avatars/'.$data2['avatar'].'" alt="Ce membre n\'a pas d\'avatar" />
						</div>
						<div class="grid-profile-text">
						<h6>Prenom : '.stripslashes(htmlspecialchars($data2['prenom'])).'</h6>
						<h6>Nom : '.stripslashes(htmlspecialchars($data2['nom'])).'</h6>
						Pseudo : '.stripslashes(htmlspecialchars($data2['pseudo'])).'
					</div>
				</div>
			</div>
		</li></a>
        </div>';
		}
		
        }
?>