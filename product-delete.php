<?php	
	error_reporting(E_ALL ^ E_DEPRECATED);
    $con=mysql_connect('localhost','root','236598');  
    mysql_query("set names utf8");
    $com=mysql_select_db('store');  
    $no = $_REQUEST["no"];
    echo $no;
    $sql="delete from beverage where beverageId = $no";
    $result=mysql_query($sql);
   	if ($result) {
   		 header("Location:product-brand.php");
   	}else{
   		echo "删除失败";
   	}


?>