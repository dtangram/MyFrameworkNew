    <!-- Page Content -->
    <div id="loginForms" class="container">
      <h1>Login Forms</h1>

      <!-- Content Row -->
      <div class="row">
        <div class="col-lg-12">
          <h2>Form Request</h2>

          <form class="" action="/auth/loginAuth" method="post">
            <input type="hidden" name="type" value="form">
            <div class="form-group input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-user"></i></span>
              </div>

              <input type="text" class="form-control" placeholder="Email" name="email">
            </div>

            <div class="form-group input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-user"></i></span>
              </div>

              <input type="text" class="form-control" placeholder="Password" name="password">
            </div>

            <!-- CHECKBOX -->
            <div class="form-check form-check-inline">
              <input id="check1" class="form-check-input" type="checkbox" name="male" value="male">
              <label class="form-check-label" for="defaultCheck1">
                Male
              </label>
            </div>


            <!-- RADIO BUTTONS -->
            <div class="form-check form-check-inline">
              <input id="exampleRadios1" class="form-check-input" type="radio" name="female" value="female">
              <label class="form-check-label" for="exampleRadios1">
                Female
              </label>
            </div>


            <!-- SELECT -->
            <select id="exampleFormControlSelect2" class="form-control" name="salary">
              <?php
                $salary = array();
                $options = array("Salary", "$0 - $20,000", "$21,000 - $30,000", "$31,000 - $40,000", "Over $40,000");
                foreach ($options as $option) {
                    echo '<option value="' . $option . '"';
                    if (in_array($option, $salary)) {
                        echo " selected";
                    }

                    echo ">" . ucfirst($option) . "</option>";
                }
              ?>
            </select>

            <div id="textarea" class="form-group">
              <label for="exampleFormControlTextarea1">Additional Info</label>
              <textarea id="exampleFormControlTextarea1" class="form-control" rows="3" name="textareaInfo"></textarea>
            </div>

            <div class="form-group">
              <input type="submit" class="btn btn-primary btn-block" value="Submit">
            </div>
          </form>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-12">
          <h2>AJAX Request</h2>

          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fa fa-user"></i></span>
            </div>

            <input id="email" type="text" class="form-control" placeholder="Email" name="email">
          </div>

          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fa fa-user"></i></span>
            </div>

            <input id="password" type="text" class="form-control" placeholder="Password" name="password">
          </div>

          <div class="form-group">
            <!-- <input type="submit" class="btn btn-primary btn-block" value="Submit"> -->
            <button id="ajaxBTN" type="submit" class="btn btn-primary btn-block" name="button">LOGIN</button>
          </div>
        </div>
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->
