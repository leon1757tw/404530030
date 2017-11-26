<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Use-ForEach</title>
	<link rel="stylesheet" href="styles.css">
</head>

<body>
<table>
<?php
	$data = array(
		array("Volvo",22,18),
		array("BMW",15,13),
		array("Saab",5,2),
		array("Land Rover",17,15)   
	);
	
	echo "<tr>";
	echo "<td>Name</td>";
	echo "<td>Stock</td>";
	echo "<td>Sold</td>";
	echo "</tr>";

	foreach($data as $element){
		echo "<tr>";
		foreach($element as $value){
			echo "<td>$value</td>";
		}
		echo "</tr>";
	}
?>
</table>
</body>
</html>	
	

