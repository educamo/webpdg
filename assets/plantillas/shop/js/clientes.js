$(document).ready(function() {
    $('#cancelarRcliente').click(function(e) {
        // Evita que el navegador se redireccione automáticamente
        e.preventDefault(e);
        location.href = url_base;
    });

    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()

    // Evita el evento submit default
    $("#frm-registroCliente").submit(function(event) {
        event.preventDefault();

        // Valida las contraseñas
        var passwd = $("#passwd").val();
        var confirmPasswd = $("#confirmPasswd").val();

        if (passwd !== confirmPasswd) {
            // Muestra un error de validación
            $('.needs-validation').removeClass('was-validated')
            $("#passwd").addClass("is-invalid");
            $("#confirmPasswd").addClass("is-invalid");
            $("#feedback-confirmPasswd").html("Las contraseñas no coinciden");
            $("#feedback-passwd").html("Las contraseñas no coinciden");

            return false;
        } else {
            $("#passwd").removeClass("is-invalid");
            $("#confirmPasswd").removeClass("is-invalid");

            var nombre = $('#nombre').val();
            var dni = $('#dni').val();
            var email = $('#email').val();

            var persona = {
                nombre: nombre,
                dni: dni,
                email: email,
                password: passwd
            };


            $.ajax({
                type: "POST",
                url: url_base + "cliente/register",
                data: {
                    "cliente": persona
                },
                success: function(data) {
                    if (data === true) {
                        Location.href = url_base;
                    }
                },
                error: function(data) {

                },
            });


        }
    });
});