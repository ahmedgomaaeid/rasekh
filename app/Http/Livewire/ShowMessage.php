<?php

namespace App\Http\Livewire;

use App\Models\Conversation;
use App\Models\Message;
use Livewire\Component;

class ShowMessage extends Component
{
    public $message_id;

    public function mount($message_id)
    {
        $this->message_id = $message_id;
    }
    public function render()
    {
        $message = Message::find($this->message_id);
        if($message->student_read == 0)
        {
            $message -> student_read = 1;
            $message -> save();
        }
        $chat = Conversation::where('message_id', $this->message_id)->get();
        return view('livewire.show-message', compact('chat'));
    }
}
