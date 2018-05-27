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
         <img src="resources/updated_image.jpg?v=<?= file_get_contents('./timestamp.txt') ?>" style="width:100%">
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
    </div>
    <br>
    <p id="debug"></p>

    <!--<script src="jquery-3.3.1.min.js"></script>-->
    <script type="application/javascript">
        let image = document.querySelector('.mySlides img'),
            src = image.getAttribute('src');
        const imageVersion = src.substring(src.indexOf('=') + 1);

        function loadTimestamp() {
            let xmlHR = new XMLHttpRequest();

            xmlHR.onreadystatechange = function() {
                if (xmlHR.readyState == XMLHttpRequest.DONE) {
                    if (xmlHR.status == 200) {
                        if (xmlHR.responseText !== imageVersion) {
                            image.setAttribute('src', src.substring(0,src.indexOf('=') + 1) + xmlHR.responseText);
                        }
                    }
                    else if (xmlHR.status == 400) {
                        alert('There was an error 400');
                    }
                    else {
                        alert('something else other than 200 was returned');
                    }
                }
            };

            xmlHR.open("GET", "timestamp.txt?v=" + new Date().getTime(), true);
            xmlHR.send();
            setTimeout(loadTimestamp, 5000);
        }
        loadTimestamp();
    </script>

    <script src="slideshow-container.js"></script>
  </body>

</html>
