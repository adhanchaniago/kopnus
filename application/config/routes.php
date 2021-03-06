<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//Admin
$route['simpan_pinjaman/(:any)']    		= 'pinjaman/simpan/$1';
$route['bayar/(:num)/(:any)']         	= 'angsuran/bayar/$1/$2';
$route['pinjaman_admin/(:any)']       	= 'pinjaman/admin/$1';
$route['angsuran_admin/(:num)/(:any)']	= 'angsuran/admin/$1/$2';
$route['input_pinjaman/(:any)']    			= 'pinjaman/input/$1';
$route['nasabah']         							= 'nasabah';
$route['tampilkan_laporan']        	 		= 'home/laporan_tampil';
$route['laporan']        	 							= 'home/laporan';
$route['notifikasi']        	 					= 'home/notifikasi';
$route['berkas_admin/(:any)']        		= 'berkas/admin/$1';
//User
$route['angsuran/(:num)/(:any)']      = 'angsuran/index/$1/$2';
$route['pinjaman']         						= 'pinjaman';
$route['download/(:num)/(:any)']      = 'berkas/download/$1/$2';
$route['angsuran']         						= 'angsuran';

//Berkas
$route['upload_kk/(:num)/(:any)']        	 	= 'berkas/upload_kk/$1/$2';
$route['upload_slip/(:num)/(:any)']        	= 'berkas/upload_slip/$1/$2';
$route['upload_npwp/(:num)/(:any)']        	= 'berkas/upload_npwp/$1/$2';
$route['upload_foto_diri/(:num)/(:any)']    = 'berkas/upload_foto_diri/$1/$2';
$route['upload_karip/(:num)/(:any)']        = 'berkas/upload_karip/$1/$2';
$route['upload_ktp/(:num)/(:any)']        	= 'berkas/upload_ktp/$1/$2';
$route['upload_sk/(:num)/(:any)']        	 	= 'berkas/upload_sk/$1/$2';

$route['upload_perjanjian/(:any)']   				= 'berkas/upload_perjanjian/$1';
$route['berkas']							       				= 'berkas';

$route['cetak/(:any)']							        = 'laporan/index/$1';
$route['hasil']							        = 'home/cetak';

$route['update']        	 						= 'home/upload';
$route['profil']        	 						= 'home/profil';
$route['signout']         						= 'home/signout';
$route['signin'] 											= 'home/signin';
$route['register']										= 'home/register';
$route['login'] 											= 'home/login';
$route['req'] 												= 'home/req';
$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
