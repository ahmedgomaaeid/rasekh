<?php

namespace App\Exports;

use App\Models\ChargingCard;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CardExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($from, $to)
    {
        $this->from = $from;
        $this->to = $to;
    }
    public function headings(): array
    {
        return [
            'قيمة البطاقة',
            'رقم البطاقة',
            'تاريخ الانشاء',
        ];
    }
    public function collection()
    {
        $charging_cards = ChargingCard::whereBetween('created_at', [$this->from, $this->to])->orderBy('id', 'desc')->get();
        $data = [];
        foreach ($charging_cards as $charging_card) {
            $data[] = [
                'قيمة البطاقة' => $charging_card->value,
                'رقم البطاقة' => $charging_card->card_number,
                'تاريخ الانشاء' => $charging_card->created_at,
            ];
        }
        return collect($data);
    }
}
