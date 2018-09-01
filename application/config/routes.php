<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'login/index';
$route['logout'] = 'login/logout';

$route['master'] = 'Master/index';
$route['transaksi'] = 'Transaksi/index';

$route['jenis-anggota'] = 'JenisAnggota/index';
$route['jenis-anggota/(:num)'] = 'JenisAnggota/index/$1';
$route['jenis-anggota/create'] = 'JenisAnggota/create';
$route['jenis-anggota/post'] = 'JenisAnggota/store';
$route['jenis-anggota/edit/(:num)'] = 'JenisAnggota/edit/$1';
$route['jenis-anggota/patch'] = 'JenisAnggota/update';
$route['jenis-anggota/delete'] = 'JenisAnggota/destroy';

$route['jenis-perjalanan'] = 'JenisPerjalanan/index';
$route['jenis-perjalanan/(:num)'] = 'JenisPerjalanan/index/$1';
$route['jenis-perjalanan/create'] = 'JenisPerjalanan/create';
$route['jenis-perjalanan/post'] = 'JenisPerjalanan/store';
$route['jenis-perjalanan/edit/(:num)'] = 'JenisPerjalanan/edit/$1';
$route['jenis-perjalanan/patch'] = 'JenisPerjalanan/update';
$route['jenis-perjalanan/delete'] = 'JenisPerjalanan/destroy';

$route['jenis-kegiatan'] = 'JenisKegiatan/index';
$route['jenis-kegiatan/(:num)'] = 'JenisKegiatan/index/$1';
$route['jenis-kegiatan/create'] = 'JenisKegiatan/create';
$route['jenis-kegiatan/post'] = 'JenisKegiatan/store';
$route['jenis-kegiatan/edit/(:num)'] = 'JenisKegiatan/edit/$1';
$route['jenis-kegiatan/patch'] = 'JenisKegiatan/update';
$route['jenis-kegiatan/delete'] = 'JenisKegiatan/destroy';

$route['data-anggota'] = 'DataAnggota/index';
$route['data-anggota/(:num)'] = 'DataAnggota/index/$1';
$route['data-anggota/create'] = 'DataAnggota/create';
$route['data-anggota/post'] = 'DataAnggota/store';
$route['data-anggota/edit/(:num)'] = 'DataAnggota/edit/$1';
$route['data-anggota/patch'] = 'DataAnggota/update';
$route['data-anggota/delete'] = 'DataAnggota/destroy';

$route['data-user'] = 'DataUser/index';
$route['data-user/(:num)'] = 'DataUser/index/$1';
$route['data-user/create'] = 'DataUser/create';
$route['data-user/post'] = 'DataUser/store';
$route['data-user/edit/(:num)'] = 'DataUser/edit/$1';
$route['data-user/patch'] = 'DataUser/update';
$route['data-user/delete'] = 'DataUser/destroy';

$route['kegiatan'] = 'Kegiatan/index';
$route['kegiatan/(:num)'] = 'Kegiatan/index/$1';
$route['kegiatan/create'] = 'Kegiatan/create';
$route['kegiatan/detail/(:num)'] = 'Kegiatan/show/$1';
$route['kegiatan/post'] = 'Kegiatan/store';
$route['kegiatan/edit/(:num)'] = 'Kegiatan/edit/$1';
$route['kegiatan/patch'] = 'Kegiatan/update';
$route['kegiatan/delete'] = 'Kegiatan/destroy';

$route['panjar'] = 'Panjar/index';
$route['panjar/(:num)'] = 'Panjar/index/$1';
$route['panjar/create'] = 'Panjar/create';
$route['panjar/detail/(:num)'] = 'Panjar/show/$1';
$route['panjar/post'] = 'Panjar/store';
$route['panjar/edit/(:num)'] = 'Panjar/edit/$1';
$route['panjar/patch'] = 'Panjar/update';
$route['panjar/delete'] = 'Panjar/destroy';

$route['pelunasan'] = 'Pelunasan/index';
$route['pelunasan/(:num)'] = 'Pelunasan/index/$1';
$route['pelunasan/create'] = 'Pelunasan/create';
$route['pelunasan/detail/(:num)'] = 'Pelunasan/show/$1';
$route['pelunasan/post'] = 'Pelunasan/store';
$route['pelunasan/edit/(:num)'] = 'Pelunasan/edit/$1';
$route['pelunasan/patch'] = 'Pelunasan/update';
$route['pelunasan/delete'] = 'Pelunasan/destroy';


$route['laporan'] = 'laporan/index';
$route['laporan-operator'] = 'laporan/operator';
