<?php

require_once('dbConnect/dbConnect.php');

function getNameOfType()
{
	$req = getBdd()->query('SELECT * FROM types');
	$donnee = $req->fetchAll();
	return $donnee;
}


function newProject()
{
	if(isset($_POST['validNewProject']))
	{
		
	}
}
