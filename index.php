<?php
	include ("header.php");
?>
	<body>
	<?php
    $query = $conn->prepare("select * from news");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC); 
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
<a href=""><i class="fas fa-trash-alt"></i></a></td>
				</tr>
				<?php
					}
				?>
			</tbody>
		</table>
	</body>
</html>