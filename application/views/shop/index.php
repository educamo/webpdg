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
<html lang="<?= lang('lang') ?>" />

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  < <meta name="author" content="<?= $creador ?>" />
  <title> <?= $title ?> </title>
  <meta name="title" content="<?= $title ?>" />

  <meta name="url" content="<?= $dominio ?>" />
  <meta name="copyright" content="<?= $company ?>" />

  <meta name="contact" content="<?= $contactMail ?>" />

  <link rel="shortcut icon" href="<?= base_url() ?>assets/img/favicon.png" />
  <link rel="apple-touch-icon" href="apple-touch-icon.png" />

  <!-- <base href="<?= $dominio ?>" /> -->


  <meta name="generator" content="VS Code 1.71.0" />
  <link rel="shortlink" href="<?= $dominio ?>" />

  <meta name="description" content="<?= $description ?>" />

  <meta name="Keywords" content="<?= $keyWords ?>" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
  <link href="<?= base_url('assets/plantillas/shop') ?>/css/bootstrap.min.css" rel="stylesheet" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="<?= base_url('assets/plantillas/shop') ?>/css/all.min.css" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/fontAwesome.css" />

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet" />


  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/plantillas/shop/css/style.css" />
</head>

<body>
  <header class="container-fluid">
    <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="<?= base_url() ?>">
          <img src="<?= base_url('assets/img/' . $logo) ?>" alt="" width="120" height="50" class="d-inline-block align-text-top">
        </a>
        <!-- botón carrito de compra -->
        <a class="btn btn-shopping-card" id="shopping-card" data-bs-toggle="offcanvas" href="#offcanvasRight" role="button" aria-controls="offcanvasRight"><i class="fa fa-cart-shopping"></i></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link active" aria-current="page" href="#top"> <?= lang('home') ?></a></li>
            <?Php
            if ($titleUs) {
            ?>
              <li class="nav-item">
                <a class="nav-link" href="#aboutUs"> <?= lang('aboutUs') ?> </a>
              </li>
            <?Php
            }
            ?>

            <?Php
            if ($titleProjects) {
            ?>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="#projects"> <?= lang('proyectos') . ' ' . lang('recientes')  ?> </a>
              </li>
            <?Php
            }
            ?>

            <?Php
            if ($titleServices) {
            ?>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="#services"> <?= lang('Servicios') . ' ' . lang('ofrecidos') ?> </a>
              </li>
            <?Php
            }
            ?>

            <li class="nav-item">
              <a class="nav-link" href="#blog" style="display: none;"> <?= lang('blog') ?> </a>
            </li>

            <?Php
            if ($titleContact) {
            ?>
              <li>
                <a class="nav-link" href="#contact"> <?= lang('contact') ?> </a>
              </li>
            <?Php
            }
            ?>
            <li class="nav-item dropdown btn-iniciar-session">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?= lang('session') ?></a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <?Php
                if ($cliente != '') {
                ?>
                  <li class="mb-2""> <span class=" text-center">Cuenta</span></li>
                  <li><a class="dropdown-item" href="<?= base_url('cliente/perfil/' . $cliente) ?>">Configuración de Cuenta</a></li>
                  <li><a href="<?= base_url('cliente/facturas/' . $cliente) ?>" class="dropdown-item">Pagos y Facturación</a></li>

                  <hr class="dropdown-divider">

                  <li><a class="dropdown-item" href="<?= base_url('cliente/logout') ?>">Cerrar sesión</a></li>
                <?php
                } else {
                ?>
                  <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#loginClient"><?= lang('loginClient') ?></a></li>

                  <hr class="dropdown-divider">

                  <li><a class="dropdown-item" href="<?= base_url('cliente/nuevo') ?>">Crear una cuenta</a></li>
                <?php
                }
                ?>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>


    <div id="mycarousel" class="carousel slide carousel-fade">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="<?= base_url() ?>assets/plantillas/shop/images/banner.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="..." class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="..." class="d-block w-100" alt="...">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>


  </header>



  <!-- ABOUT US -->
  <?Php
  if ($titleUs) {
    $titulo = explode("-", $titleUs);
  ?>

    <section id="aboutUs" class="border-bottom">
      <div class="px-4 pt-5 my-5 text-center">
        <h1 class="display-4 fw-bold text-body-emphasis"><?= $titulo[0] ?> <em><?= $titulo[1] ?></em>.</h1>
        <div class="col-lg-6 mx-auto">
          <p class="parrafo"> <?= $descriptionUs ?> </p>
        </div>
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

          <!-- Button trigger modal -->
          <?Php
          if ($activarBoton === 1) {
          ?>
            <div class="row justify-content-center">
              <div class="col-8 text-center">
                <button type="button" class="btn btn-outline-primary px-3" href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop"> <?= lang('more') ?> </button>
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
  <!-- Modal mas aboutUs -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-lg modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLabel"><?= lang('moreAbout') ?></h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <!-- <button type="button" class="btn btn-primary">Understood</button> -->
        </div>
      </div>
    </div>
  </div>



  <main>
    <div class="container-fluid">


      <!-- PROJECTS -->
      <?Php
      if ($titleProjects) {
        $titulo = explode("-", $titleProjects);
      ?>
        <section id="projects" class="row">
          <div class="col-12">

            <h2 class="text-center"><?= $titulo[0] ?><em><?= $titulo[1] ?></em></h2>
            <p class="parrafo text-center"> <?= $descriptionProjects ?> </p>


            <div class="album py-5">
              <div class="container">

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                  <?Php
                  if (!($projects)) {
                  ?>

                    <div class="col">
                      <div class="card shadow-sm">
                        <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                          <title>Placeholder</title>
                          <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                        </svg>
                        <div class="card-body">
                          <h3 class="card-title">Title</h3>
                          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                          <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">

                              <div class="like-dislike-container pe-none">
                                <div class="icons-box">
                                  <div class="icons">
                                    <label class="like-label">123</label>
                                    <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" id="icon-like" class="svgs">
                                      <path d="M313.4 32.9c26 5.2 42.9 30.5 37.7 56.5l-2.3 11.4c-5.3 26.7-15.1 52.1-28.8 75.2H464c26.5 0 48 21.5 48 48c0 18.5-10.5 34.6-25.9 42.6C497 275.4 504 288.9 504 304c0 23.4-16.8 42.9-38.9 47.1c4.4 7.3 6.9 15.8 6.9 24.9c0 21.3-13.9 39.4-33.1 45.6c.7 3.3 1.1 6.8 1.1 10.4c0 26.5-21.5 48-48 48H294.5c-19 0-37.5-5.6-53.3-16.1l-38.5-25.7C176 420.4 160 390.4 160 358.3V320 272 247.1c0-29.2 13.3-56.7 36-75l7.4-5.9c26.5-21.2 44.6-51 51.2-84.2l2.3-11.4c5.2-26 30.5-42.9 56.5-37.7zM32 192H96c17.7 0 32 14.3 32 32V448c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32V224c0-17.7 14.3-32 32-32z"></path>
                                    </svg>
                                  </div>
                                  <div class="icons">
                                    <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" id="icon-dislike" class="svgs">
                                      <path d="M313.4 32.9c26 5.2 42.9 30.5 37.7 56.5l-2.3 11.4c-5.3 26.7-15.1 52.1-28.8 75.2H464c26.5 0 48 21.5 48 48c0 18.5-10.5 34.6-25.9 42.6C497 275.4 504 288.9 504 304c0 23.4-16.8 42.9-38.9 47.1c4.4 7.3 6.9 15.8 6.9 24.9c0 21.3-13.9 39.4-33.1 45.6c.7 3.3 1.1 6.8 1.1 10.4c0 26.5-21.5 48-48 48H294.5c-19 0-37.5-5.6-53.3-16.1l-38.5-25.7C176 420.4 160 390.4 160 358.3V320 272 247.1c0-29.2 13.3-56.7 36-75l7.4-5.9c26.5-21.2 44.6-51 51.2-84.2l2.3-11.4c5.2-26 30.5-42.9 56.5-37.7zM32 192H96c17.7 0 32 14.3 32 32V448c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32V224c0-17.7 14.3-32 32-32z"></path>
                                    </svg>
                                    <label class="dislike-label">3</label>
                                  </div>
                                </div>
                              </div>

                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col">
                      <div class="card shadow-sm">
                        <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                          <title>Placeholder</title>
                          <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                        </svg>
                        <div class="card-body">
                          <h3 class="card-title">Title</h3>
                          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                          <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">

                              <div class="like-dislike-container pe-none">
                                <div class="icons-box">
                                  <div class="icons">
                                    <label class="like-label">123</label>
                                    <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" id="icon-like" class="svgs">
                                      <path d="M313.4 32.9c26 5.2 42.9 30.5 37.7 56.5l-2.3 11.4c-5.3 26.7-15.1 52.1-28.8 75.2H464c26.5 0 48 21.5 48 48c0 18.5-10.5 34.6-25.9 42.6C497 275.4 504 288.9 504 304c0 23.4-16.8 42.9-38.9 47.1c4.4 7.3 6.9 15.8 6.9 24.9c0 21.3-13.9 39.4-33.1 45.6c.7 3.3 1.1 6.8 1.1 10.4c0 26.5-21.5 48-48 48H294.5c-19 0-37.5-5.6-53.3-16.1l-38.5-25.7C176 420.4 160 390.4 160 358.3V320 272 247.1c0-29.2 13.3-56.7 36-75l7.4-5.9c26.5-21.2 44.6-51 51.2-84.2l2.3-11.4c5.2-26 30.5-42.9 56.5-37.7zM32 192H96c17.7 0 32 14.3 32 32V448c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32V224c0-17.7 14.3-32 32-32z"></path>
                                    </svg>
                                  </div>
                                  <div class="icons">
                                    <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" id="icon-dislike" class="svgs">
                                      <path d="M313.4 32.9c26 5.2 42.9 30.5 37.7 56.5l-2.3 11.4c-5.3 26.7-15.1 52.1-28.8 75.2H464c26.5 0 48 21.5 48 48c0 18.5-10.5 34.6-25.9 42.6C497 275.4 504 288.9 504 304c0 23.4-16.8 42.9-38.9 47.1c4.4 7.3 6.9 15.8 6.9 24.9c0 21.3-13.9 39.4-33.1 45.6c.7 3.3 1.1 6.8 1.1 10.4c0 26.5-21.5 48-48 48H294.5c-19 0-37.5-5.6-53.3-16.1l-38.5-25.7C176 420.4 160 390.4 160 358.3V320 272 247.1c0-29.2 13.3-56.7 36-75l7.4-5.9c26.5-21.2 44.6-51 51.2-84.2l2.3-11.4c5.2-26 30.5-42.9 56.5-37.7zM32 192H96c17.7 0 32 14.3 32 32V448c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32V224c0-17.7 14.3-32 32-32z"></path>
                                    </svg>
                                    <label class="dislike-label">3</label>
                                  </div>
                                </div>
                              </div>

                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col">
                      <div class="card shadow-sm">
                        <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                          <title>Placeholder</title>
                          <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                        </svg>
                        <div class="card-body">
                          <h3 class="card-title">Title</h3>
                          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                          <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">

                              <div class="like-dislike-container pe-none">
                                <div class="icons-box">
                                  <div class="icons">
                                    <label class="like-label">123</label>
                                    <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" id="icon-like" class="svgs">
                                      <path d="M313.4 32.9c26 5.2 42.9 30.5 37.7 56.5l-2.3 11.4c-5.3 26.7-15.1 52.1-28.8 75.2H464c26.5 0 48 21.5 48 48c0 18.5-10.5 34.6-25.9 42.6C497 275.4 504 288.9 504 304c0 23.4-16.8 42.9-38.9 47.1c4.4 7.3 6.9 15.8 6.9 24.9c0 21.3-13.9 39.4-33.1 45.6c.7 3.3 1.1 6.8 1.1 10.4c0 26.5-21.5 48-48 48H294.5c-19 0-37.5-5.6-53.3-16.1l-38.5-25.7C176 420.4 160 390.4 160 358.3V320 272 247.1c0-29.2 13.3-56.7 36-75l7.4-5.9c26.5-21.2 44.6-51 51.2-84.2l2.3-11.4c5.2-26 30.5-42.9 56.5-37.7zM32 192H96c17.7 0 32 14.3 32 32V448c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32V224c0-17.7 14.3-32 32-32z"></path>
                                    </svg>
                                  </div>
                                  <div class="icons">
                                    <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" id="icon-dislike" class="svgs">
                                      <path d="M313.4 32.9c26 5.2 42.9 30.5 37.7 56.5l-2.3 11.4c-5.3 26.7-15.1 52.1-28.8 75.2H464c26.5 0 48 21.5 48 48c0 18.5-10.5 34.6-25.9 42.6C497 275.4 504 288.9 504 304c0 23.4-16.8 42.9-38.9 47.1c4.4 7.3 6.9 15.8 6.9 24.9c0 21.3-13.9 39.4-33.1 45.6c.7 3.3 1.1 6.8 1.1 10.4c0 26.5-21.5 48-48 48H294.5c-19 0-37.5-5.6-53.3-16.1l-38.5-25.7C176 420.4 160 390.4 160 358.3V320 272 247.1c0-29.2 13.3-56.7 36-75l7.4-5.9c26.5-21.2 44.6-51 51.2-84.2l2.3-11.4c5.2-26 30.5-42.9 56.5-37.7zM32 192H96c17.7 0 32 14.3 32 32V448c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32V224c0-17.7 14.3-32 32-32z"></path>
                                    </svg>
                                    <label class="dislike-label">3</label>
                                  </div>
                                </div>
                              </div>

                            </div>
                          </div>
                        </div>
                      </div>
                    </div>


                    <?Php
                  } else {


                    foreach ($projects as $project) {
                    ?>

                      <div class="col">
                        <div class="card card-projects shadow-sm">
                          <img src="<?= base_url('assets/img/') . $project['projectImagen'] ?>" alt="" class="img-fluid img-thumbnail d-placeholder-img card-img-top img-card">
                          <div class="card-body">
                            <h3 class="card-title"><?= $project['projectTitle'] ?></h3>
                            <p class="card-text"><?= $project['projectDescription'] ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                              <div class="btn-group">
                                <div class="like-dislike-container">
                                  <div class="icons-box">
                                    <div class="icons like" data-id="<?= $project['projectId'] ?>">
                                      <label class="like-label"><?= $project['like'] ?></label>
                                      <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" id="icon-like" class="svgs">
                                        <path d="M313.4 32.9c26 5.2 42.9 30.5 37.7 56.5l-2.3 11.4c-5.3 26.7-15.1 52.1-28.8 75.2H464c26.5 0 48 21.5 48 48c0 18.5-10.5 34.6-25.9 42.6C497 275.4 504 288.9 504 304c0 23.4-16.8 42.9-38.9 47.1c4.4 7.3 6.9 15.8 6.9 24.9c0 21.3-13.9 39.4-33.1 45.6c.7 3.3 1.1 6.8 1.1 10.4c0 26.5-21.5 48-48 48H294.5c-19 0-37.5-5.6-53.3-16.1l-38.5-25.7C176 420.4 160 390.4 160 358.3V320 272 247.1c0-29.2 13.3-56.7 36-75l7.4-5.9c26.5-21.2 44.6-51 51.2-84.2l2.3-11.4c5.2-26 30.5-42.9 56.5-37.7zM32 192H96c17.7 0 32 14.3 32 32V448c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32V224c0-17.7 14.3-32 32-32z"></path>
                                      </svg>
                                    </div>
                                    <div class="icons dislike" data-id="<?= $project['projectId'] ?>">
                                      <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" id="icon-dislike" class="svgs">
                                        <path d="M313.4 32.9c26 5.2 42.9 30.5 37.7 56.5l-2.3 11.4c-5.3 26.7-15.1 52.1-28.8 75.2H464c26.5 0 48 21.5 48 48c0 18.5-10.5 34.6-25.9 42.6C497 275.4 504 288.9 504 304c0 23.4-16.8 42.9-38.9 47.1c4.4 7.3 6.9 15.8 6.9 24.9c0 21.3-13.9 39.4-33.1 45.6c.7 3.3 1.1 6.8 1.1 10.4c0 26.5-21.5 48-48 48H294.5c-19 0-37.5-5.6-53.3-16.1l-38.5-25.7C176 420.4 160 390.4 160 358.3V320 272 247.1c0-29.2 13.3-56.7 36-75l7.4-5.9c26.5-21.2 44.6-51 51.2-84.2l2.3-11.4c5.2-26 30.5-42.9 56.5-37.7zM32 192H96c17.7 0 32 14.3 32 32V448c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32V224c0-17.7 14.3-32 32-32z"></path>
                                      </svg>
                                      <label class="dislike-label"><?= $project['noLike'] ?></label>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                  <?Php
                    }
                  }
                  ?>

                </div>
        </section>
      <?Php
      }
      ?>

      <div class="row">
        <div class="col-12">
          <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-body-tertiary bg-products">
            <div class="col-md-6 p-lg-5 mx-auto my-5 bg-box-container">
              <h2 class="display-3 fw-bold">Diseñando para ti</h2>
              <h3 class="fw-normal text-muted mb-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit eaque recusandae modi omnis, aspernatur enim, accusantium, placeat temporibus vitae nulla in laudantium assumenda repudiandae ipsa vero, reiciendis quam esse hic.</h3>
              <div class="d-flex gap-3 justify-content-center lead fw-normal">
                <a class="icon-link" href="#">
                  Learn more
                  <svg class="bi">
                    <use xlink:href="#chevron-right" />
                  </svg>
                </a>
                <a class="icon-link" href="#">
                  Buy
                  <svg class="bi">
                    <use xlink:href="#chevron-right" />
                  </svg>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- SERVICES -->
      <?Php
      if ($titleServices) {
        $titulo = explode("-", $titleServices);
      ?>
        <section id="services" class="row">
          <div class="col-12">

            <div class="container">
              <h2 class="text-center"><?= $titulo[0] ?><em><?= $titulo[1] ?></em></h2>
              <p class="parrafo text-center"> <?= $descriptionServices ?> </p>
              <div class="gallery">

                <?Php
                foreach ($services as $service) {
                ?>

                  <div class="col-md-4">
                    <div class="image">
                      <div class="card-product" data-service="<?= $service['serviceId'] ?>" data-bs-toggle="modal" data-bs-target="#servicesDetail<?= $service['serviceId'] ?>">
                        <div class="container-image">
                          <img src="<?= base_url('assets/img/') . $service['serviceImagen'] ?>" alt="" class="image-circle">
                        </div>
                        <div class="content">
                          <div class="detail">
                            <h4 class="card-title"><?= $service['serviceTitle'] ?></h4>
                            <p class="service-price">$<?= $service['servicePrice'] ?></p>
                          </div>
                          <div class="product-image">
                            <div class="box-image">
                              <img src="<?= base_url('assets/img/') . $service['serviceImagen'] ?>" alt="$service['serviceImagen']" class="img-product">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Modal Services Details -->
                  <div class="modal fade" id="servicesDetail<?= $service['serviceId'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="serviceDetail<?= $service['serviceId'] ?>Label" aria-hidden="true">
                    <div class="modal-lg modal-dialog modal-dialog-centered modal-dialog-scrollable">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h3 class="modal-title" id="exampleModalLabel"><?= $service['serviceTitle'] ?></h3>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <div class="container-fluid mt-5">
                            <div class="container">
                              <div class="row">
                                <div class="col-md-8">
                                  <?= $service['serviceDescription'] ?>
                                </div>
                                <div class="col-md-4">
                                  <img src="<?= base_url('assets/img/') . $service['serviceImagen'] ?>" alt="$service['serviceImagen']" class=" img-fluid img-thumbnail img-card">
                                </div>

                              </div>
                            </div>
                            <div class="row mt-2">
                              <?Php
                              if ($cliente != '') {
                              ?>
                                <div class="col-2">
                                  <button class="btn-buy" data-id="<?= $service['serviceId'] ?>"><?= lang('buy') ?></button>
                                </div>
                                <div class="col-2">
                                  <input type="number" class="form-control form-control-sm cantidad" name="cant" id="cant<?= $service['serviceId'] ?>" min="1" maxlength="10" size="50" data-id="<?= $service['serviceId'] ?>" value="1" />
                                </div>
                                <div class="col-6 text-end service-price">
                                  <h4 id="<?= $service['serviceId'] ?>" data-price="<?= $service['servicePrice'] ?>"> $<?= $service['servicePrice'] ?> </h4>
                                </div>
                              <?Php
                              } else {

                                echo '<div class="col-md-4">';
                                echo '<button class="btn btn-block btn-grey btn-disabled">' . lang('buy') . '</button>';
                                echo '</div>';
                                echo '<div class="col-md-4">';
                                echo  '<p class="text-bg-info">' . lang('log-first') . '</p>';
                                echo '</div>';
                              }
                              ?>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                          <!-- <button type="button" class="btn btn-primary">Understood</button> -->
                        </div>
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


      <!-- <section class="row">
        <div class="col-12">
          <h3>Esta es la última sección de mi página web</h3>

        </div>
      </section> -->
    </div>
  </main>
  <footer class="footer bg-body-tertiary">
    <div class="container">
      <ul class="social-icons">
        <?Php
        foreach ($social as $red) {
        ?>
          <li><a href="<?= $red['socialUrl'] ?>" target="_blank"><i class="fa <?= $red['socialIcon'] ?>"></i></a></li>
        <?Php
        }
        ?>
      </ul>
      <p>Copyright &copy; <span id="fecha"> </span> <?= $company ?>. <?= lang('Design') ?> <?= $creador ?></p>
    </div>
  </footer>



  < <!-- Modal login client -->
    <div class="modal fade" id="loginClient" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="loginClientLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel"><?= lang('loginClient') ?></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">


            <form method="POST" id="frmloginClient">
              <!-- Email input -->
              <div class="form-group mb-4">
              <label class="form-label" for="email"> <?= lang('email') ?></label>
                <input type="email" id="email" name="email" class="form-control" required />
                
              </div>

              <!-- Password input -->
              <div class="form-group mb-4">
                <!-- <input type="password" id="password" class="form-control" /> -->
                <label class="form-label" for="password"> <?= lang('clave') ?></label>
                <div class="input-group mb-3">
                  <input type="password" class="form-control" id="password" name="password" aria-label="password" aria-describedby="togglePassword" required>
                  <div class="input-group-append">
                    <i id="togglePassword" class="fa fa-eye input-group-text"></i>
                  </div>
                </div>
               
              </div>
              <div class="row mb-4 text-center">

                <div class="col">
                  <!-- Simple link -->
                  <a href="#!"><?= lang('Forgot') ?></a>
                </div>
              </div>

              <!-- Submit button -->
              <div class="col text-center">
                <input type="submit" id="submit" class="btn btn-primary btn-block mb-4" value="<?= lang('loginClient') ?>">
              </div>

            </form>

            <div id="massage" class=" "></div>


          </div>
          <div class="modal-footer">
            <!-- Register buttons -->
            <div class="text-center">
              <p><?= lang('Notmember') ?> <a href="<?= base_url('cliente/nuevo') ?>"><?= lang('Register') ?></a></p>
            </div>

          </div>
        </div>
      </div>
    </div>


    <!-- CARRITO -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
      <div class="offcanvas-header">
        <h5 id="offcanvasRightLabel">Carrito</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <div class="container" id="contenido-carrito">

          <?php //TODO: falta agregar la pre carga  
          ?>

        </div>
      </div>
    </div>


    <script src="<?= base_url() ?>assets/vendor/jquery/jquery.min.js"></script>

    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script> -->
    <script src="<?= base_url('assets/plantillas/shop/js') ?>/popper.min.js"></script>

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script> -->
    <script src="<?= base_url('assets/plantillas/shop/js') ?>/bootstrap.min.js"></script>


    <script>
      // ################# constantes en js con valores en php ############################
      const enviando = "<?= lang('send') ?>";
      const url_base = "<?= base_url() ?>";
      const titleButton = "<?= lang('loginClient') ?>";
      const cliente = "<?= $cliente ?>";
      const etiqueta = "Cliente";
      const log_first = "<?= lang('log-first')  ?>";
      /**
       * function document ready
       *  se ejecuta después que todo el documento esta cargado
       */
      $(document).ready(function() {

        // ########### cambia la etiqueta del menu de iniciar session a clientes si la session existe ###########
        if (cliente !== "") {
          var idCliente = cliente;
          $("#navbarDropdown").html(etiqueta);
        };

        // código que obtiene el año actual para el copyright
        var year = new Date().getFullYear();
        $("#fecha").html(year);

        // código para mostrar u ocultar el valor del campo password en el form login cliente
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');
        togglePassword.addEventListener('click', function(e) {
          // toggle the type attribute
          const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
          password.setAttribute('type', type);
          // toggle the eye slash icon
          this.classList.toggle('fa-eye-slash');
        });


        // ############ function ajax para que el cliente haga login ##########################
        $("#frmloginClient").submit(function(event) {

          event.preventDefault();

          var formData = new FormData($("#frmloginClient")[0]);

          $.ajax({
            type: $(this).attr("method"),
            url: url_base + "cliente/login",
            data: $('#frmloginClient').serialize(),
            cache: false,
            processData: false,

            beforeSend: function() {
              $("#submit").attr("value", enviando);
              $("#submit").attr("disabled", "disabled");
            },
            success: function(data) {
              $("#massage").removeClass("bg-danger text-white");
              $("#massage").removeClass("bg-success text-light");
              $("#massage").addClass("bg-success text-light");
              $("#massage").show();
              $("#massage").html(data);

              setTimeout(function() {
                location.href = url_base;
              }, 3000);

            },
            error: function(data) {
              $("#massage").removeClass("bg-success text-light");
              $("#massage").addClass("bg-danger text-white");
              $("#massage").show();
              $("#massage").html(data);
              $("#submit").attr("value", titleButton);

              setTimeout(() => {
                $("#massage").hide();
                $("#submit").removeAttr("disabled");
              }, 2000);
            },
          });
          return false;
        });


        // ############### function ajax para agregar like proyecto #########################
        // Seleccionar todos los elementos con la clase `like-label`
        var projectsLike = $(".like");

        // Escuchar el evento click en todos los elementos
        projectsLike.click(function() {
          // Obtener el valor de la propiedad data-id
          var id = $(this).data("id");

          // Realizar una petición AJAX
          $.ajax({
            type: "POST",
            url: url_base + "proyectos/like/",
            data: {
              id
            },

            // La función que se ejecuta cuando la petición se completa
            success: function(data) {
              location.href = url_base;
            },

            // La función que se ejecuta cuando la petición falla
            error: function() {
              alert("La petición AJAX falló");
            }
          });
        });

        // ################# function ajax para agregar dislike proyecto #####################
        // Seleccionar todos los elementos con la clase `like-label`
        var projectsDislike = $(".dislike");

        // Escuchar el evento click en todos los elementos
        projectsDislike.click(function() {
          // Obtener el valor de la propiedad data-id
          var id = $(this).data("id");

          // Realizar una petición AJAX
          $.ajax({
            type: "POST",
            url: url_base + "proyectos/disLike/",
            data: {
              id
            },

            // La función que se ejecuta cuando la petición se completa
            success: function(data) {
              location.href = url_base;
            },

            // La función que se ejecuta cuando la petición falla
            error: function() {
              alert("La petición AJAX falló");
            }
          });
        });


        //  ######### función para actualizar el precio a la hora de comprar un producto o servicio
        //dependiendo de la cantidad ###########################
        // Seleccionar el input tipo numérico
        var cantidad = $(".cantidad");
        // Establecer el patrón para el input tipo numérico
        cantidad.attr("pattern", "^[0-9]\\d*$");

        // Agregar un evento `change` al input tipo numérico
        cantidad.on("change", function() {
          var id = $(this).data("id");
          // Seleccionar la etiqueta h4
          var valor = $("#" + id);
          // Obtener el valor del input tipo numérico
          var cantidad_actual = $(this).val();

          // obtener el precio de la propiedad price
          var price = valor.data("price");
          // calcular total
          var total = price * cantidad_actual;
          // Establecer el valor de la etiqueta h4
          valor.html("$" + total.toFixed(2));
        });


        // ####################### función para agregar productos o servicios al carrito #################
        var buttonComprar = $(".btn-buy");
        buttonComprar.click(function() {
          // Obtener el valor de la propiedad data-id del botón y el valor de la cantidad
          var id = $(this).data("id");
          var price = $("#" + id);
          var cantidad = $("#cant" + id).val();
          var priceTotal = price.data("price") * cantidad;

          // Realizar una petición AJAX
          $.ajax({
            type: "POST",
            url: url_base + "carrito/addProducto/",
            data: {
              id,
              cantidad,
              idCliente,
              priceTotal,
            },

            // La función que se ejecuta cuando la petición se completa
            success: function(data) {
              location.href = url_base;
            },

            // La función que se ejecuta cuando la petición falla
            error: function() {
              alert("La petición AJAX falló");
            }
          });
        });



        // ###################### cargar contenido del carrito ###########################
        $('#shopping-card').click(function() {


          if (cliente !== "") {
            // Realizar una petición AJAX
            $.ajax({
              type: "POST",

              url: url_base + "carrito/viewContenido/",
              data: {
                cliente
              },

              // La función que se ejecuta cuando la petición se completa
              success: function(data) {


                // Agregar los elementos del carrito al DOM
                $("#contenido-carrito").html(data);


              },

              // La función que se ejecuta cuando la petición falla
              error: function() {
                alert("La petición AJAX falló");
              }
            });
          } else {
            const mensajeCarrito = `
            <div class="shopping-cart row">
              <p>
                <h2 id="log-first" class="text-center col-md-12"> </h2>
              </p>
            </div>
            `;
            $("#contenido-carrito").html(mensajeCarrito);
            $("#log-first").html(log_first);
          }
        });




      });
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
  $idCliente,
);
?>