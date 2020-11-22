<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/', '/notes');
Route::get('/notes', 'NotesController@home');
Route::post('/notes', 'NotesController@new_note');
Route::post('/notes/detail', 'NotesController@note_detail');
