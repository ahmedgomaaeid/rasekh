<?php

namespace App\Http\Livewire\Teacher;

use App\Models\Notify;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Seen extends Component
{
    public function render()
    {
        $new_notifies = Notify::where('teacher_id', Auth::guard('teacher')->user()->id)->where('seen', 0)->get();
        $seen_sign = ($new_notifies->count() > 0) ? 1 : 0;
        return view('livewire.teacher.seen', compact('seen_sign'));
    }
    public function seen()
    {
        $new_notifies = Notify::where('teacher_id', Auth::guard('teacher')->user()->id)->where('seen', 0)->get();
        foreach ($new_notifies as $new_notify) {
            $new_notify->seen = 1;
            $new_notify->save();
        }
        $this->dispatchBrowserEvent('dropdown');
    }
}
