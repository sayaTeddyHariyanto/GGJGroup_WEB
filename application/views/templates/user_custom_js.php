<script>
// Fungsi menampilkan dan menyembunyikan password
$(document).ready(function() {
    $("#show").on('click', function(event) {
        event.preventDefault();
        if($('#password, #repassword').attr("type") == "text"){
            $('#password, #repassword').attr('type', 'password');
            $('#icon').addClass( "fa-eye-slash" );
            $('#icon').removeClass( "fa-eye" );
        }else if($('#password, #repassword').attr("type") == "password"){
            $('#password, #repassword').attr('type', 'text');
            $('#icon').removeClass( "fa-eye-slash" );
            $('#icon').addClass( "fa-eye" );
        }
    });

});

// Fungsi untuk menampilkan total bayar secara real time
function myTotalBayar(){
    $("#total_bayar").html($('#nominal_bayar').val());
}

// Fungsi menampilkan tooltip pada tombol
$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})

    var inputBox = document.getElementById("bukti"); // Mengambil elemen tempat Input gambar

    inputBox.addEventListener('change', function(input) { // Jika tempat Input Gambar berubah
        var box = document.getElementById("preview"); // mengambil elemen box
        var img = input.target.files; // mengambil gambar
        var reader = new FileReader(); // memanggil pembaca file/gambar
        reader.onload = function(e) { // ketika sudah ada
            box.setAttribute('src', e.target.result); // membuat alamat gambar
        }
        reader.readAsDataURL(img[0]); // menampilkan gambar
    });

    // Memunculkan nama file ketika upload file
    $('input[type="file"]').change(function(e) {
        var container = $(this).attr('id');
        var fileName = $('#' + container).val().replace('C:\\fakepath\\', "");
        $(this).next('.custom-file-label').html(fileName);
    });
</script>


