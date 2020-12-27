<script>
  $('#dataTable').DataTable();

  CKEDITOR.replace('ckeditor', {
    extraPlugins: 'image2,codesnippet,uploadimage',

    inputBox.addEventListener('change', function(input) { // Jika tempat Input Gambar berubah

    var box = document.getElementById("prev_foto1"); // mengambil elemen box
    var img = input.target.files; // mengambil gambar

    var reader = new FileReader(); // memanggil pembaca file/gambar
    reader.onload = function(e) { // ketika sudah ada
      box.setAttribute('src', e.target.result); // membuat alamat gambar
    }
    reader.readAsDataURL(img[0]); // menampilkan gambar
  });
  }

  // Fungsi menampilkan tooltip pada tombol
  $(function() {
    $('[data-toggle="tooltip"]').tooltip()
  });

  $("#laporan_distribusi").change(function() {
    $(this).find("option:selected").each(function() {
      var optionValue = $(this).attr("value");
      if (optionValue) {
        $(".box_laporan").not("#" + optionValue).addClass('d-none');
        $("#" + optionValue).removeClass('d-none');
      } else {
        $(".box_laporan").addClass('d-none');
      }
    });
  }).change();

  $("#tahun").datepicker({
    format: "yyyy",
    startView: "years",
    minViewMode: "years"
  });
</script>