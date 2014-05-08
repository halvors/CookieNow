<?php
require_once 'scripts/database.php';
require_once 'scripts/utils.php';

$database = new Database();
$utils = new Utils();

if ($utils->isAuthenticated()) {
	$user = $utils->getUser();
	$caseList = $database->getCases($user->getId());
	
	if (!empty($caseList)) {
		echo '<table border="1">';
			echo '<tr>';
				echo '<th>Referansenummer:</th>';
				echo '<th>Sak:</th>';
				echo '<th>Beskrivelse:</th>';
				echo '<th>Prioritet:</th>';
				echo '<th>Status:</th>';
			echo '</tr>';
		
			foreach ($caseList as $case) {
				echo '<tr>';
					echo '<td>' . $case->getId() . '</td>';
					echo '<td>' . $case->getTitle() . '</td>';
					echo '<td>' . $case->getContent() . '</td>';
					echo '<td>' . $utils->parsePriority($case->getPriority()) . '</td>';
					echo '<td>' . $utils->parseStatus($case->getStatus()) . '</td>';
				echo '</tr>';
			}
		echo '</table>';
	} else {
		echo 'Du har ikke sendt inn noen saker enda.';
	}
} else {
	echo 'Du må være logget inn for å se saker.';
}
?>