<?php

namespace App\Filters;


class RentalFilters extends Filters {

	protected $filters = ['id','nim','locker','status','date'];

	protected function id($id)
	{
        return $this->builder->where('id', $this->request->id);
	}
	
	protected function nim($nim)
	{
		return $this->builder->where('student_id', $nim);
	}

	protected function locker($lockerId)
	{
		return $this->builder->where('locker_id', $lockerId);
	}

	protected function status($status)
	{
		return $this->builder->where('status', $status);
	}

	protected function date($from, $to)
	{
		return $this->builder->whereBetween('created_at', [$from,$to]);
	}
}