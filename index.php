<?php
	include ("header.php");
?>
	<body>
	<?php
    $sql_pag = $conn->prepare("select count(id) from news");
    $sql_pag->execute();
    $row = $sql_pag->fetchColumn();
    $limit = 5;
    if(isset($_GET["page"])){
      $current_page=$_GET["page"];
    }else{
      $current_page=1;
    }
    $paginate = ceil($row/$limit);
    $offset = ($current_page - 1) * $limit;
    $stmt = $conn->prepare("select * from news limit $offset,$limit");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_NAMED);
  ?>
	<button><a href="add.php">Add News</a></button>
		<table>
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Preview</th>
					<th>Edit/Del</th>
				</tr>
			</thead>
			<tbody>
			<?php
        foreach($result as $key => $values){
          $id = $values['id'] ;
          $name =$values['name'];
          $preview =$values['preview'];
      ?>
				<tr>
					<td><?php echo $id; ?></td>
					<td><?php echo $name; ?></td>
					<td><?php echo $preview; ?></td>
					<td><a href="edit.php?id=<?php echo $id; ?>"><i class="fas fa-edit"></i></a> |
						<a href="del.php?id=<?php echo $id; ?>" onclick="alert('Bạn có muốn xóa chăng?');"><i class="fas fa-trash-alt"></i></a>
					</td>
				</tr>
				<?php
					}
				?>
			</tbody>
		</table>
		<div>
			<?php
				if($current_page > 1 && $paginate > 1){
					echo '<a href="index.php?page='.($current_page-1).'">Prev</a> | ';
				}
				for ($i = 1; $i <= $paginate; $i++){
					if ($i == $current_page){
						echo '<span>'.$i.'</span> | ';
					}
					else{
						echo '<a href="index.php?page='.$i.'">'.$i.'</a> | ';
					}
				}
				if ($current_page < $paginate && $paginate > 1){
					echo '<a href="index.php?page='.($current_page+1).'">Next</a> ';
				}
			?>
		</div>
	</body>
</html>