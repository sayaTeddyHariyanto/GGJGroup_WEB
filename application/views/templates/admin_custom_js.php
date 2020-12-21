<script>
  $('#dataTable').DataTable();

  if (($("#foto").length > 0)) {
    var inputBox = document.getElementById("foto"); // Mengambil elemen tempat Input gambar

    $('#dataTable').DataTable();

    if (($("#foto").length > 0)) {
      var inputBox = document.getElementById("foto"); // Mengambil elemen tempat Input gambar

      var reader = new FileReader(); // memanggil pembaca file/gambar
      reader.onload = function(e) { // ketika sudah ada
        box.setAttribute('src', e.target.result); // membuat alamat gambar
      }
      reader.readAsDataURL(img[0]); // menampilkan gambar
    }
  }

  // Fungsi menampilkan tooltip pada tombol
  $(function() {
    $('[data-toggle="tooltip"]').tooltip()
  });
</script>