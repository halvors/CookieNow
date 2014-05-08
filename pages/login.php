<?php
require_once 'scripts/utils.php';

$utils = new Utils();

if (!$utils->isAuthenticated()) {
	echo '<form action="scripts/process_user.php?action=1&returnPage=mycases" method="post">';
		echo '<table>';
			echo '<tr>';
				echo '<td>';
					echo '<input type="text" name="username" placeholder="Username">';
				echo '</td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td>';
					echo '<input type="password" name="password" placeholder="Password">';
				echo '</td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td>';
					echo '<input type="submit" value="Logg inn">';
				echo '</td>';
			echo '</tr>';
		echo '</table>';
	echo '</form>';
} else {
	echo 'Du er allerede logget inn.';
}
?>

