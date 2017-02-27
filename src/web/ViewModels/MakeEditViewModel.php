<?php

namespace ViewModels;

use Core\Entities\Make;

class MakeEditViewModel {
	public $id;
	public $name;

	static function createFromDto (Make $make) : MakeEditViewModel {
		$vm = new self();

		$vm->id = $make->getId();
		$vm->name = $make->getName();

		return $vm;
	}

	static function createFromDefaults () : MakeEditViewModel {
		$vm = new self ();

		return $vm;
	}
}
?>