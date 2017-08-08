<?php

namespace App\Filters;

class MaintenanceFilters extends Filters
{
	protected $filters = ['id','nim','locker','status','type'];

	protected function id($id)
	{
		return $this->builder->where('id', $id);
	}

	protected function nim($nim)
	{
		return $this->builder->where('student_id', $nim);
	}

	protected function locker($locker)
	{
		return $this->builder->where('locker_id', $locker);
	}

	protected function status($status)
	{
		return $this->builder->where('status', $status);
	}

	protected function type($type)
	{
		return $this->builder->where('maintenance_type', $type);
	}
}