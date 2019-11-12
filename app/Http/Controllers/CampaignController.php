<?php

namespace App\Http\Controllers;

use App\Campaign;
use App\Field;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CampaignController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $campaigns = Campaign::with('creatives', 'insertion_orders', 'line_items')->paginate(15);
        return Inertia::render('Campaigns/Index', compact('campaigns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fields = Field::where('field_entity', 'campaign')
            ->with('field_values')->get();
        return Inertia::render('Campaigns/Create', compact('fields'));
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
                                       'name' => 'nullable',
                                       'data' => 'required'
                                   ]);
        $campaign = Campaign::create($data);
        return redirect($campaign->uri)
            ->withMessage(['title' => 'Campaign created', 'body' => 'Cammpaign created successfully.', 'type' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function show(Campaign $campaign)
    {
        $campaign->loadMissing('insertion_orders', 'creatives', 'line_items');
        return Inertia::render('Campaigns/Show', compact('campaign'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function edit(Campaign $campaign)
    {
        $fields = Field::where('field_entity', 'campaign')
            ->with('field_values')->get();

        return Inertia::render('Campaigns/Edit', compact('campaign', 'fields'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Campaign $campaign)
    {
        $data = $request->validate([
                                       'data' => 'required'
                                   ]);
        $campaign->update($data);
        return redirect()->route('campaigns.show', ['campaign' => $campaign->id])
            ->withMessage(['title' => 'Stored', 'body' => 'Cammpaign updated successfully.', 'type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function destroy(Campaign $campaign)
    {
        //
    }
}
