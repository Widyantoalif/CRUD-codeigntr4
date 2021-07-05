<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{

		$data = [
			'judul' => 'Homepage'
		];
		// return view('welcome_message');
		echo view('Templates/v_header', $data);
		echo view('Templates/v_sidebar');
		echo view('Templates/v_topbar');
		echo view('Home/index');
		echo view('Templates/v_footer');
	}
}
