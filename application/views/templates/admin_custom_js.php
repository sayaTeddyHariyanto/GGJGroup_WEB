<script>
  $('#dataTable').DataTable();

    
  var inputBox = document.getElementById("foto"); // Mengambil elemen tempat Input gambar

  inputBox.addEventListener('change', function(input) { // Jika tempat Input Gambar berubah

    var box = document.getElementById("prev_foto1"); // mengambil elemen box
    var img = input.target.files; // mengambil gambar

    var reader = new FileReader(); // memanggil pembaca file/gambar
    reader.onload = function(e) { // ketika sudah ada
      box.setAttribute('src', e.target.result); // membuat alamat gambar
    }
    reader.readAsDataURL(img[0]); // menampilkan gambar
  });

  // Fungsi menampilkan tooltip pada tombol
  $(function () {
      $('[data-toggle="tooltip"]').tooltip()
  });

</script>