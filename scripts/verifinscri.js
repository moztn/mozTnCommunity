function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
	
	function surligne(champ, erreur)
	{
		if(erreur)
			champ.style.backgroundColor = "#B72822";
		else
			champ.style.backgroundColor = "";
	}
	function verifvide()
	{
		var regex = /^[a-zA-Z0-9_-]+@[a-z0-9_-]{2,}\.[a-z]{2,4}$/;
		var frm=window.document.getElementById("ab");
		if((frm.pseudo.value=="")||(frm.nom.value=="")||(frm.prenom.value=="")
		 ||(frm.sexe.value=="")||(frm.jour.value=="")||(frm.mois.value=="")||(frm.annee.value=="")
		 ||(frm.email.value=="")||(frm.confirmemail.value=="")||(frm.mdp.value=="")
		 ||(frm.conmdp.value=="")||(frm.question.value=="")||(frm.reponse.value=="")||(frm.propos.value==""))
			{
				if(frm.nom.value=="")
					frm.nom.style.backgroundColor = "#B72822";
				if(frm.nom.value!="")
					frm.nom.style.backgroundColor = "";
				if(frm.pseudo.value=="")
					frm.pseudo.style.backgroundColor = "#B72822";
				if(frm.pseudo.value!="")
					frm.pseudo.style.backgroundColor = "";
				if(frm.prenom.value=="")
					frm.prenom.style.backgroundColor = "#B72822";
				if(frm.prenom.value!="")
					frm.prenom.style.backgroundColor = "";
				if(frm.sexe.value=="")
					frm.sexe.style.backgroundColor = "#B72822";
				if(frm.sexe.value!="")
					frm.sexe.style.backgroundColor = "";
				if(frm.jour.value=="")
					frm.jour.style.backgroundColor = "#B72822";
				if(frm.jour.value!="")
					frm.jour.style.backgroundColor = "";
				if(frm.mois.value=="")
					frm.mois.style.backgroundColor = "#B72822";
				if(frm.mois.value!="")
					frm.mois.style.backgroundColor = "";
				if(frm.annee.value=="")
					frm.annee.style.backgroundColor = "#B72822";
				if(frm.annee.value!="")
					frm.annee.style.backgroundColor = "";
				if(frm.email.value=="")
					frm.email.style.backgroundColor = "#B72822";
				if(frm.email.value!="")
					frm.email.style.backgroundColor = "";
				if(frm.confirmemail.value=="")
					frm.confirmemail.style.backgroundColor = "#B72822";
				if(frm.confirmemail.value!="")
					frm.confirmemail.style.backgroundColor = "";
				if(frm.mdp.value=="")
					frm.mdp.style.backgroundColor = "#B72822";
				if(frm.mdp.value!="")
					frm.mdp.style.backgroundColor = "";		
				if(frm.conmdp.value=="")
					frm.conmdp.style.backgroundColor = "#B72822";
				if((frm.conmdp.value!=""))
					frm.conmdp.style.backgroundColor = "";	
				if(frm.question.value=="")
					frm.question.style.backgroundColor = "#B72822";
				if(frm.question.value!="")
					frm.question.style.backgroundColor = "";		
				if(frm.reponse.value=="")
					frm.reponse.style.backgroundColor = "#B72822";
				if((frm.reponse.value!=""))
					frm.reponse.style.backgroundColor = "";
				if(frm.propos.value=="")
					frm.propos.style.backgroundColor = "#B72822";
				if((frm.propos.value!=""))
					frm.propos.style.backgroundColor = "";
			}
			
			
			else
			{
				frm.submit();
			}
	}
	function verifmdp()
	{
	var frm=window.document.getElementById("ab");
		if(frm.mdp.value=="")
		{
			surligne(frm.mdp, true);
			return false;
		}
		else if(frm.conmdp.value=="")
		{
			surligne(frm.conmdp, true);
			return false;
		}
		else if(frm.mdp.value!=frm.conmdp.value)
		{
			surligne(frm.conmdp, true);
			return false;
		}
		else
		{
			surligne(frm.conmdp, false);
			surligne(frm.mdp, false);
			return true;
		}
	}
	function verifAnnee(champ)
	{
		var regex = /^[0-9]{4}$/;
		if(!regex.test(champ.value))
		{
			surligne(champ, true);
			return false;
		}
		else
		{
			surligne(champ, false);
			return true;
		}
	}
	function verifnom(champ)
	{
		var regex = /^[a-zA-Z\sa-zA-Z]{3,}$/;
		if(!regex.test(champ.value))
		{
			surligne(champ, true);
			return false;
		}
		else
		{
			surligne(champ, false);
			return true;
		}
	}
	function verifmail(champ)
	{
		var regex = /^[a-zA-Z0-9_-]+@[a-z0-9_-]{2,}\.[a-z]{2,4}$/;
		if(!regex.test(champ.value))
		{
			surligne(champ, true);
			return false;
		}
		else
		{
			surligne(champ, false);
			return true;
		}
	}
	function verifcon()
	{
	var frm=window.document.getElementById("ab");
		if(frm.confirmemail.value!=frm.email.value)
		{
			surligne(frm.confirmemail, true);
			return false;
		}
		else
		{
			surligne(frm.confirmemail, false);
			return true;
		}
	}
	function verifquest()
	{
		var frm=window.document.getElementById("ab");
		if(frm.question.value=="")
		{
			surligne(frm.question, true);
			return false;
		}
		else
		{
			surligne(frm.question, false);
			return true;
		}
	}
	function verifrep()
	{
		var frm=window.document.getElementById("ab");
		if(frm.reponse.value=="")
		{
			surligne(frm.reponse, true);
			return false;
		}
		else
		{
			surligne(frm.reponse, false);
			return true;
		}
	}
	function verifpseudo()
	{
		var frm=window.document.getElementById("ab");
		if(frm.pseudo.value=="")
		{
			surligne(frm.pseudo, true);
			return false;
		}
		else
		{
			surligne(frm.pseudo, false);
			return true;
		}
	}
	
	function verifcode()
	{
		var frm=window.document.getElementById("ab");
		if((frm.code.value=="")||($valide == false))
		{
			surligne(frm.code, true);
			return false;
		}
		else
		{
			surligne(frm.code, false);
			return true;
		}
	}
	

 var compteur = 0;
function ajouter(){
// On r?cup?re le fieldset
compteur++;
var conteneur = document.getElementById('fichiers');
/**
* Cr?ation des ?l?ments dont on a besoin :
* Un div dans lequel on mettra notre champ file et une case ? cocher
* qui nous servira ? enlever ensuite le div.
*
* En utilisant un div ?a sera plus facile car sinon
* on aurais du enlever le champ file et la case ? cocher s?par?ment.
*/
var undiv = document.createElement('div');
var fich = document.createElement('input');
var check = document.createElement('input');

var br = document.createElement('br');
var p = document.createElement('p');
var strong = document.createElement('strong');
var pp = document.createElement('p');
var strongg = document.createElement('strong');
var ppp = document.createElement('p');
var stronggg = document.createElement('strong');
 
var nomevent = document.createElement('input');
var lienevent = document.createElement('input');
var descevent = document.createElement('textarea');
fich.name = 'mesfichiers[]';
fich.type = 'file';
 
check.type = 'checkbox';

nomevent.type = 'text';
nomevent.className='input-text big';
nomevent.setAttribute("id","nomevent"+compteur);
nomevent.setAttribute("name","nomevent"+compteur);

lienevent.type = 'text';
lienevent.className='input-text big';
lienevent.setAttribute("id","lienevent"+compteur);
lienevent.setAttribute("name","lienevent"+compteur);

descevent.className='input-text big';
descevent.setAttribute("id","descevent"+compteur);
descevent.setAttribute("name","descevent"+compteur);

strong.className='white radius label'; 
strongg.className='white radius label'; 
stronggg.className='white radius label'; 
// On enl?ve sur le click de la checkbox
check.onclick = function(){
// El?ment ? enlever
lediv = this.parentNode;
// El?ment auquel on enl?ve
lefieldset = lediv.parentNode;
// On enl?ve !
lefieldset.removeChild(lediv);

}
 
/**
* Ajout des ?l?ments au div grace a appendChild
* qui ajoute ? la fin.
* On utilise aussi createTextNode pour ajouter du texte apres la case
*/

undiv.appendChild(p);
p.appendChild(strong);
strong.appendChild(document.createTextNode("Nom Event : "));
undiv.appendChild(nomevent);

undiv.appendChild(pp);
pp.appendChild(strongg);
strongg.appendChild(document.createTextNode("Lien Event : "));
undiv.appendChild(lienevent);


undiv.appendChild(ppp);
ppp.appendChild(stronggg);
stronggg.appendChild(document.createTextNode("Déscription Event : "));
undiv.appendChild(descevent);

undiv.appendChild(check);
undiv.appendChild(document.createTextNode("Enlever"));
 
// Ajout du div :
conteneur.appendChild(undiv);
}
	
	