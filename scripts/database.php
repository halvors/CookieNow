<?php
require_once 'settings.php';
require_once 'mysql.php';

require_once 'user.php';
require_once 'casepage.php';

class Database {
	private $settings;
	private $mysql;
	
	public function Database() {
		$this->settings = new Settings();
		$this->mysql = new MySQL();
    }
	
	/*
	 *	User
	 */
	
	/* Get user by id */
	public function getUser($id) {
		$con = $this->mysql->open();
		
		$result = mysqli_query($con, 'SELECT * FROM ' . $this->settings->tableList[0] . ' WHERE id=\'' . $id . '\'');
		$row = mysqli_fetch_array($result);
		
		if ($row) {
			return new User($row['id'], 
							$row['firstname'], 
							$row['lastname'], 
							$row['username'], 
							$row['password'], 
							$row['email']);
		}
		
		$this->mysql->close($con);
	}
	
	/* Get a list of all users */
	public function getUsers() {
		$con = $this->mysql->open();
		
		$result = mysqli_query($con, 'SELECT * FROM ' . $this->settings->tableList[0]);
		
		$userList = array();
		
		while ($row = mysqli_fetch_array($result)) {
			array_push($userList, new User($row['id'], 
										   $row['firstname'], 
										   $row['lastname'], 
										   $row['username'], 
										   $row['password'], 
										   $row['email']));
		}
		
		return $userList;
		
		$this->mysql->close($con);
	}
	
	/* Get user by name */
	public function getUserByName($username) {
		$con = $this->mysql->open();
		
		$result = mysqli_query($con, 'SELECT id FROM ' . $this->settings->tableList[0] . ' WHERE username=\'' . $username . '\' OR email=\'' . $username . '\'');
		$row = mysqli_fetch_array($result);
		
		if ($row) {
			return $this->getUser($row['id']);
		}
		
		$this->mysql->close($con);
	}

		/* Check if user already exists */
	public function userExists($username) {
		$con = $this->mysql->open();

		$result = mysqli_query($con, 'SELECT EXISTS (SELECT * FROM ' . $this->settings->tableList[0] . ' WHERE username=\'' . $username . '\' OR email=\'' . $username . '\')');
		$row = mysqli_fetch_array($result);
		
		$this->mysql->close($con);
		
		return $row ? true : false;
	}
	
	/*
	 *	Case
	 */
	
	/* Get page by id */
	public function getCase($id) {
		$con = $this->mysql->open();
		
		$result = mysqli_query($con, 'SELECT * FROM ' . $this->settings->tableList[1] . ' WHERE id=\'' . $id . '\'');
		$row = mysqli_fetch_array($result);
		
		if ($row) {
			return new CasePage($row['id'], 
					    $row['userId'], 
					    $row['title'], 
					    $row['content'], 
					    $row['priority'], 
					    $row['status'], 
					    $row['datetime']);
		}
		
		$this->mysql->close($con);
	}
	
	/* Get a list of all pages */	
	public function getCases($userId) {
		$con = $this->mysql->open();
		
		$result = mysqli_query($con, 'SELECT id FROM ' . $this->settings->tableList[1] . ' WHERE userId=\'' . $userId . '\'');
		$caseList = array();
		
		while ($row = mysqli_fetch_array($result)) {
			array_push($caseList, $this->getCase($row['id']));
		}
		
		return $caseList;
		
		$this->mysql->close($con);
	}
	
	/* Create a new page */
	public function createCase($userId, $title, $content, $status, $priority, $opened, $closed) {
		$con = $this->mysql->open();
		
		mysqli_query($con, 'INSERT INTO ' . $this->settings->tableList[1] . ' (userId, title, content, status, priority, opened, closed) 
							VALUES (\'' . $userId . '\', 
									\'' . $title . '\', 
									\'' . $content . '\', 
									\'' . $status . '\', 
									\'' . $priority . '\', 
									\'' . $opened . '\', 
									\'' . $closed . '\')');
		
		$this->mysql->close($con);
	}
	
	/* Remove a page */
	public function removeCase($id) {
		$con = $this->mysql->open();
		
		mysqli_query($con, 'DELETE FROM ' . $this->settings->tableList[1] . ' WHERE id=\'' . $id . '\'');
		
		$this->mysql->close($con);
	}
	
	/* Update a page */
	public function updateCase($id, $title, $content) {
		$con = $this->mysql->open(1);
		
		mysqli_query($con, 'UPDATE ' . $this->settings->tableList[1] . ' SET title=\'' . $title . '\', 
																				content=\'' . $content . '\',
																				status=\'' . $status . '\'
																				WHERE id=\'' . $id . '\'');
		
		$this->mysql->close($con);
	}
}
?>
