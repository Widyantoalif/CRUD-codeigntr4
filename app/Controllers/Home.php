<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function __construct()
	{
		helper('sn');
	}
	public function index()
	{

		$data = [
			'judul' => 'Homepage'
		];
		// return view('welcome_message');
		tampilan('home/index', $data);
	}
}
