<?php
require_once 'utils.php';

class CasePage {
	private $utils;

	private $id;
	private $userId;
	private $title;
	private $content;
	private $priority;
	private $status;
	private $datetime;
	
	public function CasePage($id, $userId, $title, $content, $priority, $status, $datetime) {
		$this->utils = new Utils();

		$this->id = $id;
		$this->userId = $userId;
		$this->title = $title;
		$this->content = $content;
		$this->priority = $priority;
		$this->status = $status;
		$this->datetime = $datetime;
	}

	public function show() {
		echo '<article>';
			echo '<table border="1">';
				echo '<tr>';
					echo '<td>Sak:</td>';
					echo '<td>' . $this->getTitle() . '</td>';
				echo '</tr>';
				echo '<tr>';
					echo '<td>Beskrivelse:</td>';
					echo '<td>' . $this->getContent() . '</td>';
				echo '</tr>';
				echo '<tr>';
					echo '<td>Prioritet:</td>';
					echo '<td>' . $this->getPriority() . '</td>';
				echo '</tr>';
				echo '<tr>';
					echo '<td>Status:</td>';
					echo '<td>' . $this->utils->parseStatus($this->getStatus()) . '</td>';
				echo '</tr>';
			echo '</table>';
		echo '</article>';	
	}
	
	public function getId() {
		return $this->id;
	}
	
	public function getUser() {
		return $utils->getUser($userId);
	}
	
	public function getTitle() {
		return $this->title;
	}
	
	public function getContent() {
		return $this->content;
	}
	
	public function getPriority() {
		return $this->priority;
	}
	
	public function getStatus() {
		return $this->status;
	}
	
	public function getDatetime() {
		return $this->datetime;
	}
}
?>
