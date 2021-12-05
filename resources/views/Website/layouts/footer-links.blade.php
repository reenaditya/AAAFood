 <!-- jQuery -->
    <script src="assets/js/jquery.min.js"></script>
    <!-- Popper -->
    <script src="assets/js/popper.min.js"></script>
    <!-- Bootstrap -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Range Slider -->
    <script src="assets/js/ion.rangeSlider.min.js"></script>
    <!-- Swiper Slider -->
    <script src="assets/js/swiper.min.js"></script>
    <!-- Nice Select -->
    <script src="assets/js/jquery.nice-select.min.js"></script>
    <!-- magnific popup -->
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <!-- Maps
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDnd9JwZvXty-1gHZihMoFhJtCXmHfeRQg"></script> -->
    <!-- sticky sidebar -->
    <script src="assets/js/sticksy.js"></script>
    <!-- Munch Box Js -->
    <script src="assets/js/quickmunch.js"></script>
    <!-- /Place all Scripts Here -->
    @stack('script')
    <script type="text/javascript">
      var base_url = '{{url('/')}}';
    </script> 
    <script>
      $(function(){
          var swiper_services = new Swiper('#slideshow_services', {
            slidesPerView: 2,
            spaceBetween: 10,
            freeMode: true,
            autoplay:false,
            loop: true,
            nextButton: '.swiper-button-next',
            prevButton: '.swiper-button-prev',
            breakpoints: {
                // when window width is <= 499px
                499: {
                    slidesPerView: 1,
                    spaceBetweenSlides: 10
                },
                // when window width is <= 999px
                999: {
                    slidesPerView: 6,
                    spaceBetweenSlides: 10
                }
            }
        });
    });
</script>
<script>
      $(function(){
          var swiper_services = new Swiper('#slideshow_services2', {
            slidesPerView: 2,
            spaceBetween: 20,
            freeMode: true,
            autoplay:false,
            loop: true,
            nextButton: '.swiper-button-next',
            prevButton: '.swiper-button-prev',
            breakpoints: {
                // when window width is <= 499px
                499: {
                    slidesPerView: 2,
                    spaceBetweenSlides: 20
                },
                // when window width is <= 999px
                999: {
                    slidesPerView: 4,
                    spaceBetweenSlides: 20
                }
            }
        });
    });
</script>
<script>
      $(function(){
          var swiper_services = new Swiper('#slideshow_services11', {
            slidesPerView: 2,
            spaceBetween: 10,
            freeMode: true,
            autoplay:false,
            loop: true,
            nextButton: '.swiper-button-next',
            prevButton: '.swiper-button-prev',
            breakpoints: {
                // when window width is <= 499px
                499: {
                    slidesPerView:2,
                    spaceBetweenSlides: 10
                },
                // when window width is <= 999px
                999: {
                    slidesPerView: 6,
                    spaceBetweenSlides: 10
                }
            }
        });

        $(document).on('click','.coming_soon',function () {
            alert('coming soon! Under processing');
        })
    });
</script>

 <script>
        $(document).ready(function() {
          $(".st1").click(function() {
                var thisData = $(this);
                var val = thisData.attr("dataval");
                thisData.parent().find("i.rating").css("color","black");
                thisData.parent().find(".st1").css("color","#fcb71b");
                thisData.parent().find("input.order_star_rating").val(val);
          });
          $(".st2").click(function() {
                var thisData = $(this);
                var val = thisData.attr("dataval");
                thisData.parent().find("i.rating").css("color","black");
                thisData.parent().find(".st1,.st2").css("color","#fcb71b");
                thisData.parent().find("input.order_star_rating").val(val);

          });
          $(".st3").click(function() {
                var thisData = $(this);
                var val = thisData.attr("dataval");
                thisData.parent().find("i.rating").css("color","black");
                thisData.parent().find(".st1,.st2,.st3").css("color","#fcb71b");
                thisData.parent().find("input.order_star_rating").val(val);

          });
          $(".st4").click(function() {
                var thisData = $(this);
                var val = thisData.attr("dataval");
                thisData.parent().find("i.rating").css("color","black");
                thisData.parent().find(".st1,.st2,.st3,.st4").css("color","#fcb71b");
                thisData.parent().find("input.order_star_rating").val(val);
          });
          $(".st5").click(function() {
                var thisData = $(this);
                var val = thisData.attr("dataval");
                thisData.parent().find("i.rating").css("color","black");
                thisData.parent().find(".st1,.st2,.st3,.st4,.st5").css("color","#fcb71b");
                thisData.parent().find("input.order_star_rating").val(val); 
          });
        });
  </script>
</body>

</html>
