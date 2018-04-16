<?php
	include ('header.php');
?>
	<body>
		<?php
			if(isset($_REQUEST['id']) and $_REQUEST['id'] > 0){
					$id_u = $_REQUEST['id'];
				}
			else{
				header("location:index.php");
				exit();
			}
			$query = "select * from news where id = {$id_u}";
			$stmt = $conn->prepare($query);
			$stmt->execute();
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			$id = $result['id'];
			
			$name = $result['name'];
			$preview = $result['preview'];

			if(isset($_GET['edit'])){
				$name_edit = $_GET['name'];
				$preview_edit = $_GET['preview'];
				$query_edit = $conn->prepare("update news set name = '{$name_edit}', preview = '{$preview_edit}' where id = '{$id}';");
				$check_edit = $query_edit->execute();
				print_r($check_edit);
				try{
					if($check_edit == true ){
						header("LOCATION:index.php?msg=Bạn đã thêm thành công");
						exit();
					}
				}catch(PDOException $e){
					echo $e->getMessage();
				}
			}
		?>
		<form method="get" enctype="multipart/form-data">
			<input type="text" name="id" value="<?php echo $_GET['id']?>" hidden>
			<input type="text" name="name" value="<?php echo $name;?>">
			<textarea name="preview" rows="4" cols="50"><?php echo $preview; ?></textarea>
			<button type="submit" name="edit">Edit</button>
		</form>	
	</body>
</html>