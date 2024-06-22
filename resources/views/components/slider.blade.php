<div class="full-screen-container">
          <div class="banner">
            <div class="mySlides">
              <img src="img/slider_1.webp" style="width: 100%" />
            </div>
    
            <div class="mySlides">
              <img src="img/slider_2.webp" style="width: 100%" />
            </div>
    
            <div class="mySlides">
              <img src="img/slider_2.webp" style="width: 100%" />
            </div>
    
            <div class="aaaa">
              <a class="prev m-3" onclick="plusSlides(-1)">❮</a>
              <a class="next m-3" onclick="plusSlides(1)">❯</a>
            </div>
    
            <div class="caption-container">
              <p id="caption"></p>
            </div>
    
            <script>
              let slideIndex = 1;
              showSlides(slideIndex);
    
              function plusSlides(n) {
                showSlides((slideIndex += n));
              }
    
              function currentSlide(n) {
                showSlides((slideIndex = n));
              }
    
              function showSlides(n) {
                let i;
                let slides = document.getElementsByClassName("mySlides");
                let dots = document.getElementsByClassName("demo");
                let captionText = document.getElementById("caption");
                if (n > slides.length) {
                  slideIndex = 1;
                }
                if (n < 1) {
                  slideIndex = slides.length;
                }
                for (i = 0; i < slides.length; i++) {
                  slides[i].style.display = "none";
                }
                for (i = 0; i < dots.length; i++) {
                  dots[i].className = dots[i].className.replace(" active", "");
                }
                slides[slideIndex - 1].style.display = "block";
                dots[slideIndex - 1].className += " active";
                captionText.innerHTML = dots[slideIndex - 1].alt;
              }
            </script>
          </div>
        </div>