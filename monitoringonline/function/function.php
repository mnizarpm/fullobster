<?php
	function anti_injection($data){
		$data = str_replace("'", "", $data);
		$data = str_replace('"', '', $data);
		$data = str_replace("|", "", $data);
		return $data;
	}

	function cek_login($conn, $username, $password){
		$username = anti_injection($username);
		$password = anti_injection($password);
		$query = mysqli_query($conn, "SELECT * FROM tb_user WHERE nama_user='$username' AND password_user='$password'") or die ("Query salah : ".mysqli_error());
		if (mysqli_num_rows($query)>=1) {
			$data = mysqli_fetch_array($query);
			$_SESSION['ses_login'] = $data['id_user'];
			$_SESSION['ses_level'] = $data['id_level_user'];
			$_SESSION['ses_password'] = $data['password_user'];
			$_SESSION['ses_nama'] = $data['nama'];
			$query = mysqli_query($conn, "SELECT * FROM tb_level_user WHERE id_level_user='$_SESSION[ses_level]'") or die ("Query salah : ".mysqli_error());
			$data = mysqli_fetch_array($query);
			$_SESSION['ses_nama_level'] = $data['nama_level_user'];
			return true;
		}else{
			return false;
		}
	}

	function cek_password($conn, $username, $password){
		$username = anti_injection($username);
		$password = anti_injection($password);
		$query = mysqli_query($conn, "SELECT * FROM tb_user WHERE id_user='$username' AND password_user='$password'") or die ("Query salah : ".mysqli_error());
		if (mysqli_num_rows($query)>=1) {
			return true;
		}else{
			return false;
		}
	}

	function get_user($conn){
		$response = array();
		$num = 0;
		$query = mysqli_query($conn, "SELECT * FROM tb_user, tb_level_user WHERE tb_user.id_level_user = tb_level_user.id_level_user AND tb_level_user.nama_level_user = 'User'") or die ("Query salah : ".mysqli_error());
		while ($data = mysqli_fetch_array($query)) {
			// echo $data['id_user']." - ".$data['nama_user']."<br>";
			$response[$num] = array(
				'id_user' => $data['id_user'],
				'nama_user'=> $data['nama_user'],
				'nama'=> $data['nama']
			);
			$num += 1;
		}
		return $response;	
	}

	function get_device($conn){
		$response = array();
		$num = 0;
		$query = mysqli_query($conn, "SELECT * from tb_device") or die ("Query salah : ".mysqli_error());
		while ($data = mysqli_fetch_array($query)) {
			// echo $data['id_user']." - ".$data['nama_user']."<br>";
			$response[$num] = array(
				'id_device' => $data['id_device'],
				'nama_device'=> $data['nama_device']
			);
			$num += 1;
		}
		return $response;	
	}

	function get_device_limit($conn){
		$jumlahData = 3;
		$response = array();
		$num = 0;
		$query = mysqli_query($conn, "SELECT * from tb_device LIMIT $jumlahData") or die ("Query salah : ".mysqli_error());
		while ($data = mysqli_fetch_array($query)) {
			// echo $data['id_user']." - ".$data['nama_user']."<br>";
			$response[$num] = array(
				'id_device' => $data['id_device'],
				'nama_device'=> $data['nama_device']
			);
			$num += 1;
		}
		return $response;	
	}

	function get_device_limit2($conn, $id){
		$jumlahData = 3;
		$response = array();
		$num = 0;
		$query = mysqli_query($conn, "SELECT * FROM tb_divisi, tb_device WHERE tb_divisi.id_device = tb_device.id_device AND tb_divisi.id_user = '$id' LIMIT $jumlahData") or die ("Query salah : ".mysqli_error());
		while ($data = mysqli_fetch_array($query)) {
			// echo $data['id_user']." - ".$data['nama_user']."<br>";
			$response[$num] = array(
				'id_device' => $data['id_device'],
				'nama_device'=> $data['nama_device']
			);
			$num += 1;
		}
		return $response;	
	}

	function tambah_user($conn, $username, $nama_user, $device){
		$query = mysqli_query($conn, "SELECT * FROM tb_level_user WHERE nama_level_user = 'User'") or die ("Query salah : ".mysqli_error());
		$data = mysqli_fetch_array($query);
		$id_level = $data['id_level_user'];
		$query = mysqli_query($conn, "INSERT INTO tb_user (id_user, id_level_user, password_user, nama_user, nama) VALUES ('', '$id_level', '$username', '$username','$nama_user')") or die ("Query salah : ".mysqli_error());
		$query = mysqli_query($conn, "SELECT * FROM tb_user WHERE nama_user = '$username'") or die ("Query salah : ".mysqli_error());
		$data = mysqli_fetch_array($query);
		$id_user = $data['id_user'];
		$query = "INSERT INTO tb_divisi (id_divisi, id_user, id_device) VALUES ";
		foreach ($device as $key => $value) {
			$query = $query."( NULL, '".$id_user."','".$value."'),";
		}
		$query = $query." ";
		$query = rtrim($query, ", ");
		// echo $query;
		$query = mysqli_query($conn, $query) or die ("Query salah : ".mysqli_error());
		return true;
	}

	function get_device_user($conn, $user){
		$response = array();
		$num = 0;
		$query = mysqli_query($conn, "SELECT * FROM tb_user, tb_divisi, tb_device WHERE tb_user.id_user = tb_divisi.id_user AND tb_divisi.id_device = tb_device.id_device AND tb_user.id_user='$user'") or die ("Query salah : ".mysqli_error());
		while ($data = mysqli_fetch_array($query)) {
			// echo $data['id_user']." - ".$data['nama_user']."<br>";
			$response[$num] = array(
				'id_device' => $data['id_device'],
				'nama_device'=> $data['nama_device']
			);
			$num += 1;
		}
		return $response;	
	}

	function get_user2($conn, $id){
		$query = mysqli_query($conn, "SELECT * FROM tb_user, tb_level_user WHERE tb_user.id_level_user = tb_level_user.id_level_user AND tb_level_user.nama_level_user = 'User' AND tb_user.id_user='$id'") or die ("Query salah : ".mysqli_error());
		$data = mysqli_fetch_array($query);
		$response = $data['nama_user'];
		return $response;	
	}

	function get_nama($conn, $id){
		$query = mysqli_query($conn, "SELECT * FROM tb_user, tb_level_user WHERE tb_user.id_level_user = tb_level_user.id_level_user AND tb_level_user.nama_level_user = 'User' AND tb_user.id_user='$id'") or die ("Query salah : ".mysqli_error());
		$data = mysqli_fetch_array($query);
		$response = $data['nama'];
		return $response;	
	}

	function get_user3($conn, $id){
		$query = mysqli_query($conn, "SELECT * FROM tb_user, tb_level_user WHERE tb_user.id_level_user = tb_level_user.id_level_user AND tb_user.id_user='$id'") or die ("Query salah : ".mysqli_error());
		$data = mysqli_fetch_array($query);
		$response = array(
			'nama_user'=>$data['nama_user'],
			'nama'=>$data['nama']
		);
		return $response;	
	}

	function cek_device($val, $device)
	{
		foreach ($device as $key => $value) {
			if($val == $value['nama_device']){
				return true;
			}
	    }
	    return false;	
	}

	function update_user($conn, $id, $nama, $device){
		$query = mysqli_query($conn, "UPDATE tb_user SET nama='$nama' WHERE id_user = '$id'") or die ("Query salah : ".mysqli_error());
		$query = mysqli_query($conn, "SELECT * FROM tb_level_user WHERE nama_level_user = 'User'") or die ("Query salah : ".mysqli_error());
		$data = mysqli_fetch_array($query);
		$id_level = $data['id_level_user'];
		$query = mysqli_query($conn, "DELETE FROM tb_divisi WHERE id_user = '$id'") or die ("Query salah : ".mysqli_error());
		$query = "INSERT INTO tb_divisi (id_divisi, id_user, id_device) VALUES ";
		foreach ($device as $key => $value) {
			$query = $query."( NULL, '".$id."','".$value."'),";
		}
		$query = $query." ";
		$query = rtrim($query, ", ");
		// echo $query;
		$query = mysqli_query($conn, $query) or die ("Query salah : ".mysqli_error());
		return true;
	}

	function hapus_user($conn, $username){
		$query = mysqli_query($conn, "DELETE FROM tb_user WHERE id_user = '$username'") or die ("Query salah : ".mysqli_error());
		return true;
	}

	function username($conn){
		$response = array();
		$num = 0;
		$query = mysqli_query($conn, "SELECT nama_user FROM tb_user") or die ("Query salah : ".mysqli_error());
		while ($data = mysqli_fetch_array($query)){
			$response[$num] = $data['nama_user'];
			$num += 1;
		}
		return $response;
	}

	function tambah_device($conn, $nama_device){
		$query = mysqli_query($conn, "INSERT INTO tb_device (id_device, nama_device) VALUES (NULL, '$nama_device')") or die ("Query salah : ".mysqli_error());
		return true;
	}

	function get_device2($conn, $id){
		$response = array();
		$num = 0;
		$query = mysqli_query($conn, "SELECT * FROM tb_device WHERE id_device = '$id'") or die ("Query salah : ".mysqli_error());
		while ($data = mysqli_fetch_array($query)) {
			// echo $data['id_user']." - ".$data['nama_user']."<br>";
			$response = array(
				'id_device' => $data['id_device'],
				'nama_device'=> $data['nama_device']
			);
		}
		return $response;		
	}

	function update_device($conn, $id_device, $nama_device){
		$query = mysqli_query($conn, "UPDATE tb_device SET nama_device='$nama_device' WHERE id_device = '$id_device'") or die ("Query salah : ".mysqli_error());
		return true;
	}

	function hapus_device($conn, $username){
		$query = mysqli_query($conn, "DELETE FROM tb_device WHERE id_device = '$username'") or die ("Query salah : ".mysqli_error());
		return true;
	}

	function tambah_data($conn, $id_device, $ph, $suhu, $tds, $status_ph, $status_suhu, $status_tds, $do, $nitrit, $amonia){
		date_default_timezone_set('Asia/Jakarta');
		$tanggal = date('Y-m-d');
		// $tanggal = "2021-06-12";
		$waktu = date('H:i:s');
// 		echo "INSERT INTO tb_data (id_data, tanggal_data, waktu_data, id_device, ph, suhu, status_ph, status_suhu, tds) VALUES (NULL, '$tanggal', '$waktu', '$id_device', '$ph', '$suhu', '$status_ph', '$status_suhu', '$tds')";
		$query = mysqli_query($conn, "INSERT INTO tb_data (id_data, tanggal_data, waktu_data, id_device, ph, suhu, status_ph, status_suhu, tds, status_tds, do, nitrit, amonia) VALUES (NULL, '$tanggal', '$waktu', '$id_device', '$ph', '$suhu', '$status_ph', '$status_suhu', '$tds', '$status_tds', '$do', '$nitrit', '$amonia')") or die ("Query salah : ".mysqli_error());
		return true;
	}

	function get_data_device($conn, $id){
		$response = array();
		$num = 0;
		// ORDER BY id_data DESC LIMIT 100
		$query = mysqli_query($conn, "SELECT * FROM tb_data WHERE id_device = '$id'") or die ("Query salah : ".mysqli_error());
		while ($data = mysqli_fetch_array($query)) {
			// echo $data['id_user']." - ".$data['nama_user']."<br>";
			$response[$num] = array(
				'tanggal_data' => $data['tanggal_data'],
				'waktu_data'=> $data['waktu_data'],
				'ph' => $data['ph'],
				'tds'=> $data['tds'],
				'suhu' => $data['suhu']
			);
			$num += 1;
		}
		return $response;		
	}

	function get_histori($conn, $id, $hari){
		$response = array();
		$num = 0;
		$waktu = [];
		$ph = [];
		$suhu = [];
		$tds = [];
		$status_ph = [];
		$status_suhu = [];
		$do = [];
		$nitrit = [];
		$amonia = [];
		// ORDER BY id_data DESC LIMIT 100
		$query = mysqli_query($conn, "SELECT * FROM tb_data WHERE id_device = '$id' AND tanggal_data = '$hari' ") or die ("Query salah : ".mysqli_error());
		while ($data = mysqli_fetch_array($query)) {
			array_push($waktu, $data['waktu_data']);
			array_push($ph, $data['ph']);
			array_push($suhu, $data['suhu']);
			array_push($tds, $data['tds']);
			array_push($status_ph, $data['status_ph']);
			array_push($status_suhu, $data['status_suhu']);
			array_push($do, $data['do']);
			array_push($nitrit, $data['nitrit']);
			array_push($amonia, $data['amonia']);
		}
		return [$waktu, $ph, $suhu, $tds, $status_ph, $status_suhu, $do, $nitrit, $amonia];		
	}

	function get_data_device2($conn, $id){
		// $response = array();
		$jumlahData = 20;
		$waktu = array();
		$ph = array();
		$suhu = array();
		$tds = array();
		$status_ph = array();
		$status_suhu = array();
		$status_tds = array();
		
		$do = array();
		$nitrit = array();
		$amonia = array();
		
		$doSementara = array();
		$nitritSementara = array();
		$amoniaSementara = array();
		
		$num = 0;
		// ORDER BY id_data DESC LIMIT 100
		$query = mysqli_query($conn, "SELECT * FROM tb_data WHERE id_device = '$id' ORDER BY id_data DESC LIMIT $jumlahData") or die ("Query salah : ".mysqli_error());
		while ($data = mysqli_fetch_array($query)) {
			// echo $data['id_user']." - ".$data['nama_user']."<br>";
			array_push($waktu, $data['waktu_data']);
			array_push($ph, $data['ph']);
			array_push($suhu, $data['suhu']);
			array_push($tds, $data['tds']);
			array_push($status_ph, $data['status_ph']);
			array_push($status_suhu, $data['status_suhu']);
			array_push($status_tds, $data['status_tds']);
			array_push($do, $data['do']);
			array_push($nitrit, $data['nitrit']);
			array_push($amonia, $data['amonia']);
		}
		
		$query = mysqli_query($conn, "SELECT * FROM tb_sementara") or die ("Query salah : ".mysqli_error());
		while ($data = mysqli_fetch_array($query)) {
			array_push($doSementara, $data['do']);
			array_push($nitritSementara, $data['nitrit']);
			array_push($amoniaSementara, $data['amonia']);
		}
		
		$response = array($waktu,$ph,$suhu, $tds, $status_ph, $status_suhu, $status_tds,$do, $nitrit, $amonia, $doSementara, $nitritSementara, $amoniaSementara);
		return $response;		
	}

	function hapus_data($conn, $id, $dari, $hingga){
		$query = mysqli_query($conn, "DELETE FROM tb_data WHERE id_device = '$id' AND tanggal_data BETWEEN '$dari' AND '$hingga'") or die ("Query salah : ".mysqli_error());
		return true;
	}
	
	function getDo($conn){
		// ORDER BY id_data DESC LIMIT 100
		$query = mysqli_query($conn, "SELECT * FROM tb_sementara ") or die ("Query salah : ".mysqli_error());
		while ($data = mysqli_fetch_array($query)) {
			$response = $data['do'];
		}
		return $response;		
	}
	
	function getSementara($conn){
		// ORDER BY id_data DESC LIMIT 100
		$query = mysqli_query($conn, "SELECT * FROM tb_sementara ") or die ("Query salah : ".mysqli_error());
		$data = mysqli_fetch_array($query);
		return $data;		
	}
	
	function getNitrit($conn){
		// ORDER BY id_data DESC LIMIT 100
		$query = mysqli_query($conn, "SELECT * FROM tb_sementara ") or die ("Query salah : ".mysqli_error());
		while ($data = mysqli_fetch_array($query)) {
			$response = $data['nitrit'];
		}
		return $response;		
	}
	
	function getAmonia($conn){
		// ORDER BY id_data DESC LIMIT 100
		$query = mysqli_query($conn, "SELECT * FROM tb_sementara ") or die ("Query salah : ".mysqli_error());
		while ($data = mysqli_fetch_array($query)) {
			$response = $data['amonia'];
		}
		return $response;		
	}
	
	function updateSet($conn, $do, $nitrit, $amonia){
	    $query = mysqli_query($conn, "UPDATE tb_sementara SET do='$do', nitrit='$nitrit', amonia='$amonia'") or die ("Query salah : ".mysqli_error());
		return true;
	}

	function get_data_device3($conn, $id, $dari, $hingga){
		$response = array();
		$waktu = array();
		$ph = array();
		$tds = array();
		$suhu = array();
		$do = array();
		$nitrit = array();
		$amonia = array();
		$num = 0;
		// ORDER BY id_data DESC LIMIT 100
		$query = mysqli_query($conn, "SELECT * FROM tb_data WHERE id_device = '$id' AND tanggal_data BETWEEN '$dari' AND '$hingga' ORDER BY id_data ASC") or die ("Query salah : ".mysqli_error());
		while ($data = mysqli_fetch_array($query)) {
			$response[$num] = array(
				'tanggal'=>$data['tanggal_data'],
				'waktu'=>$data['waktu_data'],
				'ph'=>$data['ph'],
				'suhu'=>$data['suhu'],
				'tds'=>$data['tds'],
				'do'=>$data['do'],
				'nitrit'=>$data['nitrit'],
				'amonia'=>$data['amonia'],
				'status_ph'=>$data['status_ph'],
				'status_suhu'=>$data['status_suhu']
			);
			// echo $data['id_user']." - ".$data['nama_user']."<br>";
			$num += 1;
		}
		return $response;		
	}

	function ganti_password($conn, $username, $passwordbaru1){
		$query = mysqli_query($conn, "UPDATE tb_user SET password_user='$passwordbaru1' WHERE id_user = '$username'") or die ("Query salah : ".mysqli_error());
		return true;
	}

	function ganti_username($conn, $username, $nama_user){
		$query = mysqli_query($conn, "UPDATE tb_user SET nama_user='$nama_user' WHERE id_user = '$username'") or die ("Query salah : ".mysqli_error());
		return true;
	}

	function ganti_nama($conn, $username, $nama){
		$query = mysqli_query($conn, "UPDATE tb_user SET nama='$nama' WHERE id_user = '$username'") or die ("Query salah : ".mysqli_error());
		$_SESSION['ses_nama'] = $nama;
		return true;
	}

	function tanggal($tgl){
        $arraytgl = explode("-",$tgl);
        // print_r($arraytgl);
        $d = $arraytgl[2];
        $m = $arraytgl[1];
        $y = $arraytgl[0];

        switch ($m) {
            case '01':
                $m = 'Januari';
                break;
            case '02':
                $m = 'Februari';
                break;
            case '03':
                $m = 'Maret';
                break;
            case '04':
                $m = 'April';
                break;
            case '05':
                $m = 'Mei';
                break;
            case '06':
                $m = 'Juni';
                break;
            case '07':
                $m = 'Juli';
                break;
            case '08':
                $m = 'Agustus';
                break;
            case '09':
                $m = 'September';
                break;
            case '10':
                $m = 'Oktober';
                break;
            case '11':
                $m = 'November';
                break;
            case '12':
                $m = 'Desember';
                break;
        }
        return $d." ".$m." ".$y;
    }

?>