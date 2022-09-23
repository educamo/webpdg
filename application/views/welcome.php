<?Php
$map = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d424.01823977953916!2d-72.36756770237544!3d7.693578184167264!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e663e439229c16f%3A0xa0e8d1a10fc2c852!2sRubio%205030%2C%20T%C3%A1chira!5e1!3m2!1ses!2sve!4v1663280352794!5m2!1ses!2sve';
$title = lang('title');
$dominio = base_url();
?>
<!DOCTYPE html>
<html lang="<?= lang('lang') ?>">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="author" content="<?= lang('author') ?>">
    <title> <?= $title ?> </title>

    <meta name="title" content="<?= $title ?>">

    <link rel="shortcut icon" href="<?= base_url() ?>assets/img/favicon.png" />
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <!-- <base href="<?= $dominio ?>" /> -->


    <meta name="generator" content="VS Code 1.71.0" />
    <link rel="shortlink" href="<?= $dominio ?>" />

    <meta name="description" content="<?= lang('description') ?>">

    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/fontAwesome.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/light-box.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/owl-carousel.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/templatemo-style.css">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!-- css custom -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">

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
                    <li><a href="#featured"> <?= lang('proyectos') . ' ' . lang('recientes')  ?> </a></li>
                    <li><a href="#projects"> <?= lang('proyectos') . ' ' . lang('destacados') ?> </a></li>
                    <li><a href="#video">Un poco de Nosotros </a></li>
                    <li><a href="#blog"> <?= lang('blog') ?> </a></li>
                    <li><a href="#contact"> ¡Contáctenos! </a></li>
                </ul>
            </nav>
        </div>
    </header>
    <!-- cierre cabecera -->

    <!-- barra lateral con menu -->
    <div class="sidebar-navigation hidde-sm hidden-xs">
        <div class="logo">
            <a href="<?= base_url() ?>">Cosmo<em>Imagine</em></a>
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
                <li>
                    <a href="#featured">
                        <span class="rect"></span>
                        <span class="circle"></span>
                        <?= lang('proyectos') . ' ' . lang('recientes') ?>
                    </a>
                </li>
                <li>
                    <a href="#projects">
                        <span class="rect"></span>
                        <span class="circle"></span>
                        <?= lang('proyectos') . ' ' . lang('destacados') ?>
                    </a>
                </li>
                <li>
                    <a href="#video">
                        <span class="rect"></span>
                        <span class="circle"></span>
                        Un poco de Nosotros
                    </a>
                </li>
                <li>
                    <a href="#blog">
                        <span class="rect"></span>
                        <span class="circle"></span>
                        <?= lang('blog') ?>
                    </a>
                </li>
                <li>
                    <a href="#contact">
                        <span class="rect"></span>
                        <span class="circle"></span>
                        ¡Contáctenos!
                    </a>
                </li>
            </ul>
        </nav>
        <ul class="social-icons">
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
            <li><a href="#"><i class="fa fa-rss"></i></a></li>
        </ul>
    </div>
    <!-- cierre barra lateral -->

    <!-- slider -->
    <div class="slider">
        <div class="Modern-Slider content-section" id="top">

            <!-- Esto es un Item -->
            <div class="item item-1">
                <div class="img-fill">
                    <div class="image" style="background-image: url(<?= base_url() ?>assets/img/slide_1.jpg);"></div>
                    <div class="info">
                        <div>
                            <h1>Bienvenido a <br>Cosmo Imagine</h1>
                            <p>Contamos con una gran variedad de Banner y<br>
                                Proyectos gráficos a tu disposición</p>
                            <div class="white-button button">
                                <a href="#featured">¿Quienes Somos?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Aqui van los Items -->

            <div class="item item-2">
                <div class="img-fill">
                    <div class="image" style="background-image: url(<?= base_url() ?>assets/img/slide_2.jpg);"></div>
                    <div class="info">
                        <div>
                            <h1> Invita <br>a tus Amigos</h1>
                            <p>Nunca sabes cuando necesites un banner ;)
                                <br>Gracias por elegirnos
                            </p>

                            <div class="white-button button">
                                <a href="#featured">¡Mira mas aquí!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Aqui van mas Items -->

            <div class="item item-3">
                <div class="img-fill">
                    <div class="image" style="background-image: url(<?= base_url() ?>assets/img/slide_3.jpg);"></div>
                    <div class="info">
                        <div>
                            <h1>Aqui en <br> Cosmo Imagine</h1>
                            <p>Nos especializamos en diseño grafico y creacion de Banners <br> Si tu lo necesitas !Nosotros lo tenemos¡</p>

                            <div class="white-button button">
                                <a href="#featured"> ¡Mira mas aqui! </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- // Item -->
        </div>
    </div>
    <!-- cierre slider-->


    <div class="page-content">

        <!-- sección proyectos recientes -->
        <section id="featured" class="content-section">
            <div class="section-heading">
                <h1><?= lang('proyectos') ?><br><em><?= lang('recientes') ?></em></h1>
                <p>Estos son solo algunos de nuestros tabajos de mayor calidad
                    <br>Puedes darles un vistazo y decidirlo tu mismo.
                </p>
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
        <!-- cierre seccion proyectos recientes -->

        <!-- Seccion Proyectos Destacados -->
        <section id="projects" class="content-section">
            <div class="section-heading">
                <h1><?= lang('proyectos') ?><br><em><?= lang('destacados') ?></em></h1>
                <p>Aqui tenemos algunos de nuestro proyectos mas recientes,
                    <br>puedes mirarlos y decidir por tu mismo. ¿Cual es tu favorito?.
                </p>
            </div>
            <div class="section-content">
                <div class="container">
                    <div class="row">
                        <ul class="">
                            <li class="d-inline bg-light text-dark fs-2 p-2 mb-3 rounded-start"> <a href=""> todos</a></li>
                            <li class="d-inline bg-light text-dark fs-2 p-2 mb-3"> <a href="">diseño</a></li>
                            <li class="d-inline bg-light text-dark fs-2 p-2 mb-3"><a href="">impresión</a></li>
                            <li class="d-inline bg-light text-dark fs-2  p-2 mb-3 rounded-end"><a href="">marketing</a></li>
                        </ul>
                    </div>
                </div>
                <div class="masonry">


                    <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
                        <div class="col">
                            <div class="card mb-4 rounded-3 shadow-sm">
                                <div class="card-header py-3">
                                    <h4 class="my-0 fw-normal">Free</h4>
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
                            <div class="card mb-4 rounded-3 shadow-sm">
                                <div class="card-header py-3">
                                    <h4 class="my-0 fw-normal">Pro</h4>
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
                            <div class="card mb-4 rounded-3 shadow-sm border-primary">
                                <div class="card-header py-3 text-bg-primary border-primary">
                                    <h4 class="my-0 fw-normal">Enterprise</h4>
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
                            <div class="card mb-4 rounded-3 shadow-sm border-primary">
                                <div class="card-header py-3 text-bg-primary border-primary">
                                    <h4 class="my-0 fw-normal">Enterprise</h4>
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
                            <div class="card mb-4 rounded-3 shadow-sm border-primary">
                                <div class="card-header py-3 text-bg-primary border-primary">
                                    <h4 class="my-0 fw-normal">Enterprise</h4>
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

        <section id="video" class="content-section">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h1>Cual es el objetivo de nuesra <em>Compañia</em>.</h1>
                        <p>¿Cual es el objetivo que tiene nuestra compañia, <em>Cosmo Imagine</em> para ofrecerte a ti? </p>
                    </div>
                    <div class="text-content">
                        <p>Cosmo <em>Imagine</em> te ofrece un servisio de calidad
                            cuando se trata de cumplir las espectativas del cliente en base al tipo de diseño que ha elegido <br> al igual con la eficiencia y cretividad del mismo.</p>
                        <div class="accent-button button">
                            <a href="#blog">Continue Reading</a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="box-video">
                            <div class="bg-video">
                                <div class="bt-play">Play</div>
                            </div>
                            <div class="video-container">
                                <iframe width="100%" height="520" src="https://www.youtube.com/embed/j-_7Ub-Zkow?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        <!-- cierre Proyectos Destacados -->

        <!-- seccion blog -->
        <section id="blog" class="content-section">
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
                                            <img src="img/blog_3.jpg" alt="">
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

        <section id="contact" class="content-section">
            <div id="contact-content">
                <div class="section-heading">
                    <h1>Contact<br><em>Sentra</em></h1>
                    <p>Curabitur hendrerit mauris mollis ipsum vulputate rutrum.
                        <br>Phasellus luctus odio eget dui imperdiet.
                    </p>

                </div>
                <div class="section-content">
                    <form id="contact" action="#" method="post">
                        <div class="row">
                            <div class="col-md-4">
                                <fieldset>
                                    <input name="name" type="text" class="form-control" id="name" placeholder="Your name..." required="">
                                </fieldset>
                            </div>
                            <div class="col-md-4">
                                <fieldset>
                                    <input name="email" type="email" class="form-control" id="email" placeholder="Your email..." required="">
                                </fieldset>
                            </div>
                            <div class="col-md-4">
                                <fieldset>
                                    <input name="subject" type="text" class="form-control" id="subject" placeholder="Subject..." required="">
                                </fieldset>
                            </div>
                            <div class="col-md-12">
                                <fieldset>
                                    <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your message..." required=""></textarea>
                                </fieldset>
                            </div>
                            <div class="col-md-12">
                                <fieldset>
                                    <button type="submit" id="form-submit" class="btn">Send Message Now</button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <section class="footer">
            <p>Copyright &copy; 2019 Company Name. Design: TemplateMo</p>
        </section>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/js/vendor/jquery-1.11.2.min.js"></script>'

    <script src="<?= base_url() ?>assets/js/vendor/bootstrap.min.js"></script>

    <script src="<?= base_url() ?>assets/js/plugins.js"></script>
    <script src="<?= base_url() ?>assets/js/main.js"></script>

    <script>
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

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>

</body>

</html>