<?php
	function send_mail_verify_account($mail, $username, $token, $url): void {
		$subject = "Camagru - Verification Account";

		$headers = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
		$headers .= 'From: <gboutin@student.42.fr>' . "\r\n";

		$message = '
		<html>
		<head>
		  <title>' . $subject . '</title>
		</head>
		<body>
			Hello ' . htmlspecialchars($username) . ' !</br>
			To finalyze your subscribtion please click the link below </br>
			<a href="http://' . $url . '/verify.php?token=' . $token . '">Verify my email</a>
		</body>
		</html>
		';

		mail($mail, $subject, $message, $headers);
	}

	function send_mail_forgot_password($mail, $username, $password, $url): void {
		$subject = "Camagru - Forgot Password";

		$headers = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
		$headers .= 'From: <gboutin@student.42.fr>' . "\r\n";

		$message = '
		<html>
		<head>
		  <title>' . $subject . '</title>
		</head>
		<body>
			Hello ' . htmlspecialchars($username) . ' !</br>
			Your password has been reset, now it is : "' . $password . '"</br>
			Login you <a href="http://' . $url . '/log_in.php">HERE</a>
		</body>
		</html>
		';

		mail($mail, $subject, $message, $headers);
	}

	function send_mail_like($mail, $username): void {
		$subject = "Camagru - New Like";

		$headers = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
		$headers .= 'From: <gboutin@student.42.fr>' . "\r\n";

		$message = '
		<html>
		<head>
		  <title>' . $subject . '</title>
		</head>
		<body>
			Hello ' . htmlspecialchars($username) . ' !</br>
			You received a new like.
		</body>
		</html>
		';

		mail($mail, $subject, $message, $headers);
	}
	function send_mail_comment($mail, $username): void {
		$subject = "Camagru - New Comment";

		$headers = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
		$headers .= 'From: <gboutin@student.42.fr>' . "\r\n";

		$message = '
		<html>
		<head>
		  <title>' . $subject . '</title>
		</head>
		<body>
			Hello ' . htmlspecialchars($username) . ' !</br>
			You received a new comment.
		</body>
		</html>
		';

		mail($mail, $subject, $message, $headers);
	}
?>