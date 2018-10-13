<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo ROOT_PATH; ?>assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo ROOT_PATH; ?>assets/md/css/mdb.min.css">
    <link rel="stylesheet" href="<?php echo ROOT_PATH; ?>assets/md/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo ROOT_PATH; ?>assets/md/css/style.css">
    <script src="<?php echo ROOT_PATH; ?>assets/md/js/jquery-3.2.1.min.js"></script>
    <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
    <script src="<?php echo ROOT_PATH; ?>assets/md/js/popper.min.js"></script>
    <title>HacktheboxSQL</title>
  </head>
  <body>
  <!-- nav start -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">SQLi</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item home">
          <a class="nav-link" href="<?php echo HOMEINDEX; ?>">Home</a>
        </li>

        <?php if(Restrict::isloggedin()!==True): ?>
        <li class="nav-item signin">
          <a class="nav-link" href="<?php echo USER_SIGN_IN; ?>">Sign In</a>
        </li>
        <li class="nav-item signup">
          <a class="nav-link" href="<?php echo USER_SIGN_UP; ?>">Sign Up</a>
        </li>
        <?php endif; ?>
      </ul>

      <span class="navbar-text">
        HackTheBox Challenge for SQLi
      </span>
      <?php if(Restrict::isloggedin()): ?>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item float-right">
            <a class="nav-link" href="<?php echo USER_SIGN_OUT; ?>">Sign Out</a>
          </li>
        </ul>
      <?php endif; ?>
    </div>
  </nav>

  <!-- nav end -->

    <div class="container-fluid" style="margin-top: 70px;">
      <?php Messages::display(); ?>
      <?php require($view); ?>
      
      <!-- footer start -->
      <!-- footer end -->
      <?php require('./views/footer.html'); ?>
    </div>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?php echo ROOT_PATH; ?>assets/md/js/bootstrap.min.js"></script>
    <script src="<?php echo ROOT_PATH; ?>assets/md/js/mdb.min.js"></script>
  </body>
</html>