<?php $location = 'http://localhost/ses/portal/views/index.php?page=';?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand " href="/ses/portal/views/"  >
    <img src="../assets/img/logo.png" alt="" class="img-fluid">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/ses/portal/views/"><i class="fas fa-home"></i> ACLC HOME <span class="sr-only">(current)</span></a>
      </li>
      <?php 
        $navs = include('../config/navs.php');
        
        foreach($navs as $nav => $val) {
          if(isset($_SESSION["isLogin"]) && $_SESSION["isLogin"]) {
            if(in_array($_SESSION["userData"]["type"],$val["slug"])) {
              echo '<li class="nav-item " data-href="'.$val["href"].'">
                    <a class="nav-link" href="'.$location.$val["href"].'">'.$val["icon"].' '.$nav.'</a>
                  </li>';
            } 
          } 
          
        }
      ?>
    </ul>
    <?php if(isset($_SESSION["isLogin"]) && $_SESSION["isLogin"]) {?>
    <a href="javascript:void(0);" class="mr-3 myaccount"><i class="fas fa-user"></i> <?php echo $_SESSION["userData"]["lastname"] .', '.$_SESSION["userData"]["firstname"];?></a>
    <a href="javascript:void(0);" class="btnLogout"><i class="fas fa-sign-out-alt"></i> Logout</a>
    <?php }?>
  </div>
</nav>