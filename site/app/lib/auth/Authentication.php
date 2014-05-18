<?php namespace auth;

use Auth;
use database\User;

class Authentication {

	private $message;
	private $errorType;
	private $userId;

	public function message()
	{
		return $this->message;
	}

	public function errorType()
	{
		return $this->errorType;
	}

	public function login(array $data)
	{
		if (!$this->isUserInDatabase($data['name'])) return false;
		
		if (!$this->isUserPasswordCorrect($data['password'])) return false;
			
		if (!$this->isUserActivated()) return false;
				
		if ($this->isUserPaused()) return false;
					
		return $this->isLoginCorrect($data['password']);
	}

	public function logout()
	{
		Auth::logout();
	}

	private function isLoginCorrect($password)
	{
		if (!Auth::attempt(['id'=>$this->userId, 'password'=>$password]))
		{
			$this->setError('wrong');
			return false;
		}

		return true;
	}

	private function isUserInDatabase($name)
	{
		if (User::where('name', $name)->count())
		{
			$this->userId = User::where('name', $name)->pluck('id');
			return true;
		}
		else if (User::where('email', $name)->count())
		{
			$this->userId = User::where('email', $name)->pluck('id');
			return true;
		}

		$this->setError('wrong');
		return false;
	}

	private function isUserPasswordCorrect($password)
	{
		if (!Auth::validate(['id'=>$this->userId, 'password'=>$password]))
		{
			$this->setError('wrong');
			return false;
		}

		return true;
	}

	private function isUserActivated()
	{
		if (!User::where('id', $this->userId)->pluck('is_activated'))
		{
			$this->setError('activated');
			return false;
		}

		return true;
	}

	private function isUserPaused()
	{
		if (User::where('id', $this->userId)->pluck('is_paused'))
		{
			$this->setError('paused');
			return true;
		}

		return false;
	}

	private function setError($type)
	{
		switch ($type) 
		{
			case 'wrong':
				$this->errorType = 1;
				$this->message = trans('authentication.login.wrong');
				break;
			case 'activated':
				$this->errorType = 2;
				$this->message = trans('authentication.login.not_activated');
				break;
			case 'paused':
				$this->errorType = 3;
				$this->message = trans('authentication.login.paused');
				break;
		}
	}

}
