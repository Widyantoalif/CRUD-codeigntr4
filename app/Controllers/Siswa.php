<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\M_Siswa;

class Siswa extends Controller
{
    public function index()
    {

        $model = new M_Siswa();

        $data = [
            'judul' => 'Data Siswa',
            'siswa' => $model->getAllData()
        ];
        echo view('Templates/v_header', $data);
        echo view('Templates/v_sidebar');
        echo view('Templates/v_topbar');
        echo view('Siswa/index', $data);
        echo view('Templates/v_footer');
    }
}
