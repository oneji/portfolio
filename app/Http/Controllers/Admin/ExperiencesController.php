<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Experience;
use Carbon\Carbon;

class ExperiencesController extends Controller
{
    /**
     * Show the form to create a new experience part.
     *
     * @return Response
     */
    public function get()
    {
        $experience = Experience::orderBy('id', 'desc')->get();

        return view('admin.pages.experience', [ 'experience' => $experience ]);
    }

    /**
     * Store a new experience part.
     *
     * @param  Request  $request
     * @return Response
     */
    public function save(Request $request)
    {
        $validatedData = $request->validate([
            'start_date' => 'required',
            'occupation' => 'required',
            'company' => 'required',
        ]);

        $experience = new Experience();
        $experience->start_date = Carbon::parse($request->start_date);
        $experience->finish_date = $request->finish_date === null ? null : Carbon::parse($request->finish_date);
        $experience->occupation = $request->occupation;
        $experience->company = $request->company;
        $experience->job_description = $request->job_description;
        $experience->save();

        // Put the message in session
        $request->session()->flash('success', 'Information has been successfully saved.');

        return redirect()->action('Admin\ExperiencesController@get');
    }

    /**
     * Delete one of experience parts.
     *
     * @param integer $id
     * @return Response
     */
    public function delete($id)
    {
        $experienceItem = Experience::find($id);
        $experienceItem->delete();

        return redirect()->action('Admin\ExperiencesController@get');
    }
}
