<?php

use App\Models\User;
use App\Models\City;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Composition;

/**
 * Get listing of a resource.
 *
 * @return \Illuminate\Http\Response
 */
function brands()
{
    return Brand::pluck('name','id');
}

/**
 * Get listing of a resource.
 *
 * @return \Illuminate\Http\Response
 */
function categories()
{
    return Category::pluck('name','id');
}

/**
 * Get listing of a resource.
 *
 * @return \Illuminate\Http\Response
 */
function compositions()
{
    return Composition::pluck('formula','id');
}

/**
 * Get listing of a resource.
 *
 * @return \Illuminate\Http\Response
 */
function users()
{
    $users = User::all()->mapWithKeys(function ($user) {
        $string = "{$user->name} ({$user->phone_number} )";
        return [$user->id => $string];
    })->toArray();
    return $users; 
}

/**
 * Get listing of a resource.
 *
 * @return \Illuminate\Http\Response
 */
function cities()
{
    return City::whereStatus('Publish')->pluck('name','id');
}

/**
 * Get listing of a resource.
 *
 * @return \Illuminate\Http\Response
 */
function cityList()
{
    return City::whereStatus('Publish')->get();
}