<!-- Footer -->
<footer class="sticky-footer bg-transparent">
    <div class="container my-auto">
        <div class="copyright text-center my-auto ">
            <span class="text-dark">Lokal Coffee &copy; Web Programming II Kelompok IV <?= date('Y'); ?></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->
</div>
<!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Yakin
                    mau keluar?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pilih "Logout" di bawah jika kamu yakin sudah selesai.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

                <a class="btn btn-primary" href="<?= base_url('autentifikasi/logout'); ?>">Logout</a>

            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('tambahQty').addEventListener('click', function() {
        tambahQty();
    });

    document.getElementById('kurangQty').addEventListener('click', function() {
        kurangQty();
    });

    function tambahQty() {
        let quantity = parseInt(document.getElementById("quantity"));
        let currentValue = parseInt(quantity.value);
        quantity.value = currentValue + 1;
        hitungTotal(); // Panggil fungsi hitungTotal setiap kali tombol tambah diklik
    }

    function kurangQty() {
        let quantity = parseInt(document.getElementById("quantity"));
        let currentValue = parseInt(quantity.value);
        if (currentValue > 500) {
            quantity.value = currentValue - 1;
            hitungTotal(); // Panggil fungsi hitungTotal setiap kali tombol kurang diklik
        }
    }

    function hitungTotal() {
        // Ambil nilai kuantitas dan harga per item
        let quantity = parseFloat(document.getElementsById("quantity").value);
        let harga = parseFloat(document.getElementsById("priceProduct").value);

        // Hitung jumlah total
        let total = quantity * harga;

        // Masukkan jumlah total ke dalam input total
        document.getElementById("total").value = total.toFixed(2); // Tampilkan total dengan 2 digit desimal
    }
</script>

<script src="<?php echo base_url(); ?>asset/bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('asset/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('asset/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="<?= base_url('asset/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="<?= base_url('asset/'); ?>js/sb-admin-2.min.js"></script>
<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
    $(document).ready(function() {
        $("#table-datatable").dataTable();
    });
    $('.alert-message').alert().delay(3500).slideUp('slow');
</script>
<!-- swiper js -->
<script src="<?php echo base_url(); ?>asset/js/swiper-bundle.min.js"></script>
<script src="<?php echo base_url(); ?>asset/js/script.js"></script>
<script>
    function tambahQty() {
        let quantity = document.getElementById("quantity");
        let currentValue = parseInt(quantity.value);
        quantity.value = currentValue + 1;
        console.log
        hitungTotal(); // Panggil fungsi hitungTotal setiap kali tombol tambah diklik
    }

    function kurangQty() {
        let quantity = document.getElementById("quantity");
        let currentValue = parseInt(quantity.value);
        if (currentValue > 500) {
            quantity.value = currentValue - 1;
            hitungTotal(); // Panggil fungsi hitungTotal setiap kali tombol kurang diklik
        }
    }

    function hitungTotal() {
        // Ambil nilai kuantitas dan harga per item
        let quantity = parseFloat(document.getElementById("quantity").value);
        let harga = parseFloat(document.getElementById("priceProduct").value);

        // Hitung jumlah total
        let total = quantity * harga;

        // Masukkan jumlah total ke dalam input total
        document.getElementById("total").value = total.toFixed(2); // Tampilkan total dengan 2 digit desimal
    }
</script>
</body>

</html>