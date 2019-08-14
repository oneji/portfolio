<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Skill;

class SkillController extends Controller
{
    /**
     * Store a new skill.
     *
     * @param  Request  $request
     * @return Response
     */
    public function save(Request $request)
    {
        $validatedData = $request->validate([
            'skill_name' => 'required',
        ]);

        $skill = new Skill();
        $skill->skill_name = $request->skill_name;
        $skill->save();

        // Put the message in session
        $request->session()->flash('success', 'Information has been successfully saved.');

        return redirect()->action('Admin\AboutController@get');
    }

    /**
     * Delete one of skills.
     *
     * @param integer $id
     * @return Response
     */
    public function delete($id)
    {
        $skill = Skill::find($id);
        $skill->delete();

        return redirect()->action('Admin\AboutController@get');
    }
}
