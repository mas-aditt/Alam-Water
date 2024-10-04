<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Kendali;
use App\Controllers\KendaliAU;
use App\Controllers\KendaliAdmin;
use App\Controllers\Transaksi;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');

//kendali
$routes->get('login', 'Kendali::login');
$routes->get('AlamWater', 'Kendali::tampil');
$routes->get('register', 'Kendali::register');
$routes->post('doLogin', 'Kendali::doLogin');
$routes->post('doRegister', 'Kendali::doRegister');
$routes->get('logout', 'Kendali::logout');
$routes->get('userProfile', 'Kendali::profile');
$routes->get('editProfile', 'Kendali::editProfile');
$routes->post('updateProfile', 'Kendali::updateProfile');
$routes->get('changePasswordUser', 'Kendali::changePassword');
$routes->post('updatePasswordUser', 'Kendali::updatePassword');
//kendali admin
$routes->get('loginAdmin', 'KendaliAdmin::loginAdmin');
$routes->get('dashboard', 'KendaliAdmin::tampilAdmin');
$routes->get('registerAdmin', 'KendaliAdmin::registerAdmin');
$routes->post('doLoginAdmin', 'KendaliAdmin::doLoginAdmin');
$routes->post('doRegisterAdmin', 'KendaliAdmin::doRegisterAdmin');
$routes->get('logoutAdmin', 'KendaliAdmin::logoutAdmin');
$routes->get('admin_trx', 'KendaliAdmin::dataTransaksi');
$routes->get('adminProfile', 'KendaliAdmin::adminProfile');
$routes->get('editProfileAdmin', 'KendaliAdmin::editProfileAdmin'); 
$routes->post('updateProfileAdmin', 'KendaliAdmin::updateProfileAdmin');
$routes->get('changePasswordAdmin', 'KendaliAdmin::changePasswordAdmin');
$routes->post('updatePasswordAdmin', 'KendaliAdmin::updatePasswordAdmin');
//user
$routes->get('admin_usr', 'KendaliAdmin::dataUser');
$routes->get('/admin_usr/editUser/(:num)', 'KendaliAdmin::editUser/$1');
$routes->post('/admin_usr/updateUser/(:num)', 'KendaliAdmin::updateUser/$1');
$routes->get('/admin_usr/deleteUser/(:num)', 'KendaliAdmin::deleteUser/$1');
$routes->get('search', 'KendaliAdmin::search');
//akun admin
$routes->get('admin_adm', 'KendaliAdmin::dataAdmin');
$routes->get('/admin_adm/editAdmin/(:num)', 'KendaliAdmin::editAdmin/$1');
$routes->post('/admin_adm/updateAdmin/(:num)', 'KendaliAdmin::updateAdmin/$1');
$routes->get('/admin_adm/deleteAdmin/(:num)', 'KendaliAdmin::deleteAdmin/$1');
$routes->get('searchAdmin', 'KendaliAdmin::searchAdmin');
//pesan
$routes->post('kirimPesan', 'Kendali::kirimPesan');
$routes->get('admin_message', 'KendaliAdmin::tampilPesan');
$routes->get('deleteMessage/(:num)', 'KendaliAdmin::deleteMessage/$1');
//product
$routes->get('admin_prdk', 'KendaliAdmin::dataProduct');
$routes->get('admin_prdk_sv', 'KendaliAdmin::tambahProduct');
$routes->post('simpanProduct', 'KendaliAdmin::simpanProduct'); 
$routes->get('admin_prdk_edit(:num)', 'KendaliAdmin::editProduct/$1');
$routes->post('admin_prdk_update(:num)', 'KendaliAdmin::updateProduct/$1');
$routes->get('admin_prdk_delete(:num)', 'KendaliAdmin::deleteProduct/$1');

//transaksi
$routes->get('shop', 'Transaksi::shop'); // User shop page
$routes->post('storeP', 'Transaksi::storeP'); // Store transaction
$routes->get('admin_trx', 'Transaksi::adminTrx'); // Admin transaction management
$routes->get('admin_trx', 'KendaliAdmin::adminTrx'); // Admin transaction management
$routes->get('editTrx/(:num)', 'Transaksi::editTrx/$1');
$routes->post('updateTrx', 'Transaksi::updateTrx');
$routes->get('deleteTrx/(:num)', 'Transaksi::deleteTrx/$1');
$routes->get('userTrx', 'Kendali::userTrx');
$routes->get('searchTrx', 'Transaksi::searchTrx'); 


//admin
$routes->group('admin', ['filter' => 'adminAuth'], function($routes) {
    $routes->get('/dashboard', 'KendaliAdmin::tampilAdmin');
    $routes->get('/admin_usr', 'KendaliAdmin::dataUser');
    $routes->get('/admin_adm', 'KendaliAdmin::dataAdmin');
    $routes->get('/admin_prdk', 'KendaliAdmin::dataProduct');
    $routes->get('/admin_trx', 'KendaliAdmin::adminTrx');
    $routes->get('/admin_trx', 'KendaliAdmin::dataTransaksi');
    $routes->get('/admin_message', 'KendaliAdmin::tampilPesan');
    // Tambahkan route lainnya yang butuh login admin
});

//setujui
$routes->get('pending_users', 'KendaliAU::showPendingUsers');
$routes->get('admin/approveUser/(:num)', 'KendaliAU::approveUser/$1');
$routes->get('admin/rejectUser/(:num)', 'KendaliAU::rejectUser/$1');

$routes->get('pending_admins', 'KendaliAU::showPendingAdmins');
$routes->get('admin/approveAdmin/(:num)', 'KendaliAU::approveAdmin/$1');
$routes->get('admin/rejectAdmin/(:num)', 'KendaliAU::rejectAdmin/$1');
