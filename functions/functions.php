<?php namespace Auctions\fetch_functions;
error_reporting(0);

try{
	$con = new \PDO('mysql:host=localhost;dbname=auctions','root','');
	$con->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
	return $con;
}

catch(\PDOException $e){
	echo "ERROR : " . $e->getMessage();
	return false;
}









function get_row($table,$param,$paramVal){
	global $con;
	$stmt = $con->prepare("SELECT * FROM $table WHERE $param=:paramVal");
	$stmt->bindParam(':paramVal',$paramVal);
	$stmt->execute();
	$row = $stmt->fetchAll(\PDO::FETCH_OBJ);
	return $row;
}









function get_rows($table){
	global $con;
	$stmt = $con->prepare("SELECT * FROM $table");
	$stmt->execute();
	$rows = $stmt->fetchAll(\PDO::FETCH_OBJ);
	return $rows;
}









function get_limited_rows($table,$param,$sort,$limit){
	global $con;
	if(strtoupper($sort)=="DESC"){
		$stmt = $con->prepare("SELECT * FROM $table ORDER BY $param DESC LIMIT $limit");
	}
	else{
		$stmt = $con->prepare("SELECT * FROM $table ORDER BY $param ASC LIMIT $limit");
	}
	$stmt->execute();
	$rows = $stmt->fetchAll(\PDO::FETCH_OBJ);
	return $rows;
}









function get_distinct_rows($table,$param){
	global $con;
	$stmt = $con->prepare("SELECT distinct $param FROM $table");
	$stmt->execute();
	$row = $stmt->fetchAll(\PDO::FETCH_OBJ);
	return $row;
}









function search_in_auctions($category,$title,$seller){
	
	global $con;

	if(empty($category) && empty($title) && empty($seller)){
		$stmt = $con->prepare("SELECT * FROM sell_posts");
		$arr = array();
	}

	elseif(empty($category) && empty($title) && !empty($seller)){
		$stmt = $con->prepare("SELECT S.* FROM sell_posts AS S JOIN members AS M ON S.seller_id = M.id WHERE M.name LIKE :seller");
		$arr = array('seller' => '%'.$seller.'%');
	}
	
	elseif(empty($category) && !empty($title) && empty($seller)){
		$stmt = $con->prepare("SELECT * FROM sell_posts WHERE title LIKE :title");
		$arr = array('title' => '%'.$title.'%');
	}
	
	elseif(empty($category) && !empty($title) && !empty($seller)){
		$stmt = $con->prepare("SELECT S.* FROM sell_posts AS S JOIN members AS M ON S.seller_id = M.id WHERE S.title LIKE :title || M.name LIKE :seller");
		$arr = array('title' => '%'.$title.'%','seller' => '%'.$seller.'%');

	}
	
	elseif(!empty($category) && empty($title) && empty($seller)){
		$stmt = $con->prepare("SELECT * FROM sell_posts WHERE category LIKE :category");
		$arr = array('category' => '%'.$category.'%');
	}
	
	elseif(!empty($category) && empty($title) && !empty($seller)){
		$stmt = $con->prepare("SELECT S.* FROM sell_posts AS S JOIN members AS M ON S.seller_id = M.id WHERE S.category LIKE :category || M.name LIKE :seller");		
		$arr = array('category' => '%'.$category.'%', 'seller' => '%'.$seller.'%');
	}
	
	elseif(!empty($category) && !empty($title) && empty($seller)){
		$stmt = $con->prepare("SELECT * FROM sell_posts WHERE category LIKE:category || title LIKE :title");
		$arr = array('category' => '%'.$category.'%', 'title' => '%'.$title.'%');
	}
	
	elseif(!empty($category) && !empty($title) && !empty($seller)){
		$stmt = $con->prepare("SELECT S.* FROM sell_posts AS S JOIN members AS M ON S.seller_id = M.id WHERE S.title LIKE :title || S.category LIKE :category || M.name LIKE :seller");
		$arr = array('title' => '%'.$title.'%', 'category' => '%'.$category.'%', 'seller' => '%'.$seller.'%');
	}
	
	$stmt->execute($arr);
	$rows = $stmt->fetchAll(\PDO::FETCH_OBJ);
	return $rows;
}




?>