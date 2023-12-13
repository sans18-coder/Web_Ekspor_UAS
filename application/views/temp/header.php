<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Local Coffee | <?= $judul; ?></title>
    <!-- Custom fonts for this template-->
    <!-- Custom styles for this template-->
    <link href="<?= base_url('asset/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url('asset/'); ?>vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="<?= base_url('asset/'); ?>vendor/datatables/jquery.dataTables.js"></script>
    <script type="text/javascript" src="<?= base_url('asset/'); ?>vendor/datatables/datatables.bootstrap4.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/'); ?>bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <link href="<?= base_url('asset/'); ?>css/sb-admin-2.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('asset/'); ?>css/swiper-bundle.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/'); ?>css/style.css">
    <script>
        function hitungTotal() {
            // Ambil nilai kuantitas dan harga per item
            let quantity = parseFloat(document.getElementById("quantity").value);
            let harga = parseFloat(document.getElementById("priceProduct").value);

            // Hitung jumlah total
            let total = quantity * harga;

            // Masukkan jumlah total ke dalam input total
            document.getElementById("total").value = total.toFixed(2); // Tampilkan total dengan 2 digit desimal
        };

        function tambahQty() {
            let quantity = document.getElementById("quantity");
            let currentValue = parseInt(quantity.value);
            quantity.value = currentValue + 1;
            console.log()
            hitungTotal(); // Panggil fungsi hitungTotal setiap kali tombol tambah diklik
        };

        function kurangQty() {
            let quantity = document.getElementById("quantity");
            let currentValue = parseInt(quantity.value);
            if (currentValue > 500) {
                quantity.value = currentValue - 1;
                hitungTotal(); // Panggil fungsi hitungTotal setiap kali tombol kurang diklik
            }
        };
    </script>

</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper" class="col-12">