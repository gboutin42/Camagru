<!-- Exemple d'Objet et de Class avec 2 variables et des fonctions dont la fonction __construct de base -->
<?php
class Demo {

	public $test1;
	public $test2 = 5;

	public function __construc(int $arg1, int $arg2)
	{
		$this->test1 = $arg1;
		$this->test2 = $arg2;
	}

	public function toHTML(): string
	{
		return "<strong>{$this->test1}h</strong> à <strong>{$this->test2}h</strong>";
	}

	public function inclusNombre(int $nb)
	{
		return $nb >= $this->test1 && $nb <= $this->test2;
	}

	public function intersect(Demo $objet): bool
	{
		return $this->inclusNombre($objet->test1) ||
			$this->inclusNombre($objet->test2) ||
			($this->test1 > $objet->test1 && $this->test2 < $objet->test2);
	}
}
?>