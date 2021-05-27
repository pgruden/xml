<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>XML projekt</title>

	<link rel="stylesheet" href="style.css">
</head>

<body>


	<div class="wrapper">

		<div class="content">
			<form action="" method="post">
				<div class="title">
					<h2>LOGIN</h2>
				</div>
				<div>
					<?php

					$username = "";
					$password = "";

					if ($_SERVER["REQUEST_METHOD"] == "POST") {

						$ans = $_POST;

						if (empty($ans["username"])) {
							echo "Korisnicki račun nije unesen.";
						} else if (empty($ans["password"])) {
							echo "Lozinka nije unesena.";
						} else {
							$username = $ans["username"];
							$password = $ans["password"];

							provjera($username, $password);
						}
					}

					function provjera($username, $password)
					{


						$filename = 'data.json';

						$data = file_get_contents($filename);
						$users = json_decode($data);


						foreach ($users as $user) {
							$usrn = $user->username;
							$usrp = $user->password;
							$usrime = $user->ime;
							$usrprezime = $user->prezime;
							if ($usrn == $username) {
								if ($usrp == $password) {
									echo "Username:  <b> $usrime $usrprezime </b>";
									return;
								} else {
									echo "Netocna lozinka";
									return;
								}
							}
						}

						echo "Korisnik ne postoji.";
						return;
					}
					?>
				</div>
				<input type="text" name="username" id="username" placeholder="username">
				<input type="password" name="password" id="password" placeholder="password">
				<input type="submit" name="submit" value="Login">
			</form>
		</div>

	</div>





</body>

</html>