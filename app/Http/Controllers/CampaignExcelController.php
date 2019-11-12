<?php

namespace App\Http\Controllers;

use App\Exports\CampaignExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CampaignExcelController extends BaseController
{

    public function download(Request $request)
    {
        $filters = json_decode($request->filters);
        return Excel::download(new CampaignExport($filters), 'campaigns.xlsx');
    }
}
