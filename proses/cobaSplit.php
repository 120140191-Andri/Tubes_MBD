<?php

    $koneksi = mysqli_connect("localhost","root","","Tubes_MBD");

    $cek = mysqli_query($koneksi,"SELECT DISTINCT fuelType FROM tb_mobil_all");

    $rows = array();
	while($row = mysqli_fetch_array($cek)){
		// mysqli_query($koneksi, "CREATE TABLE `tb_mobil_$row[0]` (
		// 	`id` int(11) NOT NULL PRIMARY KEY,
		// 	`model` varchar(22) NOT NULL,
		// 	`year` varchar(4) NOT NULL,
		// 	`price` varchar(6) NOT NULL,
		// 	`transmission` varchar(12) NOT NULL,
		// 	`mileage` varchar(7) NOT NULL,
		// 	`engineSize` varchar(6) NOT NULL
		//   ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;");

		mysqli_query($koneksi,"INSERT INTO tb_mobil_$row[0] (id,model,year,price,transmission,mileage,engineSize) SELECT id,model,year,price,transmission,mileage,engineSize FROM tb_mobil_all WHERE tb_mobil_all.fuelType = '$row[0]'");
	}

	echo "Ok";

?>