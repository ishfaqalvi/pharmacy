<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;

class UserController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        return view('web.user.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $city = City::whereName($request->city)->first();
        if (!$city) {
            return response()->json(['state' => 'warning', 'message' => 'City not found!']);
        }
        $input = $request->all();
        $input['city_id'] = $city->id;
        auth()->user()->update($input);

        return response()->json(['message' => 'Your profile updated successfully!']);
    }

    /**
     * Get a listing of resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchCity(Request $request)
    {
        $query = $request->input('city');
        $cities = City::where('name', 'LIKE', "%{$query}%")->where('status','Publish')->get();
        $output = '<div class="list-group">';
            if(count($cities) > 0){
                foreach ($cities as $city) {
                    $output .= '<a href="javascript:void(0)" class="list-group-item list-group-item-action search-result">' . $city->name . '</a>';
                }
            }else{
                $output .= '<span class="list-group-item list-group-item-action">No record found!</span>';
            }
        $output .= '</div>';
        return response()->json($output);
    }
}
