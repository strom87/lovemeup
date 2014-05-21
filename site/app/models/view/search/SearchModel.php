<?php namespace view\search;

use helpers\DropDown;

class SearchModel {

	public $minage;
	public $maxage;

	public $ages;

	public function __construct()
	{
		$this->defaultValues();

		$this->ages = DropDown::ages();
	}

	private function defaultValues()
	{
		$this->minage = 18;
		$this->maxage = 100;
	}

}