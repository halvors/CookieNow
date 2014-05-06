<?php
class CasePage {
	private $id;
	private $userId;
	private $title;
	private $content;
	private $priority;
	private $status;
	private $datetime;
	
	public function CasePage($id, $userId, $title, $content, $priority, $status, $datetime) {
		$this->id = $id;
		$this->userId = $userId;
		$this->title = $title;
		$this->content = $content;
		$this->priority = $priority;
		$this->status = $status;
		$this->datetime = $datetime;
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