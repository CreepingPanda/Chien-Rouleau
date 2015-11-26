<?php

require('models/Users.class.php');
class UsersManager
{


// ________ PROPRIETES ________
	private $database;
// ________________

// ________ CONSTRUCT ________
	public function __construct()
	{
		$this-database = $database;
	}
// ________________

// ________ METHODES ________
	public function create($login, $pass)
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
	public function delete(Users $user)
	{
		$id = $user->getId();
		$query = "DELETE FROM users WHERE id = '".$id."'";
		$result = mysqli_query($this->database, $query);
		if ( $result )
		{
			return true;
		}
		else
		{
			return "Erreur serveur.";
		}
	}
	public function update(Users $user)
	{
		$id = $user->getId();
		$query = "UPDATE users SET content = '".$content."', id_author = '".$id_author."' WHERE id = '".$id"'";
		$result = mysqli_query($this->database, $query);
		if ( $result )
		{
			return $this->findById($id);
		}
		else
		{
			return "Erreur serveur.";
		}
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
		if ( strlen(trim($login)) > 0 )
		{
			$login = mysqli_real_escape_string($this->database, $login);
			$query = "SELECT * FROM users WHERE login LIKE '%".$login."%'";
			$result = mysqli_query($this->database, $query);
			if ( $result )
			{
				$list = array();
				$i = 0;
				while ( $user = mysqli_fetch_object($result, "Users") )
				{
					$list[] = $user;
				}
				return $list;
			}
			else
			{
				return "Erreur serveur.";
			}
		}
		else
		{
			return "Vous cherchez quoi ?";
		}
	}
	public function getCurrent()
	{
		if ( isset($_SESSION['id']) )
		{
			$query = "SELECT * FROM users WHERE id = '".$_SESSION['id']."'";
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
					return false;
				}
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;
		}
	}
// ________________


}

?>