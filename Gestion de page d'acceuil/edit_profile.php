

<script type="text/javascript" language="Javascript" >

<!--
function verification()
{



 if(document.formulaire.pseudo.value == "")  {
   alert("Veuillez entrer un pseudo svp");
   document.formulaire.pseudo.focus();
   return false;
  }
   else if(document.formulaire.mdp.value == "") {
   alert("Veuillez entrer un mot de passe svp");
   document.formulaire.mdp.focus();
   return false;
  }
   else if(document.formulaire.mdp2.value == "") {
   alert("Veuillez confirmer votre mot de passe svp");
   document.formulaire.mdp2.focus();
   return false;
  }
  else   if(document.formulaire.mdp2.value != document.formulaire.mdp.value) {
   alert("Veuillez entrer un mot de passe identique svp");
   document.formulaire.mdp2.focus();
   return false;
  }
  else   if(document.formulaire.mail.value == "") {
   alert("Veuillez entrer une adresse email svp");
   document.formulaire.mail.focus();
   return false;
  }
  
  else  if(document.formulaire.mail.value.indexOf('@') == -1) {
   alert("Ce n'est pas une adresse mail valide");
   document.formulaire.mail.focus();
   return false;
  }
  else  if(document.formulaire.mail.value.indexOf('.') == -1) {
   alert("Ce n'est pas une adresse mail valide");
   document.formulaire.mail.focus();
   return false;
  }
 
   else if(document.formulaire.accord.checked == false) {
   alert("Veuillez accepter la difusion de vos coordonn�es svp");
   document.formulaire.accord.focus();
   return false;
  } 
  
  	
return true
}
//-->
</script>

<?php
	

	
If (isset($_GET['modif']) && $_GET['modif']!= 2) {

$modif=$_GET['modif'];

		$pseudo2="";
		$mail="";
		$mdp="";
		$nom="nom";
		$prenom="prenom";
	}

if ($_SESSION['loginOK'] == true AND $modif == 1) {
	
	$id=$_SESSION['id'];
		
	include('connexion_SQL.php');
		
	$reponse = mysql_query("SELECT * FROM conducteurs WHERE id_conducteur='$id'") or die(mysql_error());
		
	while ($donnees = mysql_fetch_array($reponse) ) {
		$pseudo2=$donnees['pseudo'];
		$mail=$donnees['mail'];
		$mdp=$donnees['mdp'];
		$nom=$donnees['nom'];
		$prenom=$donnees['prenom'];
		$tel=$donnees['tel'];
		}
		
	mysql_close();
	}
	
	else {
		//$modif = "";
		}
?>

		
		
<form name="formulaire" action="

<?php
if ($modif == 1) { echo"enregistre_conducteur.php?modif=1"; }
else {echo"enregistre_conducteur.php"; }
?>

" method="post" onSubmit="return verification()">
  
  <table  border="0">
    <tr>
      <td width="240" height="24"><p><strong>Je m'identifie:</strong></p>
      </td>
      <td width="500">&nbsp;</td>
  </tr>
  </table>
  
    <table  border="0">
    <tr>
      <td width="240" height="24"><div align="right">Mon nom</div></td>
      <td width="500"><input name="prenom" type="text" <?php echo "value=\"$prenom\""; ?>	  onFocus="javascript:this.value=''" >
        <input name="nom" type="text" <?php echo "value=\"$nom\""; ?> onFocus="javascript:this.value=''" ></td>
    </tr>
	</table>
	
	<table  border="0">
    <tr>
      <td width="240" height="24"><div align="right">Mon pseudo*</div></td>
      <td width="500"><input type="text" name="pseudo" <?php echo "value=\"$pseudo2\""; ?> ></td>
    </tr>
	</table>
	
	<table  border="0">
    <tr>
      <td height="8"></td>
    </tr>
	</table>
  <hr/>
	<table  border="0">
  <tr>
    <td width="240" height="24"><div align="right">Je choisis un mot de passe*</div></td>
    <td width="500"><input type="password" name="mdp" <?php echo "value=\"$mdp\""; ?> ></td>
  </tr>
	</table>
  
  <table  border="0">
  <tr>
    <td width="240" height="24"><div align="right">Je confirme le mot de passe*</div></td>
      <td width="500"><input type="password" name="mdp2" <?php echo "value=\"$mdp\""; ?>></td>
  </tr>
	</table>
<p>&nbsp;</p>
<p><strong>Pour me joindre:</strong></p>
<table  border="0">
  <tr>
    <td width="240" height="24"><div align="right">Mon adresse mail*      </div></td>
    <td width="500"><input type="text" name="mail" <?php echo "value=\"$mail\""; ?>></td>
  </tr>
</table>

	<table  border="0">
  <tr>
    <td width="240" height="24"><div align="right">Mon t&eacute;l&eacute;phone</div></td>
    <td width="500"><input type="text" name="tel" <?php echo "value=\"$tel\""; ?>></td>
  </tr>
	</table>

<hr/>
<p>* champs obligatoires</p>

<BR>

<p>
  <input name="accord" type="checkbox" value="oui" <?php if ($modif != "") {echo"checked"; } else {echo "unchecked"; } ?> >
  J'accepte que mes coordonn�es soient communiqu�es aux usagers de ce site (dans tous les cas mon adresse mail ne sera pas visible sur le site)<br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ce site s'engage � ne pas communiquer vos donn�es � toute autre personne que les utilisateurs de ce site.<br />
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Je decharge les createurs de ce site de toute responsabilit� en cas de probl�me survenu lors du covoiturage. 
  
  <br />
</p>
<blockquote>
  <p>
  <input type="submit" name="soumettre"  class="styled-button-12" value="Valider" /> 
<style type="text/css">
.styled-button-12 {
	-webkit-box-shadow:rgba(0,0,0,0.2) 0 1px 0 0;
	-moz-box-shadow:rgba(0,0,0,0.2) 0 1px 0 0;
	box-shadow:rgba(0,0,0,0.2) 0 1px 0 0;
	border-bottom-color:#333;
	border:1px solid #61c4ea;
	background-color:#7cceee;
	border-radius:5px;
	-moz-border-radius:5px;
	-webkit-border-radius:5px;
	color:#333;
	font-family:'Verdana',Arial,sans-serif;
	font-size:14px;
	text-shadow:#b2e2f5 0 1px 0;
	padding:5px;
	 cursor: pointer;
	 	 float:right;
	 width:100px;
}
</style>
   	 
  </p>
</blockquote>
</form>

</TD>
</TR>

</table>
