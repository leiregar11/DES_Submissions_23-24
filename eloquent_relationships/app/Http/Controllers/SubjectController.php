<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;


class SubjectController extends Controller
{
    public function index(){

        $subjects=Subject::all();
      return view("subjectsViews.addSubject",["subjects"=>$subjects]);
  }

  public function create(Request $request)
  {
      
      Subject::create([
          'subject' => $request->subject,
      ]);

      return redirect()->route('subject');
  }

  public function edit($id)
  {
      $subject = Subject::findOrFail($id);
      return view('subjectsViews.editSubject', compact('subject'));
  }

  public function update(Request $request, $id)
  {
      $subject = Subject::findOrFail($id);
      $subject->update([
          'subject' => $request->subject,
      ]);

      return redirect()->route('subject');

  }

  public function destroy($id)
  {
      $subject = Subject::findOrFail($id);

      $subject->delete();

      return redirect()->back();


  }
}
