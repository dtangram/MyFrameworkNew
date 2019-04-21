    <!-- Page Content -->
    <div class="container">
      <h1>CRUD Content</h1>

      <!-- BREADCRUMBS -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="/crud/addForm">Add New Fruit</a>
        </li>
      </ol>

      <div class="row">
        <div class="col-lg-12">
          <ul>
            <?php
              foreach($data["fruit"] as $fruit){
                echo "<li>" . $fruit["name"];
                echo " <a href='/crud/deleteFunc?deletLink=" . $fruit['id'] . "'>Delete</a>";
                echo " | <a href='/crud/updateForm?upDaLink=" . $fruit['id'] . "'>Update</a></li>";
              }
            ?>
          </ul>
        </div>
      </div>

    </div>
    <!-- /.container -->
