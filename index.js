var caro_img = document.getElementById("caro-img");
var samp_imgs = ["austin1.jpg", "austin2.jpg", "austin3.jpg", "austin4.jpg", "austin5.jpg"];
window.onload = setInterval(actions, 6000);
function actions(){
	var index = Math.floor(Math.random()*6)
	caro_img.style.width = "400px";
	caro_img.style.height = "600px";
	caro_img.src = "images/" + samp_imgs[index];
}


