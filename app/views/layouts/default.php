<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../../../css/main.css">
	<link rel="shortcut icon" href="../../../images/favicon1.png" type="image/x-icon">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

	<title>
		<?= $title ?>
	</title>
</head>

<body>
	<div class="main-wrapper">
		<div class="main-page">
			<div class="top-content">
				<header>
					<div class="main-header">
						<a href="/"> <img class="logo" src="../../../images/logo.png" alt=""></a>
						<div class="topnav">
							<!-- <a class="active" href="#home">Home</a> -->
							<a class="" href="/pets">Pets</a>
							<!-- <a href="#!trello">Trello</a> -->
							<a href="/clients">Clients</a>
						</div>
						<a href="/check_404"> <img class="loginUcon" src="../../../images/loginIcon2.png" alt=""></a>
					</div>
				</header>

			</div>

			<div class="content">
				<?= $content ?>
			</div>
		</div>

		<div class="main-footer">
			<p>createdBy @hunbow</p>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
	<script src="../../../js/lib/jquery.maskedinput.min.js"></script>
	<script src="../../../js/lib/axios.min.js"></script>
	<script src="../../../js/lib/app/main.js"></script>
</body>

</html>