    <!-- Page Content -->
    <div class="container">
      <h1>Google API</h1>

      <div class="row">
        <div class="col-lg-12 wrapper">
          <?php

            foreach($data as $item){
              echo "<h2>" . $item["snippet"]["title"] . "</h2>
                    <img src='" . $item["snippet"]["thumbnails"]["high"]["url"] . "'>
                    <p>" . $item["snippet"]["description"] . "</p>
                    <hr>";
            }

          ?>
        </div>
      </div>

    </div>
    <!-- /.container -->
