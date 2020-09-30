<?php namespace Auctions\delete;


require_once 'functions.php';
use Auctions\fetch_functions;
use Auctions\delete;









if(isset($_GET['delete_product']))
	delete_product();









function delete_product(){
	
	global $con;
	$p_code = htmlspecialchars($_GET['delete_product']);
	
	$stmt = $con->prepare("SELECT image FROM sell_posts WHERE product_code = :p_code");
	$stmt->bindParam(':p_code',$p_code);
	$query = $stmt->execute();
	$images = $stmt->fetch(\PDO:: FETCH_OBJ);
	$img_arr = explode('{}{{}}}', $images->image);
	foreach ($img_arr as $img) {
		unlink($img);
	}
	
	$stmt = $con->prepare("DELETE FROM sell_posts WHERE product_code = :p_code");
	$stmt->bindParam(':p_code',$p_code);
	$query = $stmt->execute();
	if($query){
		header("Location:../members/views/posts.php");
	}
}
