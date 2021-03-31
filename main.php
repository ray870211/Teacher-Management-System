<?php
session_start();
if (isset($_SESSION['userID'])){
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="/bootstrap-4.5.3-dist/css/bootstrap.min.css"> -->
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>

    </style>
</head>
<body>
 <!-- Just an image -->
 <div class="banner">
 <!-- Just an image -->
<nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="#">
                <i class="fas fa-ambulance"></i>
                <i class="fas fa-home"></i>
          <img src="/docs/4.5/assets/brand/bootstrap-solid.svg" width="30" height="30" alt="" loading="lazy">
        </a>
      </nav>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                              <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="https://picsum.photos/id/237/600/200" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                  <img src="https://picsum.photos/id/233/600/200" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                  <img src="https://picsum.photos/id/223/600/200" class="d-block w-100" alt="...">
                                </div>
                              </div>
                            </div>
                    </div>
                </div>
            </div>
        

 </div>



<div class="footer bg-secondary">
    <!-- Footer -->
<footer class="page-footer font-small special-color-dark pt-4">

        <!-- Footer Elements -->
        <div class="container">
      
          <!--Grid row-->
          <div class="row">
      
            <!--Grid column-->
            <div class="col-md-6 mb-4">
      
              <!-- Form -->
              <form class="form-inline">
                <input class="form-control form-control-sm mr-3 w-75" type="text" placeholder="Search"
                  aria-label="Search">
                <i class="fas fa-search" aria-hidden="true"></i>
              </form>
              <!-- Form -->
      
            </div>
            <!--Grid column-->
      
            <!--Grid column-->
            <div class="col-md-6 mb-4">
      
              <form class="input-group">
                <input type="text" class="form-control form-control-sm" placeholder="Your email"
                  aria-label="Your email" aria-describedby="basic-addon2">
                <div class="input-group-append">
                  <button class="btn btn-sm btn-outline-white my-0" type="button">Sign up</button>
                </div>
              </form>
      
            </div>
            <!--Grid column-->
      
          </div>
          <!--Grid row-->
      
        </div>
        <!-- Footer Elements -->
      
        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2020 Copyright:
          <a href="https://mdbootstrap.com/"> MDBootstrap.com</a>
        </div>
        <!-- Copyright -->
      
      </footer>
      <!-- Footer -->
</div>
<script src="https://kit.fontawesome.com/40854dc1c9.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<!-- 
      <script src="/jquery/jquery-3.5.1.min.js"></script>
      <script src="/bootstrap-4.5.3-dist/js/bootstrap.js"></script> -->
</body>
</html>





