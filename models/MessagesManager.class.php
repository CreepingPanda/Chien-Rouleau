<?php

require('models/Messages.class.php');
class MessagesManager
{


// ________ PROPRIETES ________
	private $database;
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
				$id_user = $message->getUser()->getId();
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