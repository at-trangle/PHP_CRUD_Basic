<?php include ('header.php')?>
<body>
<?php
	if(isset($_GET['add'])){
	$name = $_GET['name'];
	$preview = $_GET['preview'];
	$query = $conn->prepare("insert into news(name,preview)
													values ('$name', '$preview');");
	$check = $query->execute();
	$result = $query->setFetchMode(PDO::FETCH_ASSOC);
	if($check == true ){
			header("LOCATION:index.php?msg=Bạn đã thêm thành công!Xin chúc mừng @@");
			exit();
	}else{ 
			echo "Có lỗi xảy ra rồi! Nhập lại đi cưng!";
	}        
	}
?>
	<form method="get" enctype="multipart/form-data">
		<input type="text" name="name" placeholder="Edit name">
		<textarea name="preview" rows="4" cols="50"></textarea>
		<button type="submit" name="add">Add News</button>
	</form>
</body>
</html>