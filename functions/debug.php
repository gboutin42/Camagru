<?php
	function dump(string $name, $variable, int $nb) {
		$i = 0;
		while ($i < $nb) {
			echo "<br>";
			$i++;
		}
		echo "<h2>$name</h2>
			<pre>";
		var_dump($variable);
		echo "</pre>";
	}
?>