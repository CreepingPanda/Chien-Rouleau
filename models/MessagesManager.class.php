<?php

class MessagesManager
{


// ________ PROPRIETES ________
	private $database;
// ________________

// ________ CONSTRUCT ________
	public function __construct($database)
	{
		$this->database = $database;
	}
// ________________

// ________ METHODES ________
	public function create($content, Users $user)
	{
		$message = new Messages();
		$valid = $message->setContent($content);
		if ($valid === true)
		{
			$valid = $message->setUser($user);
			if ($valid === true)
			{
				$content = mysqli_real_escape_string($this->database, $message->getContent());
				$id_user = $message->getUser();
				$query = "INSERT INTO messages (content, id_user) 
					VALUES ('".$content."', '".$id_user."')";
				$result = mysqli_query($this->database, $query);
				if ($result)
				{
					$id = mysqli_insert_id($this->database);
					if ($id)
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
		$id = $messages->getId();
		$query = "DELETE FROM messages WHERE id = '".$id."'";
		$result = mysqli_query($this->database, $query);
		if ( $result )
		{
			return true;
		}
		else
		{
			return "Erreur serveur";
		}
	}
	public function update()
	{
		$id = $messages->getId();
		$content = mysqli_real_escape_string($messages->getContent());
		$id_user = $messages->getUser()->getId();
		$query = "UPDATE messages SET content = '".$content."', id_user = '".$id_user."'
			WHERE id = '".$id."'";
		$result = mysqli_query($this->database, $query);
		if ( $result )
		{
			return $this->findById($id);
		}
		else
		{
			return "Erreur serveur";
		}
	}
	public function find($id)
	{
		return $this->findById($id);
	}
	public function findById($id)
	{
		$id = intval($id);
		$query = "SELECT * FROM messages WHERE id= '".$id."'";
		$result = mysqli_query($this->database, $query);
		if ( $result )
		{
			$message = mysqli_fetch_object($result, "Messages");
			if ( $message )
			{
				return $message;
			}
			else
			{
				return "Message introuvable.";
			}
		}
	}
	public function findByContent($content)
	{

	}
	public function findByUser(Users $user)
	{

	}
// ________________


}

?>