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

   <!-- DataTales Example -->
   <div class="card shadow mb-4">
     <div class="card-header py-3">
       <h6 class="m-0 font-weight-bold text-primary"><?= lang('list-user') ?></h6>
     </div>
     <div class="card-body">
       <div class="container-fluid">
         <div class="table-responsive">
           <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
             <thead>
               <tr>
                 <th><?= lang('userId') ?></th>
                 <th><?= lang('userName') ?></th>
                 <th><?= lang('mailUser') ?></th>
                 <th><?= lang('rolName') ?></th>
                 <th><?= lang('activo') ?></th>
                 <th><?= lang('action') ?></th>
               </tr>
             </thead>

             <tbody>
               <?Php
                foreach ($users as $user) {

                  if ($user->activo == 1) {
                    $activo = 'Si';
                  } else {
                    $activo = 'No';
                  }
                ?>
                 <tr>
                   <td><?= $user->userId ?></td>
                   <td><?= $user->userName ?></td>
                   <td><?= $user->mail ?></td>
                   <td><?= $user->rolName ?></td>
                   <td><?= $activo ?></td>
                   <td class="text-center">
                     <a href="<?= base_url() ?>Admin/actualizaruser/<?= $user->userId ?>" class="btn btn-warning text-ligth"> <i class="fa fa-edit"></i></a>
                     <button type="button" class="btn btn-danger text-light delete" name="delete" data-id="<?= $user->userId ?>"><i class="fa fa-trash"></i></button>
                   </td>
                 </tr>
               <?Php
                }
                ?>
             </tbody>
           </table>
         </div>
       </div>

     </div>
   </div>

 </div>
 <!-- /.container-fluid -->

 </div>
 <!-- End of Main Content -->

 <script>
   $(document).ready(function() {
     var urlbase = "<?= base_url() ?>";


     var session = "<?= $session ?>";

     /**
      * funtion en jquery para borrar registros
      * Descripción: esta función usa un mensaje de confirmación con la librería alertifyjs
      * si se confirma (ok) procede a eliminar el registro seleccionado por el id para borrar
      * si se cancela (cancel) solo informa que la operación fue cancelada mediante un mensaje
      * @author: Cesar Carrasco
      * @date: 04/11/2022
      *
      */
     $('.delete').click(function(e) {
       //se evita el evento default del botón
       e.preventDefault();

       //se asigna el valor del atributo data-id del botón eliminar a la variable id
       var id = $(this).attr('data-id');

       // se establecen las opciones de la ventana de confirmación con alertifyjs
       alertify.defaults.transition = "fade";
       alertify.defaults.theme.ok = "btn btn-primary";
       alertify.defaults.theme.cancel = "btn btn-secondary";
       alertify.defaults.theme.input = "form-control"; //esto si existe algún input en el mensaje de confirmación, en este caso no existe
       alertify.defaults.glossary.title = "<?= lang('confirm') ?>";
       alertify.defaults.glossary.ok = '<?= lang('yes') ?>';
       alertify.defaults.glossary.cancel = '<?= lang('no') ?>';
       //aquí se genera el dialogo de confirmación con alertifyjs
       alertify.confirm('<?= lang('confirm-message') ?>',
         function() {

           if (id === session) {
             alertify.warning('<?= lang('cancel-deleteUser') ?>');

           } else {
             //creo variable con la url del ajax
             var urlajax = urlbase + "Admin/borrarUsuario";
             // Run $.ajax() here
             // Using the core $.ajax() method
             $.ajax({

               // The URL for the request
               url: urlajax,

               // The data to send (will be converted to a query string)
               data: {
                 userId: id
               },

               // Whether this is a POST or GET request
               method: "POST",

               dataType: "json",

               success: function(r) {
                 alertify.success('<?= lang('delete') ?>');
                 setTimeout("location.reload(true);", 4000);
               },
               error: function(r) {
                 alertify.error('<?= lang('error-del') ?>');
                 setTimeout("location.reload(true);", 3000);
               }
             })
           }
         },
         function() {
           alertify.message('<?= lang('cancel-operation') ?>');
         }).setting('modal', true);
     });

   });
 </script>