
<?php
	include("connect_db.php");
	$conn = connect();
  if(isset($_REQUEST['id']) and $_REQUEST['id'] > 0){
		$id = $_REQUEST['id'];
	}else{
		header("location:index.php");
		exit();
	}
	$sql = "delete from news where id = {$id}";
	$result = $conn->query($sql);
	if($result == true){
		header("location:index.php?msg=Xóa người dùng thành công");
		exit();
	}else{
		echo "Có lỗi xảy ra";
	}
?>