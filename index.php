<?php
require "lib/DB.php";
require "lib/content.php";
require "lib/category.php";
error_reporting(E_ERROR | E_PARSE);

$content=new content();
$contentList=$content->getContentList();

?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <title>CMS - Blog list</title>

    <!-- Styles -->
    <link href="design/front/css/core.min.css" rel="stylesheet">
    <link href="design/front/css/thesaas.min.css" rel="stylesheet">
    <link href="design/front/css/style.css" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="design/front/img/apple-touch-icon.png">
    <link rel="icon" href="design/front/img/favicon.png">
  </head>

  <body>


    <!-- Topbar -->
    <nav class="topbar topbar-inverse topbar-expand-md topbar-sticky">
      <div class="container">
        
        <div class="topbar-left">
          <button class="topbar-toggler">&#9776;</button>
          <a class="topbar-brand" href="index.php">
            <h1 style="color:#E1D9D1">CMS</h1>
            <!-- <img class="logo-default" src="design/front/img/logo.png" alt="logo">
            <img class="logo-inverse" src="design/front/img/logo-light.png" alt="logo"> -->
          </a>
        </div>


        <div class="topbar-right">
          <ul class="topbar-nav nav">
            <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
            <li class="nav-item">
              <a class="nav-link" href="admin/category/viewCategory.php">Admin </a>

            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">Headers <i class="fa fa-caret-down"></i></a>
              <div class="nav-submenu">
                <a class="nav-link" href="header-color.html">Solid Color</a>
                <a class="nav-link" href="header-gradient.html">Gradient</a>
                <a class="nav-link" href="header-particle.html">Particle</a>
                <a class="nav-link" href="header-typing.html">Typing Text</a>
                <a class="nav-link" href="header-image.html">Background Image</a>
                <a class="nav-link" href="header-video.html">Background Video</a>
                <a class="nav-link" href="header-parallax.html">Parallax</a>
                <a class="nav-link" href="header-slider.html">Slider</a>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">Blocks <i class="fa fa-caret-down"></i></a>
              <div class="nav-submenu cols-2">
                <a class="nav-link" href="block-feature.html">Feature</a>
                <a class="nav-link" href="block-feature-textual.html">Textual feature</a>
                <a class="nav-link" href="block-content.html">Content</a>
                <a class="nav-link" href="block-portfolio.html">Portfolio</a>
                <a class="nav-link" href="block-pricing.html">Pricing</a>
                <a class="nav-link" href="block-cta.html">Call to action</a>
                <a class="nav-link" href="block-testimonial.html">Testimonial</a>
                <a class="nav-link" href="block-team.html">Team</a>
                <a class="nav-link" href="block-contact.html">Contact</a>
                <a class="nav-link" href="block-signup.html">Signup</a>
                <a class="nav-link" href="block-subscribe.html">Subscribe</a>
                <a class="nav-link" href="block-partner.html">Partner</a>
                <a class="nav-link" href="block-topbar.html">Topbar</a>
                <a class="nav-link" href="block-footer.html">Footer</a>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link active" href="#">Blog <i class="fa fa-caret-down"></i></a>
              <div class="nav-submenu">
                <a class="nav-link" href="blog-classic.html">Layout classic</a>
                <a class="nav-link" href="blog-grid.html">Layout grid</a>
                <a class="nav-link active" href="blog-list.html">Layout list</a>
                <a class="nav-link" href="blog-sidebar.html">Single sidebar</a>
                <a class="nav-link" href="blog-single.html">Single post</a>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">Shop <i class="fa fa-caret-down"></i></a>
              <div class="nav-submenu">
                <a class="nav-link" href="shop-list.html">Product list</a>
                <a class="nav-link" href="shop-single.html">Single product</a>
                <a class="nav-link" href="shop-cart.html">Cart overview</a>
                <a class="nav-link" href="shop-checkout.html">Checkout</a>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">Pages <i class="fa fa-caret-down"></i></a>
              <div class="nav-submenu">
                <a class="nav-link" href="page-how-it-works.html">How it works</a>
                <a class="nav-link" href="page-pricing.html">Pricing</a>
                <a class="nav-link" href="page-portfolio.html">Portfolio</a>
                <a class="nav-link" href="page-project.html">Project</a>
                <a class="nav-link" href="page-job.html">Jobs</a>
                <a class="nav-link" href="page-job-single.html">Job Info</a>
                <a class="nav-link" href="page-demo.html">Request Demo</a>
                <a class="nav-link" href="page-press.html">Press</a>
                <a class="nav-link" href="page-about.html">About</a>
                <a class="nav-link" href="page-contact.html">Contact</a>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">Extra <i class="fa fa-caret-down"></i></a>
              <div class="nav-submenu">
                <a class="nav-link" href="page-login.html">Login</a>
                <a class="nav-link" href="page-register.html">Register</a>
                <a class="nav-link" href="page-faq.html">FAQ</a>
                <a class="nav-link" href="page-coming-soon.html">Coming soon</a>
                <a class="nav-link" href="page-privacy.html">Privacy Policy</a>
                <a class="nav-link" href="page-404.html">Error 404</a>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">Doc <i class="fa fa-caret-down"></i></a>
              <div class="nav-submenu align-right">
                <a class="nav-link" href="doc-element.html">Elements</a>
                <a class="nav-link" href="doc-component.html">Components</a>
                <a class="nav-link" href="doc-section.html">Sections</a>
                <a class="nav-link" href="doc-card.html">Cards</a>
                <a class="nav-link" href="doc-typography.html">Typography</a>
                <a class="nav-link" href="doc-utility.html">Utility Classes</a>
              </div>
            </li>
          </ul>
        </div>

      </div>
    </nav>
    <!-- END Topbar -->



    <!-- Header -->
    <header class="header header-inverse" style="background-color: #9ac29d">
      <div class="container text-center">

        <div class="row">
          <div class="col-12 col-lg-8 offset-lg-2">

            <h1>Latest Blog Posts</h1>
            <p class="fs-20 opacity-70">Read and get updated on how we progress.</p>

          </div>
        </div>

      </div>
    </header>
    <!-- END Header -->




    <!-- Main container -->
    <main class="main-content">




      <!--
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      | Basic cards
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      !-->
      <section class="section bg-gray">
        <div class="container">
          <?php foreach($contentList as $contentD): ?>
          <div class="card mb-30">
            <div class="row align-items-center h-full">
              <div class="col-12 col-md-4">
                <a href="singleBlog.php?id=<?= $contentD['id'];?>"><img src="design/upload/<?= $contentD['cover'];?>" alt="..."></a>
              </div>

              <div class="col-12 col-md-8">
                <div class="card-block">
                  <h4 class="card-title"><?= $contentD['title'];?></h4>
                  <p class="card-text"><?= $contentD['short_desc'];?></p>
                  <a class="fw-600 fs-12" href="singleBlog.php?id=<?= $contentD['id'];?>">Read more <i class="fa fa-chevron-right fs-9 pl-8"></i></a>
                </div>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
          <nav class="flexbox mt-30">
            <a class="btn btn-white disabled"><i class="ti-arrow-left fs-9 mr-4"></i> Newer</a>
            <a class="btn btn-white" href="#">Older <i class="ti-arrow-right fs-9 ml-4"></i></a>
          </nav>


        </div>
      </section>






    </main>
    <!-- END Main container -->






    <!-- Footer -->
    <footer class="site-footer">
      <div class="container">
        <div class="row gap-y align-items-center">
          <div class="col-12 col-lg-3">
            <p class="text-center text-lg-left">
              <a href="index.php">
              <h1 >CMS</h1>
                <!-- <img src="design/front/img/logo.png" alt="logo"> -->
              </a>
            </p>
          </div>

          <div class="col-12 col-lg-6">
            <ul class="nav nav-primary nav-hero">
              <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Blog</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Features</a>
              </li>
              <li class="nav-item hidden-sm-down">
                <a class="nav-link" href="#">Pricing</a>
              </li>
              <li class="nav-item hidden-sm-down">
                <a class="nav-link" href="#">Contact</a>
              </li>
            </ul>
          </div>

          <div class="col-12 col-lg-3">
            <div class="social text-center text-lg-right">
              <a class="social-facebook" href="https://www.facebook.com/thethemeio"><i class="fa fa-facebook"></i></a>
              <a class="social-twitter" href="https://twitter.com/thethemeio"><i class="fa fa-twitter"></i></a>
              <a class="social-instagram" href="https://www.instagram.com/thethemeio/"><i class="fa fa-instagram"></i></a>
              <a class="social-dribbble" href="https://dribbble.com/thethemeio"><i class="fa fa-dribbble"></i></a>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- END Footer -->



    <!-- Scripts -->
    <script src="design/front/js/core.min.js"></script>
    <script src="design/front/js/thesaas.min.js"></script>
    <script src="design/front/js/script.js"></script>

  </body>
</html>