<?php

namespace App\Http\Controllers\Admin;

use App\Exports\CardExport;
use App\Http\Controllers\Controller;
use App\Models\ChargingCard;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class ChargingCardController extends Controller
{
    public function index()
    {
        $used_cards = ChargingCard::where('student_id', '!=', null)->get();
        $free_cards = ChargingCard::where('student_id', null)->get();
        return view('admin.charging-cards.index', compact('used_cards', 'free_cards'));
    }
    public function create()
    {
        return view('admin.charging-cards.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'points' => 'required',
            'count' => 'required',
        ]);
        for($i=0;$i<$request->count;$i++){
            ChargingCard::create([
                'points' => $request->points,
                'card_number' => generateRandomNumber(),
            ]);
        }
        return redirect()->route('get.admin.charging-card')->with('success', 'تمت الاضافة بنجاح');
    }
    public function edit($id)
    {
        $card = ChargingCard::find($id);
        return view('admin.charging-cards.edit', compact('card'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'points' => 'required',
        ]);
        $card = ChargingCard::find($id);
        $card->update($request->all());
        return redirect()->route('get.admin.charging-card')->with('success', 'تم تعديل البيانات بنجاح');
    }
    public function destroy($id)
    {
        $card = ChargingCard::find($id);
        $card->delete();
        return redirect()->route('get.admin.charging-card')->with('success', 'تم حذف البطاقة بنجاح');
    }
    public function export(Request $request)
    {
        $date = explode('/', $request->from);
        $date1 = explode('/', $request->to);
        $from = $date[2].'-'.$date[0].'-'.$date[1];
        $to = $date1[2].'-'.$date1[0].'-'.$date1[1].' 23:59:59';
        return Excel::download(new CardExport($from, $to), 'cards.xlsx');
    }
}
