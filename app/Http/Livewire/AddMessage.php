<?php

namespace App\Http\Livewire;

use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddMessage extends Component
{
    public $message_id;
    public $conv;

    public function mount($message_id)
    {
        $this->message_id = $message_id;
    }

    public function render()
    {
        return view('livewire.add-message');
    }

    public function send()
    {
        $this->validate([
            'conv' => 'required'
        ]);

        $message = Message::find($this->message_id);
        $message->conversations()->create([
            'sender_id' => Auth::guard('student')->user()->id,
            'sender_type' => 0,
            'text' => $this->conv,
        ]);
        $message->teacher_read = 0;
        $message->updated_at = now();
        $message->save();
        $this->conv = '';
        $this->dispatchBrowserEvent('do');
        $this->dispatchBrowserEvent('scrolldown');
    }
}
