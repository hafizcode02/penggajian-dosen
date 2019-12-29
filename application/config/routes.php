<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'login/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['admin-dashboard'] = 'Admin/index';
$route['dosen-dashboard'] = 'Dosen/index';
$route['logout'] = 'Login/logout';
//crud dosen
$route['data-dosen'] = 'Admin/dosen';
$route['tambah-dosen'] = 'Admin/tambah_dosen';
$route['tambah-aksi'] = 'Admin/aksi_tambah_dosen';
$route['edit-aksi'] = 'Admin/aksi_edit_dosen';
//crud data gaji
$route['data-gaji'] = 'Admin/datagaji';
$route['tambah-data'] = 'Admin/tambah_data';
$route['data-aksi'] = 'Admin/tambah_aksi';
//bagian penggajian
$route['data-penggajian'] = 'Admin/data_penggajian';
$route['hitung-penggajian'] = 'Admin/tambah_penggajian';
$route['aksi-hitung'] = 'Admin/aksi_tambah';
//bagian dosen login
$route['cek-gaji'] = 'Dosen/lihat_gaji';
//bagian cetak
$route['page-cetak'] = 'Admin/cetak_page';
$route['cetak-sdosen'] = 'Admin/cetak_sdosen';
//404
$route['not-found'] = "Not_Found/index";
$route['admin-kelola'] = "Admin/admin_kelola";
//sks
$route['sks-kelola'] = 'Admin/sks_kelola';
