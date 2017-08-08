<?php

function create($class, $overrides = [], $total = null)
{
	return factory($class, $total)->create($overrides);
}

function make($class, $overrides = [], $total = null)
{
	return factory($class, $total)->make($overrides);
}