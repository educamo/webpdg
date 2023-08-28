<?Php

/**
 * Variables a usar dentro de la plantilla
 */
// ------- configuraciones ---------
$map            = $mapa->configValue;
$altLogo        = $logo->configName;
$logo           = $logo->configValue;
$title          = $title->configValue;
$dominio        = $domain->configValue;
$company        = $company->configValue;
$creador        = $author->configValue;
$keyWords       = $keyWords->configValue;
$description    = $description->configValue;
$contactMail    = $contactMail->configValue;

// -------- módulos --------
$titleProjects  = NULL;
$descriptionProjects = NULL;

$titleServices  = NULL;
$descriptionServices = NULL;

$titleUs        = NULL;
$descriptionUs = NULL;

$titleContact   = NULL;
$descriptionContact = NULL;

foreach ($modules as $module) {
    $i = $module['moduleId'];
    switch ($i) {

        case 'featured':
            $titleProjects       = $module['moduleName'];
            $descriptionProjects = $module['moduleDescription'];
            break;

        case 'projects':
            $titleServices       = $module['moduleName'];
            $descriptionServices = $module['moduleDescription'];
            break;

        case 'video':
            $titleUs       = $module['moduleName'];
            $descriptionUs = $module['moduleDescription'];
            break;

        case 'contact':
            $titleContact       = $module['moduleName'];
            $descriptionContact = $module['moduleDescription'];
            break;
    }
}

// -------- contenido de cada modulo -------

?>
<!DOCTYPE html>
<html lang="<?= lang('lang') ?>">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="author" content="<?= $creador ?>">
    <title> <?= $title ?> </title>
    <meta name="title" content="<?= $title ?>">

    <meta name="url" content="<?= $dominio ?>" />
    <meta name="copyright" content="<?= $company ?>" />

    <meta name="contact" content="<?= $contactMail ?>" />

    <link rel="shortcut icon" href="<?= base_url() ?>assets/img/favicon.png" />
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <!-- <base href="<?= $dominio ?>" /> -->


    <meta name="generator" content="VS Code 1.71.0" />
    <link rel="shortlink" href="<?= $dominio ?>" />

    <meta name="description" content="<?= $description ?>">

    <meta name="Keywords" content="<?= $keyWords ?>" />

    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/fontAwesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/light-box.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/owl-carousel.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/templatemo-style.css">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <!-- CSS only -->
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/dist/css/bootstrap.css') ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js" integrity="sha256-xNjb53/rY+WmG+4L6tTl9m6PpqknWZvRt0rO1SRnJzw=" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src=" https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">



    <!-- Alertify -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/alertifyjs/css/alertify.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/alertifyjs/css//themes/bootstrap.css">

    <!-- Bootstrap 5.2.1 --->
    <link rel="stylesheet" href="<?= base_url() ?>assets/bootstrap/dist/css/bootstrap.css">


    <link href="<?= base_url() ?>assets/css/estilos.css" rel="stylesheet">

    <!-- css custom -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/estilos.css">

</head>

<body>

    <!-- cabecera -->
    <header class="nav-down responsive-nav hidden-lg hidden-md">
        <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav">
            <span class="sr-only"> <?= lang('navigation') ?></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <div id="main-nav" class="collapse navbar-collapse">
            <nav>
                <ul class="nav navbar-nav">
                    <li><a href="#top"> <?= lang('home') ?></a></li>
                    <?Php
                    if ($titleProjects) {
                    ?>
                        <li><a href="#featured"> <?= lang('proyectos') . ' ' . lang('recientes')  ?> </a></li>
                    <?Php
                    }
                    ?>

                    <?Php
                    if ($titleServices) {
                    ?>
                        <li><a href="#projects"> <?= lang('Servicios') . ' ' . lang('ofrecidos') ?> </a></li>
                    <?Php
                    }
                    ?>

                    <?Php
                    if ($titleUs) {
                    ?>
                        <li><a href="#video"> <?= lang('aboutUs') ?> </a></li>
                    <?Php
                    }
                    ?>

                    <li><a href="#blog" style="display: none;"> <?= lang('blog') ?> </a></li>

                    <?Php
                    if ($titleContact) {
                    ?>
                        <li><a href="#contact"> <?= lang('contact') ?> </a></li>
                    <?Php
                    }
                    ?>
                </ul>
            </nav>
        </div>
    </header>
    <!-- cierre cabecera -->

    <!-- barra lateral con menu -->
    <div class="sidebar-navigation hidde-sm hidden-xs">
        <div class="logo">
            <a href="<?= base_url() ?>"><img src="<?= base_url('assets/img/' . $logo) ?>" class="img-responsive" alt="<?= $altLogo ?>"></a>
        </div>
        <nav>
            <ul>
                <li>
                    <a href="#top">
                        <span class="rect"></span>
                        <span class="circle"></span>
                        <?= lang('home') ?>
                    </a>
                </li>
                <?Php
                if ($titleProjects) {
                ?>
                    <li>
                        <a href="#featured">
                            <span class="rect"></span>
                            <span class="circle"></span>
                            <?= lang('proyectos') . ' ' . lang('recientes') ?>
                        </a>
                    </li>
                <?Php
                }
                ?>

                <?Php
                if ($titleServices) {
                ?>
                    <li>
                        <a href="#projects">
                            <span class="rect"></span>
                            <span class="circle"></span>
                            <?= lang('Servicios') . ' ' . lang('ofrecidos') ?>
                        </a>
                    </li>
                <?Php
                }
                ?>

                <?Php
                if ($titleUs) {
                ?>
                    <li>
                        <a href="#video">
                            <span class="rect"></span>
                            <span class="circle"></span>
                            <?= lang('aboutUs') ?>
                        </a>
                    </li>
                <?Php
                }
                ?>

                <li style="display: none;">
                    <a href="#blog">
                        <span class="rect"></span>
                        <span class="circle"></span>
                        <?= lang('blog') ?>
                    </a>
                </li>

                <?Php
                if ($titleContact) {
                ?>
                    <li>
                        <a href="#contact">
                            <span class="rect"></span>
                            <span class="circle"></span>
                            <?= lang('contact') ?>
                        </a>
                    </li>
                <?Php
                }
                ?>
            </ul>
        </nav>
        <ul class="social-icons">
            <?Php
            foreach ($social as $red) {
            ?>
                <li><a href="<?= $red['socialUrl'] ?>" target="_blank"><i class="fa <?= $red['socialIcon'] ?>"></i></a></li>
            <?Php
            }
            ?>
        </ul>
    </div>
    <!-- cierre barra lateral -->

    <!-- slider -->
    <div class="slider">
        <div class="Modern-Slider content-section" id="top">
            <?Php
            foreach ($sliders as $slider) {
                $titleSlider = explode("-", $slider['sliderTitle'])
            ?>

                <!-- Esto es un Item -->
                <div class="item item-1">
                    <div class="img-fill">
                        <div class="image" style="background-image: url(<?= base_url('assets/img/') . $slider['sliderImagen'] ?>);"></div>
                        <div class="info">
                            <div>
                                <h1><?= $titleSlider[0] ?> <br><?= $titleSlider[1] ?></h1>
                                <p class="parrafo"><?= $slider['sliderText'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- --- end Item --- -->
            <?Php
            }
            ?>
        </div>
    </div>
    <!-- cierre slider-->


    <div class="page-content">

        <!-- sección proyectos recientes -->
        <?Php
        if ($titleProjects) {
            $titulo = explode("-", $titleProjects);
        ?>
            <section id="featured" class="content-section">
                <div class="section-heading">
                    <h1><?= $titulo[0] ?><br><em><?= $titulo[1] ?></em></h1>
                    <p class="parrafo"> <?= $descriptionProjects ?> </p>
                </div>

                <div class="section-content">
                    <div class="owl-carousel owl-theme">

                        <?Php
                        foreach ($projects as $project) {
                        ?>

                            <div class="item">
                                <div class="image">
                                    <img src="<?= base_url('assets/img/') . $project['projectImagen'] ?>" alt="">
                                </div>
                                <div class="text-content">
                                    <h4><?= $project['projectTitle'] ?></h4>
                                    <p><?= $project['projectDescription'] ?></p>
                                </div>
                            </div>
                        <?Php
                        }
                        ?>

                    </div>
                </div>
            </section>
        <?Php
        }
        ?>
        <!-- cierre sección proyectos recientes -->

        <!-- Sección Servicios -->
        <?Php
        if ($titleServices) {
            $titulo = explode("-", $titleServices);
        ?>
            <section id="projects" class="content-section">
                <div class="section-heading">
                    <h1><?= $titulo[0] ?><br><em><?= $titulo[1] ?></em></h1>
                    <p class="parrafo"> <?= $descriptionServices ?> </p>
                </div>
                <div class="section-content">
                    <div class="container">
                        <div class="row">
                            <ul class="item_list">
                                <li class="d-inline bg-light text-dark fs-2 p-2 mb-3 rounded-start categoryItem">
                                    <a href="#" class="categoryItemactivo active" data-category="all"> todos</a>
                                </li>
                                <?Php
                                foreach ($categorys as $category) {
                                ?>
                                    <li class="d-inline bg-light text-dark fs-2 p-2 mb-3 rounded-end categoryItem">
                                        <a href="#" class="categoryItemactivo" data-category="<?= $category['categoryId'] ?>"><?= $category['categoryName'] ?></a>
                                    </li>
                                <?Php
                                }
                                ?>
                                <!-- <li class="d-inline bg-light text-dark fs-2 p-2 mb-3 categoryItem">
                                    <a href="#" class="categoryItemactivo" data-category="impresion">impresión</a>
                                </li>
                                <li class="d-inline bg-light text-dark fs-2  p-2 mb-3 rounded-end categoryItem">
                                    <a href="#" class="categoryItemactivo" data-category="marketing">marketing</a>
                                </li> -->
                            </ul>
                        </div>

                        <div class="row">
                            <hr class="linea" />
                        </div>

                    </div>

                    <div class="masonry">
                        <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">

                            <?Php
                            foreach ($services as $service) {
                            ?>

                                <div class="col">
                                    <div class="card mb-4 rounded-3 shadow-sm" data-category="<?= $service['categoryId'] ?>">
                                        <div class="card-header py-3">
                                            <h4 class="my-0 fw-normal"><?= $service['serviceTitle'] ?></h4>
                                        </div>
                                        <div class="card-body">
                                            <a href="<?= base_url('assets/img/') . $service['serviceImagen'] ?>" data-lightbox="image"><img src="<?= base_url('assets/img/') . $service['serviceImagen'] ?>" alt="<?= $service['serviceTitle'] ?>" class="img-fluid img-thumbnail rounded"></a>
                                            <h1 class="card-title pricing-card-title"><?= $service['servicePrice'] ?></h1>
                                            <span class="d-inline-block">
                                                <?= $service['serviceDescription'] ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            <?Php
                            }
                            ?>

                        </div>

                    </div>
                </div>
            </section>
        <?Php
        }
        ?>
        <!-- cierre sección servicios ofrecidos -->

        <!-- session nosotros -->
        <?Php
        if ($titleUs) {
            $titulo = explode("-", $titleUs);

        ?>
            <section id="video" class="content-section">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-heading">
                            <h1><?= $titulo[0] ?> <em><?= $titulo[1] ?></em>.</h1>
                            <p class="parrafo"> <?= $descriptionUs ?> </p>
                        </div>
                        <div class="text-content">
                            <div class="container">
                                <?Php
                                $activarBoton = 0;
                                foreach ($abouts as $about) {
                                    if ($about['aboutModal'] === "0") {
                                        $title = $about['aboutTitle'];
                                        $texto = $about['aboutDescription'];
                                ?>
                                        <div class="row text-start">
                                            <div class="col-md-12">
                                                <h2 class="fs-1 text-primary fw-bolder"><?= $title ?></h2>
                                            </div>
                                            <div class="col-md-12 mb-4 text-start">
                                                <p class="fwt-normal fs-4"><?= $texto ?></p>
                                            </div>
                                        </div>


                                <?Php
                                    } else {
                                        $activarBoton = 1;
                                    }
                                }
                                ?>
                            </div>
                            <!-- Button trigger modal -->
                            <?Php
                            if ($activarBoton === 1) {
                            ?>
                                <div class="accent-button button open-modalUs">
                                    <a href="#"> <?= lang('more') ?> </a>
                                </div>
                            <?Php
                            }
                            ?>
                        </div>

                    </div>

            </section>
        <?Php
        }
        ?>
        <!-- cierre session nosotros -->


        <section id="map" class="content-section">
            <div id="map">
                <!-- How to change your own map point
                           1. Go to Google Maps
                           2. Click on your location point
                           3. Click "Share" and choose "Embed map" tab
                           4. Copy only URL and paste it within the src="" field below
                    -->
                <iframe src="<?= $map ?>" width="100%" height="400px" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </section>

        <!-- Sección de Contacto -->
        <?Php
        if ($titleContact) {
            $titulo = explode("-", $titleContact);
        ?>
            <section id="contact" class="content-section">
                <div id="contact-content">
                    <div class="section-heading">
                        <h1><?= $titulo[0] ?><br><em><?= $titulo[1] ?></em></h1>
                        <p class="parrafo"> <?= $descriptionContact ?> </p>

                    </div>
                    <div class="section-content">
                        <form id="contacto" name="contacto" action="#" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-4">
                                    <fieldset>
                                        <input name="name" type="text" class="form-control" id="name" placeholder="<?= lang('youName') ?>." required="">
                                    </fieldset>
                                </div>
                                <div class="col-md-4">
                                    <fieldset>
                                        <input name="email" type="email" class="form-control" id="email" placeholder="<?= lang('Email') ?>" required="">
                                    </fieldset>
                                </div>
                                <div class="col-md-4">
                                    <fieldset>
                                        <input name="subject" type="text" class="form-control" id="subject" placeholder="<?= lang('asunto') ?>." required="">
                                    </fieldset>
                                </div>
                                <div class="col-md-12">
                                    <fieldset>
                                        <textarea name="message" rows="6" class="form-control" id="message" placeholder="<?= lang('message') ?>" required=""></textarea>
                                    </fieldset>
                                </div>
                                <div class="col-md-12">
                                    <fieldset>
                                        <button type="submit" id="form-submit" class="btn"><?= lang('Send') ?></button>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        <?Php
        }
        ?>
        <!-- cierre sección de contacto -->

        <section class="footer">
            <p>Copyright &copy; <span id="fecha"> </span> <?= $company ?>. <?= lang('Design') ?> <?= $creador ?></p>
        </section>
    </div>

    <!-- ModalUs -->
    <div class="modalUs modalUs-close" id="modalUs">
        <div class="modalUs_container" style="place-items: start;">
            <div style="z-index: 200000000;">
                <div class="modal-header">
                    <div class="col-md-10">
                        <h3 class="modal-title" id="exampleModalLabel"><?= lang('moreAbout') ?></h3>
                    </div>
                    <div class="col-md-2 text-end">
                        <button type="button" class="btn-close modalUs-close text-end" style="font-size: initial;"></button>
                    </div>
                </div>
                <div class="modal-body">

                    <div class="container-fluid mt-5">
                        <?Php
                        foreach ($aboutsModal as $aboutModal) {
                        ?>
                            <div class="row">
                                <h4 class="text-primary"><?= $aboutModal['aboutTitle'] ?></h4>
                            </div>
                            <div class="row">
                                <p><?= $aboutModal['aboutDescription'] ?></p>
                            </div>
                        <?Php
                        }
                        ?>
                    </div>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/js/vendor/jquery-1.11.2.min.js"></script>'

    <script src="<?= base_url() ?>assets/js/vendor/bootstrap.min.js"></script>

    <script src="<?= base_url() ?>assets/js/plugins.js"></script>
    <script src="<?= base_url() ?>assets/js/main.js"></script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>

    <script src="<?= base_url('assets/bootstrap/dist/js/bootstrap.bundle.js') ?>"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/jquery/1.19.1/jquery.validate.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>assets/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>assets/bootstrap/dist/js/bootstrap.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url() ?>assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url() ?>assets/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url() ?>assets/js/demo/chart-area-demo.js"></script>
    <script src="<?= base_url() ?>assets/js/demo/chart-pie-demo.js"></script>





    <!-- Page level custom scripts -->

    <script src="<?= base_url() ?>assets/alertifyjs/alertify.js"></script>
    <script>
        $(document).ready(function() {
            var year = new Date().getFullYear();
            $("#fecha").html(year);


            // validar el formulario de contacto y enviar mensaje
            $(function() {

                // Initialize form validation on the registration form.

                // It has the name attribute "registration"

                $("form[name='contacto']").validate({

                    // Specify validation rules

                    rules: {

                        // The key name on the left side is the name attribute

                        // of an input field. Validation rules are defined

                        // on the right side

                        name: {
                            required: true,

                        },

                        email: {
                            required: true,
                            email: true
                        },

                        subject: "required",

                        message: {
                            required: true,

                        }

                    },

                    // Specify validation error messages

                    messages: {

                        name: {
                            required: "Introduzca su Nombre Completo",
                        },

                        email: {
                            required: "Introduzca una dirección de correo",
                        },

                        subject: "Introduzca un asunto para su mensaje",

                        message: {
                            required: "escriba un mensaje",

                        }

                    },

                    submitHandler: function(form) {
                        var formData = new FormData($("#contacto")[0]);

                        //creo variable con la url del ajax
                        var urlajax = urlbase + "Admin/sendMessages";
                        // Run $.ajax() here
                        // Using the core $.ajax() method
                        $.ajax({

                            // Whether this is a POST or GET request
                            type: "POST",
                            // The URL for the request
                            url: urlajax,
                            // The data to send (will be converted to a query string)
                            data: formData,
                            cache: false,
                            processData: false,
                            contentType: false,
                            dataType: 'json',


                            beforeSend: function(objeto) {

                                $("#form-submit").attr('disabled', 'disabled');
                            },
                            success: function(r) {
                                if (r === true) {
                                    alertify.success('El mensaje se envió exitosamente');
                                    setTimeout("location.reload(true);", 3000);
                                } else {
                                    alertify.warning(r);
                                    //  setTimeout("location.reload(true);", 3000);
                                    $("#form-submit").removeAttr('disabled');
                                }
                            },
                            error: function(r) {
                                alertify.error('Ocurrió un error y no se envió el mensaje');
                                setTimeout("location.reload(true);", 3000);
                                $("#form-submit").removeAttr('disabled');

                            }
                        })


                    }

                });

            });


        });
        // Hide Header on on scroll down
        var didScroll;
        var lastScrollTop = 0;
        var delta = 5;
        var navbarHeight = $('header').outerHeight();

        $(window).scroll(function(event) {
            didScroll = true;
        });

        setInterval(function() {
            if (didScroll) {
                hasScrolled();
                didScroll = false;
            }
        }, 250);

        function hasScrolled() {
            var st = $(this).scrollTop();

            // Make sure they scroll more than delta
            if (Math.abs(lastScrollTop - st) <= delta)
                return;

            // If they scrolled down and are past the navbar, add class .nav-up.
            // This is necessary so you never see what is "behind" the navbar.
            if (st > lastScrollTop && st > navbarHeight) {
                // Scroll Down
                $('header').removeClass('nav-down').addClass('nav-up');
            } else {
                // Scroll Up
                if (st + $(window).height() < $(document).height()) {
                    $('header').removeClass('nav-up').addClass('nav-down');
                }
            }

            lastScrollTop = st;
        }
    </script>
</body>

</html>

<?Php

unset(
    $map,
    $altLogo,
    $logo,
    $title,
    $dominio,
    $company,
    $creador,
    $keyWords,
    $description,
    $contactMail,
    $sliders,
    $projects,
    $categorys,
    $services,
    $abouts,
    $aboutsModal,
);
?>