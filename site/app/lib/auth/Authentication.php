<?php namespace auth;

use Auth;
use User;

class Authentication {

	private $userId;
	
	protected $message;
	protected $errorType;

	public function login($name, $password)
	{
		if (!$this->isUserInDatabase($name)) return false;
		
		if (!$this->isUserPasswordCorrect($password)) return false;
			
		if (!$this->isUserActivated()) return false;
				
		if ($this->isUserPaused()) return false;
					
		return $this->isLoginCorrect($password);
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
		if (!User::where('id', $this->userId)->pluck('isActivated'))
		{
			$this->setError('activated');
			return false;
		}

		return true;
	}

	private function isUserPaused()
	{
		if (User::where('id', $this->userId)->pluck('isPaused'))
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
				$this->message = trans('authentication.login.exists');
			case 'activated':
				$this->errorType = 2;
				$this->message = trans('authentication.login.not_activated');
				break;
			case 'paused':
				$this->errorType = 3;
				$this->message = trans('authentication.login.paused');
		}
	}

}
