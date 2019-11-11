<?php

namespace App\Http\Controllers;

use App\Campaign;
use App\Field;
use App\LineItem;
use Illuminate\Http\Request;
use Inertia\Inertia;

class LineItemController extends Controller
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
        return Inertia::render('LineItems/Create', compact('campaign', 'fields'));
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
        $line_item = LineItem::create($data);
        return redirect()->route('campaigns.show', ['campaign' => $line_item->campaign_id])
            ->withMessage([
                              'title' => 'Line item stored',
                              'body' => 'The Line item got stored successfully to our database',
                              'type' => 'success']);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LineItem $label
     * @return \Illuminate\Http\Response
     */
    public function edit(LineItem $line_item)
    {
        $fields = Field::where('field_entity', 'line_item')->get();
        return Inertia::render('LineItems/Edit', compact('line_item', 'fields'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\LineItem            $line_item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LineItem $line_item)
    {

        $data = $request->validate([
                                       'data' => 'required'
                                   ]);
        $line_item->update($data);

        return redirect()->route('campaigns.show', ['campaign' => $line_item->campaign_id])
            ->withMessage([
                              'title' => 'Line item update',
                              'body' => 'The Line item got updated successfully.',
                              'type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LineItem $line_item
     * @return \Illuminate\Http\Response
     */
    public function destroy(LineItem $line_item)
    {
        //
    }
}
