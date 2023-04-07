<?php
    
    // $koneksi = mysqli_connect("localhost","root","","Tubes_MBD_Spliting_Table");

    // $mulai = microtime(true);

    // $cek = mysqli_query($koneksi,"SELECT * FROM users");

    // $jum_dosen = 0;
    // $jum_admin = 0;
    // $jum_mhs = 0;
    // $jum_total = 0;

    // while ($r = mysqli_fetch_array($cek)) {

    //     $id = $r['id'];
    //     $nama = $r['nama'];
    //     $email = $r['email'];
    //     $pass = $r['password'];

    //     if($r['role'] == 'Admin'){
    //         mysqli_query($koneksi,"INSERT INTO user_admin VALUES('$id','$nama','$email','$pass')");
    //         $jum_admin += 1;
    //     }elseif($r['role'] == 'Mahasiswa'){
    //         mysqli_query($koneksi,"INSERT INTO user_mahasiswa VALUES('$id','$nama','$email','$pass')");
    //         $jum_mhs += 1;
    //     }elseif($r['role'] == 'Dosen'){
    //         mysqli_query($koneksi,"INSERT INTO user_dosen VALUES('$id','$nama','$email','$pass')");
    //         $jum_dosen += 1;
    //     }

    //     $jum_total += 1;

    // }

    // echo "Berhasil Spliting Table Data Dalam waktu: " . (microtime(true) - $mulai);
    // echo "<br>";
    // echo "Total Data: " . $jum_total;
    // echo "jumlah Dosen: " . $jum_dosen;
    // echo "jumlah Mahasiswa: " . $jum_mhs;
    // echo "jumlah Admin: " . $jum_admin;
    
?>