<?php

namespace App\Filters;

use Illuminate\Http\Request;

abstract class Filters {
	
	protected $request;

	protected $filters = [];

	protected $builder;

	public function __construct(Request $request)
	{
		$this->request = $request;
	}


	public function apply($builder) 
	{
		$this->builder = $builder;

		foreach($this->getFilters() as $filter => $value) {
			
			if (method_exists($this, $filter)) {
				if (is_array($value)) {
					foreach ($value as $v) {
						if (is_null($v)) return;

						$this->$filter(...$value);
					}
				} else {
					$this->$filter($value);
				}
			}
		}
		
        return $this->builder;
	}

	protected function getFilters()
	{
		return $this->request->intersect($this->filters);
	}
}