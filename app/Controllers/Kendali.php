<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\Pesan;
use App\Models\Transaksi as TransaksiModel;
use CodeIgniter\Controller;

class Kendali extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function tampil()
    {
        return view('AlamWater');
    }

    public function register()
    {
        return view('register');
    }

    public function doRegister()
    {
        $model = new User();
        $data = [
            'nama'     => $this->request->getPost('nama'),
            'email'    => $this->request->getPost('email'),
            'no_telp'  => $this->request->getPost('no_telp'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
            'alamat'   => $this->request->getPost('alamat'),
            'status'   => 'pending',
        ];

        $model->save($data);

        return redirect()->to('/login')->with('success', 'daftar berhasil, silahkan login.');
    }

    // public function doLogin()
    // {
    //     $model = new User();
    //     $email = $this->request->getPost('email');
    //     $password = $this->request->getPost('password');

    //     $user = $model->getUserByEmail($email);

    //     if ($user && password_verify($password, $user['password'])) {
    //         // Set session data here
    //         session()->set('id_user', $user['id_user']);
    //         session()->set('nama', $user['nama']);
    //         session()->set('logged_in', true);
    //         return redirect()->to('AlamWater');
    //     } else {
    //         return redirect()->back()->with('error', 'Email atau password salah.');
    //     }
    // }

    public function doLogin()
    {
        $model = new User();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Ambil data user berdasarkan email
        $user = $model->getUserByEmail($email);

        // Cek apakah user ada dan password benar
        if ($user && password_verify($password, $user['password'])) {

            // Cek status user
            if ($user['status'] === 'rejected') {
                // Jika status adalah 'rejected', kembalikan pesan error
                session()->setFlashdata('error', 'Akun anda ditolak oleh admin.');
                return redirect()->to(base_url('login')); // Ganti dengan URL login Anda
            }

            if ($user['status'] !== 'approved') {
                // Jika status bukan 'approved', kembalikan pesan error
                session()->setFlashdata('error', 'Akun anda belum disetujui oleh admin.');
                return redirect()->to(base_url('login')); // Ganti dengan URL login Anda
            }

            // Set session khusus untuk user yang sudah disetujui
            session()->set('user_session', [
                'id_user' => $user['id_user'],
                'nama' => $user['nama'],
                'logged_in' => true,
            ]);
            
            return redirect()->to('/AlamWater'); // Ganti dengan URL dashboard user
        } else {
            // Menggunakan flashdata untuk menyimpan pesan kesalahan
            session()->setFlashdata('error', 'Email atau password salah.');
            return redirect()->to(base_url('login')); // Ganti dengan URL login Anda
        }
    }

    // User.php (Controller)
    public function profile()
    {
        $session = session();
        $userModel = new \App\Models\User();
        $user = $userModel->find($session->get('user_session')['id_user']);
        
        return view('user_profile', ['user' => $user]);
    }

    // User.php (Controller)
    public function editProfile()
    {
        $session = session();
        $userModel = new \App\Models\User();
        $user = $userModel->find($session->get('user_session')['id_user']);
        
        return view('user_edit', ['user' => $user]);
    }

    public function updateProfile()
    {
        $userModel = new \App\Models\User();
        $data = [
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'no_telp' => $this->request->getPost('no_telp'),
            'alamat' => $this->request->getPost('alamat')
        ];
        
        $userModel->update($this->request->getPost('id_user'), $data);
        return redirect()->to(base_url('userProfile'));
    }

    public function changePassword()
    {
        return view('ubahpw_user');
    }

    public function updatePassword()
    {
        $session = session();
        $userModel = new User();
        $user = $userModel->find($session->get('user_session')['id_user']);

        $currentPassword = $this->request->getPost('current_password');
        $newPassword = $this->request->getPost('new_password');
        $confirmNewPassword = $this->request->getPost('confirm_new_password');

        // Verifikasi password saat ini
        if (!password_verify($currentPassword, $user['password'])) {
            return redirect()->back()->with('error', 'Password saat ini salah');
        }

        // Cek kesesuaian password baru dan konfirmasinya
        if ($newPassword !== $confirmNewPassword) {
            return redirect()->back()->with('error', 'Password baru tidak cocok');
        }

        // Update password dengan hash baru
        $userModel->update($user['id_user'], ['password' => password_hash($newPassword, PASSWORD_DEFAULT)]);

        return redirect()->to(base_url('userProfile'))->with('success', 'Password berhasil diperbarui');
    }

    public function logout()
    {
        // Hapus session untuk user
        session()->remove('user_session');
        // Redirect ke halaman login user atau halaman lain yang diinginkan
        return redirect()->to('/login')->with('success', 'Anda berhasil logout.');
    }

    // Constructor
    public function __construct()
    {
        // Inisialisasi model
        $this->pesanModel = new Pesan();
    }

    // Method untuk menyimpan pesan dari form
    public function kirimPesan()
    {
        $pesanModel = new Pesan();

        $data = [
            'nama'    => $this->request->getPost('nama'),
            'email'   => $this->request->getPost('email'),
            'phone'   => $this->request->getPost('phone'),
            'message' => $this->request->getPost('message'),
        ];

        $pesanModel->insert($data);

        // Redirect setelah pesan berhasil dikirim
        return redirect()->to('/AlamWater'); // Bisa diarahkan ke halaman sukses
    }

    // halaman transaksi user
    public function userTrx()
    {
        // Mendapatkan session user
        $userSession = session()->get('user_session');
        $id_user = $userSession['id_user'];

        // Memanggil model Transaksi
        $transaksiModel = new TransaksiModel();
        $data['transaksi'] = $transaksiModel->getUserTransactionsWithProduct($id_user);

        // Menampilkan view user_trx dengan data transaksi
        return view('user_trx', $data);
    }
}
