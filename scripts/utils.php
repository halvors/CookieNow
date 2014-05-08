<?php
require_once 'settings.php';
require_once 'user.php';

class Utils {
	private $settings;
	
	public function Utils() {
		$this->settings = new Settings();
	}
	
	public function getUser() {
		return $this->isAuthenticated() ? $_SESSION['user'] : null;
	}
	
	public function isAuthenticated() {
		return isset($_SESSION['user']);
	}

	public function spamCheck($email) {
		// Validate e-mail address
		return filter_var($email, FILTER_VALIDATE_EMAIL);
	}
	
	public function sendEmail($user, $subject, $message) {
		// Sanitize e-mail address
		$to = filter_var($user->getEmail(), FILTER_SANITIZE_EMAIL);
		
		// In case any of our lines are larger than 70 characters, we should use wordwrap().
		$message = wordwrap($message, 70, '\r\n');
		
		// Validate e-mail address.
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			// To send HTML mail, the Content-type header must be set
			$headers = array();
			$headers[] = 'MIME-Version: 1.0';
			$headers[] = 'Content-type: text/html; charset=UTF-8';
			
			// Additional headers.
			$headers[] = 'To: ' . $user->getFullname() . ' <' . $to . '>';
			$headers[] = 'From: ' . $this->settings->emailName . ' <' . $this->settings->email . '>';
			
			// Send the e-mail.
			return mail($to, $subject, $message, implode('\r\n', $headers));
		}
		
		return false;
	}
	
	public function parsePriority($priority) {
		$priorityName = null;		
		
		switch ($priority) {
		case 0:
			$priorityName = "Unknown";
			break;
		case 1:
			$priorityName = "Pending";
			break;
		case 2:
			$priorityName = "";
			break;
		}

		return $priorityName;
	}

	public function parseStatus($status) {
		$statusName = null;		
		
		switch ($status) {
		case 0:
			$statusName = "Ukjent";
			break;
		case 1:
			$statusName = "Venter";
			break;
		case 2:
			$statusName = "Arbeider";
			break;
        case 3:
            $statusName = "Utført";
		}

		return $statusName;
	}
}
?>
