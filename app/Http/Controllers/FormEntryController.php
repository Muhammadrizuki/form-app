<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormEntry;

class FormEntryController extends Controller
{
    public function index()
    {
        $formEntries = FormEntry::all();
        return view('form-entries.index', compact('formEntries'));
    }
}
