var slideIndex = 0;
carousel();

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1} 
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none"; 
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block"; 
  dots[slideIndex-1].className += " active";
}

function send_data_from_file(id, filename) {
  var txtFile = new XMLHttpRequest();

  txtFile.open("GET", filename, true);
  txtFile.onreadystatechange = function() {
    if (txtFile.readyState === 4) {  // Makes sure the document is ready to parse.
      if (txtFile.status === 200 || txtFile.status == 0) {  // Makes sure it's found the file.
        var allText = txtFile.responseText;
        //alert(filename);
        //alert(txtFile.readyState);
        //alert(txtFile.status);
        //alert(txtFile.statusText);
        //alert(txtFile.responseText);
        //lines = txtFile.responseText.split("\n"); // Will separate each line into an array
        document.getElementById(id).innerHTML = allText;
      }
    }
  }
  txtFile.setRequestHeader('pragma', 'no-cache');
  txtFile.send();
}

function carousel() {
  var i;
  var filename;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none"; 
  }
  slideIndex++;
  if (slideIndex >= x.length) {slideIndex = 0}
  x[slideIndex].style.display = "block";
  //document.getElementById("debug").innerHTML = x[slideIndex-1].dataset.timeout;
  timeout = x[slideIndex].dataset.timeout;
  if (!timeout) {
    timeout = 500; // Default
  }

  // The info in the files is not automatically updated. Even on refresh!
  // Force reload with Ctrl+F5. How to make this automatic?
  //alert("carousel");
  filename = x[slideIndex].dataset.fileRnd;
  if (filename) {
    //alert("reading rnd");
    send_data_from_file("status_rnd", filename);
  }
  filename = x[slideIndex].dataset.fileSales;
  if (filename) {
    send_data_from_file("status_sales", filename);
  }
  filename = x[slideIndex].dataset.fileMarketing;
  if (filename) {
    send_data_from_file("status_marketing", filename);
  }
  filename = x[slideIndex].dataset.fileManagement;
  if (filename) {
    send_data_from_file("status_management", filename);
  }

  setTimeout(carousel, timeout);
}
