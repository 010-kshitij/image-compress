<?php
include"conn.php";
?>

<!doctype html>

<html >
<head>
	<meta charset="utf-8">
	<title>JS Image Compression demo - ExamsMyantra</title>
</head>
<body >
<div ng-app="demoApp">
  <div ng-controller="demoController">
	<form action="POST"  enctype="multipart/form-data">
		<input type="file"  name="demoImage" onchange="showPreview()" />
		Preview:
		<img alt="" src="" width="500">
		<button type="button" ng-click="compressAndUpload()">Upload</button>
	</form>
</div></div>	
	
	<script type="text/javascript" src="angular.min.js"></script>
	<script type="text/javascript" src="JIC.js"></script>
	<script type="text/javascript" src="custom.js"></script>
</body>
</html>