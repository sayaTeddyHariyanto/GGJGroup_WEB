<script>
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
</script>

