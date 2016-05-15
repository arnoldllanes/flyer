<?php 

namespace App\Http;

class Flash {

	/**
	 * undocumented class variable
	 * Create a flash message.
	 *
	 * @param string      $title
	 * @param string      $message
	 * @param string      $level
	 * @param string|null $key
	 * @return void
	 **/
	public function create($title, $message, $level, $key = 'flash_message')
	{
		session()->flash($key, [
			'title' => $title,
			'message' => $message,
			'level'	=> $level
		]);
	}

	/**
	 * Create an information flash message.
	 * 
	 * @param string $title
	 * @param string $message
	 * @return void
	 **/
	public function info($title, $message)
	{
		return $this->create($title, $message, 'info');
	}

	public function success($title, $message)
	{
		return $this->create($title, $message, 'success');

	}

	public function error($title, $message)
	{
		return $this->create($title, $message, 'error');
	}

	public function overlay($title, $message, $level = 'success')
	{
		return $this->create($title, $message, $level, 'flash_message_overlay');
	}
}