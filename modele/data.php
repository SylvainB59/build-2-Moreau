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

// show projects by types
function getProjectsPreviewByTypes()
{
	$info = $_POST['types'];
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
	                       WHERE t.name = \'' . $info . '\'
	                       ORDER BY limitDate DESC
	                       ');
	$donnee = $req->fetchAll();
	return $donnee;
}

// show projects by members
function getProjectsPreviewByMembers()
{
	$info = $_POST['members'];
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
	                       WHERE m.name = \'' . $info . '\'
	                       ORDER BY limitDate DESC
	                       ');
	$donnee = $req->fetchAll();
	return $donnee;
}

// select show of projects
function getProjectsPreview()
{
	
	if (isset($_POST['types']))
	{
		$donnee = getProjectsPreviewByTypes();
	}
	elseif (isset($_POST['members']))
	{
		$donnee = getProjectsPreviewByMembers();
	}
	elseif (isset($_POST['reset']))
	{
		$donnee = getAllProjectsPreview();
	}
	elseif (!isset($_POST['types']) OR !isset($_POST['members']) OR !isset($_POST['reset']))
	{
		$donnee = getAllProjectsPreview();
	}

	return $donnee;
}

?>
