<?php
require_once 'settings.php';
require_once 'database.php';
require_once 'mysql.php';
require_once 'utils.php';

require_once 'avatar.php';

class User {
	private $settings;
	private $database;
	private $mysql;
	private $utils;
	
	private $id;
	private $firstname;
	private $lastname;
	private $username;
	private $password;
	private $email;
	
	public function User($id, $firstname, $lastname, $username, $password, $email) {
		$this->settings = new Settings();
		$this->database = new Database();
		$this->mysql = new MySQL();
		$this->utils = new Utils();
		
		$this->id = $id;
		$this->firstname = $firstname;
		$this->lastname = $lastname;
		$this->username = $username;
		$this->password = $password;
		$this->email = $email;
	}
	
	/* Returns the users internal id as int */
	public function getId() {
		return $this->id;
	}
	
	/* Returns the users firstname as string */
	public function getFirstname() {
		return $this->firstname;
	}
	
	/* Returns the users lastname as string */
	public function getLastname() {
		return $this->lastname;
	}
	
	/* Returns the users username as string */
	public function getUsername() {
		return $this->username;
	}
	
	/* Returns the users password as a sha256 hash. */
	public function getPassword() {
		return $this->password;
	}
	
	/* Returns the users email address as string */
	public function getEmail() {
		return $this->email;
	}
}
?>