<?php

namespace App\Models;

class User
{
	public $first_name;
	public $last_name;
	public $email;

	public function setFirstName($FirstName)
	{
		$this->first_name = trim($FirstName);
	}

	public function getFirstName()
	{
		return $this->first_name;
	}

        public function setLastName($LastName)
        {
                $this->last_name = trim($LastName);
        }

        public function getLastName()
        {
                return $this->last_name;
        }

	public function setEmail($Email)
        {
                $this->email = $email;
        }

        public function getEmail()
        {
                return $this->email;
        }

	public function getFullName()
	{
		return $this->first_name.' '.$this->last_name;
	}

	public function getEmailVariables()
	{
		return [
			'full_name'=>$this->getFullName(),
			'email'=>$this->getEmail()
		];
	}
}
?>
