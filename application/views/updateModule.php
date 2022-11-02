<form action="#" method="post" id="frmModificar">
    <div class="row">
        <div class="col-md-6">
            <label for="moduleId" class="form-label">Codigo del Modulo</label>
            <input type="text" class="form-control" name="id" id="id" value="<?= $moduleId ?>" disabled>
            <input type="hidden" class="form-control" name="moduleId" id="moduleId" value="<?= $moduleId ?>">

        </div>
        <div class="col-md-6">
            <label for="moduleName" class="form-label">Titulo del Modulo</label>
            <input type="text" class="form-control" name="moduleName" id="moduleName" value="<?= $moduleName ?>">
        </div>
        <div class="col-md-12 mt-4">
            <label for="moduleDescription" class="form-label">Descripcion del Modulo</label>
            <textarea class="form-control" name="moduleDescription" id="moduleDescription"><?= $moduleDescription ?></textarea>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-6 text-end">
            <button type="submit" class="btn btn-success"><?= lang("save") ?></button>
        </div>
        <div class="col-md-6">
            <button type="button"class="btn btn-danger"><?= lang("cancel") ?></button>
        </div>

    </div>
</form>

<script>
    $(document).ready(function() {
        $(".btn-danger").click(function() {
            location.reload(); 
        })

        var urlbase = "<?= base_url() ?>";
        $("#frmModificar").submit(function(event) {
            // Prevent the form from submitting
            event.preventDefault();


            //creo variable con la url del ajax
            var urlajax = urlbase + "Admin/updateModulo";
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
                    var cargando = '<div class="alert alert-info" role="alert"><strong><?= lang("load") ?></strong><div class="spinner-border ms-auto text-primary text-end ml-5" role="status" aria-hidden="true"></div></div>';
                    $("#modificar").html(cargando);
                },
                success: function(r) {
                    $("#modificar").html('<div class="alert alert-success" role="alert"><strong><?= lang("update") ?></strong></div>');
                    setTimeout("location.reload(true);", 3000);
                },
                error: function(r) {
                    $("#modificar").html('<div class="alert alert-danger" role="alert"><strong><?= lang("error") ?></strong></div>');
                    setTimeout("location.reload(true);", 3000);
                }
            })      
        
        });
        

    });
</script>