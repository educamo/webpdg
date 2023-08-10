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
  < <meta name="author" content="<?= $creador ?>">
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />



    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">


    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/plantillas/shop/css/style.css">
</head>

<body>
  <header class="container-fluid">
    <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="<?= base_url() ?>">
          <img src="<?= base_url('assets/img/' . $logo) ?>" alt="" width="120" height="50" class="d-inline-block align-text-top">
        </a>

        <a class="btn btn-shoping-cart" data-bs-toggle="offcanvas" href="#offcanvasRight" role="button" aria-controls="offcanvasRight"><i class="fa fa-cart-shopping"></i></a>

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
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" data-bs-toggle="dropdown" aria-expanded="false"> <?= lang('session') ?></a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Iniciar sesión</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Crear una cuenta</a></li>
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

  <section id="aboutUs" class="border-bottom">
    <div class="px-4 pt-5 my-5 text-center">
      <h1 class="display-4 fw-bold text-body-emphasis">Centered screenshot</h1>
      <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>
      </div>
    </div>
  </section>


  <main>
    <div class="container-fluid">


      <!-- PROJECTS -->
      <section id="projects" class="row">
        <div class="col-12">
          <h2 class="text-center">Proyectos Recientes</h2>



          <div class="album py-5">
            <div class="container">

              <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                <div class="col">
                  <div class="card shadow-sm">
                    <img src="<?= base_url() ?>assets/plantillas/shop/images/pared.jpg" alt="" class="img-fluid img-thumbnail d-placeholder-img card-img-top img-card">
                    <div class="card-body">
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                          <div class="like-dislike-container">
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
                        <small class="text-body-secondary">9 mins</small>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col">
                  <div class="card shadow-sm">
                    <img src="<?= base_url() ?>assets/plantillas/shop/images/logos.jpg" alt="" class="img-fluid img-thumbnail d-placeholder-img card-img-top img-card">
                    <div class="card-body">
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                          <div class="like-dislike-container">
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
                        <small class="text-body-secondary">9 mins</small>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col">
                  <div class="card shadow-sm">
                    <img src="<?= base_url() ?>assets/plantillas/shop/images/flayers.jpg" alt="" class="img-fluid img-thumbnail d-placeholder-img card-img-top img-card">
                    <div class="card-body">
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                          <div class="like-dislike-container">
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
                        <small class="text-body-secondary">9 mins</small>
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
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">

                          <div class="like-dislike-container">
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
                        <small class="text-body-secondary">9 mins</small>
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
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">

                          <div class="like-dislike-container">
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
                        <small class="text-body-secondary">9 mins</small>
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
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">

                          <div class="like-dislike-container">
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
                        <small class="text-body-secondary">9 mins</small>
                      </div>
                    </div>
                  </div>
                </div>


              </div>
      </section>

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
      <section id="services" class="row">
        <div class="col-12">

          <div class="container">
            <h2 class="text-center">Productos y Servicios</h2>
            <div class="gallery">
              <div class="col-md-4">
                <div class="image">
                  <div class="card-product">
                    <div class="container-image">
                      <img src="<?= base_url() ?>assets/plantillas/shop/images/producto01.jpg" alt="" class="image-circle">
                    </div>
                    <div class="content">
                      <div class="detail">
                        <span>Lorem <br> Ipsum dolor.</span>
                        <p>$199</p>
                        <button>Buy</button>
                      </div>
                      <div class="product-image">
                        <div class="box-image">
                          <img src="<?= base_url() ?>assets/plantillas/shop/images/producto01.jpg" alt="" class="img-product">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="image">
                  <div class="card-product">
                    <div class="container-image">
                      <img src="<?= base_url() ?>assets/plantillas/shop/images/producto02.jpg" alt="" class="image-circle">
                    </div>
                    <div class="content">
                      <div class="detail">
                        <span>Lorem <br> Ipsum dolor.</span>
                        <p>$199</p>
                        <button>Buy</button>
                      </div>
                      <div class="product-image">
                        <div class="box-image">
                          <img src="<?= base_url() ?>assets/plantillas/shop/images/producto02.jpg" alt="" class="img-product">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="image">
                  <div class="card-product">
                    <div class="container-image">
                      <img src="<?= base_url() ?>assets/plantillas/shop/images/producto03.jpg" alt="" class="image-circle">
                    </div>
                    <div class="content">
                      <div class="detail">
                        <span>Lorem <br> Ipsum dolor.</span>
                        <p>$199</p>
                        <button>Buy</button>
                      </div>
                      <div class="product-image">
                        <div class="box-image">
                          <img src="<?= base_url() ?>assets/plantillas/shop/images/producto03.jpg" alt="" class="img-product">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md4">
                <div class="image">

                  <div class="card-product">
                    <div class="container-image">
                      <svg class="image-circle" xmlns="http://www.w3.org/2000/svg" xml:space="preserve" version="1.1" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd" viewBox="0 0 335.76 195.21" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <defs></defs>
                        <g id="Layer_x0020_1">
                          <metadata id="CorelCorpID_0Corel-Layer"></metadata>
                          <path class="fil-shoes1" d="M332.99 147.72c-0.87,-8.61 -2.43,-5.69 -1.57,-16.93 0.7,-9.13 -0.29,-27.37 -1.46,-37.14 -0.23,-1.89 -0.43,-5.19 -1.06,-8.26l-3.31 -12.45c-0.54,-1.82 -0.16,-2.7 -0.7,-4.36 -1.5,-4.56 -2.81,-6.58 -3.32,-12.45 -0.27,-3.05 0.85,-4.81 -1.89,-7.13 -1.31,-1.11 -2.14,-1.33 -3.74,-1.23 -10.29,0.69 -19.1,-4.44 -28.23,-7.89l-5.37 -2.51c-7.84,-3.92 -16.02,-10.9 -23.59,-15.81 -5.06,-3.28 -2.36,-0.49 -4.87,-5.83 -2.48,-5.29 -11.1,-6.93 -16.27,-8.5 -2.53,-0.76 -1.72,-0.99 -3.98,-1.68 -1.14,-0.35 -3.14,-0.5 -3.63,-0.76 -2.09,-1.09 -7.48,-4.47 -9.41,-4.76 -3.83,-0.58 -7,6.85 -9.59,10.32 -1.8,2.42 -3.23,5.65 -3.64,8.83 -0.22,1.71 -1.74,3.48 -2.63,5.16 -8.27,-3.97 -8.47,-1.81 -9.27,0.86 -1.69,5.63 -4.59,10.52 -6.25,16.27 -3.05,10.56 -6.49,6.16 -11.04,12.04 -1.64,2.12 -0.97,2.39 -3.42,3.9 -5.38,3.33 -9.5,0.93 -16.05,7.03 -10.09,9.4 -3.03,2.62 -9.55,5.65 -1.43,0.66 -3.15,2.01 -4.26,3.06 -2.1,2.01 -1.92,2.22 -3.22,4.67 -11.67,0 -10.17,6.25 -14.88,7.64 -4.6,1.36 -6.75,1.85 -9.78,5.42 -1.14,1.35 -2.27,3.88 -3.22,4.66 -1.61,1.31 -2.53,0.56 -4.95,2.37 -3.18,2.38 -6.99,3.65 -9.48,5.71 -2.55,2.1 -1.2,1.6 -4.73,3.15 -5.39,2.38 -10.82,3.14 -15.13,7.39 -1.64,1.62 -16.4,4.41 -18.66,4.98 -11.91,3.03 -25.8,4.05 -37.36,8.24 -6.1,2.21 -4.85,-2.22 -11.16,4.05 -4.74,4.71 -3.68,10.8 -6.22,16.29 -1.07,2.31 -1.69,1.85 -2.68,5.2l-1.44 5.87c-0.73,4.22 -2.36,6.72 -1.86,12.16l1.02 4.62c1.95,5.05 7.38,8.45 12.31,10.21l13.44 4.02c5.09,1.37 11.26,1.47 16.51,2.63 5.72,1.26 34.16,1.33 39.85,0.87 2.59,-0.21 3.66,0.35 5.75,0.84 3.42,0.8 4.45,-0.44 7.03,-0.28 2.33,0.14 3.31,1.06 6.8,1.09 9.62,0.08 90.6,0.66 98.33,-0.28 4.23,-0.52 10.35,0.74 14.86,0.26 11.36,-1.21 24.28,-2.91 36.17,-1.87 7.05,0.61 29.63,1.01 33.07,-1.51 1.48,0.99 29.81,-0.46 33.72,-0.68 8.78,-0.5 17.29,-6.69 16.8,-15.89 -0.1,-9.37 -1.8,-17.8 -2.75,-27.26z"></path>
                        </g>
                      </svg>
                    </div>
                    <div class="content">
                      <div class="detail">
                        <span>Lorem <br> Ipsum dolor.</span>
                        <p>$199</p>
                        <button>Buy</button>
                      </div>
                      <div class="product-image">
                        <div class="box-image">
                          <svg class="img-product" xmlns="http://www.w3.org/2000/svg" xml:space="preserve" version="1.1" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd" viewBox="0 0 116.83 182.61" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <defs></defs>
                            <g id="Layer_x0020_1">
                              <metadata id="CorelCorpID_0Corel-Layer"></metadata>
                              <path class="fil-shoes2" d="M99.33 20.55c-4.24,-1.91 -3.3,-0.4 -8.3,-3.82 -4.06,-2.78 -12.82,-7.22 -17.68,-9.3 -0.94,-0.4 -2.53,-1.19 -4.13,-1.73l-6.69 -1.8c-0.99,-0.23 -1.3,-0.65 -2.22,-0.84 -2.53,-0.53 -3.82,-0.46 -6.69,-1.8 -1.49,-0.7 -2.01,-1.69 -3.83,-1.04 -0.87,0.31 -1.19,0.64 -1.58,1.41 -2.44,4.98 -7.2,7.7 -11.26,11.02l-2.61 1.83c-3.93,2.6 -9.38,4.53 -13.7,6.73 -2.89,1.47 -0.86,0.97 -4.02,0.7 -3.13,-0.27 -6.21,3.31 -8.33,5.29 -1.04,0.97 -0.92,0.53 -1.85,1.4 -0.47,0.44 -1.08,1.33 -1.33,1.49 -1.07,0.68 -4.09,2.28 -4.75,3.1 -1.3,1.63 1.31,5.1 2.23,7.24 0.64,1.49 1.76,3.02 3.13,4.07 0.74,0.56 1.15,1.74 1.7,2.61 -4.07,2.78 -3.12,3.46 -2.09,4.55 2.17,2.3 3.66,4.97 5.89,7.28 4.1,4.26 1.12,4.68 2.64,8.38 0.55,1.33 0.85,1.09 0.9,2.64 0.11,3.4 -2.12,4.67 -1.04,9.36 1.66,7.23 0.4,2.11 0.06,5.96 -0.07,0.84 0.09,2.01 0.28,2.8 0.37,1.51 0.52,1.49 1.31,2.75 -3.14,5.43 0.18,6.41 -0.44,8.98 -0.6,2.51 -0.95,3.64 -0.11,6.01 0.32,0.9 1.2,2.1 1.3,2.75 0.18,1.1 -0.42,1.33 -0.22,2.94 0.25,2.12 -0.18,4.23 0.11,5.95 0.29,1.75 0.42,0.99 0.2,3.05 -0.34,3.15 -1.45,5.88 -0.63,9.03 0.31,1.2 -2.36,8.82 -2.7,10.03 -1.79,6.36 -5.05,13.1 -6.2,19.61 -0.61,3.43 -2.34,1.66 -1.11,6.28 0.92,3.47 4.04,4.61 5.91,7.28 0.79,1.12 0.41,1.28 1.7,2.65l2.35 2.25c1.77,1.48 2.49,2.9 5.16,4.13l2.42 0.76c2.87,0.45 5.92,-1.16 8.06,-2.98l5.48 -5.18c2.01,-2 3.71,-4.85 5.66,-6.98 2.12,-2.32 9.8,-15.54 11.11,-18.32 0.6,-1.26 1.15,-1.61 1.93,-2.45 1.29,-1.38 0.99,-2.19 1.76,-3.35 0.69,-1.05 1.38,-1.26 2.33,-2.87 2.62,-4.45 24.66,-42 26.3,-45.85 0.9,-2.11 3.13,-4.62 4.12,-6.85 2.49,-5.61 5.17,-12.08 8.85,-17.34 2.18,-3.12 8.43,-13.52 8.19,-15.8 0.86,-0.42 7.8,-14 8.75,-15.88 2.13,-4.22 1.53,-9.85 -2.88,-12.09 -4.39,-2.47 -8.77,-3.95 -13.43,-6.05z"></path>
                            </g>
                          </svg>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

      </section>


      <section class="row">
        <div class="col-12">
          <h3>Esta es la última sección de mi página web</h3>

        </div>
      </section>
    </div>
  </main>
  <footer class="footer mt-auto py-3 bg-body-tertiary">
    <div class="container">
      <p>Copyright &copy; <span id="fecha"> </span> <?= $company ?>. <?= lang('Design') ?> <?= $creador ?></p>
    </div>
  </footer>



  <!-- CARRITO -->
  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
      <h5 id="offcanvasRightLabel">Carrito</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <div class="container">


        <div class="shopping-cart row">
          <ul class="items container">
            <li class="item row">
              <div class="col-md-6">
                <img src="<?= base_url() ?>assets/plantillas/shop/images/product1.jpg" alt="Product 1">
                <h2>Product 1</h2>
                <input type="number" value="1">
              </div>
              <div class="col-md-6">
                <p>$10.00</p>
              </div>
            </li>
            <li class="item row">
              <div class="col-md-6">
                <img src="<?= base_url() ?>assets/plantillas/shop/images/product2.jpg" alt="Product 2">
                <h2>Product 2</h2>
                <input type="number" value="1">
              </div>
              <div class="col-md-6">
                <p>$20.00</p>
              </div>
            </li>
          </ul>
        </div>

        <div class="row">
          <hr class="separador-carrito" />
        </div>


        <div class="total row">
          <div class="col-md-12">
            <h3>Total: $30.00</h3>
          </div>
          <div class="col-md-6">
            <a href="#">Continuar con la compra</a>
          </div>
          <div class="col-md-6">
            <a href="#" class="seguir" data-bs-dismiss="offcanvas">Seguir comprando</a>
            <div>
            </div>
          </div>



        </div>
      </div>
    </div>

    <script src="<?= base_url() ?>assets/vendor/jquery/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>


    <script>
      $(document).ready(function() {
        var year = new Date().getFullYear();
        $("#fecha").html(year);
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
);
?>