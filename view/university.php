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
    background: #ffffff;
}
  </style>
</head>
<body>
  <div class="container-fluid">
    <?php 
    if (isset($_SESSION['email'])): ?>
      <div>
        <form method="POST" action="index.php?controller=user&action=upload_picture" enctype="multipart/form-data">
          <?php 
            $_SESSION['dega_id'] = $_GET['dega_id'];
          ?>
          <label>Image:</label><input type="file" accept="image/*" name="image">
          <button type="submit" name="submit">Upload</button>
        </form>
      </div>
    <?php endif; ?>
    
    <div class="container">

      <div class="row">
        
          <?php
            global $DB;
            $dega = $_GET['dega_id'];
            $query=$DB->execute("SELECT * FROM image_tb WHERE dega_id = '$dega' ORDER BY imageid DESC");
            while($row=$query->fetch(PDO::FETCH_ASSOC)){
              $post_id = $row['imageid'];
              $dega = $_GET['dega_id'];
              ?><div class="col-sm-12" class="post">
                <!-- <div class="square"> -->
                  <div class="col-sm-6">
                    <!-- <div class="content"> -->
                        <img class="img-fluid" src="<?php echo $row['img_location']; ?>" style="width: 100%; height: 100%;">
                    <!-- </div> -->
                  </div>
                  <div class="col-sm-6">
                    <form>
                      <textarea id="<?php echo $row['imageid'] ?>" rows="2" placeholder="Komento ketu" maxlength="256" style="outline: none;"></textarea>
                      <input type="submit" name="<?php echo $row['imageid'] ?>" value="Shto" class="btn btn-warning">
                    </form>
                  </div>
                  <div class="col-sm-6" id='com<?php echo $row['imageid'] ?>'>
                    
                  </div>
                
              <!-- </div> -->
              </div>
              <?php
            }
          ?>
        
      </div>
    </div>
  </div>
</body>
<script type="text/javascript">
  $(document).ready(function(event){
    
      $('input[type="submit"]').click(function(event){
        event.preventDefault();
        var post_id = event.target.name;
        var komenti = $('#'+post_id).val();
        // var email = '<?php //echo $_SESSION['email']?>';
        var lenda = <?php echo $dega ?>;
        var post_id = event.target.name;
        var html = '';
        //alert(post_id);
        $.post('index.php?controller=user&action=addComment&type=action',{comment: komenti, lenda: lenda, post_id: post_id}, function(data){
         alert(data);
          var json = JSON.parse(data);
          console.log(data);
          for(var i=0 ; i < json.comments.length ; i++){
            html += '<p><span><b>'+json.comments[i].username+'</b> ka komentuar: </span>'+json.comments[i].comment+'</p>';
            $('#com'+post_id).append(html);
            
          }
        });

        $('#komenti').val('');
      });
  });
</script>
</html>