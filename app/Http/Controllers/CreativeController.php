<?php

namespace App\Http\Controllers;

use App\Campaign;
use App\Creative;
use App\Field;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CreativeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Campaign $campaign)
    {
        $fields = Field::where('field_entity', 'line_item')->get();
        return Inertia::render('Creatives/Create', compact('campaign', 'fields'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
                                       'data' => 'required',
                                       'campaign_id' => 'required|exists:campaigns,id'
                                   ]);
        $creatie = Creative::create($data);
        return redirect()->route('campaigns.show', ['campaign' => $creatie->campaign_id])
            ->withMessage([
                              'title' => 'Creative stored',
                              'body' => 'The Creative got stored successfully to our database',
                              'type' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Creative  $creative
     * @return \Illuminate\Http\Response
     */
    public function show(Creative $creative)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Creative  $creative
     * @return \Illuminate\Http\Response
     */
    public function edit(Creative $creative)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Creative  $creative
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Creative $creative)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Creative  $creative
     * @return \Illuminate\Http\Response
     */
    public function destroy(Creative $creative)
    {
        //
    }
}
