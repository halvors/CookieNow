<?php
require_once 'database.php';

session_start();

$database = new Database();

$action = isset($_GET['action']) ? $_GET['action'] : 0;
$id = isset($_GET['id']) ? $_GET['id'] : 0;
$returnPage = isset($_GET['returnPage']) ? '../index.php?viewPage=' . $_GET['returnPage'] : '../';

if (isset($_GET['action'])) {
	/* Login user */
	if ($action == 1) {
		if (isset($_POST['username']) &&
			isset($_POST['password']) &&
			!empty($_POST['username']) &&
			!empty($_POST['password'])) {
			$username = $_POST['username'];
			$password = hash('sha256', $_POST['password']);
			
			if ($database->userExists($username)) {
				$user = $database->getUserByName($username);
				$storedPassword = $user->getPassword();
				
				if ($password == $storedPassword) {
					$_SESSION['user'] = $user;
					echo 'Du er nå logget inn!';
				}
			} else {
				echo 'Feil brukernavn eller passord.';
			}
		} else {
			echo 'Du har ikke skrevet inn et brukernavn og passord.';
		}
		
		return;
	/* Logout user */
	} else if ($action == 2) {
		if (isset($_SESSION['user'])) {
			unset($_SESSION['user']);
		}
		
		return;
	}
}

header('Location: ' . $returnPage);
?>