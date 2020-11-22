<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Ui\Presets\React;

class NotesController extends Controller
{
    public function home(){
        $note = DB::table('notes')->get();
        return view('home', compact('note'));
    }

    public function new_note(Request $request){

        $current_notes = DB::table('notes')->count();
        $current_notes++;

        if ( $current_notes < 10 ) {
            $note_id = 'NOTE00000' . $current_notes;
        } elseif ( $current_notes >= 10 && $current_notes <= 99 ) {
            $note_id = 'NOTE0000' . $current_notes;
        } elseif ( $current_notes >= 100 && $current_notes <= 999 ) {
            $note_id = 'NOTE000' . $current_notes;
        } elseif ( $current_notes >= 1000 && $current_notes <= 9999 ) {
            $note_id = 'NOTE00' . $current_notes;
        } elseif ( $current_notes >= 10000 && $current_notes <= 99999 ) {
            $note_id = 'NOTE0' . $current_notes;
        } elseif ( $current_notes >= 100000 && $current_notes <= 999999 ) {
            $note_id = 'NOTE' . $current_notes;
        }

        DB::table('notes')->insert([
            'id' => $note_id,
            'title' => $request->note_title,
            'content' => $request->note_content
        ]);

        return redirect('/notes');
    }

    public function note_detail(Request $request){
        $note_id = $request->note_id;
        $note_detail = DB::table('notes')->where('id', $note_id)->get(['title', 'content']);

        return response()->json($note_detail);
    }
}