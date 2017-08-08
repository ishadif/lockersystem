<?php

namespace App\Filters;


class MaintenanceSubmissionFilters extends Filters {
	
	protected $filters = ['id','approved'];

	protected function id($id)
	{
		return $this->builder->where('id', $id);
	}

	protected function approved($approve)
	{
		return $this->builder->where('approved', (int) $approve);
	}
}