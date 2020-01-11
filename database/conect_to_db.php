<?php 
 $connect="";
function connectToDB(){
	try {
		global $connect;
		$connect = new PDO('mysql:host=v.je;dbname=test','v.je','v.je');
		$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    	$handel = $connect->prepare("SELECT * from category ");
    	$handel->execute();
		//}
    // set the resulting array to associative
    $result = $handel->fetchALL(PDO::FETCH_ASSOC);
    //var_dump($result);
		echo "connected";
		return $connect;
	} catch (PDOException $e){
		echo "fdshfdhgkjdf";
		echo $e->getMessage();
		return FALSE;
	}
}
//var_dump(connectToDB());

connectToDB();
session_start();


?>