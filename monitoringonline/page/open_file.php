<?php
	if($_GET){
		switch ($_GET['Open']) {
			case 'login':
				if (!file_exists("page/login.php")) die ("File tidak ditemukan");
				include "page/login.php";
				break;
			case 'login-validation':
				if (!file_exists("page/login_validation.php")) die ("File tidak ditemukan");
				include "page/login_validation.php";
				break;
			case 'logout':
				if (!file_exists("page/logout.php")) die ("File tidak ditemukan");
				include "page/logout.php";
				break;
			case 'updateweb':
				if (!file_exists("page/updateweb.php")) die ("File tidak ditemukan");
				include "page/updateweb.php";
				break;
			case 'lihat-data-device':
				if (!file_exists("page/lihat_data_device.php")) die ("File tidak ditemukan");
				include "page/lihat_data_device.php";
				break;
			case 'tambah-data-device':
				if (!file_exists("page/tambah_data_device.php")) die ("File tidak ditemukan");
				include "page/tambah_data_device.php";
				break;
			case 'input-data-device':
				if (!file_exists("page/input_data_device.php")) die ("File tidak ditemukan");
				include "page/input_data_device.php";
				break;
			case 'edit-data-device':
				if (!file_exists("page/edit_data_device.php")) die ("File tidak ditemukan");
				include "page/edit_data_device.php";
				break;
			case 'update-data-device':
				if (!file_exists("page/update_data_device.php")) die ("File tidak ditemukan");
				include "page/update_data_device.php";
				break;
			case 'hapus-data-device':
				if (!file_exists("page/hapus_data_device.php")) die ("File tidak ditemukan");
				include "page/hapus_data_device.php";
				break;
			case 'api':
				if (!file_exists("page/api.php")) die ("File tidak ditemukan");
				include "page/api.php";
				break;
			case 'set':
				if (!file_exists("page/set.php")) die ("File tidak ditemukan");
				include "page/set.php";
				break;
			case 'monitoring':
				if (!file_exists("page/monitoring.php")) die ("File tidak ditemukan");
				include "page/monitoring.php";
				break;
			case 'histori':
				if (!file_exists("page/histori.php")) die ("File tidak ditemukan");
				include "page/histori.php";
				break;
			case 'hapus-data':
				if (!file_exists("page/hapus_data.php")) die ("File tidak ditemukan");
				include "page/hapus_data.php";
				break;
			case 'cetak-data':
				if (!file_exists("page/cetak_data.php")) die ("File tidak ditemukan");
				include "page/cetak_data.php";
				break;
			case 'ubah':
				if (!file_exists("page/ubah.php")) die ("File tidak ditemukan");
				include "page/ubah.php";
				break;
			case 'update-data-profile':
				if (!file_exists("page/update_data_profile.php")) die ("File tidak ditemukan");
				include "page/update_data_profile.php";
				break;
			case 'update-set':
				if (!file_exists("page/update_set.php")) die ("File tidak ditemukan");
				include "page/update_set.php";
				break;
			case 'lihat-data-device-user':
				if (!file_exists("page/lihat_data_device_user.php")) die ("File tidak ditemukan");
				include "page/lihat_data_device_user.php";
				break;
			case 'monitoring-user':
				if (!file_exists("page/monitoring_user.php")) die ("File tidak ditemukan");
				include "page/monitoring_user.php";
				break;
			case 'histori-user':
				if (!file_exists("page/histori_user.php")) die ("File tidak ditemukan");
				include "page/histori_user.php";
				break;				
			case 'get-histori':
				if (!file_exists("page/get_histori.php")) die ("File tidak ditemukan");
				include "page/get_histori.php";
				break;
			case 'tidak-diijinkan':
				if (!file_exists("page/tidak_diijinkan.php")) die ("File tidak ditemukan");
				include "page/tidak_diijinkan.php";
				break;
			case 'lihat-data-user':
				if (!file_exists("page/lihat_data_user.php")) die ("File tidak ditemukan");
				include "page/lihat_data_user.php";
				break;
			case 'tambah-data-user':
				if (!file_exists("page/tambah_data_user.php")) die ("File tidak ditemukan");
				include "page/tambah_data_user.php";
				break;
			case 'input-data-user':
				if (!file_exists("page/input_data_user.php")) die ("File tidak ditemukan");
				include "page/input_data_user.php";
				break;
			case 'edit-data-user':
				if (!file_exists("page/edit_data_user.php")) die ("File tidak ditemukan");
				include "page/edit_data_user.php";
				break;
			case 'update-data-user':
				if (!file_exists("page/update_data_user.php")) die ("File tidak ditemukan");
				include "page/update_data_user.php";
				break;
			case 'hapus-data-user':
				if (!file_exists("page/hapus_data_user.php")) die ("File tidak ditemukan");
				include "page/hapus_data_user.php";
				break;
			default:
				if (!file_exists("page/content.php")) die ("File tidak ditemukan");
				include "page/content.php";
				break;
		}
	}else{
		if (!file_exists("page/content.php")) die ("File tidak ditemukan");
			include "page/content.php";
	}
?>