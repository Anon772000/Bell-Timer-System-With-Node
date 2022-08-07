<?php
include "assets/inc/header.inc.php";
date_default_timezone_set('Australia/Sydney');
$time =  date("H:i");


?>
</head>
<body>
<div class="container">
<div class="col-md-5 mr-auto ml-auto text-center">
<img src="assets/img/logo/sixt5.png" style="height:10em;" alt="">
</div>
<div class="row">
  <div class="col-md-8 mr-auto ml-auto text-center">
  The Current time is <?=$time?> <br><br>
  <a type='button' class="btn btn-primary" href="settings.php">Back</a>
  </div>
</div>
<br><br>
<form action="upload.php" method="post" enctype="multipart/form-data">

  <div class="row">
  <div class="col-md-12 mr-auto ml-auto">
  <table style="width:100%">




    <tr>
    <th class='text-center'><div class='input-group'>
    <div class='input-group'>
    <div class='input-group-prepend'>
      <span class='input-group-text'>name</span>
    </div>
    <input class='form-control' aria-label='bell' id='name' name='name'>
  </div>
  </th>
  <td>
 
 
    <input type="file" class="form-control" name="fileToUpload" id="fileToUpload">

  </div>
  </td>
    
  
  

   

</tr>





</table>
<div class="col-md-12 mr-auto ml-auto text-center"><br><br>
<button type="submit" class="btn btn-success">Upload song</button>
</div>
</form>



  </div>
  </div>
</div>
</body>

