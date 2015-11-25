<?php
	
class users
{

// ________ PROPRIETES ________
	private $id;
	private $logged;
	private $login;
	private $pass;
// ________________

// ________ GETTERS ________
	public function getId()
	{
		return $this->id;
	}
	public function getLogged()
	{
		return $this->logged;
	}
	public function getLogin()
	{
		return $this->login;
	}
// ________________

// ________ SETTERS ________
	public function setLogged($logged)
	{
		if ($logged==0 || $logged==1)
		{
			$this->logged = $logged;
			return true;
		}
		else
		{
			return "Erreur.";
		}
	}
	public function setLogin($login)
	{
		if (isset($_POST['log']) && strlen($_POST['log'])>3)
		{
			$this->login = mysqli_real_escape_string($database, $_POST['log']);
			return true;
		}
		else
		{
			return "4 caractères minimum.";
		}
	}
	public function setPassword($pass)
	{
		if(isset($_POST['pass']) && strlen($_POST['pass'])>5)
		{
			$hash = password_hash($pass, PASSWORD_BCRYPT, array("cost"=>10));
			$this->pass = $hash;
			return true;
		}
		else
		{
			return "6 caractères minimum.";
		}
	}
// ________________
	
}

?>