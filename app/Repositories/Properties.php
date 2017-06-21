<?php

namespace App\Repositories;

use App\Property;

class Properties
{
    public function all()
    {
        return Property::all();
    }
}
