<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;
use App\Models\Admin;

class KendaliAU extends BaseController
{
    protected $userModel;
    protected $adminModel;

    public function __construct()
    {
        // Load model User dan Admin
        $this->userModel = new User();
        $this->adminModel = new Admin();
    }

    public function showPendingUsers()
    {
        $data['pendingUsers'] = $this->userModel->where('status', 'pending')->findAll();
        return view('pending_users', $data);
    }

    public function approveUser($id_user)
    {
        // Cek apakah user dengan ID yang diberikan ada di database
        $user = $this->userModel->find($id_user);

        if (!$user) {
            return redirect()->to('/pending_users')->with('error', 'User tidak ditemukan.');
        }

        // Update status user menjadi 'approved'
        $this->userModel->update($id_user, ['status' => 'approved']);
        
        return redirect()->to('/pending_users')->with('message', 'User berhasil disetujui.');
    }

    public function rejectUser($id_user)
    {
        // Cek apakah user dengan ID yang diberikan ada di database
        $user = $this->userModel->find($id_user);

        if (!$user) {
            return redirect()->to('/pending_users')->with('error', 'User tidak ditemukan.');
        }

        // Update status user menjadi 'rejected'
        $this->userModel->update($id_user, ['status' => 'rejected']);
        
        return redirect()->to('/pending_users')->with('message', 'User ditolak.');
    }

    public function showPendingAdmins()
    {
        $data['pendingAdmins'] = $this->adminModel->where('status', 'pending')->findAll();
        return view('pending_admins', $data);
    }

    public function approveAdmin($id_admin)
    {
        // Cek apakah admin dengan ID yang diberikan ada di database
        $admin = $this->adminModel->find($id_admin);

        if (!$admin) {
            return redirect()->to('/pending_admins')->with('error', 'Admin tidak ditemukan.');
        }

        // Update status admin menjadi 'approved'
        $this->adminModel->update($id_admin, ['status' => 'approved']);
        
        return redirect()->to('/pending_admins')->with('message', 'Admin berhasil disetujui.');
    }

    public function rejectAdmin($id_admin)
    {
        // Cek apakah admin dengan ID yang diberikan ada di database
        $admin = $this->adminModel->find($id_admin);

        if (!$admin) {
            return redirect()->to('/pending_admins')->with('error', 'Admin tidak ditemukan.');
        }

        // Update status admin menjadi 'rejected'
        $this->adminModel->update($id_admin, ['status' => 'rejected']);
        
        return redirect()->to('/pending_admins')->with('message', 'Admin ditolak.');
    }
}
