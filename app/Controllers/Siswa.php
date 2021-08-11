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
        helper('sn');
    }
    public function index()
    {

        $data = [
            'judul' => 'Data Siswa',
            'siswa' => $this->model->getAllData()
        ];
        //load view
        tampilan('siswa/index', $data);
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
                //load view
                tampilan('siswa/index', $data);
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
        $this->model->hapus($id);

        session()->setFlashdata('message', 'Dihapus');
        return redirect()->to(base_url('/siswa'));
    }
    public function ubah()
    {
        if (isset($_POST['ubah'])) {
            $id = $this->request->getPost('id');
            $nisn = $this->request->getpost('nisn');
            $db_nisn = $this->model->getAllData($id)['nisn'];

            if ($nisn === $db_nisn) {
                $val = $this->validate([
                    'nisn' => [
                        'label' => 'Nomor Induk Siswa Nasional',
                        'rules' => 'required|numeric|max_length[12]'
                    ],
                    'nama' => [
                        'label' => 'Nama Siswa',
                        'rules' => 'required'
                    ]
                ]);
            } else {
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
            }


            if (!$val) {
                session()->setflashdata('err', \Config\Services::validation()->listErrors());
                $data = [
                    'judul' => 'Data Siswa',
                    'siswa' => $this->model->getAllData()
                ];
                //load view
                tampilan('siswa/index', $data);
            } else {
                $id = $this->request->getPost('id');
                $data = [
                    'nisn' => $this->request->getPost('nisn'),
                    'nama' => $this->request->getPost('nama')

                ];

                //update data
                $success = $this->model->ubah($data, $id);
                if ($success) {
                    session()->setFlashdata('message', 'diubah');
                    return redirect()->to(base_url('/siswa'));
                }
            }
        } else {
            return redirect()->to(base_url('/siswa'));
        }
    }
}
