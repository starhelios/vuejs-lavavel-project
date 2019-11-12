<?php

namespace App\Exports;

use App\Campaign;
use Maatwebsite\Excel\Concerns\FromCollection;

class CampaignExport implements FromCollection
{

    private $filters;

    public function __construct($filters = null)
    {
        $this->filters = $filters;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $filters = $this->filters;
        $campaigns = Campaign::with('creatives', 'insertion_orders', 'line_items');
        if ($filters) {
            foreach ($filters as $name => $filter_value) {
                $campaigns->where('data->' . $name, $filter_value);
            }
        }
        $campaigns = $campaigns->get();

        $campaigns = $campaigns->map(function($campaign) {
            $data[] = $campaign->id;
            $data = $campaign->data;
        });
        return $campaigns;
    }
}
