<?php 
	
?>

<!DOCTYPE html>
<html>
	<body>
		
		<div style="width: 100vw; height: 100vh; display: flex; align-items: center; justify-content: center; gap: 30px;">
			<div style="padding: 20px; border: 1px solid grey; display: flex; align-items: center; justify-content: center; flex-direction: column;">
				<h1>Retrieve</h1>
				<form action="" method="POST" style="display: flex; flex-direction: column; gap: 20px;">
					<div>
						<label for="id">ID :</label>
						<br />
						<input type="number" name="id" id="id" required />
					</div>
					
					<div style="display: flex; align-items: center; justify-content: center;">
						<input type="submit" value="Submit" name="retrieve" />
					</div>
				</form>
				<h3>Result</h3>
			</div>
			<div style="padding: 20px; border: 1px solid grey; display: flex; align-items: center; justify-content: center; flex-direction: column;">
				<h1>Insert</h1>
				<form action="" method="POST" style="display: flex; flex-direction: column; gap: 20px;">
					<div>
						<label for="id">ID :</label>
						<br />
						<input type="number" name="id" id="id" required />
					</div>
					<div>
						<label for="name">Name :</label>
						<br />
						<input type="text" name="name" id="name" required />
					</div>
					<div style="display: flex; align-items: center; justify-content: center;">
						<input type="submit" value="Submit" name="insert" />
					</div>
				</form>
			</div>
		</div>
	</body>
</html> 

<?php

function connect() {
	$server = "localhost";
	$user = "labuser";
	$pass = "123";
	$db = "ihsan";
	
	$conn = new mysqli($server, $user, $pass, $db);
	
	return $conn;
}


if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST["insert"])) {
	$id = $_POST["id"];
	$name = $_POST["name"];

	$conn = connect();

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "INSERT INTO test (id, name) VALUES ($id, '$name')";

	if (!$conn->query($sql)) {
		die("Connection failed: " . $conn->error);
	}

	$conn->close();
}
 
?>
