<?php

namespace App\Controllers;

use App\Models\Transaksi as TransaksiModel; 
use App\Models\Product;
use App\Models\User;
use CodeIgniter\Controller;

class Transaksi extends Controller
{
    protected $transaksiModel;
    protected $productModel;

    public function __construct()
    {
        $this->transaksiModel = new TransaksiModel(); // Menggunakan alias model
        $this->productModel = new Product();
    }

    // Menampilkan halaman belanja untuk user
    public function shop()
    {
        $data['products'] = $this->productModel->findAll(); // Menampilkan daftar produk
        return view('shop', $data);
    }

        // // User menyimpan transaksi pembelian produk
        // public function storeP()
        // {
        //     $id_user = $this->request->getVar('id_user');
        //     $id_product = $this->request->getVar('id_product');
        //     $jumlah = $this->request->getVar('jumlah');

        //     // Dapatkan harga produk dari database berdasarkan id_product
        //     $product = $this->productModel->find($id_product);
        //     $harga = $product['harga'];

        //     // Hitung total harga berdasarkan jumlah yang dibeli
        //     $total_harga = $harga * $jumlah;

        //     // Simpan transaksi ke database
        //     $this->transaksiModel->save([
        //         'id_user'       => $id_user,
        //         'id_product'    => $id_product,
        //         'jumlah'        => $jumlah,
        //         'tgl_transaksi' => date('Y-m-d H:i:s'),
        //         'total_harga'   => $total_harga,
        //         'status'        => 'pending',
        //     ]);

        //     return redirect()->to('/AlamWater');
        // }

        // User menyimpan transaksi pembelian produk
    public function storeP()
    {
        $id_user = $this->request->getVar('id_user');
        $id_product = $this->request->getVar('id_product');
        $jumlah = $this->request->getVar('jumlah');

        // Dapatkan data produk dari database berdasarkan id_product
        $product = $this->productModel->find($id_product);

        // Cek jika produk ditemukan
        if (!$product) {
            return redirect()->back()->with('error', 'Produk tidak ditemukan.');
        }

        // Cek apakah stok cukup
        if ($product['stok'] < $jumlah) {
            return redirect()->back()->with('error', 'Stok produk tidak mencukupi.');
        }

        $harga = $product['harga'];

        // Hitung total harga berdasarkan jumlah yang dibeli
        $total_harga = $harga * $jumlah;

        // Simpan transaksi ke database
        $this->transaksiModel->save([
            'id_user'       => $id_user,
            'id_product'    => $id_product,
            'jumlah'        => $jumlah,
            'tgl_transaksi' => date('Y-m-d H:i:s'),
            'total_harga'   => $total_harga,
            'status'        => 'pending',
        ]);

        // Kurangi stok produk
        $stokBaru = $product['stok'] - $jumlah;

        // Update stok produk di database
        $this->productModel->update($id_product, ['stok' => $stokBaru]);

        // Redirect ke halaman sukses
        return redirect()->to('/userTrx')->with('success', 'Transaksi berhasil, stok produk diperbarui.');
    }


    // Menampilkan data transaksi untuk admin (admin_trx)
    public function adminTrx()
    {
        $data['transaksis'] = $this->transaksiModel
            ->select('transaksis.*, products.nama_product, users.username')
            ->join('products', 'transaksis.id_product = products.id_product')
            ->join('users', 'transaksis.id_user = users.id_user')
            ->findAll();

        // Mengirim data ke view
        return view('admin_trx', $data);
    }

    public function editTrx($id_transaksi)
    {
        $transaksiModel = new TransaksiModel();
        $data['transaksi'] = $transaksiModel->find($id_transaksi);

        if (empty($data['transaksi'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Transaksi tidak ditemukan: ' . $id_transaksi);
        }

        return view('edit_trx', $data);
    }

    public function updateTrx()
    {
        $transaksiModel = new TransaksiModel();
        $id_transaksi = $this->request->getPost('id_transaksi');
        $data = [
            'jumlah' => $this->request->getPost('jumlah'),
            'total_harga' => $this->request->getPost('total_harga'),
            'status' => $this->request->getPost('status')
        ];

        $transaksiModel->update($id_transaksi, $data);
        return redirect()->to(base_url('admin_trx'));
    }

    public function deleteTrx($id_transaksi)
    {
        $transaksiModel = new TransaksiModel();
        $transaksiModel->delete($id_transaksi);
        return redirect()->to(base_url('admin_trx'));
    }

    public function searchTrx()
    {
        $query = $this->request->getGet('query');

        // Cari produk berdasarkan beberapa kolom dengan join
        $data['item'] = $this->transaksiModel
            ->select('transaksis.*, products.nama_product')
            ->join('products', 'transaksis.id_product = products.id_product', 'left')
            ->groupStart()
            ->like('transaksis.id_transaksi', $query)
            ->orLike('products.nama_product', $query)
            ->orLike('transaksis.jumlah', $query)
            ->orLike('transaksis.total_harga', $query)
            ->orLike('transaksis.status', $query)
            ->groupEnd()
            ->findAll();

        return view('admin_trx', $data);
    }
}
