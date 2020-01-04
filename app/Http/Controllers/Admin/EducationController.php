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
            'major_en' => 'required',
            'study_place_en' => 'required',
        ]);

        $education = new Education();
        $education->start_date = Carbon::parse($request->start_date);
        $education->finish_date = $request->finish_date === null ? null : Carbon::parse($request->finish_date);
        $education->major_en = $request->major_en;
        $education->major_ru = $request->major_ru;
        $education->degree_en = $request->degree_en;
        $education->degree_ru = $request->degree_ru;
        $education->study_place_en = $request->study_place_en;
        $education->study_place_ru = $request->study_place_ru;
        $education->country_id = $request->country_id;
        $education->description_en = $request->description_en;
        $education->description_ru = $request->description_ru;
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
