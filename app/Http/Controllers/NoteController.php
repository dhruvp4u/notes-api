<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    //
    public function index(){
        $notes = Note::all();

        return response()->json([
            'response'=>[
                'status_message' => 'success',
                'message' => $notes,
            ]
        ]);
    }

    public function create(Request $request){
       $note = new Note;
       $note->title= $request->title;
       $note->body = $request->body;
       
       $note->save();
       
       return response()->json([
            'response'=>[
                'status_message' => 'success',
                'message' => 'note added successfully',
            ]
        ]);
    }

    public function show($id){
        $note = Note::find($id);
        return response()->json([
            'response'=>[
                'status_message' => 'success',
                'message' => $note,
            ]
        ]);
    }

    public function update(Request $request, $id){
        $note= Note::find($id);
        
        $note->title = $request->title;
        $note->body = $request->body;
       
        $note->save();

        return response()->json([
            'response'=>[
                'status_message' => 'success',
                'message' => 'note saved successfully',
            ]
        ]);
    }

    public function delete($id){
        $note= Note::find($id);
        $note->delete();
        return response()->json([
            'response'=>[
                'status_message' => 'success',
                'message' => 'note deleted successfully',
            ]
        ]);
    }

}
