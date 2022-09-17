<?php
error_reporting(0);

$msg = "";

// If upload button is clicked ...
if (isset($_POST['upload'])) {

	$filename = $_FILES["uploadfile"]["name"];
	$tempname = $_FILES["uploadfile"]["tmp_name"];
	$folder = "./image/" . $filename;

	$db = mysqli_connect("localhost", "root", "", "hackathon");

	// Get all the submitted data from the form
	$sql = "INSERT INTO image (filename) VALUES ('$filename')";

	// Execute query
	mysqli_query($db, $sql);

	// Now let's move the uploaded image into the folder: image
	if (move_uploaded_file($tempname, $folder)) {
		echo "<h3> Image uploaded successfully!</h3>";
	} else {
		echo "<h3> Failed to upload image!</h3>";
	}
}
?>

<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css" />
    <link href="style1.css" rel="stylesheet">
    <link rel=”stylesheet” href=”https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css”>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    

</head>

<body>
	<div class="parallax">
    <nav class="navbar sticky-top navbar-dark navbar-expand-md bg-dark py-3">
        <div class="container-fluid">
        <img class="logo" src="data:image/png;base64,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" alt="Aces" width="50px" height="50px">

            <a class="navbar-brand" href="#">ACES</a>
        </div>
    </nav>
  
   
    <div id="">
		<form method="POST" action="" enctype="multipart/form-data">
			<div class="form-group">
				<input class="form-control" type="file" name="uploadfile" value="" />
			</div>
			<div class="form-group">
				<button class="btn btn-primary" type="submit" name="upload">UPLOAD</button>
			</div>
		</form>
	</div>
	<div id="display-image">
		<?php
		$query = " select * from image ";
		$result = mysqli_query($db, $query);

		while ($data = mysqli_fetch_assoc($result)) {
		?>
			<img src="./image/<?php echo $data['filename']; ?>">

		<?php
		}
		?>
	</div>
    </div>
</body>

</html>
