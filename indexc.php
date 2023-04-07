<?php
    
    $koneksi = mysqli_connect("localhost","root","","Tubes_MBD_Spliting_Table");
 
    // if($koneksi){
    //     echo "koneksi host berhasil.<br/>";
    // }else{
    //     echo "koneksi gagal.<br/>";
    // }

    $mulai = microtime(true);

    // for ($i=0; $i < 1000000; $i++) { 

    //     $R_nama = rand(0,4);
    //     $nama_arr = array(
    //         'Andri',
    //         'Justin',
    //         'Dzakir',
    //         'Fachri',
    //         'Ilham'
    //     );

    //     $nama = $nama_arr[$R_nama] . $i;
    //     $email = $nama_arr[$R_nama] . $i . '@gmail.com';
    //     $pass = password_hash($nama,PASSWORD_DEFAULT);

    //     $R_role = rand(0,2);
    //     $role_arr = array(
    //         'Admin',
    //         'Dosen',
    //         'Mahasiswa'
    //     );

    //     $role = $role_arr[$R_role];

    //     $cek = mysqli_query($koneksi,"INSERT INTO users VALUES(NULL,'$nama','$email','$pass','$role')")
    //     or die(mysqli_error($db));
    // }

    echo "Berhasil Tambah " . $i . " Data Dalam waktu: " . (microtime(true) - $mulai);
    
?>