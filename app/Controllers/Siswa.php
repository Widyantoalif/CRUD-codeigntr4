<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\M_Siswa;
use CodeIgniter\Session\Session;

class Siswa extends Controller
{

    public function __construct()
    {
        $this->model = new M_Siswa;
    }
    public function index()
    {

        $data = [
            'judul' => 'Data Siswa',
            'siswa' => $this->model->getAllData()
        ];
        echo view('Templates/v_header', $data);
        echo view('Templates/v_sidebar');
        echo view('Templates/v_topbar');
        echo view('Siswa/index', $data);
        echo view('Templates/v_footer');
    }

    public function tambah()
    {
        if (isset($_POST['tambah'])) {
            $val = $this->validate([
                'nisn' => [
                    'label' => 'Nomor Induk Siswa Nasional',
                    'rules' => 'required|numeric|max_length[12]|is_unique[siswa.nisn]'
                ],
                'nama' => [
                    'label' => 'Nama Siswa',
                    'rules' => 'required'
                ]
            ]);

            if (!$val) {
                session()->setflashdata('err', \Config\Services::validation()->listErrors());
                $data = [
                    'judul' => 'Data Siswa',
                    'siswa' => $this->model->getAllData()
                ];
                echo view('Templates/v_header', $data);
                echo view('Templates/v_sidebar');
                echo view('Templates/v_topbar');
                echo view('Siswa/index', $data);
                echo view('Templates/v_footer');
            } else {
                $data = [
                    'nisn' => $this->request->getPost('nisn'),
                    'nama' => $this->request->getPost('nama')

                ];

                //insert data
                $success = $this->model->tambah($data);
                if ($success) {
                    session()->setFlashdata('message', 'Ditambahkan');
                    return redirect()->to(base_url('/siswa'));
                }
            }
        } else {
            return redirect()->to(base_url('/siswa'));
        }
    }


    public function hapus($id)
    {
        $success = $this->model->hapus($id);
        if ($success) {
            session()->setFlashdata('message', 'Dihapus');
            return redirect()->to(base_url('/siswa'));
        }
    }
}
