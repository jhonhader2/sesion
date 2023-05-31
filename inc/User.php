<?php
require('config.php');

class User extends Dbconfig
{
	protected $hostName;
	protected $userName;
	protected $password;
	protected $dbName;
	private $memberTable = 'members';
	private $dbConnect = false;

	public function __construct()
	{
		if (!$this->dbConnect) {

			$database = new dbConfig();

			$this->hostName = $database->serverName;
			$this->userName = $database->userName;
			$this->password = $database->password;
			$this->dbName   = $database->dbName;

			$conn = new mysqli($this->hostName, $this->userName, null, $this->dbName);

			if ($conn->connect_error) {
				die("Error failed to connect to MySQL: " . $conn->connect_error);
			} else {
				$this->dbConnect = $conn;
			}
		}
	}

	private function getData($sqlQuery)
	{
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if (!$result) {
			die('Error in query: ' . mysqli_error($this->dbConnect));
		}
		$data = array();
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$data[] = $row;
		}

		return $data;
	}

	private function getNumRows($sqlQuery)
	{
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if (!$result) {
			die('Error in query: ' . mysqli_error($this->dbConnect));
		}
		$numRows = mysqli_num_rows($result);

		return $numRows;
	}

	public function login()
	{
		$sqlQuery = "
			SELECT * 
			FROM " . $this->memberTable . " 
			WHERE email='" . $_POST['userEmail'] . "' AND password='" . md5($_POST['userPassword']) . "'";
		return  $this->getData($sqlQuery);
	}

	public function resetPassword()
	{
		$sqlQuery = "
			SELECT email 
			FROM " . $this->memberTable . " 
			WHERE email='" . $_POST['userEmail'] . "' OR username='" . $_POST['userName'] . "'";
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		$numRows = mysqli_num_rows($result);
		if ($numRows) {
			while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				$link = "<a href='localhost/sesion/reset_password.php?authtoken=" . md5($row['email']) . "'>Reset Password</a>";
				$to = $row['email'];
				$subject = "Reset your password on examplesite.com";
				$msg = "Hi there, click on this " . $link . " to reset your password.";
				$msg = wordwrap($msg, 70);
				$headers = "From: info@webdamn.com";
				mail($to, $subject, $msg, $headers);
				return 1;
			}
		} else {
			return 0;
		}
	}

	public function savePassword()
	{
		$sqlQuery = "
			SELECT email, authtoken 
			FROM " . $this->memberTable . " 
			WHERE authtoken='" . $_POST['authtoken'] . "'";
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		$numRows = mysqli_num_rows($result);
		if ($numRows) {
			while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				$sqlQuery = "
					UPDATE " . $this->memberTable . " 
					SET password='" . md5($_POST['newPassword']) . "'
					WHERE email='" . $row['email'] . "' AND authtoken='" . $row['authtoken'] . "'";
				mysqli_query($this->dbConnect, $sqlQuery);
			}
			return 1;
		} else {
			return 0;
		}
	}
}
