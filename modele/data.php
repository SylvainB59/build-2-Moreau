<?php

require_once('dbConnect/dbConnect.php');

// return the name in the table you want 
function getNameOf($a)
{
	$req = getBdd()->query('SELECT name FROM '.$a);
	$donnee = $req->fetchAll();
	return $donnee;
}

// return the name of the project, the type, and the membre who crated
function getAllProjectsPreview()
{
	$req = getBdd()->query('SELECT 
		                       p.id,
		                       p.name projectName,
		                       p.limit_date limitDate,
		                       t.name projectType,
		                       m.name projectMember 
	                       FROM projects p
	                       INNER JOIN types t
	                       ON p.id_type = t.id
	                       INNER JOIN members m
	                       ON p.id_member = m.id
	                       ORDER BY limitDate DESC
	                       ');
	$donnee = $req->fetchAll();
	return $donnee;
}

function getProjectsPreviewByTypes()
{
	$req = getBdd()->query('SELECT 
		                       p.id,
		                       p.name projectName,
		                       p.limit_date limitDate,
		                       t.name projectType,
		                       m.name projectMember 
	                       FROM projects p
	                       INNER JOIN types t
	                       ON p.id_type = t.id
	                       INNER JOIN members m
	                       ON p.id_member = m.id
	                       WHERE t.name = \'' . $_POST['types'] . '\'
	                       ORDER BY limitDate DESC
	                       ');
	$donnee = $req->fetchAll();
	return $donnee;
}

function getProjectsPreviewByMembers()
{
	$req = getBdd()->query('SELECT 
		                       p.id,
		                       p.name projectName,
		                       p.limit_date limitDate,
		                       t.name projectType,
		                       m.name projectMember 
	                       FROM projects p
	                       INNER JOIN types t
	                       ON p.id_type = t.id
	                       INNER JOIN members m
	                       ON p.id_member = m.id
	                       WHERE m.name = \'' . $_POST['members'] . '\'
	                       ORDER BY limitDate DESC
	                       ');
	$donnee = $req->fetchAll();
	return $donnee;
}

function getProjectsPreview()
{
	if (!isset($_POST['types']) OR !isset($_POST['members']) OR $_POST['types']=='all' OR $_POST['members']=='all')
	{
		getAllProjectsPreview();
	}
	elseif (isset($_POST['types']))
	{
		getProjectsPreviewByTypes();
	}
	elseif (isset($_POST['members']))
	{
		getProjectsPreviewByMembers();
	}
}

?>
