<?php

namespace App\Filters;

class StaffFilters extends Filters
{
	protected $filters = ['id','name','email','division'];

	protected function id($id)
	{
		return $this->builder->where('id', $this->request->id);
	}

	protected function name($name)
	{
		return $this->builder->where('name', $this->request->name);
	}

	protected function email($email)
	{
		return $this->builder->where('email', $this->request->email);
	}

	protected function division($division)
	{
		$division = $this->request->division;

		return $this->builder->whereHas('roles', function($role) use ($division) {
			$role->where('slug', $division);
		});
	}
}