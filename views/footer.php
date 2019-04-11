<!-- Footer -->
<footer class="py-5 bg-dark">
  <div class="container">
    <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
  </div>
  <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<!-- <script src="assets/js/jqueryMin.js"></script> -->
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/bootstrap-off-canvas-nav.js" type="text/javascript"></script>

  <script>
      $(document).ready(function(){
        $("#desktopToggle").on('click', function(e) {
          e.preventDefault();
          $(".iframe-preview").removeClass("iframe-preview-mobile");
        });
        $("#mobileToggle").on('click', function(e) {
          e.preventDefault();
          $(".iframe-preview").addClass("iframe-preview-mobile");
        });

        //ADD CLASS TO STYLE CURRENT LINK
        $("a").each(function(){
           if ($(this).attr("href") == window.location.pathname){
                   $(this).addClass("currentLink");
           }
       });
      });
    </script>
  </body>
</html>
