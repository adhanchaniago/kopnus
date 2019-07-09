<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['simpan_pinjaman/(:any)']    	= 'pinjaman/simpan/$1';
$route['pinjaman']         						= 'pinjaman';
$route['angsuran/(:num)/(:any)']      = 'angsuran/index/$1/$2';
$route['bayar/(:num)/(:any)']         = 'angsuran/bayar/$1/$2';
$route['pinjaman_admin/(:any)']       = 'pinjaman/admin/$1';
$route['angsuran_admin/(:num)/(:any)']= 'angsuran/admin/$1/$2';
$route['nasabah']         						= 'nasabah';

$route['input_pinjaman/(:any)']    		= 'pinjaman/input/$1';
$route['download/(:num)/(:any)']      = 'berkas/download/$1/$2';

$route['profil']        	 						= 'home/profil';
$route['update']        	 						= 'home/upload';
$route['upload_kk/(:any)']        	 	= 'berkas/upload_kk/$1';
$route['upload_slip/(:any)']        	 	= 'berkas/upload_slip/$1';
$route['upload_npwp/(:any)']        	 	= 'berkas/upload_npwp/$1';
$route['upload_foto_diri/(:any)']        	 	= 'berkas/upload_foto_diri/$1';
$route['upload_karip/(:any)']        	 	= 'berkas/upload_karip/$1';
$route['upload_ktp/(:any)']        	 	= 'berkas/upload_ktp/$1';
$route['upload_sk/(:any)']        	 	= 'berkas/upload_sk/$1';
$route['angsuran']         						= 'angsuran';
$route['berkas_admin/(:any)']        	= 'berkas/admin/$1';
$route['berkas']							        = 'berkas';
$route['signout']         						= 'home/signout';
$route['signin'] 											= 'home/signin';
$route['register']										= 'home/register';
$route['login'] 											= 'home/login';
$route['req'] 												= 'home/req';
$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
