<?php include 'filesLogicnew.php'?>
<html lang="en" >
<link rel ="stylesheet" href="style.css">
<head>

</head>

<body background="download1.jpg">
<br><br><br><br><br><br> 
  <div class="container">
	<div class="row">
		<form action="upnew.php" method="post" enctype="multipart/form-data" id="imageUploadForm" class="imageUploadForm">
		<h3>Upload File</h3>
		<input type="file" name="myfile"><br>
		<div>
		<input type="hidden" name="pass" value="123">
		</div>  
		<button type= "submit" name="save">Uplink</button>
		</form>
		<div align="center"><button><a href='listnew.php' style="text-decoration: none">Uploaded Files</a></button></div>
	</div>
	</div>

 
</body>

</html>
