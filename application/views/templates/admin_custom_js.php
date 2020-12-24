<script>
  $('#dataTable').DataTable();

  CKEDITOR.replace('ckeditor', {
    extraPlugins: 'image2,codesnippet,uploadimage',

    codeSnippet_theme: 'monokai_sublime',
    height: 300,
    enterMode: CKEDITOR.ENTER_BR,
    filebrowserImageUploadUrl: '<?= base_url(); ?>admin/berita/upload_ck/?type=image'
  });

  // if (($("#foto").length > 0)) {
  //   var inputBox = document.getElementById("foto"); // Mengambil elemen tempat Input gambar

  //   $('#dataTable').DataTable();

  //   if (($("#foto").length > 0)) {
  //     var inputBox = document.getElementById("foto"); // Mengambil elemen tempat Input gambar

  //     var reader = new FileReader(); // memanggil pembaca file/gambar
  //     reader.onload = function(e) { // ketika sudah ada
  //       box.setAttribute('src', e.target.result); // membuat alamat gambar
  //     }
  //     reader.readAsDataURL(img[0]); // menampilkan gambar
  //   }
  // }

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