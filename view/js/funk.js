function myFunction(x) {
    //x.classList.toggle("change");
    this.x=window.location.replace("http://localhost:8080/mvc/index.php?controller=user&action=register");
}
function redirect(x){
	x=window.location.replace("http://localhost:8080/mvc/index.php?controller=user&action=register");
}