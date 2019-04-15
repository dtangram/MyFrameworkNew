    <!-- Page Content -->
    <div class="container">
      <h1>Register Form</h1>

      <!-- Content Row -->
      <div class="row">
        <div class="col-lg-12">
          <form class="" action="/register/registerAction" method="post">
            <div class="form-group input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-user"></i></span>
              </div>

              <input type="text" class="form-control" placeholder="First Name" name="firstname">
            </div>

            <div class="form-group input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-user"></i></span>
              </div>

              <input type="text" class="form-control" placeholder="Last Name" name="lastname">
            </div>

            <!-- CAPTCHA -->
            <?php

              function create_image($cap){
                unlink("./assets/img/image1.png");

                global $image;

                $image = imagecreatetruecolor(200, 50) or die("Cannot Initialize new GD image stream");

                $background_color = imagecolorallocate($image, 255, 255, 255);
                $text_color = imagecolorallocate($image, 0, 255, 255);
                $line_color = imagecolorallocate($image, 64, 64, 64);
                $pixel_color = imagecolorallocate($image, 0, 0, 255);

                imagefilledrectangle($image, 0, 0, 200, 50, $background_color);

                for ($i = 0; $i < 3; $i++){
                  imageline($image, 0, rand() % 50, 200, rand() % 50, $line_color);
                }

                for ($i = 0; $i < 1000; $i++){
                  imagesetpixel($image, rand() % 200, rand() % 50, $pixel_color);
                }

                $text_color = imagecolorallocate($image, 0, 0, 0);
                ImageString($image, 22, 30, 22, $cap, $text_color);
                imagepng($image, "./assets/img/image1.png");
              }

              create_image($_SESSION["captchaInput"]);
              echo "<img src='/assets/img/image1.png'>";

            ?>

            <div class="form-group input-group">
              <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-user"></i></span></div>
              <input id="usercaptchaInput" name="usercaptcha" type="text" class="form-control" placeholder="Captcha">
            </div>
            <!-- END CAPTCHA -->

            <div class="form-group">
              <input type="submit" class="btn btn-primary btn-block" value="Submit">
            </div>
          </form>
        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->
