<?php

namespace App\Exports;

use App\Models\ChargingCard;
use Maatwebsite\Excel\Concerns\FromCollection;

class CardExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ChargingCard::all();
    }
}
