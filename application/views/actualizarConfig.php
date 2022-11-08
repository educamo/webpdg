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
      <h1 class="h3 mb-2 text-gray-800"><?= lang('title-modify-config') ?></h1>

      <!-- DataTales Example -->
      <div class="card shadow mb-4">
          <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><?= lang('modify-config') ?></h6>
          </div>
          <div class="card-body">
              <div class="container-fluid">
                  <form action="#" method="post" id="frmModificar">
                      <div class="row">
                          <div class="col-md-6">
                              <input type="hidden" class="form-control" name="configId" id="configId" value="<?= $configId ?>">
                              <label for="configValue" class="form-label"><?= lang('configValue') ?></label>
                              <textarea class="form-control" name="configValue" id="configValue" required><?= $configValue ?></textarea>
                          </div>
                          <div class="col-md-6">
                              <label for="configDescription" class="form-label"><?= lang('configDescription') ?></label>
                              <input type="text" class="form-control" name="configDescription" id="configDescription" value="<?= $configDescription ?>" required>
                          </div>
                      </div>
                      <div class="row mt-4">
                          <div class="col-md-6 text-end">
                              <button type="submit" class="btn btn-success"><?= lang("save") ?></button>
                          </div>
                          <div class="col-md-6">
                              <button type="button" class="btn btn-danger"><?= lang("cancel") ?></button>
                          </div>

                      </div>
                  </form>
                  <div class="modificar" id="modificar"></div>
              </div>
          </div>

      </div>
  </div>

  <script>
      $(document).ready(function() {
          $(".btn-danger").click(function() {
              alertify.message('<?= lang('cancel-operation') ?>');
              location.href = urlbase + 'Admin/listconfig';
          })

          var urlbase = "<?= base_url() ?>";
          $("#frmModificar").submit(function(event) {
              // Prevent the form from submitting
              event.preventDefault();


              //creo variable con la url del ajax
              var urlajax = urlbase + "Admin/updateConfig";
              // Run $.ajax() here
              // Using the core $.ajax() method
              $.ajax({

                  // The URL for the request
                  url: urlajax,

                  // The data to send (will be converted to a query string)
                  data: $(this).serializeArray(),

                  // Whether this is a POST or GET request
                  method: "POST",

                  dataType: "json",


                  beforeSend: function(objeto) {
                      var cargando = '<div class="alert alert-info" role="alert"><strong><?= lang("process") ?></strong><div class="spinner-border ms-auto text-primary text-end ml-5" role="status" aria-hidden="true"></div></div>';
                      $("#modificar").html(cargando);
                  },
                  success: function(r) {
                      $("#modificar").html('<div class="alert alert-success" role="alert"><strong><?= lang("update") ?></strong></div>');
                      setTimeout("location.reload(true);", 4000);
                      location.href = urlbase + 'Admin/listconfig';
                  },
                  error: function(r) {
                      $("#modificar").html('<div class="alert alert-danger" role="alert"><strong><?= lang("error") ?></strong></div>');
                      setTimeout("location.reload(true);", 3000);
                  }
              })

          });


      });
  </script>