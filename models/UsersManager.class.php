<?php

require('models/Users.class.php');
class UsersManager
{


// ________ PROPRIETES ________
	private $database;
// ________________


// ________ METHODES ________
	public function create()
	{
		$user = new Users();
		$valid = $user->setLogin($login);
		if ( $valid === true )
		{
			$valid = $user->setPassword($pass)
			if ( $valid === true )
			{
				$login = mysqli_real_escape_string($this->database, $user->getLogin());
				$pass = mysqli_real_escape_string($this->database, $user->getPassword());
				$query = "INSERT INTO users (login, pass)
					VALUES ('".$login."', '".$pass."')";
				$result = mysqli_query($this->database, $query);
				if ( $result )
				{
					$id = mysqli_insert_id($this->database);
					if ( $id )
					{
						return $this->findById($id);
					}
					else
					{
						return "Erreur serveur.";
					}
				}
				else
				{
					return mysqli_error();
				}
			else
			{
				return $valid;
			}
		}
		else
		{
			return $valid;
		}
	}
	public function delete()
	{

	}
	public function update()
	{

	}

	public function find($id)
	{
		return $this->findById($id);
	}
	public function findById($id)
	{
		$id = intval($id);
		$query = "SELECT * FROM users WHERE id = '".$id."'";
		$result = mysqli_query($this->database, $query);
		if ( $result )
		{
			$user = mysqli_fetch_object($result, "Users");
			if ( $user )
			{
				return $user;
			}
			else
			{
				return "Utilisateur introuvable";
			}
		}
	}
	public function findByLogin($login);
	{

	}
// ________________


}

?>