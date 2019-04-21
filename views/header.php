<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Small Business - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/small-business.css" rel="stylesheet">
    <link href="assets/css/bootstrap-off-canvas-nav.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/index.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  </head>

  <body class="preview-page off-canvas-nav-left">
    <!-- MODAL MESSAGE -->
    <div class="modal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">ERROR</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p><?php echo @$_GET["msg"] ?></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
          </div>
        </div>
      </div>
    </div>



    <?php

      if(@$_GET["msg"] || @$_GET["msg"] != ""){?>
        <script type="text/javascript">
            setTimeout(function(){
              $(".modal").modal();
            }, 500);
        </script>
      <?php } ?>



      <header>
       <!-- Navigation -->
       <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
         <div class="container">
           <a class="navbar-brand" href="#">Start Bootstrap</a>
           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
           </button>
           <div class="collapse navbar-collapse" id="navbarResponsive">
             <ul class="navbar-nav ml-auto">
               <?php foreach ($data["navigation"] as $key=>$link){ ?>
                 <li class="nav-item active">
                   <?php if($key == "login" && @$_SESSION["isLoggedIn"] && @$_SESSION["isLoggedIn"] == 1){?>
                     <a class="nav-link" href="/crud" style="<?php echo $this->urlPathParts[0]=="crud"?"color:orange !important":""?>">CRUD</a>
                     <li>

                     <li class="nav-item active">
                       <a class="nav-link" href="/profile" style="<?php echo $this->urlPathParts[0]=="profile"?"color:orange !important":""?>">PROFILE</a>
                     <li>

                     <li class="nav-item active"><a class="nav-link" href="/logout">LOGOUT</a>
                  <?php }else{ ?>
                    <a class="nav-link" href="<?php echo $link?>"
                      <?php

                        if($this->urlPathParts[0] == $key){
                          echo " style='color:orange'>";
                        }

                        else{
                          echo " >";
                        }

                      ?>
                      <?php echo strtoupper($key)?></a>

                    <?php } ?>

                        <!-- <span class="sr-only">(current)</span>
                      </a> -->
                    </li>

                  <?php } ?>
                </li>
              </li>

               <!-- <li class="nav-item">
                 <a class="nav-link" href="#">About</a>
               </li> -->
             </ul>
           </div>

           <!-- Brand and toggle get grouped for better mobile display -->
           <!-- <div class="navbar-header">
             <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
             </button>
             <a class="navbar-brand" href="#">Brand</a>
           </div> -->

           <!-- Collect the nav links, forms, and other content for toggling -->
           <!-- <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
             <ul class="nav navbar-nav">
               <li class="dropdown">
                 <a href="#" class="dropdown-toggle navbar-brand" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                 <ul class="dropdown-menu">
                   <li><a href="#">Action</a></li>
                   <li><a href="#">Another action</a></li>
                   <li><a href="#">Something else here</a></li>
                   <li role="separator" class="divider"></li>
                   <li><a href="#">Separated link</a></li>
                   <li role="separator" class="divider"></li>
                   <li><a href="#">One more separated link</a></li>
                 </ul>
               </li>
             </ul>

             <form class="navbar-form navbar-left" role="search">
               <div class="form-group">
                 <input type="text" class="form-control" placeholder="Search">
               </div>
               <button type="submit" class="btn btn-default">Submit</button>
             </form> -->

             <!-- <ul class="nav navbar-nav navbar-right">
               <li><a class="navbar-brand" href="#">Link</a></li>
               <li class="dropdown">
                 <a href="#" class="dropdown-toggle navbar-brand" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                 <ul class="dropdown-menu">
                   <li><a href="#">Action</a></li>
                   <li><a href="#">Another action</a></li>
                   <li><a href="#">Something else here</a></li>
                   <li role="separator" class="divider"></li>
                   <li><a href="#">Separated link</a></li>
                 </ul>
               </li>
             </ul> -->
           </div><!-- /.navbar-collapse -->
         </div>
       </nav>
      </header>
