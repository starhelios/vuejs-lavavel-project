<?php

namespace App\Http\Controllers;

use App\Campaign;
use App\Field;
use App\InsertionOrder;
use Illuminate\Http\Request;
use Inertia\Inertia;

class InsertionOrderController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Campaign $campaign)
    {
        $fields = Field::where('field_entity', 'insertion_order')->get();
        return Inertia::render('InsertionOrder/Create', compact('campaign', 'fields'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
                                       'data' => 'required',
                                       'campaign_id' => 'required|exists:campaigns,id'
                                   ]);
        $insertion_order = InsertionOrder::create($data);
        return redirect()->route('campaigns.show', ['campaign' => $insertion_order->campaign_id])
            ->withMessage([
                              'title' => 'Insetion Order stored',
                              'body' => 'The Insertion Order got stored successfully to our database',
                              'type' => 'success']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InsertionOrder $insertionOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(InsertionOrder $insertion_order)
    {
        return Inertia::render('InsertionOrder/Edit', compact('insertion_order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\InsertionOrder      $insertion_order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InsertionOrder $insertion_order)
    {

        $data = $request->validate([
                                       'data' => 'required'
                                   ]);
        $insertion_order->update($data);

        return redirect()->route('campaigns.show', ['campaign' => $insertion_order->campaign_id])
            ->withMessage([
                              'title' => 'Insetion Order update',
                              'body' => 'The Insertion Order got updated successfully.',
                              'type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InsertionOrder $insertion_order
     * @return \Illuminate\Http\Response
     */
    public function destroy(InsertionOrder $insertion_order)
    {
        //
    }
}
