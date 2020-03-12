<?php
	function logOrNot(string $log): string {
		if (isset($log) && $log === "Log In"):
			return ("log_in.php");
		elseif (isset($log) && $log === "Log Out"):
			return ("log_out.php");
		else:
			return ("log_out.php");
		endif;
	}

	function checkbox(string $value, string $name, array $data): string {
		if(isset($data[$name]) && in_array($value, $data[$name]))
			return 'checked';
		return '';
	}

	function pictures(array $data): string {
		if (isset($data['upload'])) {
			return ($data['upload']);
		}
		else
			return '';
	}
?>