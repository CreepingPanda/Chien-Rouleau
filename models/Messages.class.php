<?php

class Messages
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
	public function getUser()
	{
		return $this->id_user;
	}
// ________________


// ________ SETTERS ________
	public function setContent($content)
	{
		if ( strlen($content)>0 && strlen($content)<512 )
		{
			$this->content = $content;
			return true;
		}
		else
		{
			return "Entre 1 et 511 caractères."
		}
	}
	public function setUser(Users $user)
	{
		$this->id_user = $user->getId();
		return true;
	}
// ________________


}

?>