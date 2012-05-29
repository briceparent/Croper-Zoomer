<?php
session_start();
?>

<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Recadrement d'image</title>
	</head>
	<body>
<?php
if(isset($_FILES['file'])){
	if($_FILES['file']['error'] === 0){
		$image = __DIR__.'/temp/'. $_FILES['file']['name'];
		if(!is_dir(__DIR__.'/temp/')){
			mkdir(__DIR__.'/temp/');
		}
		move_uploaded_file($_FILES['file']['tmp_name'],$image);
		$imageFile = str_replace(__DIR__.'/','',$image);
		include('action.php');
	}else{
		echo 'Erreur dans l\'envoi de l\'image!<br />';
	}
}
?>
	<form method="POST" enctype="multipart/form-data">
	Retailler l'image suvante : <input type="file" name="file"/><br />
	<input type="submit" value="Envoyer"/>
	</form>

	</body>
</html>