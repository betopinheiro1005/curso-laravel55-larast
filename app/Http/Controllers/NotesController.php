<?php

namespace App\Http\Controllers;

use App\Note;
use App\Group;
use App\Http\Requests\NotesRequest;
use Illuminate\Http\Request;

class NotesController extends Controller
{

    // public function __construct(){
    //   $this->middleware('check.loggedin');
    // }

    public function index(Group $group){
        $groups = Group::all();
    		// $notes = $group->notes;
        // $notes = $group->notes()->where('user_id', \Auth::user()->id)->get();
        $notes = \Auth::user()->notes()->where('group_id', $group->id)->get();

	      return view('notes.index', compact('notes', 'groups'));
    }

    public function create(){
      $groups = Group::pluck('name', 'id');
		  return view('notes.create', compact('groups'));
    }

  //   public function show($id){
		// $note = Note::find($id);
		// return view('notes/show', [ 'note' => $note ]);
  //   }

    public function show(Note $note){
  		return view('notes.show', compact('note'));
    }

  //   public function store(){
		// $note = new Note;
		// $note->title = request()->title;
		// $note->body = request()->body;
		// $note->important = is_null(request()->important ? 0 : 1);
		// $note->save();
  //   }

    public function store(NotesRequest $request){
      // request()->validate([
      //       'title' => 'required',
      //       'body' => 'required|min: 20'
      // ]);

     //  $data = request()->all();
     //  $data['user_id'] = \Auth::user()->id;
    	// Note::create($data);

      // $note = new Note(request()->all());
      // $note->user_id = \Auth::user()->id;
      // $note->save();

      $note = new Note(request()->all());
      \Auth::user()->notes()->save($note);

    	return redirect('/notes');
    }

    public function edit(Note $note){
      $groups = Group::pluck('name', 'id');
      return view('notes.edit', compact('note', 'groups'));
    }

    public function update(Note $note, NotesRequest $request){
      // request()->validate([
      //       'title' => 'required',
      //       'body' => 'required|min: 20'
      // ]);
      $note->update( $request->all() );
      // $note->title = request()->title;
      // $note->body = request()->body;
      // $note->important = request()->important;
      // $note->save();
      return redirect('/notes');
    }

    public function destroy(Note $note){
      $note->delete();
     return redirect('/notes');
    }

}
