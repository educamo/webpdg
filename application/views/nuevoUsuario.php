 <!-- Begin Page Content -->
 <div class="container-fluid">

      <?Php
          if ($this->session->flashdata('status')) :
          ?>

           <div class="alert alert-success">
                <?= $this->session->flashdata('status'); ?>


           </div>

      <?Php

               header('Refresh: 2');
          endif;
          ?>

      <!-- Page Heading -->
      <h1 class="h3 mb-2 text-gray-800"><?= lang('title-nuevoUsuario') ?></h1>


      <div class="card shadow mb-4">
           <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><?= lang('addUser') ?></h6>
           </div>
           <div class="card-body">  
                <form action="#" method="post" id="frmNewuser">
                    <div class="row">
                        <div class="col-md-4 mb-2">
                            <label for="userId" class="form-label"><?= lang('userId') ?></label>
                            <input type="text" id="userId" name="userId" class="form-control" placeholder="<?= lang('userId-placeholder') ?>" required autofocus>
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="userName" class="form-label"><?= lang('userName') ?></label>
                            <input type="text" id="userName" name="userName" class="form-control" required>
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="password" class="form-label"><?= lang('password') ?></label>
                            <input type="password" id="password" name="password" class="form-control" required>
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="confirmarPass" class="form-label"><?= lang('confirmarPass') ?></label>
                            <input type="password" id="confirmarPass" name="confirmarPass" class="form-control" required>
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="mail" class="form-label"><?= lang('mailUser') ?></label>
                            <input type="email" id="mail" name="mail" class="form-control" required>
                        </div>
                        <div class="col-md-4 mb-2">
                        <label for="rolId" class="form-label"><?= lang('rolUser') ?></label>
                        <select name="rolId" id="rolId" class="form-select">
                            <?Php
                                    foreach ($rols as $rol) {
                                        $rolId = $rol->rolId;
                                        
                                ?>
                                <option value="<?= $rolId ?>"><?= $rol->rolName ?></option>
                                
                                <?Php
                                    }
                                ?>
                        </select>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-6 text-end">
                            <button type="submit" class="btn btn-success"><?= lang("save") ?></button>
                        </div>
                        <div class="col-md-6">
                            <button type="reset"class="btn btn-danger"><?= lang("cancel") ?></button>
                        </div>
                    </div>
                </form>
                <div class="row mb-5 mt-3" id="mensaje" name="mensaje"></div>
           </div>
      </div>

 </div>
 <!-- /.container-fluid -->

 </div>
 <!-- End of Main Content -->
 <script>
      $(document).ready(function() {
        var urlbase = "<?= base_url() ?>";
       
        $("#frmNewuser").submit(function(event) {
            // Prevent the form from submitting
            event.preventDefault();

            var pass = $("#password").val();
            var confirmar = $("#confirmarPass").val();

            if (pass !== confirmar) {
                $("#mensaje").html('<div class="alert alert-info" role="alert"><strong><?= lang("confirmarPass-msj") ?></strong></div>')
                $("#password").focus();
                $(this).finish();
            } else {
                    //creo variable con la url del ajax
                var urlajax = urlbase + "Admin/guardarUsuario";
                // Run $.ajax() here
                // Using the core $.ajax() method
                $.ajax({

                    // The URL for the request
                    url: urlajax,

                    // The data to send (will be converted to a query string)
                    data: $("#frmNewuser").serializeArray(),

                    // Whether this is a POST or GET request
                    type: "POST",


                    beforeSend: function(objeto) {
                        $("#mensaje").html(" ");
                        $(".btn-success").attr('disabled', 'disabled');
                        var cargando = '<div class="alert alert-info" role="alert"><strong><?= lang("load") ?></strong><div class="spinner-border ms-auto text-primary text-end ml-5" role="status" aria-hidden="true"></div></div>';
                        $("#mensaje").html(cargando);
                    },
                    success: function(r) {
                        $("#mensaje").html('<div class="alert alert-success" role="alert"><strong><?= lang("new") ?></strong></div>');
                        setTimeout("location.reload(true);", 3000);
                    },
                    error: function(r) {
                        $("#mensaje").html('<div class="alert alert-danger" role="alert"><strong><?= lang("errorSave") ?></strong></div>');
                        setTimeout("location.reload(true);", 3000);
                    }
                })      
            }
        });
        
      });
 </script>