<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/dataTables.css">
    <script src="js/dataTables.js" charset="utf8" type="text/javascript"></script>
    <title>Tubes MBD</title>
</head>
<body>
    <br>
    <button id="cobaSplit" disabled>Split</button>
    &nbsp;&nbsp;&nbsp;
    <button id="semua">Semua Data</button>
    &nbsp;&nbsp;&nbsp;
    <button id="bensin">Data Mobil Bensin</button>
    &nbsp;&nbsp;&nbsp;
    <button id="diesel">Data Mobil Diesel</button>
    &nbsp;&nbsp;&nbsp;
    <button id="hybrid">Data Mobil Hybrid</button>
    &nbsp;&nbsp;&nbsp;
    <button id="elektric">Data Mobil Listrik</button>
    &nbsp;&nbsp;&nbsp;
    <div class="input-where" style="float: right;">
        <input type="text" id="wh" placeholder="Where Bahan Bakar">
        <button id="wh-btn" >Ambil Data</button>
    </div>
    <br>

    <div class="proses" style="display: none;">
        <br><hr><br>

        <span class="labelspro">Proses Spliting Table...</span>
        <br><br>
        waktu proses: <span class="waktu">0</span> detik
    </div>

    <br><hr><br>
    <table id="mobilTableall" class="display" width="100%" cellspacing="0" style="display: none;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Model</th>
                <th>Tahun</th>
                <th>Harga $</th>
                <th>Transmisi</th>
                <th>Milage</th>
                <th>Bahan Bakar</th>
                <th>Kapasitas Mesin</th>
            </tr>
        </thead>
    </table>

    <table id="mobilTablebensin" class="display" width="100%" cellspacing="0" style="display: none;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Model</th>
                <th>Tahun</th>
                <th>Harga $</th>
                <th>Transmisi</th>
                <th>Milage</th>
                <th>Kapasitas Mesin</th>
            </tr>
        </thead>
    </table>

    <table id="mobilTablediesel" class="display" width="100%" cellspacing="0" style="display: none;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Model</th>
                <th>Tahun</th>
                <th>Harga $</th>
                <th>Transmisi</th>
                <th>Milage</th>
                <th>Kapasitas Mesin</th>
            </tr>
        </thead>
    </table>

    <table id="mobilTablehybrid" class="display" width="100%" cellspacing="0" style="display: none;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Model</th>
                <th>Tahun</th>
                <th>Harga $</th>
                <th>Transmisi</th>
                <th>Milage</th>
                <th>Kapasitas Mesin</th>
            </tr>
        </thead>
    </table>

    <table id="mobilTableelektric" class="display" width="100%" cellspacing="0" style="display: none;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Model</th>
                <th>Tahun</th>
                <th>Harga $</th>
                <th>Transmisi</th>
                <th>Milage</th>
                <th>Kapasitas Mesin</th>
            </tr>
        </thead>
    </table>

    <table id="mobilTablewhr" class="display" width="100%" cellspacing="0" style="display: none;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Model</th>
                <th>Tahun</th>
                <th>Harga $</th>
                <th>Transmisi</th>
                <th>Milage</th>
                <th>Bahan Bakar</th>
                <th>Kapasitas Mesin</th>
            </tr>
        </thead>
    </table>

</body>
</html>

<script>
    $(function() {

        var dats;
        var startTime = 0;

        const hide_all = function(){

            $('#mobilTableall_wrapper').hide();
            $('#mobilTableall').hide();
            $('#mobilTablebensin_wrapper').hide();
            $('#mobilTablebensin').hide();
            $('#mobilTablediesel_wrapper').hide();
            $('#mobilTablediesel').hide();
            $('#mobilTablehybrid_wrapper').hide();
            $('#mobilTablehybrid').hide();
            $('#mobilTableelektric_wrapper').hide();
            $('#mobilTableelektric').hide();
            $('#mobilTablewhr_wrapper').hide();
            $('#mobilTablewhr').hide();

        }

        var startsemua;
        $("#semua").click(function() {
            $('#mobilTableall').dataTable({
                "processing": true,
                "retrieve": true,
                "destroy": true,
                "ajax": {
                    "url" : "proses/ambilDataSemua.php",
                    beforeSend: function() {
                        hide_all();
                        $('#mobilTableall_wrapper').show();
                        $('#mobilTableall').show();

                        $(".proses").show();
                        $('.labelspro').html('<span style="color: white; background-color: orange; padding: 10px; border-radius: 8px;"> Tabel <span> sebelum spliting ');
                        $('.waktu').html('0');

                        startsemua = new Date().getTime();
                        console.log("%c      ", 'color: white; font-size: larger');
                        console.log("%cMulai Baca Data (All)", 'color: blue; font-size: larger');
                        console.log("%cProses Baca Data...", 'color: orange; font-size: larger');
                    },
                    complete: function (data) {
                        dats = data['responseJSON'];
                        $('.waktu').html((new Date().getTime() - startsemua) / 1000);
                        console.log("%cWaktu Proses Baca Data Sebelum Di Tunning: " + (new Date().getTime() - startsemua) / 1000 + " Detik atau " + ((new Date().getTime() - startsemua) / 1000) / Object.keys(dats).length + " Detik/Data" , 'color: red; font-size: larger');
                    },   
                },
                "sAjaxDataProp": "",
                "columns": [
                    {data: 'id'},
                    {data: 'model'},
                    {data: 'year'},
                    {data: 'price'},
                    {data: 'transmission'},
                    {data: 'mileage'},
                    {data: 'fuelType'},
                    {data: 'engineSize'},
                ],
            });
        });

        var startwhr;
        $("#wh-btn").click(function() {
            $('#mobilTablewhr').dataTable({
                "processing": true,
                "retrieve": true,
                "destroy": true,
                "ajax": {
                    "url" : "proses/ambilDataWhr.php",
                    "type": "GET",
                    "data": {
                        "whr": $('#wh').val(),
                    },
                    beforeSend: function() {
                        hide_all();
                        $('#mobilTablewhr_wrapper').show();
                        $('#mobilTablewhr').show();

                        $(".proses").show();
                        $('.labelspro').html('<span style="color: white; background-color: orange; padding: 10px; border-radius: 8px;"> Tabel <span> sebelum spliting menggunakan Where fuelType=' + $('#wh').val());
                        $('.waktu').html('0');

                        startwhr = new Date().getTime();
                        console.log("%c      ", 'color: white; font-size: larger');
                        console.log("%cMulai Baca Data (whr)", 'color: blue; font-size: larger');
                        console.log("%cProses Baca Data...", 'color: orange; font-size: larger');
                    },
                    complete: function (data) {
                        dats = data['responseJSON'];
                        $('.waktu').html((new Date().getTime() - startwhr) / 1000);
                        console.log("%cWaktu Proses Baca Data Sebelum Di Tunning: " + (new Date().getTime() - startwhr) / 1000 + " Detik atau " + ((new Date().getTime() - startwhr) / 1000) / Object.keys(dats).length + " Detik/Data" , 'color: red; font-size: larger');
                    },   
                },
                "sAjaxDataProp": "",
                "columns": [
                    {data: 'id'},
                    {data: 'model'},
                    {data: 'year'},
                    {data: 'price'},
                    {data: 'transmission'},
                    {data: 'mileage'},
                    {data: 'fuelType'},
                    {data: 'engineSize'},
                ],
            });
        });

        var startbensin;
        $("#bensin").click(function() {
            $('#mobilTablebensin').dataTable({
                "processing": true,
                "retrieve": true,
                "destroy": true,
                "ajax": {
                    "url" : "proses/ambilDataBensin.php",
                    beforeSend: function() {
                        hide_all();
                        $('#mobilTablebensin_wrapper').show();
                        $('#mobilTablebensin').show();

                        $(".proses").show();
                        $('.labelspro').html('<span style="color: white; background-color: orange; padding: 10px; border-radius: 8px;"> Tabel <span> setelah spliting (klasifikasi mobil bensin)');
                        $('.waktu').html('0');

                        startbensin = new Date().getTime();
                        console.log("%c      ", 'color: white; font-size: larger');
                        console.log("%cMulai Baca Data (Bensin)", 'color: blue; font-size: larger');
                        console.log("%cProses Baca Data...", 'color: orange; font-size: larger');
                    },
                    complete: function (data) {
                        dats = data['responseJSON'];
                        $('.waktu').html((new Date().getTime() - startbensin) / 1000);
                        console.log("%cWaktu Proses Baca Data Setelah Di Tunning: " + (new Date().getTime() - startbensin) / 1000 + " Detik atau " + ((new Date().getTime() - startbensin) / 1000) / Object.keys(dats).length + " Detik/Data", 'color: red; font-size: larger');
                    },   
                },
                "sAjaxDataProp": "",
                "columns": [
                    {data: 'id'},
                    {data: 'model'},
                    {data: 'year'},
                    {data: 'price'},
                    {data: 'transmission'},
                    {data: 'mileage'},
                    {data: 'engineSize'},
                ],
            });
        });

        var startdiesel;
        $("#diesel").click(function() {
            $('#mobilTablediesel').dataTable({
                "processing": true,
                "retrieve": true,
                "destroy": true,
                "ajax": {
                    "url" : "proses/ambilDataDiesel.php",
                    beforeSend: function() {
                        hide_all();
                        $('#mobilTablediesel_wrapper').show();
                        $('#mobilTablediesel').show();

                        $(".proses").show();
                        $('.labelspro').html('<span style="color: white; background-color: orange; padding: 10px; border-radius: 8px;"> Tabel <span> setelah spliting (klasifikasi mobil diesel)');
                        $('.waktu').html('0');

                        startdiesel = new Date().getTime();
                        console.log("%c      ", 'color: white; font-size: larger');
                        console.log("%cMulai Baca Data (Diesel)", 'color: blue; font-size: larger');
                        console.log("%cProses Baca Data...", 'color: orange; font-size: larger');
                    },
                    complete: function (data) {
                        dats = data['responseJSON'];
                        $('.waktu').html((new Date().getTime() - startdiesel) / 1000);
                        console.log("%cWaktu Proses Baca Data Setelah Di Tunning: " + (new Date().getTime() - startdiesel) / 1000 + " Detik atau " + ((new Date().getTime() - startdiesel) / 1000) / Object.keys(dats).length + " Detik/Data", 'color: red; font-size: larger');
                    },   
                },
                "sAjaxDataProp": "",
                "columns": [
                    {data: 'id'},
                    {data: 'model'},
                    {data: 'year'},
                    {data: 'price'},
                    {data: 'transmission'},
                    {data: 'mileage'},
                    {data: 'engineSize'},
                ],
            });
        });

        var starthybrid;
        $("#hybrid").click(function() {
            $('#mobilTablehybrid').dataTable({
                "processing": true,
                "retrieve": true,
                "destroy": true,
                "ajax": {
                    "url" : "proses/ambilDataHybrid.php",
                    beforeSend: function() {
                        hide_all();
                        $('#mobilTablehybrid_wrapper').show();
                        $('#mobilTablehybrid').show();

                        $(".proses").show();
                        $('.labelspro').html('<span style="color: white; background-color: orange; padding: 10px; border-radius: 8px;"> Tabel <span> setelah spliting (klasifikasi mobil hybrid)');
                        $('.waktu').html('0');

                        starthybrid = new Date().getTime();
                        console.log("%c      ", 'color: white; font-size: larger');
                        console.log("%cMulai Baca Data (Hybrid)", 'color: blue; font-size: larger');
                        console.log("%cProses Baca Data...", 'color: orange; font-size: larger');
                    },
                    complete: function (data) {
                        dats = data['responseJSON'];
                        $('.waktu').html((new Date().getTime() - starthybrid) / 1000);
                        console.log("%cWaktu Proses Baca Data Setelah Di Tunning: " + (new Date().getTime() - starthybrid) / 1000 + " Detik atau " + ((new Date().getTime() - starthybrid) / 1000) / Object.keys(dats).length + " Detik/Data", 'color: red; font-size: larger');
                    },   
                },
                "sAjaxDataProp": "",
                "columns": [
                    {data: 'id'},
                    {data: 'model'},
                    {data: 'year'},
                    {data: 'price'},
                    {data: 'transmission'},
                    {data: 'mileage'},
                    {data: 'engineSize'},
                ],
            });
        });

        var startelektric;
        $("#elektric").click(function() {
            $('#mobilTableelektric').dataTable({
                "processing": true,
                "retrieve": true,
                "destroy": true,
                "ajax": {
                    "url" : "proses/ambilDataElectric.php",
                    beforeSend: function() {
                        hide_all();
                        $('#mobilTableelektric_wrapper').show();
                        $('#mobilTableelektric').show();

                        $(".proses").show();
                        $('.labelspro').html('<span style="color: white; background-color: orange; padding: 10px; border-radius: 8px;"> Tabel <span> setelah spliting (klasifikasi mobil elektric)');
                        $('.waktu').html('0');

                        startelektric = new Date().getTime();
                        console.log("%c      ", 'color: white; font-size: larger');
                        console.log("%cMulai Baca Data (Elektrik)", 'color: blue; font-size: larger');
                        console.log("%cProses Baca Data...", 'color: orange; font-size: larger');
                    },
                    complete: function (data) {
                        dats = data['responseJSON'];
                        $('.waktu').html((new Date().getTime() - startelektric) / 1000);
                        console.log("%cWaktu Proses Baca Data Setelah Di Tunning: " + (new Date().getTime() - startelektric) / 1000 + " Detik atau " + ((new Date().getTime() - startelektric) / 1000) / Object.keys(dats).length + " Detik/Data", 'color: red; font-size: larger');
                    },   
                },
                "sAjaxDataProp": "",
                "columns": [
                    {data: 'id'},
                    {data: 'model'},
                    {data: 'year'},
                    {data: 'price'},
                    {data: 'transmission'},
                    {data: 'mileage'},
                    {data: 'engineSize'},
                ],
            });
        });

        $("#cobaSplit").click(function() {

            $(".proses").show();
            $('.labelspro').html('<span style="color: white; background-color: orange; padding: 10px; border-radius: 8px;"> Proses <span> Spliting Table... ');
            console.log("%c      ", 'color: white; font-size: larger');
            console.log("%cMulai", 'color: blue; font-size: larger');

            var mulai;
            $.ajax({
                type: "POST",
                url: "proses/cobaSplit.php",
                beforeSend: function() {
                    mulai = new Date().getTime();
                    $('.waktu').html((new Date().getTime() - mulai) / 1000);
                    console.log("%cProses Spliting Table...", 'color: orange; font-size: larger');
                },
                success: function(data, status, xhr) {
                    
                    if(data == 'Ok'){
                        $('.labelspro').html('<span style="color: white; background-color: green; padding: 10px; border-radius: 8px;"> Sukses <span> Spliting Table ');
                        console.log("%cSukses Spliting Table, dalam waktu: " + (new Date().getTime() - mulai) / 1000 + " Detik", 'color: green; font-size: larger');
                    }else if(data == 'No') {
                        alert('Gagal!');
                    }else{
                        $('.labelspro').html('<span style="color: white; background-color: red; padding: 10px; border-radius: 8px;"> Gagal <span> Spliting Table... ');
                        console.log("%cGagal Spliting Table!", 'color: red; font-size: larger');
                        console.log(data);
                    }
                    $('.waktu').html((new Date().getTime() - mulai) / 1000);
                },
                error: function(xhr, status, error) {
                    $('.labelspro').html('<span style="color: white; background-color: red; padding: 10px; border-radius: 8px;"> Gagal <span> Spliting Table... ');
                    $('.waktu').html((new Date().getTime() - mulai) / 1000);
                    console.log(error);
                    alert(error);
                }
            });

        });

        // const kirim = function(){

        //     var diproses = 0;
        //     $('.labelDiproses').html(diproses);
        //     $('.labelTotal').html(Object.keys(dats).length);

        //     console.log("%c      ", 'color: white; font-size: larger');
        //     console.log("%cMulai", 'color: blue; font-size: larger');
        //     console.log("%cProses Spliting Table...", 'color: orange; font-size: larger');

        //     var mulai = new Date().getTime();
        //     $.each(dats, async function(dat) {
        //         await $.ajax({
        //                 type: "POST",
        //                 url: "proses/cobaSplit.php",
        //                 data: dats[dat],
        //                 beforeSend: function() {
        //                     $('.waktu').html((new Date().getTime() - mulai) / 1000);
        //                 },
        //                 success: function(data, status, xhr) {
                            
        //                     if(data == 'Ok'){
        //                         diproses += 1;
        //                         $('.labelDiproses').html(diproses);
        //                     }else if(data == 'No') {
        //                         alert('Gagal!');
        //                     }else{
        //                         console.log(data);
        //                     }

        //                     $('.waktu').html((new Date().getTime() - mulai) / 1000);
        //                 },
        //                 error: function(xhr, status, error) {
        //                     $('.waktu').html((new Date().getTime() - mulai) / 1000);
        //                     console.log(error);
        //                     alert(error);
        //                 }
        //             });
        //     });

        //     console.log("%cWaktu Proses Spliting Table: " + (new Date().getTime() - startTime) / 1000 + " Detik", 'color: blue; font-size: larger');

        // }

        // $( "#split" ).click( async function() {

        //     $(".proses").show();
        //     $('.labelspro').html('Proses Spliting Table...');
        //     $('.labelTotal').html(Object.keys(dats).length);
            
        //     await kirim();
        //     await $('.labelspro').html('Sukses Spliting Table');

        // });
    });
</script>