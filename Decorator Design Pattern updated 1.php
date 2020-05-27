<?php

class BasePiece {
	private $price;
	function __construct($p) {
		$this->price  = $p;
	}    
	function getprice() {
		return $this->price;
	}
}

class BPDecorator {
	protected $BP;
	protected $price;
	public function __construct(BasePiece $BP) {
		$this->BP = $BP;
		$this->resetBP();
	}   
	function resetBP() {
		$this->price = $this->BP->getprice();
	}
	function showprice() {
		return $this->amount;
	}
}

class PhysicalPriceDecorator extends BPDecorator {
	private $BPdecorator;
	public function __construct(BPDecorator $BPdecorator) {
		$this->BPdecorator = $BPdecorator;
	}
	function addphysicalfeature() {
		$this->BPdecorator->price += 500;
	}
}

class PatternPriceDecorator extends BPDecorator {
	private $BPdecorator;
	public function __construct(BPDecorator $BPdecorator) {
		$this->BPdecorator = $BPdecorator;
	}
	function addpattern() {
		$this->BPdecorator->price += 200;
	}
}



?>