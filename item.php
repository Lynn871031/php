<?php   
  //connect DB
  require_once("connect.php");
  $link = connection();

//接收 form 表單 input 值
 $cost =$_REQUEST['cost'];
 $date= $_REQUEST['tex'];
 $type = $_REQUEST['type'];
 $act_id = $_REQUEST['act_id'];
 $keeper_id = $_REQUEST['keeper_id'];

 if ($_POST["action"]=="新增")
 { 
	 $insert = "INSERT INTO item(cost, tex, type, act_id, keeper_id) VALUES ('$cost','$date','$type','$act_id','$keeper_id')";
	 $link->query($insert);
	 //echo json_encode($act_id ,JSON_UNESCAPED_UNICODE);
	 //echo "$act_id,$keeper_id";

 }else if($_POST["action"]=="修改") {
	 $update = "UPDATE item SET cost = '$cost', 'date' = '$date', type = '$type' , act_id = '$act_id', keeper_id = '$keeper_id' WHERE type = '$type' and 'date' = '$date'" ;

	 $link->query($update);

 }else if($_POST["action"]=="刪除"){
	 $delete = "DELETE FROM  item WHERE type = '$type' and 'date' = '$date'";
	 $link->query($delete);
 }


 header("Location: index.php"); 
?>
