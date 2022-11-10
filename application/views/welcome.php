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

// -------- modulos --------
$titleProjects  = NULL;
$titleContact   = NULL;
$titleServices  = NULL;
$titleUs        = NULL;

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
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/light-box.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/owl-carousel.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/templatemo-style.css">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <!-- CSS only -->
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/dist/css/bootstrap.css') ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!-- css custom -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/estilos.css">

</head>

<body>

    <!-- cabecera -->
    <header class="nav-down responsive-nav hidden-lg hidden-md">
        <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav">
            <span class="sr-only"> <?= lang('navegation') ?></span>
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

                        <div class="item">
                            <div class="image">
                                <img src="<?= base_url() ?>assets/img/featured_1.jpg" alt="">
                                <div class="featured-button button">
                                    <a href="#projects">¿Quieres ver lo mas reciente?</a>
                                </div>
                            </div>
                            <div class="text-content">
                                <h4>Aqui va un titulo</h4>
                                <p>#1 aqui va una descripcion</p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="image">
                                <img src="<?= base_url() ?>assets/img/featured_2.jpg" alt="">
                                <div class="featured-button button">
                                    <a href="#projects">¿Quieres ver lo mas reciente?</a>
                                </div>
                            </div>
                            <div class="text-content">
                                <h4>Aqui va un titulo</h4>
                                <p>#2 aqui <strong>va</strong> un fuerte descripcion</p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="image">
                                <img src="<?= base_url() ?>assets/img/featured_3.jpg" alt="">
                                <div class="featured-button button">
                                    <a href="#projects">¿Quieres ver lo mas reciente?</a>
                                </div>
                            </div>
                            <div class="text-content">
                                <h4>Aqui va un titulo</h4>
                                <p>#3 aqui va una descripcion</p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="image">
                                <img src="<?= base_url() ?>assets/img/featured_2.jpg" alt="">
                                <div class="featured-button button">
                                    <a href="#projects">¿Quieres ver lo mas reciente?</a>
                                </div>
                            </div>
                            <div class="text-content">
                                <h4>Aqui va un titulo</h4>
                                <p>#4 aqui va una descripcion</p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="image">
                                <img src="<?= base_url() ?>assets/img/featured_1.jpg" alt="">
                                <div class="featured-button button">
                                    <a href="#projects">¿Quieres ver lo mas reciente?</a>
                                </div>
                            </div>
                            <div class="text-content">
                                <h4>Aqui va un titulo</h4>
                                <p>#5 aqui va una descripcion</p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="image">
                                <img src="<?= base_url() ?>assets/img/featured_3.jpg" alt="">
                                <div class="featured-button button">
                                    <a href="#projects">¿Quieres ver lo mas reciente?</a>
                                </div>
                            </div>
                            <div class="text-content">
                                <h4>Aqui va un titulos</h4>
                                <p>#6 aqui va una descripcion</p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="image">
                                <img src="<?= base_url() ?>assets/img/featured_2.jpg" alt="">
                                <div class="featured-button button">
                                    <a href="#projects">¿Quieres ver lo mas reciente?</a>
                                </div>
                            </div>
                            <div class="text-content">
                                <h4>Aqui va un titulo</h4>
                                <p>#7 aqui va una descripcion</p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="image">
                                <img src="<?= base_url() ?>assets/img/featured_1.jpg" alt="">
                                <div class="featured-button button">
                                    <a href="#projects">¿Quieres ver lo mas reciente?</a>
                                </div>
                            </div>
                            <div class="text-content">
                                <h4>Aqui va un titulo</h4>
                                <p>#8 aqui va una descripcion</p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="image">
                                <img src="<?= base_url() ?>assets/img/featured_3.jpg" alt="">
                                <div class="featured-button button">
                                    <a href="#projects">¿Quieres ver lo mas reciente?</a>
                                </div>
                            </div>
                            <div class="text-content">
                                <h4>Aqui va un titulo</h4>
                                <p>#9 aqui va una descripcion</p>
                            </div>
                        </div>
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
                                <li class="d-inline bg-light text-dark fs-2 p-2 mb-3 categoryItem">
                                    <a href="#" class="categoryItemactivo" data-category="desing">diseño</a>
                                </li>
                                <li class="d-inline bg-light text-dark fs-2 p-2 mb-3 categoryItem">
                                    <a href="#" class="categoryItemactivo" data-category="impresion">impresión</a>
                                </li>
                                <li class="d-inline bg-light text-dark fs-2  p-2 mb-3 rounded-end categoryItem">
                                    <a href="#" class="categoryItemactivo" data-category="marketing">marketing</a>
                                </li>
                            </ul>
                        </div>

                        <div class="row">
                            <hr class="linea" />
                        </div>

                    </div>

                    <div class="masonry">
                        <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">

                            <div class="col">
                                <div class="card mb-4 rounded-3 shadow-sm" data-category="desing">
                                    <div class="card-header py-3">
                                        <h4 class="my-0 fw-normal">Diseño</h4>
                                    </div>
                                    <div class="card-body">
                                        <a href="<?= base_url() ?>assets/img/portfolio_big_1.jpg" data-lightbox="image"><img src="<?= base_url() ?>assets/img/portfolio_1.jpg" alt="image 1" class="img-fluid img-thumbnail rounded"></a>
                                        <h1 class="card-title pricing-card-title">$0<small class="text-muted fw-light">/mo</small></h1>
                                        <span class="d-inline-block">
                                            This text is quite long, and will be truncated once displayed sdgffdsg gtfthgfhfg dsfgfdg fgfdgdfgsd dsfsd.
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="card mb-4 rounded-3 shadow-sm" data-category="desing">
                                    <div class="card-header py-3">
                                        <h4 class="my-0 fw-normal">Diseño</h4>
                                    </div>
                                    <div class="card-body">
                                        <a href="<?= base_url() ?>assets/img/portfolio_big_2.jpg" data-lightbox="image"><img src="<?= base_url() ?>assets/img/portfolio_2.jpg" alt="image 2" class="img-fluid img-thumbnail rounded"></a>
                                        <h1 class="card-title pricing-card-title">$15<small class="text-muted fw-light">/mo</small></h1>
                                        <span class="d-inline-block">
                                            This text is quite long, and will be truncated once displayed sdgffdsg gtfthgfhfg dsfgfdg fgfdgdfgsd dsfsd.
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="card mb-4 rounded-3 shadow-sm" data-category="impresion">
                                    <div class="card-header py-3">
                                        <h4 class="my-0 fw-normal">Impresión</h4>
                                    </div>
                                    <div class="card-body">
                                        <a href="<?= base_url() ?>assets/img/portfolio_big_3.jpg" data-lightbox="image"><img src="<?= base_url() ?>assets/img/portfolio_3.jpg" alt="image 3" class="img-fluid img-thumbnail rounded"></a>
                                        <h1 class="card-title pricing-card-title">$29<small class="text-muted fw-light">/mo</small></h1>
                                        <span class="d-inline-block">
                                            This text is quite long, and will be truncated once displayed sdgffdsg gtfthgfhfg dsfgfdg fgfdgdfgsd dsfsd.
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="card mb-4 rounded-3 shadow-sm" data-category="marketing">
                                    <div class="card-header py-3">
                                        <h4 class="my-0 fw-normal">Marketing</h4>
                                    </div>
                                    <div class="card-body">
                                        <a href="<?= base_url() ?>assets/img/portfolio_big_4.jpg" data-lightbox="image"><img src="<?= base_url() ?>assets/img/portfolio_4.jpg" alt="image 4" class="img-fluid img-thumbnail rounded"></a>
                                        <h1 class="card-title pricing-card-title">$29<small class="text-muted fw-light">/mo</small></h1>
                                        <span class="d-inline-block">
                                            This text is quite long, and will be truncated once displayed sdgffdsg gtfthgfhfg dsfgfdg fgfdgdfgsd dsfsd.
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="card mb-4 rounded-3 shadow-sm" data-category="marketing">
                                    <div class="card-header py-3">
                                        <h4 class="my-0 fw-normal">Marketing</h4>
                                    </div>
                                    <div class="card-body">
                                        <a href="<?= base_url() ?>assets/img/portfolio_big_5.jpg" data-lightbox="image"><img src="<?= base_url() ?>assets/img/portfolio_5.jpg" alt="image 5" class="img-fluid img-thumbnail rounded"></a>
                                        <h1 class="card-title pricing-card-title">$29<small class="text-muted fw-light">/mo</small></h1>
                                        <span class="d-inline-block">
                                            This text is quite long, and will be truncated once displayed sdgffdsg gtfthgfhfg dsfgfdg fgfdgdfgsd dsfsd.
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="card mb-4 rounded-3 shadow-sm" data-category="impresion">
                                    <div class="card-header py-3">
                                        <h4 class="my-0 fw-normal">Impresión</h4>
                                    </div>
                                    <div class="card-body">
                                        <a href="<?= base_url() ?>assets/img/portfolio_big_5.jpg" data-lightbox="image"><img src="<?= base_url() ?>assets/img/portfolio_5.jpg" alt="image 5" class="img-fluid img-thumbnail rounded"></a>
                                        <h1 class="card-title pricing-card-title">$29<small class="text-muted fw-light">/mo</small></h1>
                                        <span class="d-inline-block">
                                            This text is quite long, and will be truncated once displayed sdgffdsg gtfthgfhfg dsfgfdg fgfdgdfgsd dsfsd.
                                        </span>
                                    </div>
                                </div>
                            </div>

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
                            <div>
                                <?Php
                                //TODO: colocar la variable php que contine la informacion desde la bd
                                ?>
                            </div>
                            <!-- Button trigger modal -->
                            <div class="accent-button button open-modalUs">
                                <a href="#"> <?= lang('more') ?> </a>
                            </div>
                        </div>

                    </div>

            </section>
        <?Php
        }
        ?>
        <!-- cierre session nosotrs -->

        <!-- seccion blog -->
        <section id="blog" class="content-section" style="display: none;">
            <div class="section-heading">
                <h1><?= lang('blog') ?><br><em>Entries</em></h1>
                <p>Curabitur hendrerit mauris mollis ipsum vulputate rutrum.
                    <br>Phasellus luctus odio eget dui imperdiet.
                </p>
            </div>
            <div class="section-content">
                <div class="tabs-content">
                    <div class="wrapper">
                        <ul class="tabs clearfix" data-tabgroup="first-tab-group">
                            <li><a href="#tab1" class="active">July 2018</a></li>
                            <li><a href="#tab2">June 2018</a></li>
                            <li><a href="#tab3">May 2018</a></li>
                            <li><a href="#tab4">April 2018</a></li>
                        </ul>
                        <section id="first-tab-group" class="tabgroup">
                            <div id="tab1">
                                <ul>
                                    <li>
                                        <div class="item">
                                            <img src="<?= base_url() ?>assets/img/blog_1.jpg" alt="">
                                            <div class="text-content">
                                                <h4>Integer ultrices augue</h4>
                                                <span>25 July 2018</span>
                                                <p>Nam vel egestas nisi. Nullam lobortis magna at enim venenatis luctus. Nam finibus, mauris eu dictum iaculis, dolor tortor cursus quam, in volutpat augue lectus sed magna. Integer mollis lorem quis ipsum maximus finibus.</p>

                                                <div class="accent-button button">
                                                    <a href="#contact">Continue Reading</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="item">
                                            <img src="<?= base_url() ?>assets/img/blog_2.jpg" alt="">
                                            <div class="text-content">
                                                <h4>Cras commodo odio ut</h4>
                                                <span>16 July 2018</span>
                                                <p>Nam vel egestas nisi. Nullam lobortis magna at enim venenatis luctus. Nam finibus, mauris eu dictum iaculis, dolor tortor cursus quam, in volutpat augue lectus sed magna. Integer mollis lorem quis ipsum maximus finibus.</p>

                                                <div class="accent-button button">
                                                    <a href="#contact">Continue Reading</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="item">
                                            <img src="<?= base_url() ?>assets/img/blog_3.jpg" alt="">
                                            <div class="text-content">
                                                <h4>Sed at massa turpis</h4>
                                                <span>10 July 2018</span>
                                                <p>Nam vel egestas nisi. Nullam lobortis magna at enim venenatis luctus. Nam finibus, mauris eu dictum iaculis, dolor tortor cursus quam, in volutpat augue lectus sed magna. Integer mollis lorem quis ipsum maximus finibus.</p>

                                                <div class="accent-button button">
                                                    <a href="#contact">Continue Reading</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div id="tab2">
                                <ul>
                                    <li>
                                        <div class="item">
                                            <img src="<?= base_url() ?>assets/img/blog_3.jpg" alt="">
                                            <div class="text-content">
                                                <h4>Sed at massa turpis</h4>
                                                <span>30 June 2018</span>
                                                <p>Nam vel egestas nisi. Nullam lobortis magna at enim venenatis luctus. Nam finibus, mauris eu dictum iaculis, dolor tortor cursus quam, in volutpat augue lectus sed magna. Integer mollis lorem quis ipsum maximus finibus.</p>

                                                <div class="accent-button button">
                                                    <a href="#contact">Continue Reading</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="item">
                                            <img src="<?= base_url() ?>assets/img/blog_1.jpg" alt="">
                                            <div class="text-content">
                                                <h4>Lorem ipsum dolor sit</h4>
                                                <span>24 June 2018</span>
                                                <p>Nam vel egestas nisi. Nullam lobortis magna at enim venenatis luctus. Nam finibus, mauris eu dictum iaculis, dolor tortor cursus quam, in volutpat augue lectus sed magna. Integer mollis lorem quis ipsum maximus finibus.</p>

                                                <div class="accent-button button">
                                                    <a href="#contact">Continue Reading</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="item">
                                            <img src="<?= base_url() ?>assets/img/blog_2.jpg" alt="">
                                            <div class="text-content">
                                                <h4>Cras commodo odio ut</h4>
                                                <span>12 June 2018</span>
                                                <p>Nam vel egestas nisi. Nullam lobortis magna at enim venenatis luctus. Nam finibus, mauris eu dictum iaculis, dolor tortor cursus quam, in volutpat augue lectus sed magna. Integer mollis lorem quis ipsum maximus finibus.</p>

                                                <div class="accent-button button">
                                                    <a href="#contact">Continue Reading</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div id="tab3">
                                <ul>
                                    <li>
                                        <div class="item">
                                            <img src="<?= base_url() ?>assets/img/blog_2.jpg" alt="">
                                            <div class="text-content">
                                                <h4>Cras commodo odio ut</h4>
                                                <span>26 May 2018</span>
                                                <p>Nam vel egestas nisi. Nullam lobortis magna at enim venenatis luctus. Nam finibus, mauris eu dictum iaculis, dolor tortor cursus quam, in volutpat augue lectus sed magna. Integer mollis lorem quis ipsum maximus finibus.</p>

                                                <div class="accent-button button">
                                                    <a href="#contact">Continue Reading</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="item">
                                            <img src="<?= base_url() ?>assets/img/blog_1.jpg" alt="">
                                            <div class="text-content">
                                                <h4>Lorem ipsum dolor sit</h4>
                                                <span>22 May 2018</span>
                                                <p>Nam vel egestas nisi. Nullam lobortis magna at enim venenatis luctus. Nam finibus, mauris eu dictum iaculis, dolor tortor cursus quam, in volutpat augue lectus sed magna. Integer mollis lorem quis ipsum maximus finibus.</p>

                                                <div class="accent-button button">
                                                    <a href="#contact">Continue Reading</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="item">
                                            <img src="<?= base_url() ?>assets/img/blog_3.jpg" alt="">
                                            <div class="text-content">
                                                <h4>Integer ultrices augue</h4>
                                                <span>8 May 2018</span>
                                                <p>Nam vel egestas nisi. Nullam lobortis magna at enim venenatis luctus. Nam finibus, mauris eu dictum iaculis, dolor tortor cursus quam, in volutpat augue lectus sed magna. Integer mollis lorem quis ipsum maximus finibus.</p>

                                                <div class="accent-button button">
                                                    <a href="#contact">Continue Reading</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div id="tab4">
                                <ul>
                                    <li>
                                        <div class="item">
                                            <img src="<?= base_url() ?>assets/img/blog_1.jpg" alt="">
                                            <div class="text-content">
                                                <h4>Lorem ipsum dolor sit</h4>
                                                <span>26 April 2018</span>
                                                <p>Nam vel egestas nisi. Nullam lobortis magna at enim venenatis luctus. Nam finibus, mauris eu dictum iaculis, dolor tortor cursus quam, in volutpat augue lectus sed magna. Integer mollis lorem quis ipsum maximus finibus.</p>

                                                <div class="accent-button button">
                                                    <a href="#contact">Continue Reading</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="item">
                                            <img src="<?= base_url() ?>assets/img/blog_3.jpg" alt="">
                                            <div class="text-content">
                                                <h4>Integer ultrices augue eu</h4>
                                                <span>24 April 2018</span>
                                                <p>Nam vel egestas nisi. Nullam lobortis magna at enim venenatis luctus. Nam finibus, mauris eu dictum iaculis, dolor tortor cursus quam, in volutpat augue lectus sed magna. Integer mollis lorem quis ipsum maximus finibus.</p>

                                                <div class="accent-button button">
                                                    <a href="#contact">Continue Reading</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="item">
                                            <img src="<?= base_url() ?>assets/img/blog_2.jpg" alt="">
                                            <div class="text-content">
                                                <h4>Cras commodo odio ut</h4>
                                                <span>20 April 2018</span>
                                                <p>Nam vel egestas nisi. Nullam lobortis magna at enim venenatis luctus. Nam finibus, mauris eu dictum iaculis, dolor tortor cursus quam, in volutpat augue lectus sed magna. Integer mollis lorem quis ipsum maximus finibus.</p>

                                                <div class="accent-button button">
                                                    <a href="#contact">Continue Reading</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </section>
        <!-- cierre blog -->

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

        <!-- Seccion de Contacto -->
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
                        <form id="contacto" action="#" method="post">
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
    <div class="modalUs" id="modalUs">
        <div class="modalUs_container">
            <div>
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close modalUs-close"></button>
                </div>
                <div class="modal-body">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sit, neque quisquam? Et, odio quibusdam assumenda velit delectus at in possimus cum atque, ipsum recusandae aut.
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

    <script>
        $(document).ready(function() {
            var year = new Date().getFullYear();
            $("#fecha").html(year);
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

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>

    <script src="<?= base_url('assets/bootstrap/dist/js/bootstrap.bundle.js') ?>"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>

</body>

</html>