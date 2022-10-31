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
      <h1 class="h3 mb-2 text-gray-800"><?= lang('title-listModulos') ?></h1>

      <!-- DataTales Example -->
      <div class="card shadow mb-4">
           <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><?= lang('searchModule') ?></h6>
           </div>
           <div class="card-body">  
                <form action="#" method="post" id="frmSearch">
                    <div class="row">
                    <div class="col-md-8">
                        <select name="modulos" id="modulos">
                            <option value="0"><?= lang('option') ?></option>

                                <?Php
                                    foreach ($modulos as $modulo) {
                                        $moduleId = $modulo->moduleId;
                                        
                                ?>
                                <option value="<?= $moduleId ?>"><?= $modulo->moduleName ?></option>
                                
                                <?Php
                                    }
                                ?>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary"><?= lang('search') ?> <i class="fa fa-search"></i> </button>
                    </div>
                    </div>
                </form>
                <div class="row mt-4" id="modificar"></div>
           </div>
      </div>

 </div>
 <!-- /.container-fluid -->

 </div>
 <!-- End of Main Content -->

 <script>
    $(document).ready(function() {
        var urlbase = "<?= base_url() ?>";
        $("#frmSearch").submit(function(event) {
            // Prevent the form from submitting
            event.preventDefault();


            //creo variable con la url del ajax
            var urlajax = urlbase + "Admin/consultarModulo";
            // Run $.ajax() here
            // Using the core $.ajax() method
            $.ajax({

                // The URL for the request
                url: urlajax,

                // The data to send (will be converted to a query string)
                data: $(this).serializeArray(),

                // Whether this is a POST or GET request
                type: "POST",


                beforeSend: function(objeto) {
                    $("#modulos").attr('disabled', 'disabled');
                    $(".btn-primary").attr('disabled', 'disabled');
                    var cargando = '<div class="alert alert-info" role="alert"><strong><?= lang("load") ?></strong><div class="spinner-border ms-auto text-primary text-end ml-5" role="status" aria-hidden="true"></div></div>';
                    $("#modificar").html(cargando);
                },
                success: function(data) {
                    if (data == 0) {
                        var select = '<div class="alert alert-primary" role="alert"><strong><?= lang("select") ?></strong></div>';
                        $("#modulos").removeAttr('disabled');
                        $(".btn-primary").removeAttr('disabled');
                        $('#modificar').html(select);

                    } else {
                        $("#modificar").html(data);
                    }
                }
            })      
        
        });
    });
 </script>