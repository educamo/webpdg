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
        var passwd = $("#password").val();
        var confirmPasswd = $("#confirmPasswd").val();

        if (passwd !== confirmPasswd) {
            // Muestra un error de validación
            $('.needs-validation').removeClass('was-validated')
            $("#password").addClass("is-invalid");
            $("#confirmPasswd").addClass("is-invalid");
            $("#feedback-confirmPasswd").html("Las contraseñas no coinciden");
            $("#feedback-password").html("Las contraseñas no coinciden");

            return false;
        } else {
            $("#password").removeClass("is-invalid");
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
                        alertify.success('Los datos se Guardaron exitosamente');
                        Location.href = url_base;
                    }
                },
                error: function(data) {
                    alertify.error('Ocurrió un error al Guardar los datos');

                },
            });


        }
    });

    // ########################################### cuenta del cliente #######################################

    // funciones para que cuando se modifiquen o presionen una tecla en los campos se habiliten los botones
    $('#nombre').on('keyup', function(event) {
        $('#submitDatos').prop("disabled", false);
        $('#submitDatos').removeClass('btn-disabled');
        $('#submitDatos').addClass('btn-success');
        $('#cancelarUcliente').prop("disabled", false);
        $('#cancelarUcliente').removeClass('btn-disabled');
        $('#cancelarUcliente').addClass('btn-danger');
    });
    $('#email').on('keyup', function(event) {
        $('#submitDatos').prop("disabled", false);
        $('#submitDatos').removeClass('btn-disabled');
        $('#submitDatos').addClass('btn-success');
        $('#cancelarUcliente').prop("disabled", false);
        $('#cancelarUcliente').removeClass('btn-disabled');
        $('#cancelarUcliente').addClass('btn-danger');
    });


    // codigo para cancelar la actualizacion de datos CLiente
    $('#cancelarUcliente').click(function(e) {
        // Evita que el navegador se redireccione automáticamente
        e.preventDefault(e);

        location.href = url_base + "/cliente/perfil/" + cliente;
    });


    // habilita los campos para editarlos luego de de que se carga el documento
    $('#nombre').prop("disabled", false);
    $('#email').prop("disabled", false);


    // ########## Capturamos el evento submit del formulario updateCliente #################
    $('#frm-updateCliente').on('submit', function(event) {
        // Evitamos que el formulario se envíe por defecto
        event.preventDefault();

        // Obtenemos los datos del formulario
        var datos = $(this).serialize();

        // Hacemos la petición Ajax
        $.ajax({
            type: 'POST',
            url: url_base + "cliente/updateDatos",
            data: datos,
            success: function(respuesta) {

                $('#submitDatos').prop("disabled", true);
                $('#submitDatos').removeClass('btn-success');
                $('#submitDatos').addClass('btn-disabled');
                $('#cancelarUcliente').prop("disabled", true);
                $('#cancelarUcliente').removeClass('btn-danger');
                $('#cancelarUcliente').addClass('btn-disabled');

                // mensaje de éxito
                alertify.success(respuesta);

            },
            error: function(respuesta) {
                // Mensaje de error
                alertify.error(respuesta);
            }
        });
    });


    // ############################# updatePassword ##################################
    $('#password').on('keyup', function(event) {
        $('#submitPassword').prop("disabled", false);
        $('#submitPassword').removeClass('btn-disabled');
        $('#submitPassword').addClass('btn-success');
        $('#cancelarUpasswrod').prop("disabled", false);
        $('#cancelarUpasswrod').removeClass('btn-disabled');
        $('#cancelarUpasswrod').addClass('btn-danger');
    });
    $('#confirmPasswd').on('keyup', function(event) {
        $('#submitPassword').prop("disabled", false);
        $('#submitPassword').removeClass('btn-disabled');
        $('#submitPassword').addClass('btn-success');
        $('#cancelarUpasswrod').prop("disabled", false);
        $('#cancelarUpasswrod').removeClass('btn-disabled');
        $('#cancelarUpasswrod').addClass('btn-danger');
    });
    // codigo para cancelar la actualizacion de clave CLiente
    $('#cancelarUpasswrod').click(function(e) {
        // Evita que el navegador se redireccione automáticamente
        e.preventDefault(e);

        location.href = url_base + "/cliente/perfil/" + cliente;
    });

    $('#frm-updatePassword').on('submit', function(event) {
        // Evitamos que el formulario se envíe por defecto
        event.preventDefault();

        // Valida las contraseñas
        var passwd = $("#password").val();
        var confirmPasswd = $("#confirmPasswd").val();

        if (passwd !== confirmPasswd) {
            // Muestra un error de validación
            $('.needs-validation').removeClass('was-validated')
            $("#password").addClass("is-invalid");
            $("#confirmPasswd").addClass("is-invalid");
            $("#feedback-confirmPasswd").html("Las contraseñas no coinciden");
            $("#feedback-password").html("Las contraseñas no coinciden");

            return false;
        } else {
            $("#password").removeClass("is-invalid");
            $("#confirmPasswd").removeClass("is-invalid");
            // Obtenemos los datos del formulario
            var datos = $(this).serialize();

        };



        // Hacemos la petición Ajax
        $.ajax({
            type: 'POST',
            url: url_base + "cliente/updatePassword",
            data: datos,
            success: function(respuesta) {

                $('#submitPassword').prop("disabled", true);
                $('#submitPassword').removeClass('btn-success');
                $('#submitPassword').addClass('btn-disabled');
                $('#cancelarUpasswrod').prop("disabled", true);
                $('#cancelarUpasswrod').removeClass('btn-danger');
                $('#cancelarUpasswrod').addClass('btn-disabled');

                // mensaje de éxito
                alertify.success(respuesta);

            },
            error: function(respuesta) {
                // Mensaje de error
                alertify.error(respuesta);
            }
        });
    });

    // código para mostrar u ocultar el valor del campo password en el form registrar cliente
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');


    if (togglePassword !== null) {
        togglePassword.addEventListener('click', function(e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
        });
    }




    // ################################# facturas ############################################

    // inicio datatable facturas
    // new DataTable('#facturas');
    let table = new DataTable('#facturas');


    // modal pago facturas
    var pagar = $('.pagar');
    pagar.click(function() {
        var factura = $(this).data('id');
        var monto = $(this).data('total');
        $('#id_factura').val(factura);
        $('#totalFactura').val(monto);
    });

    // Al cambiar el valor del select, mostrar el input
    $(document).on('change', '#tipo_pago', function() {
        // Obtener el valor del select
        const tipo_pago = $(this).val();

        // Si el tipo de pago es efectivo, mostrar el input
        if (tipo_pago === '1') {
            $('#referencia-group').hide();
        } else {
            $('#referencia-group').show();
        }
    });

    $('#frm-registrarPago').on('submit', function(e) {
        e.preventDefault();

        // Obtenemos los datos del formulario
        var datos = $(this).serialize();

        // Hacemos la petición Ajax
        $.ajax({
            type: 'POST',
            url: url_base + "cliente/registrarPago",
            data: datos,
            success: function(r) {

                // mensaje de éxito
                alertify.success(r);
                location.href = url_base + "/cliente/facturas/" + cliente;

            },
            error: function(r) {
                // Mensaje de error
                alertify.error(r);
            }
        });

    });

    // fin del document ready
});