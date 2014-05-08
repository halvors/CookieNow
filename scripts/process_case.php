<?php
require_once 'database.php';
require_once 'utils.php';

session_start();

$utils = new Utils();

$action = isset($_GET['action']) ? $_GET['action'] : 0;
$id = isset($_GET['id']) ? $_GET['id'] : 0;
$returnPage = isset($_GET['returnPage']) ? '../index.php?viewPage=' . $_GET['returnPage'] : '../';

if ($utils->isAuthenticated()) {
	$user = $utils->getUser();
		
	if (isset($_GET['action'])) {
		if ($action == 1) {
			if (isset($_POST['title']) &&
				isset($_POST['content']) &&
				isset($_POST['priority'])) {
				$title = $_POST['title'];
				$content = $_POST['content'];
				$status = 1;
				$priority = $_POST['priority'];
				$opened = date('Y-m-d H:i:s'); 
				$closed = date('Y-m-d H:i:s'); 
				
				echo "Success!";
				
				$database->createCase($user->getId(), $title, $content, $status, $priority, $opened, $closed);
			}
		} else if ($action == 2) {
			if (isset($_GET['id'])) {
				$database->removeCase($id);
			}
		} else if ($action == 3) {
			if (isset($_GET['id'])) {
				if (isset($_POST['title']) &&
					isset($_POST['content'])) {
					$title = $_POST['title'];
					$content = $_POST['content'];
					
					$database->updateCase($id, $title, $content, $priority, $status);
				}
			}
		}
	}
}

//header('Location: ' . $returnPage);
?>