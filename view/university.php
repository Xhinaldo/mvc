<!DOCTYPE html>
<html>
<head>
  <title>University</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!-- <style>   

    .affix {
      top:0;
      width: 100%;
      z-index: 9999 !important ;
    }
    .affix+.container-fluid{
      padding-top: 70px;
    }
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
  </style>  -->
</head>
<body>
  <!-- <div class="row">
  <div class="col-sm-12"> -->
<div class="container-fluid">
  <nav class="navbar navbar-inverse" style=" z-index: 3; top: 20;" id="navbar-main">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="homepage.php">WebSiteName</a>
      </div>
      <ul class="nav navbar-nav">
        <li><a href="homepage.php">Kryefaqja</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Universiteti i Tiranes
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Fakulteti i Shkencave te Natyres</a></li>
            <li><a href="#">Fakulteti i Ekonomise</a></li>
            <li><a href="#">Fakulteti i Historise dhe Filologjise</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Universiteti Politeknik
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Fakulteti i Gjeologjise dhe Minierave</a></li>
            <li><a href="#">Fakulteti i Arkitektures dhe Urbanistikes</a></li>
            <li><a href="#">Fakulteti i Inxhinierise se Ndertimit</a></li>
          </ul>
        </li>
        <li><a href="shtopostim.php">Shto Postim</a></li>
        <li><a href="subscribe.php">Subscribe</a></li>
        <li><a href="post.php">Postet</a></li>
        <li><a href="preferencat.php">Deget e Preferuara</a></li>
        
      </ul>

      
      </ul>
  </div>
  </div>
</nav>
<!-- </div>
</div> -->


<div class="container" style="z-index: 3;">    
  <div class="row">
    <div class="col-sm-12 well">
      <div class="well">
        <p><a href="#">OPTIONS</a></p>
        <img src="bird.jpg" class="img-circle" height="65" width="65" alt="Avatar">
      </div>
      <div class="well">
        <p><a href="#">COURSES</a></p>
        <p>
          <span class="label label-default">MATH</span>
          <span class="label label-primary">C++</span>
          <span class="label label-success">JAVA</span>
          <span class="label label-info">INFOGRAFI</span>
          <span class="label label-warning">UML</span>
          <span class="label label-danger">ORACLE</span>
        </p>
      </div>
      <div class="alert alert-success fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        <p><strong>Ey!</strong></p>
        Mire se erdhe!
      </div>
      <p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>
    </div>
    <div class="col-sm-7">
    
      <div class="row">
        <div class="col-sm-12">
          <div class="panel panel-default text-left">
            <div class="panel-body">
              <p contenteditable="true">Status: Feeling Blue</p>
              <button type="button" class="btn btn-default btn-sm">
                <span class="glyphicon glyphicon-thumbs-up"></span> Like
              </button>     
            </div>
          </div>
        </div>
      </div>
      
      <div class="row">
        <div class="col-sm-3">
          <div class="well">
           <p>POST1</p>
           <!-- <img src="bird.jpg" class="img-circle" height="55" width="55" alt="Avatar"> -->
          </div>
        </div>
        <div class="col-sm-9">
          <div class="well">
            <p>TEXT1
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <div class="well">
           <p>POST2</p>
           <!-- <img src="bandmember.jpg" class="img-circle" height="55" width="55" alt="Avatar"> -->
          </div>
        </div>
        <div class="col-sm-9">
          <div class="well">
            <p>TEXT2</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <div class="well">
           <p>POST3</p>
           <!-- <img src="bandmember.jpg" class="img-circle" height="55" width="55" alt="Avatar"> -->
          </div>
        </div>
        <div class="col-sm-9">
          <div class="well">
            <p>TEXT3</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <div class="well">
           <p>POST4</p>
<!--            <img src="bird.jpg" class="img-circle" height="55" width="55" alt="Avatar">
 -->          </div>
        </div>
        <div class="col-sm-9">
          <div class="well">
            <p>JTEXT4</p>
          </div>
        </div>
      </div>     
    </div>
    <div class="col-sm-2 well">
      <div class="thumbnail">
        <p>EVENTE NE VIJIM</p>
        <img src="paris.jpg" alt="Paris" width="400" height="300">
        <p><strong>Paris</strong></p>
        <p>Date</p>
        <button class="btn btn-primary">Info</button>
      </div>      
      <div class="well">
        <p>ADS</p>
      </div>
      <div class="well">
        <p>ADS</p>
      </div>
    </div>
  </div>
</div>
</div>
<script> 
  jQuery(document).ready(function($) {
  
    // Fixa navbar ao ultrapassa-lo
    var navbar = $('#navbar-main'),
        distance = navbar.offset().top,
        $window = $(window);

    $window.scroll(function() {
        if ($window.scrollTop() >= distance) {
            navbar.removeClass('navbar-fixed-top').addClass('navbar-fixed-top');
            $("body").css("padding-top", "70px");
        } else {
            navbar.removeClass('navbar-fixed-top');
            $("body").css("padding-top", "0px");
        }
    });
});
</script>
<footer class="container-fluid text-center">
  <p>nota 2018</p>
</footer>
</body>
</html>