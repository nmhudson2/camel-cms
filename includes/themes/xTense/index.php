<!DOCTYPE html>
<html lang="en">

<head>
	<?php include 'functions.php' ?>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php env( 'APP_NAME' ) ?></title>
	<link rel="stylesheet" href="includes/themes/xTense/assets/css/index.css">
</head>

<body>
	<div class="main">
		<h1><?php echo $GLOBALS['name'] ?></h1>
		<p>
			This is a hardcoded page, demonstrating how themes can be extended with non-blade templates.
			The xTense Theme uses regular PHP files to generate and style content. Edit the PHP file yourself to check
			it
			out!
		</p>
	</div>
</body>

</html>

<?php return ?>