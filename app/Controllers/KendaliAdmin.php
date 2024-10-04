<?php

namespace App\Controllers;

use App\Models\Admin;
use App\Models\User;
use App\Models\Pesan;
use App\Models\Product;
use App\Models\Transaksi as TransaksiModel;
use CodeIgniter\Controller;

class KendaliAdmin extends Controller
{
    public function loginAdmin()
    {
        return view('loginAdmin');
    }

    public function tampilAdmin()
    {
        // Periksa apakah admin sudah login
        if (!session()->has('admin_session')) {
            // Redirect ke halaman login jika belum login
            return redirect()->to('/loginAdmin')->with('error', 'Anda harus login terlebih dahulu.');
        }
        return view('dashboard');
    }

    public function registerAdmin()
    {
        return view('registerAdmin');
    }

    public function doRegisterAdmin()
    {
        $model = new Admin();
        $data = [
            'nama'     => $this->request->getPost('nama'),
            'username'    => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
            'status'   => 'pending',    
        ];

        $model->save($data);

        return redirect()->to('/loginAdmin')->with('success', 'daftar berhasil, silahkan login.');
    }

    public function doLoginAdmin()
    {
        // Load model untuk admin
        $adminModel = new Admin();

        // Ambil data dari form
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Cek apakah username ada di database
        $admin = $adminModel->where('username', $username)->first();

        // Jika admin ditemukan dan password cocok
        if ($admin && password_verify($password, $admin['password'])) {

            // Cek apakah status admin sudah 'approved'
            if ($admin['status'] === 'rejected') {
                // Jika status admin adalah 'rejected', tampilkan pesan error
                session()->setFlashdata('error', 'Akun admin Anda ditolak oleh super admin.');
                return redirect()->to(base_url('loginAdmin'))->with('error', 'Akun anda ditolak.');
            }

            if ($admin['status'] !== 'approved') {
                // Jika status admin bukan 'approved', tampilkan pesan error
                session()->setFlashdata('error', 'Akun admin Anda belum disetujui oleh super admin.');
                return redirect()->to(base_url('loginAdmin'))->with('error', 'Akun anda belum disetujui.');
            }

            // Set session admin jika status 'approved'
            session()->set('admin_session', [
                'id_admin' => $admin['id_admin'], 
                'nama' => $admin['nama'],
                'username' => $admin['username'],
            ]);

            return redirect()->to('/dashboard')->with('message', 'Welcome Admin!');
        } else {
            // Menggunakan flashdata untuk menyimpan pesan kesalahan
            session()->setFlashdata('error', 'Username atau password salah.');
            return redirect()->back()->with('error', 'Username atau Password salah.');
        }
    }



    public function logoutAdmin()
    {
        // Hapus session untuk admin
        session()->remove('admin_session');
        // Redirect ke halaman login admin atau halaman lain yang diinginkan
        return redirect()->to('/loginAdmin')->with('success', 'Anda berhasil logout.');
    }

    public function dataAdmin()
    {
        $adminModel = new Admin();
        $dataaa['admins'] = $adminModel->findAll(); // Mengambil semua data admin

        // Periksa apakah admin sudah login
        if (!session()->has('admin_session')) {
            // Redirect ke halaman login jika belum login
            return redirect()->to('/loginAdmin')->with('error', 'Anda harus login terlebih dahulu.');
        }
        
        return view('admin_adm', $dataaa); // Mengirim data ke view
    }

    // Menampilkan form edit admin
    public function editAdmin($id_admin)
    {
        $adminModel = new Admin();
        $data['admin'] = $adminModel->find($id_admin); // Mengambil data admin berdasarkan ID

        if (!$data['admin']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Admin not found'); // Jika admin tidak ditemukan
        }

        // Periksa apakah admin sudah login
        if (!session()->has('admin_session')) {
            return redirect()->to('/loginAdmin')->with('error', 'Anda harus login terlebih dahulu.');
        }

        return view('edit_admin', $data); // Kirim data ke view
    }

    // Memperbarui data admin
    public function updateAdmin($id_admin)
    {
        $adminModel = new Admin();
        $data = $this->request->getPost(); // Ambil data dari form

        // Validasi data (sesuaikan dengan kebutuhan Anda)
        if ($this->validate([
            'nama' => 'required',
            'username' => 'required|is_unique[admins.username,id_admin,' . $id_admin . ']', // pastikan username unik
        ])) {
            $adminModel->update($id_admin, $data); // Update data admin
            return redirect()->to('/admin_adm')->with('success', 'Data admin berhasil diperbarui.');
        }

        // Jika validasi gagal
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    public function deleteAdmin($id_admin)
    {
        $adminModel = new Admin();

        // Periksa apakah admin sudah login
        if (!session()->has('admin_session')) {
            return redirect()->to('/loginAdmin')->with('error', 'Anda harus login terlebih dahulu.');
        }

        $adminModel->delete($id_admin); // Hapus admin berdasarkan ID
        return redirect()->to('/admin_adm')->with('success', 'Admin berhasil dihapus.');
    }

    public function searchAdmin()
    {
        $query = $this->request->getGet('query');
        $model = new Admin(); // Ganti dengan model yang sesuai

        // Lakukan pencarian admin berdasarkan id_admin, nama, username, atau status
        $admins = $model->groupStart()
            ->like('id_admin', $query)
            ->orLike('nama', $query)
            ->orLike('username', $query)
            ->orLike('status', $query)
            ->groupEnd()
            ->findAll();

        return view('/admin_adm', [
            'admins' => $admins,
            'query' => $query,
        ]);
    }

    // Method untuk menampilkan halaman data transaksi
    public function dataTransaksi()
    {
        $datas['item'] = $this->transaksiModel
            ->select('transaksis.*, products.nama_product, users.nama')
            ->join('products', 'transaksis.id_product = products.id_product')
            ->join('users', 'transaksis.id_user = users.id_user')
            ->findAll();
        // Periksa apakah admin sudah login
        if (!session()->has('admin_session')) {
            // Redirect ke halaman login jika belum login
            return redirect()->to('/loginAdmin')->with('error', 'Anda harus login terlebih dahulu.');
        }
        // Mengirim data ke view
        return view('admin_trx', $datas);
    }

    // Method untuk menampilkan halaman data product
    public function dataProduct()
    {
        $productModel = new \App\Models\Product();
        $data['products'] = $productModel->findAll(); // Mengambil semua data produk

        // Periksa apakah admin sudah login
        if (!session()->has('admin_session')) {
            // Redirect ke halaman login jika belum login
            return redirect()->to('/loginAdmin')->with('error', 'Anda harus login terlebih dahulu.');
        }
        return view('admin_prdk', $data);
    }

    public function tambahProduct()
    {
        // Periksa apakah admin sudah login
        if (!session()->has('admin_session')) {
            // Redirect ke halaman login jika belum login
            return redirect()->to('/loginAdmin')->with('error', 'Anda harus login terlebih dahulu.');
        }
        return view('admin_prdk_sv');
    }

    public function simpanProduct()
    {
        // Validasi input
        $validation =  \Config\Services::validation();

        $validation->setRules([
            'nama_product' => 'required',
            'harga'        => 'required|numeric',
            'stok'         => 'required|numeric',
            'deskripsi'    => 'required',
            'gambar'       => 'uploaded[gambar]|max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
        ]);

        if (!$this->validate($validation->getRules())) {
            // Jika validasi gagal, redirect kembali ke form dengan error
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Inisialisasi model
        $productModel = new Product();

        // Menyimpan gambar ke folder 'uploads'
        $fileGambar = $this->request->getFile('gambar');
        $namaGambar = $fileGambar->getRandomName();
        $fileGambar->move('uploads', $namaGambar);

        // Menyimpan data produk ke database
        $data = [
            'nama_product' => $this->request->getPost('nama_product'),
            'harga'        => $this->request->getPost('harga'),
            'stok'         => $this->request->getPost('stok'),
            'deskripsi'    => $this->request->getPost('deskripsi'),
            'gambar'       => $namaGambar,
        ];

        $productModel->insert($data);

        return redirect()->to('/admin_prdk')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function editProduct($id_product)
    {
        $productModel = new Product();  
        $data['product'] = $productModel->find($id_product);
        // Periksa apakah admin sudah login
        if (!session()->has('admin_session')) {
            // Redirect ke halaman login jika belum login
            return redirect()->to('/loginAdmin')->with('error', 'Anda harus login terlebih dahulu.');
        }
        return view('admin_prdk_edit', $data);
    }

    public function updateProduct($id_product)
    {
        $productModel = new Product();
        $data = [
        'nama_product' => $this->request->getPost('nama_product'),
        'harga'        => $this->request->getPost('harga'),
        'stok'         => $this->request->getPost('stok'),
        'deskripsi'    => $this->request->getPost('deskripsi'),
    ];

    $imageFile = $this->request->getFile('gambar');
    if ($imageFile && $imageFile->isValid()) {
        // Hapus gambar lama jika ada
        $product = $productModel->find($id_product);
        if ($product && $product['gambar']) {
            $oldImagePath = WRITEPATH . 'uploads/' . $product['gambar'];
            if (is_file($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        // Simpan gambar baru
        $newImageName = $imageFile->getRandomName();
        $imageFile->move(WRITEPATH . 'uploads', $newImageName);
        $data['gambar'] = $newImageName;
    }

    $productModel->update($id_product, $data);
    return redirect()->to('/admin_prdk');
    }

    public function deleteProduct($id_product)
    {
        $productModel = new Product();
        $product = $productModel->find($id_product);

        if ($product && $product['gambar']) {
            $imagePath = WRITEPATH . 'uploads/' . $product['gambar'];
            if (is_file($imagePath)) {
                unlink($imagePath);
            }
        }

        $productModel->delete($id_product);
        return redirect()->to('/admin_prdk');
    }

    protected $userModel;

    // Constructor
    public function __construct()
    {
        // Inisialisasi model
        $this->adminModel = new Admin();
        $this->userModel = new User();
        $this->transaksiModel = new TransaksiModel();
        helper('url');
    }
    // Method untuk menampilkan halaman data user
    public function dataUser()
    {
        $userModel = new User();
        $data['users'] = $userModel->findAll(); // Mengambil semua data user

        // Periksa apakah admin sudah login
        if (!session()->has('admin_session')) {
            // Redirect ke halaman login jika belum login
            return redirect()->to('/loginAdmin')->with('error', 'Anda harus login terlebih dahulu.');
        }
        return view('admin_usr', $data); // Mengirim data ke view
    }

    // Fungsi untuk menampilkan form edit user
    public function editUser($id_user)
    {
        $user = $this->userModel->find($id_user);
        
        if ($user) {
            return view('edit_user', ['user' => $user]); // View untuk edit user
        } else {
            return redirect()->to('/admin_usr')->with('error', 'User not found');
        }
    }

    // Fungsi untuk update data user
    public function updateUser($id_user)
    {
        $data = [
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'no_telp' => $this->request->getPost('no_telp'),
            'alamat' => $this->request->getPost('alamat')
        ];

        if ($this->userModel->update($id_user, $data)) {
            return redirect()->to('/admin_usr')->with('success', 'User updated successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to update user');
        }
    }

    // Fungsi untuk menghapus user
    public function deleteUser($id_user)
    {
        $this->userModel->delete($id_user);
        return redirect()->to('/admin_usr')->with('success', 'User deleted successfully');
    }

    // Fungsi pencarian user
    public function search()
    {
        $query = $this->request->getVar('query'); // Ambil input pencarian dari form

        if ($query) {
            // Jika input pencarian adalah angka, cari berdasarkan ID user
            if (is_numeric($query)) {
                $data['users'] = $this->userModel->where('id_user', $query)->findAll();
            } else {
                // Jika input bukan angka, cari berdasarkan nama, email, no_telp, atau alamat
                $data['users'] = $this->userModel->like('nama', $query)
                                                ->orLike('email', $query)
                                                ->orLike('no_telp', $query)
                                                ->orLike('alamat', $query)
                                                ->findAll();
            }
        } else {
            // Jika tidak ada query, tampilkan semua user
            $data['users'] = $this->userModel->findAll();
        }

        $data['query'] = $query; // Simpan query untuk menampilkan kembali di input
        return view('admin_usr', $data);
    }

    // Method untuk menampilkan pesan di halaman admin
    public function tampilPesan()
    {
        $pesanModel = new Pesan();
        $data['messages'] = $pesanModel->findAll(); // Mengambil semua pesan dari database
        
        // Periksa apakah admin sudah login
        if (!session()->has('admin_session')) {
            // Redirect ke halaman login jika belum login
            return redirect()->to('/loginAdmin')->with('error', 'Anda harus login terlebih dahulu.');
        }
        return view('admin_message', $data); // Menampilkan view admin dengan data pesan
    }

    public function deleteMessage($id_pesan)
    {
        $pesanModel = new Pesan(); // Ganti dengan model Anda
        $pesanModel->delete($id_pesan); // Menghapus pesan berdasarkan ID
        return redirect()->to(base_url('admin_message'))->with('success', 'Pesan berhasil dihapus.');
    }


    // Fungsi untuk menampilkan halaman admin transaksi
    public function adminTrx()
    {
        $datas['item'] = $this->transaksiModel
            ->select('transaksis.*, products.nama_product, users.username')
            ->join('products', 'transaksis.id_product = products.id_product')
            ->join('users', 'transaksis.id_user = users.id_user')
            ->findAll();

            // Periksa apakah admin sudah login
        if (!session()->has('admin_session')) {
            // Redirect ke halaman login jika belum login
            return redirect()->to('/loginAdmin')->with('error', 'Anda harus login terlebih dahulu.');
        }
        // Mengirim data ke view
        return view('admin_trx', $datas);
    }

    public function adminProfile()
    {
        $session = session();
        $adminModel = new Admin();
        $admin = $adminModel->find($session->get('admin_session')['id_admin']);
        
        return view('adm_profile', ['admin' => $admin]);
    }

    public function editProfileAdmin()
    {
        $session = session();
        $adminModel = new Admin();
        $admin = $adminModel->find($session->get('admin_session')['id_admin']);
        
        return view('adm_edit', ['admin' => $admin]);
    }

    public function updateProfileAdmin()
    {
        $adminModel = new Admin();
        $data = [
            'nama' => $this->request->getPost('nama'),
            'username' => $this->request->getPost('username'),
        ];

        $adminModel->update($this->request->getPost('id_admin'), $data);
        return redirect()->to(base_url('adminProfile'));
    }

    public function changePasswordAdmin()
    {
        return view('ubahpw_admin');
    }

    public function updatePasswordAdmin()
    {
        $session = session();
        $adminModel = new Admin();
        $admin = $adminModel->find($session->get('admin_session')['id_admin']);

        $currentPassword = $this->request->getPost('current_password');
        $newPassword = $this->request->getPost('new_password');
        $confirmNewPassword = $this->request->getPost('confirm_new_password');

        // Verifikasi password saat ini
        if (!password_verify($currentPassword, $admin['password'])) {
            return redirect()->back()->with('error', 'Current password is incorrect');
        }

        // Cek kesesuaian password baru dan konfirmasinya
        if ($newPassword !== $confirmNewPassword) {
            return redirect()->back()->with('error', 'New passwords do not match');
        }

        // Update password dengan hash baru
        $adminModel->update($admin['id_admin'], ['password' => password_hash($newPassword, PASSWORD_DEFAULT)]);

        return redirect()->to(base_url('adminProfile'))->with('success', 'Password updated successfully');
    }


}
