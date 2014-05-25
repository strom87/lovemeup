<?php namespace message;

use Auth;
use DB;

use database\User;
use database\Message;
use database\UserMessage;

class MessageCollector {

	public static function getMessagedUser()
	{
		$pid = Auth::user()->id;

		$users = DB::table('users as u')
					->select('u.id', 'u.name', 'i.name as profileimage')
					->join(DB::raw('(select 
										distinct case to_user_id when '.$pid.' then from_user_id else to_user_id end as user_id,
										id
									 from user_message 
									 join messages
										on id = message_id
									  	where (to_user_id = '.$pid.' or from_user_id = '.$pid.')
									) as m
									'),
					function($join)
					{
						$join->on('u.id', '=', 'm.user_id');
					})
					->leftJoin('images as i', function($join)
					{
						$join->on('i.user_id', '=', 'u.id')
							 ->where('is_profile', '=', true);
					})
					->groupBy('u.id', 'u.name', 'profileimage')
					->orderBy('m.id', 'desc')
					->get();
		/*
			SELECT u.id, 
			       u.name,
			       i.name AS profileimage
			FROM users AS u
			JOIN (
				SELECT DISTINCT CASE to_user_id WHEN 1 THEN from_user_id ELSE to_user_id END AS user_id,
				       messages.id
				FROM user_message
				JOIN messages
					ON id = message_id
					WHERE (to_user_id = 1 OR from_user_id = 1)
			) AS m
			ON u.id = m.user_id
			LEFT JOIN images AS i
			ON i.user_id = u.id
			AND i.is_profile = 1
			GROUP BY id, u.name, profileimage
			ORDER BY m.id DESC
		*/

		return $users;
	}

	public static function getMessages(User $userMessaged)
	{
		$id = Auth::user()->id;

		return DB::table('messages')
			   ->join('user_message', 'messages.id', '=', 'user_message.message_id')
			   ->join('users', 'users.id', '=', 'user_message.from_user_id')
			   ->where(function($query) use ($userMessaged)
			   {
					$query->where('from_user_id', $userMessaged->id)
						  ->orWhere('to_user_id', $userMessaged->id);
			   })
			   ->where(function($query) use ($id)
			   {
					$query->where('from_user_id', $id)
						  ->orWhere('to_user_id', $id);
			   })
			   ->orderBy('messages.id')
			   ->select('users.name', 'messages.id', 'text', 'is_read', 'messages.created_at')
			   ->get();

	}

	public static function getLatestMessagesUser()
	{
		$id = Auth::user()->id;

		$pids = self::findAllPeopleUserMessageWithIds($id);

		$user = self::findLatestConversationWith($pids, $id);

		if (is_null($user)) return null;

		return $user;
	}

	private static function findLatestConversationWith(array $pids, $userId)
	{
		$ids = DB::table('messages')
				->join('user_message', 'id', '=', 'message_id')
				->where(function($query) use ($pids)
				{
					$query->whereIn('to_user_id', $pids)
						  ->orWhereIn('from_user_id', $pids);
				})
				->select('to_user_id', 'from_user_id')
				->groupBy('id')
				->orderBy('id', 'desc')			
				->get();

		if (!empty($ids))
		{
			$id = $ids[0]->to_user_id != $userId ? $ids[0]->to_user_id : $ids[0]->from_user_id;
		}

		return isset($id) ? User::find($id) : null;
	}

	private static function findAllPeopleUserMessageWithIds($pid)
	{
		$from = UserMessage::where('to_user_id', $pid)->select('from_user_id')->get()->toArray();
		$to = UserMessage::where('from_user_id', $pid)->select('to_user_id')->get()->toArray();
		$items = array_merge($from, $to);

		$result = [];
		foreach($items as $item)
		{
			foreach ($item as $key => $value) 
			{
				if (!isset($result[$value]))
				{
					$result[$value] = $value;
				}
			}
		}

		return $result;
	}
}