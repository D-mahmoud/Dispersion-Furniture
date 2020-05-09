<?php

abstract class Customer {
    private $name;
	abstract function send(Message $subject_in);
}

class User extends Customer {
	public function __construct($name) {
		$this->name = $name;
	}
	public function send(Message $subject) {
		writeln(' Hello '.$this->name);
		writeln(' '.$subject-> get_Text());    
		writeln('');		
	}
}


abstract class Message {
	abstract function attatch(Customer $c);
	abstract function detatch(Customer $c);
	abstract function notify();
}


class actions extends Message {
	private $text = NULL;
	private $clients = array();
	
	function attach(Customer $c) {
		$this->clients[] = $c;
	}
	function detatch(Customer $c) {
		foreach($this->clients as $i => $client) {
			if ($client === $c) { 
				unset($this->clients[$i]);
			}
		}
	}
	function notify() {
		foreach($this->clients as $client) {
			$client->send($this);
		}
	}
	function sendEmail($text) {
		$this->text = $text;
		$this->notify();
	}
	public function get_Text() {
		return $this->text;
	}
}



$clients = new clientGroup();
$clients->sendEmail('welcome to the system');


$clients->sendEmail('Nice to have you');


?>