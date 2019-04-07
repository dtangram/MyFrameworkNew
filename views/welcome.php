<html>

<?php

 foreach ($data["navigation"] as $key=>$link){
   echo "<a href='" . $link . "'>" . strtoupper($key) . "</a> |";
 }

?>

<body>
  <p>Welcome Body</p>
</body>
</html>
