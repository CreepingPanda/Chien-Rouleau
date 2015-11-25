<?php

class messages
{

// ________ PROPRIETES ________
	private $id;
	private $hour;
	private $content;
	private $id_user;
// ________________

// ________ GETTERS ________
	public function getId()
	{
		return $this->id;
	}
	public function getHour()
	{
		return $this->hour;
	}
	public function getContent()
	{
		return $this->content;
	}
	public function getIdUser()
	{
		return $this->id_user;
	}
// ________________

// ________ SETTERS ________
	public function setContent($content)
	{
		if (isset($_POST['message']) && strlen($_POST['message'])>0 && strlen($_POST['message'])<512))
		{
			$this->content = mysqli_real_escape_string($database, $_POST['message']);
			return true;
		}
		else
		{
			return "Entre 1 et 511 caractères."
		}
	}
	public function setIdUser($id_user)
	{
		if (isset($_SESSION['id']))
		{
			$this->id_user = intval($_SESSION['id']);
			return true;
		}
	}
// ________________

}

?>