<?php

namespace App\Http\Controllers;

use App\Field;
use App\FieldValue;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Inertia\Inertia;

class FieldValueController extends BaseController
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
    public function create()
    {
        $fields = Field::where('taggable', 1)->get();
        return Inertia::render('Values/Create', compact('fields'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $values = $request->validate([
                                         'formData' => 'required'
                                     ]);
        // raw values
        $values = $values['formData'];
        // prepare empty array for bulk inserting
        $insert_data = [];
        // Values are global by default, just if the user is related to a country or a agency, it isn't.
        $global_available = 1;
        if (auth()->user()->agency_id || auth()->user()->country_id) {
            $global_available = 0;
        }
        foreach ($values as $key => $value) {
            // skip null values
            if (!$value) {
                continue;
            }
            if (Str::contains($value, ", ")) {
                // if there are multiple values add all of them
                $split_values = explode(', ', $value);
                foreach ($split_values as $splitted_value) {
                    // skip null values
                    if (!$splitted_value) {
                        continue;
                    }
                    array_push($insert_data,
                               $this->getFieldValueData($key, $splitted_value, $global_available)
                    );
                }
            } else {
                // if just one value, don't split it, just add it to array
                array_push($insert_data,
                           $this->getFieldValueData($key, $value, $global_available)
                );
            }
        }

        DB::table('field_values')->insert($insert_data);

        $message = [
            'title' => 'Values created',
            'body' => count($insert_data) . ' Values are added to database.',
            'type' => 'success'
        ];

        if($request->has('stay')) {
            return back()->withMessage($message);
        }

        return redirect('/campaigns')->withMessage($message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FieldValue $fieldValue
     * @return \Illuminate\Http\Response
     */
    public function show(FieldValue $fieldValue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FieldValue $fieldValue
     * @return \Illuminate\Http\Response
     */
    public function edit(FieldValue $fieldValue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\FieldValue          $fieldValue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FieldValue $fieldValue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FieldValue $fieldValue
     * @return \Illuminate\Http\Response
     */
    public function destroy(FieldValue $fieldValue)
    {
        //
    }

    /**
     * @param     $key
     * @param     $splitted_value
     * @param int $global_available
     * @return array
     */
    protected function getFieldValueData($key, $value, int $global_available): array
    {
        return [
            'field_id' => $key,
            'name' => $value,
            'agency_id' => auth()->user()->agency_id,
            'country_id' => auth()->user()->country_id,
            'global_available' => $global_available,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()
        ];
    }
}
