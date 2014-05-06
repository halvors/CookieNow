<?php
class Settings {
	/* General */
	public $name = 'CookieNow';
	public $codename = 'The beginning';
	public $description = '';
	public $keywords = '';
	public $authors = array('halvors', 'Winterforce');
	
	/* Default page  */
	public $defaultPage = 'home';

	/* Database  */
	public $host = 'localhost';
	public $username = 'cookienow.tk';
	public $password = 'cookieandmilk';
	public $tableList = array('users',	// 0
							  'cases');	// 1
							
}
?>