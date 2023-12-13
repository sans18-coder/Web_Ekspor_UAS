function tambahQty() {
	let quantity = document.getElementById("quantity");
	let currentValue = parseInt(quantity.value);
	quantity.value = currentValue + 1;
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
