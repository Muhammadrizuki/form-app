<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormEntry;

class FormController extends Controller
{
    //Add tema and the limits
    protected $temaLimits = [
        'Health' => 15,
        'Sports' => 15,
        'Education' => 15,
        'E-Commerce' => 15,
        'News' => 15,
        'Anime' => 15,
    ];

    public function create()
    {
        // Get the count of each tema
        $temaCounts = FormEntry::select('tema', \DB::raw('count(*) as count'))
            ->groupBy('tema')
            ->pluck('count', 'tema')->all();

        // Filter out temas that have reached the limit
        $availableTemas = array_filter($this->temaLimits, function($limit, $tema) use ($temaCounts) {
            return isset($temaCounts[$tema]) ? $temaCounts[$tema] < $limit : true;
        }, ARRAY_FILTER_USE_BOTH);

        return view('form', ['availableTemas' => $availableTemas]);
    }

    public function store(Request $request)
    {
        // Validate the form input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:20|regex:/^[0-9a-zA-Z]+$/|unique:form_entries,nim',
            'tema' => 'required|string|in:Health, Sports, Education, E-commerce, News, Anime',
            'api_link' => 'required|url|max:255',
            'github_link' => 'required|url|max:255',
        ]);

        // Check if the selected tema has reached the limit
        $temaCounts = FormEntry::where('tema', $validated['tema'])->count();
        if ($temaCounts >= $this->temaLimits[$validated['tema']]) {
            return redirect()->back()->withErrors(['tema' => 'The selected Theme has reached its limit. Please choose another one.']);
        }

        // Create a new FormEntry record
        FormEntry::create($validated);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Form submitted successfully!');
    }
}
