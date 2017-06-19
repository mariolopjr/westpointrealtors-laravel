<?php

namespace App\Http\Controllers;

use App\Building;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    public function index()
    {
        $buildings = Building::all();
        return view('buildings.index', compact('buildings'));
    }

    public function show(Building $building)
    {
        return view('buildings.show', compact('building'));
    }
}
