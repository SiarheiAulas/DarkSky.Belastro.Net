<?php 

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class LocationFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
	public function gray($gray)
    {
        return $this->where('gray', $gray);
    }
	
	public function blue($blue)
    {
        return $this->where('blue', $blue);
    }
	
	public function lightblue($lightblue)
    {
        return $this->where('blue', $lightblue);
    }
	
	public function green($green)
    {
        return $this->where('green', $green);
    }
	
	public function yellow($yellow)
    {
        return $this->where('yellow', $yellow);
    }
	
	public function orange($orange)
    {
        return $this->where('orange', $orange);
    }
	
	public function red($red)
    {
        return $this->where('red', $red);
    }
	
	public function south($south)
    {
        return $this->where('south', $south);
    }
	
	public function north($north)
    {
        return $this->where('north', $north);
    }
	
	public function west($west)
    {
        return $this->where('west', $west);
    }
	
	public function east($east)
    {
        return $this->where('east', $east);
    }
	
	public function hills($hills)
    {
        return $this->where('hills', $hills);
    }
	
	public function valley($valley)
    {
        return $this->where('valley', $valley);
    }
	
	public function plato($plato)
    {
        return $this->where('plato', $plato);
    }
	
	public function auto1($auto1)
    {
        return $this->where('auto1', $auto1);
    }
	
	public function auto2($auto2)
    {
        return $this->where('auto2', $auto2);
    }
	
	public function train($train)
    {
        return $this->where('train', $train);
    }
	
	public function bus($bus)
    {
        return $this->where('bus', $bus);
    }
	
	public function distance($distance)
    {
        return $this->where('distance', '>=', $distance);
    }
	
}
