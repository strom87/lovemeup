<?php namespace mail;

use Mail;
use database\User;

class MailFactory {

	public static function sendWelcome(User $user)
	{	
		$data = ['link'=>url("activate/{$user->id}/{$user->token}")];
		Mail::queue('emails.welcome', $data, function($message) use ($user)
		{
			$message->to($user->email, $user->name)->subject(trans('mail.welcome.header'));
		});
	}

	public static function sendNewPassword(User $user, $password)
	{
		$data = ['password'=>$password];

		Mail::queue('emails.password', $data, function($message) use ($user)
		{
			$message->to($user->email, $user->name)->subject(trans('mail.password.header'));
		});
	}
}