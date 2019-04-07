<html>

  <?php

   foreach ($data["navigation"] as $key=>$link){
     echo "<a href='" . $link . "'>" . strtoupper($key) . "</a> |";
   }

 ?>

 <body>
   <h1>Header</h1>
