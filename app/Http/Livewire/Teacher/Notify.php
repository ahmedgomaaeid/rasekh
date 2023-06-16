<?php

namespace App\Http\Livewire\Teacher;

use App\Models\Notify as ModelsNotify;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Notify extends Component
{
    public function render()
    {
        $notifies = ModelsNotify::where('teacher_id', Auth::guard('teacher')->user()->id)->orderBy('updated_at', 'desc')->get();
        $new_notifies = ModelsNotify::where('teacher_id', Auth::guard('teacher')->user()->id)->where('seen', 0)->get();
        $seen_sign = ($new_notifies->count() > 0) ? 1 : 0;
        return view('livewire.teacher.notify', compact('notifies', 'seen_sign'));
    }
}
