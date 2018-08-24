<head>
	<title>Login</title>
</head>
<div align="center" style=" position: center; margin-top: 300px;   " >
	<form action="http://localhost:8080/mvc/index.php?controller=user&action=login" method="post" > 
		  <div  > 
    <input  style="width: 250px; line-height:35px " type="email" name="email" placeholder="   Email" value="" >
  </div> 
</br>
<div  class="form_error"  > 
    <input  style="width: 250px; line-height:35px " type="password" name="password" placeholder="   Password" value="">
  </div> 
</br>

<input class="button"  type="submit" name="login" value="Log In">

	</form>