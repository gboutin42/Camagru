<?php
	connecting_session();
	
	function connecting_session() {
		if(!isset($_SESSION['connexion_start'])) {
			session_start();
			$_SESSION['connexion_start'] = true;
		}
	}

	function logOrNot($log) {
		if (isset($log) && $log === "Log In"):
			return ("log_in.php");
		elseif (isset($log) && $log === "Log Out"):
			return ("log_out.php");
		else:
			return ("log_out.php");
		endif;
	}

	function checkbox(string $name): string {
		if ($_SESSION[$name] == 1) {
			return 'checked';
		} else {
			return '';
		}
	}

	function display_error() {
		if (array_key_exists('error', $_SESSION)) {
			echo $_SESSION['error'];
			$_SESSION['error'] = NULL;
		}
	}
?>