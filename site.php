<?php
require_once 'scripts/settings.php';
require_once 'scripts/database.php';
require_once 'scripts/utils.php';

class Site {
	// Objects definitions.
	private $settings;
	private $database;
	private $utils;
	
	// Variable definitions.
	private $pageName;
	
	public function Site() {
		session_start();
		
		// Set the Objects
		$this->settings = new Settings();
		$this->database = new Database();
		$this->utils = new Utils();
		
		// Set the variables.
		$this->pageName = isset($_GET['viewPage']) ? $_GET['viewPage'] : null;
	}
	
	// Execute the site.
	public function execute() {
		echo '<!DOCTYPE html>';
		echo '<html>';
			echo '<head>';
				echo '<title>' . $this->settings->name . '</title>';
				echo '<meta name="description" content="' . $this->settings->description . '">';
				echo '<meta name="keywords" content="' . $this->settings->keywords . '">';
				echo '<meta name="author" content="' . implode(', ', $this->settings->authors) . '">'; // TODO: Select all authors in this?
				echo '<meta charset="UTF-8">';
				echo '<link rel="stylesheet" type="text/css" href="style/style.css">';
                echo '<link rel="stylesheet" type="text/css" href="style.css">'; //Temporary -Brage
				echo '<link rel="shortcut icon" href="images/favicon.ico">';
			echo '</head>';
			echo '<body>';
				echo '<header>';
					echo '<nav class="nav">';
						echo "<div id='cssmenu'>";
							echo "<ul>";
								if ($this->utils->isAuthenticated()) {
									echo "<li><a href='index.php?viewPage=mycases'><span>Mine saker</span></a></li>";
									echo "<li><a href='index.php?viewPage=newcase'><span>Ny sak</span></a></li>";
								}
								
								echo "<li><a href='index.php?viewPage=faq'><span>FAQ</span></a></li>";
								
								if ($this->utils->isAuthenticated()) {
									echo "<li class='last'><a href='index.php?viewPage=logout'><span>Logg ut</span></a></li>";
								} else {
									echo "<li class='last'><a href='index.php?viewPage=login'><span>Logg inn</span></a></li>";
								}
							echo '</ul>';
						echo '</div>';
					echo '</nav>';
				echo '</header>';
				echo '<div id="main">';
					echo '<section class="content">';
						if (isset($_GET['viewPage'])) {
						// View the page specified by "pageName" variable.
							$this->viewPage($this->pageName);
						} else {
							// Since non page or article where specified, view the default page.
							$this->viewPage($this->settings->defaultPage);
						}
					echo '</section>';
				echo '</div>';
				echo '<footer>';
					echo '<div id="footer">';
						// TODO: Footer here.
					echo '</div>';
				echo '</footer>';
			echo '</body>';
		echo '</html>';
	}
	
	private function viewPage($pageName) {
		$directory = 'pages/';
		$fileName = $directory . $pageName . '.php';
		
		// If page doesn't exist in the database, check if there is a .php file that do. Else an error is shown.
		if (in_array($fileName, glob($directory . '*.php'))) {
			include $fileName;
		} else {
			echo '<article>';
				echo '<h1>Siden ble ikke funnet!</h1>';
				echo 'Siden du ser etter finnes ikke.';
			echo '</article>';
		}
	}
}
?>
