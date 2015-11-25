<?php
	
class Users
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
		if ( $logged==0 || $logged==1 )
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
		if ( strlen($login)>3 )
		{
			$this->login = $login;
			return true;
		}
		else
		{
			return "4 caractères minimum.";
		}
	}
	public function setPassword($pass)
	{
		if ( strlen($pass)>5 )
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