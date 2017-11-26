<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Use-For</title>
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

	for($i = 0; $i < count($data); $i++){
		echo "<tr>";
		for($j = 0; $j < count($data[$i]); $j++){
			echo "<td>".$data[$i][$j]."</td>";
		}
		echo "</tr>";
	}
?>
</table>
</body>
</html>	
	

