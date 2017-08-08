<?php

namespace App\Filters;

class RentalPaymentFilters extends Filters
{
	protected $filters = ['id','sewaId','date'];

	protected function id($id)
	{
		return $this->builder->where('id', $this->request->id);
	}

	protected function sewaId($sewaId)
	{
		return $this->builder->where('sewa_id', $this->request->sewaId);
	}

	protected function date($from, $to)
	{
		return $this->builder->whereBetween('created_at', [$from,$to]);
	}
}