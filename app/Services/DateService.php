<?php

namespace App\Services;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DateService
{

    public function __construct()
    {

    }

    public function createDate($date)
    {
        $edate = Carbon::createFromFormat('Y-m-d', $date);

        return $edate;
    }
}
