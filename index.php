<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="slideshow-container.css">
    <link rel="stylesheet" href="w3.css">
    <!-- attempt to reload images on change, does not work: -->
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    THIS IS WHERE I'M STUCK. IMAGES don't reload.
  </head>

  <body>
    <!-- Slideshow container -->
    <div class="slideshow-container">

      <!-- Full-width images with number and caption text -->
      <div class="mySlides fade" data-timeout="2000">
         <img src="resources/updated_image.jpg?v=<?php time(); ?>" style="width:100%">
      </div>

      <div class="mySlides fade" data-timeout="3000" data-file-rnd="resources/rnd.txt" data-file-sales="resources/sales.txt" data-file-marketing="resources/marketing.txt" data-file-management="resources/management.txt">
        <div class="w3-container w3-blue">
          <h1 align="center" id="status_rnd">jj</h1>
          <h6 align="right">R&D</h6>
        </div>
        <br>
        <div class="w3-container w3-red">
          <h1 align="center" id="status_sales"></h1>
          <h6 align="right">Sales</h6>
        </div>
        <br>
        <div class="w3-container w3-green">
          <h1 align="center" id="status_marketing"></h1>
          <h6 align="right">Marketing</h6>
        </div>
        <br>
        <div class="w3-container w3-orange">
          <h1 align="center" id="status_management"></h1>
          <h6 align="right">Management</h6>
        </div>
      </div>
<!--
      <div class="mySlides fade">
        <div class="numbertext">1 / 3</div>
        <img src="img1.jpg" style="width:100%">
      </div>

      <div class="mySlides fade">
        <div class="numbertext">2 / 3</div>
        <img src="img2.jpg" style="width:100%">
        <div class="text">Caption Two</div>
      </div>
-->
      <!-- Next and previous buttons -->
      <!--
      <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
      <a class="next" onclick="plusSlides(1)">&#10095;</a>
      -->
    </div>
    <br>

    <!-- The dots/circles -->
    <!--
    <div style="text-align:center">
      <span class="dot" onclick="currentSlide(1)"></span> 
      <span class="dot" onclick="currentSlide(2)"></span> 
      <span class="dot" onclick="currentSlide(3)"></span >
    </div>
     -->
    <p id="debug"></p>

    <!--<script src="jquery-3.3.1.min.js"></script>-->

    <script src="slideshow-container.js"></script>
  </body>

</html>
