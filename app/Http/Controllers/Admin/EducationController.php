<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Education;
use App\Country;
use Carbon\Carbon;

class EducationController extends Controller
{
    /**
     * Show the form to create a new education part.
     *
     * @return Response
     */
    public function get()
    {
        $education = Education::getInfo();
        $countries = Country::all();

        return view('admin.pages.education', [
            'education' => $education,
            'countries' => $countries
        ]);
    }

    /**
     * Store a new education part.
     *
     * @param  Request  $request
     * @return Response
     */
    public function save(Request $request)
    {
        $validatedData = $request->validate([
            'start_date' => 'required',
            'major' => 'required',
            'study_place' => 'required',
        ]);

        $education = new Education();
        $education->start_date = Carbon::parse($request->start_date);
        $education->finish_date = $request->finish_date === null ? null : Carbon::parse($request->finish_date);
        $education->major = $request->major;
        $education->degree = $request->degree;
        $education->study_place = $request->study_place;
        $education->country_id = $request->country_id;
        $education->description = $request->description;
        $education->save();

        // Put the message in session
        $request->session()->flash('success', 'Information has been successfully saved.');

        return redirect()->action('Admin\EducationController@get');
    }

    /**
     * Delete one of education parts.
     *
     * @param integer $id
     * @return Response
     */
    public function delete($id)
    {
        $educationItem = Education::find($id);
        $educationItem->delete();

        return redirect()->action('Admin\EducationController@get');
    }
}
