<script>
  $('#dataTable').DataTable();

  if (($("#ckeditor").length > 0)) {
    CKEDITOR.replace('ckeditor', {
      extraPlugins: 'image2,codesnippet,uploadimage',

      codeSnippet_theme: 'monokai_sublime',
      height: 300,
      enterMode: CKEDITOR.ENTER_BR,
      filebrowserImageUploadUrl: '<?= base_url(); ?>admin/berita/upload_ck/?type=image'
    });
  }

  if (($("#foto").length > 0)) {
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

  $(document).ready(function(){

    function load_saran(view = '')
    {
      $.ajax({
        url:"<?=base_url()?>" + 'admin/guide/fetch_message',
        method:"POST",
        data:{view:view},
        dataType:"json",
        success:function(data)
        {
          console.log(data);
          $('.saran-message').html(data.saran);
          if (data.unseen_saran > 0) {
            $('.saran-counter').html(data.unseen_saran);
          }
        }
      });
    }

    function load_notification(view = '')
    {
      $.ajax({
        url:"<?=base_url()?>" + 'admin/guide/fetch_notif',
        method:"POST",
        data:{view:view},
        dataType:"json",
        success:function(data)
        {
          $('.notif-admin').html(data.notification);
          if (data.unseen_notification > 0) {
            $('.notif-counter').html(data.unseen_notification);
          }
        }
      });
    }

    load_saran();
    load_notification();

    setInterval(function() {
      load_saran();
      load_notification();
    }, 5000);

  });
</script>