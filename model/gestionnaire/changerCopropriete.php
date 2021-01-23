<?php
session_start();

//Ajax Call : Modifier session idCopropriete que le gestionnaire va choisir.
if(isset($_POST['idCopropriete']))
{
	echo $_POST['idCopropriete'];
	$_SESSION['idCopropriete'] = $_POST['idCopropriete'] ;
}

 ?>