<?php

namespace App\Http\Controllers;

use App\Note;
use App\Group;
use Illuminate\Http\Request;

class NotesWithoutGroupController extends Controller
	{

		// public function __construct(){
		// 	$this->middleware('check.loggedin');
		// }

	    public function index(Group $group){
	        $groups = Group::all();
    		// $notes = Note::where('group_id', '=', null)->get();
    		// $notes = Note::whereNull('group_id')->get();

    		// $notes = Note::withoutGroup()->latest()->get();
    		$notes = \Auth::user()->notes()->withoutGroup()->get();

    		// $notes = Note::withoutGroup()->oldest()->get();
			return view('notes.index', compact('notes', 'groups'));
    }
}
