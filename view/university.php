<!DOCTYPE html>
<html>
<head>
  <title>University</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
    @import url(http://fonts.googleapis.com/css?family=Lato:400,900);

.square {
    float:left;
    position: relative;
    width:50%;
    padding-bottom : 30%; /* raporti 1:1  */
    margin:1.66% 1.66%;
    background-color:#F5FFC6;
    overflow:hidden;
    font-size: 70%;
    
   
}

.content {
    position:absolute;
    height:90%; /* = 100% - 2*5% padding */
    width:90%; /* = 100% - 2*5% padding */
    padding:5%; 
    

}

/*  For responsive images */

.content .rs{
    width:auto;
    height:auto;
    max-height:100%;
    max-width:100%;
    position:center center;
}

body {
    font-size:20px;
    font-family: 'Lato',verdana, sans-serif;
    color: #40434E;
    background:#ECE8EF;
}
  </style>
</head>
<body>
  <div class="container-fluid">
  <div>
    <form method="POST" action="index.php?controller=user&action=upload_picture" enctype="multipart/form-data">
      <?php 
        $_SESSION['dega_id'] = $_GET['dega_id'];
      ?>
      <label>Image:</label><input type="file" accept="image/*" name="image">
      <button type="submit" name="submit">Upload</button>
    </form>
  </div>
  
  <div class="container">
  <?php
    global $DB;
    $dega = $_GET['dega_id'];
    $query=$DB->execute("SELECT * FROM image_tb WHERE dega_id = '$dega' ORDER BY imageid DESC");
    while($row=$query->fetch(PDO::FETCH_ASSOC)){
      ?>
      <div class="square">
        <div class="content">
          <!-- <div class="col-sm-12 px-0"> -->
            <img class="rs" src="<?php echo $row['img_location']; ?>" style="width: 100%; height: 100%;">
          <!-- </div> -->
        </div>
      </div>
      <?php
    }
  ?>
      </div>
  </div>
</body>
</html>