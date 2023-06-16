<div>
    <div class="chat-history" id="scroll-to-bottom">
        <div wire:poll>
            <ul class="m-b-0">
                @foreach ($chat as $chat)
                @if($chat->sender_type == 1)
                <li class="clearfix" style="text-align:left;">
                    <div class="message-data">
                        <span class="message-data-time">{{date('h:i A', strtotime($chat->created_at))}}, {{date('d M Y', strtotime($chat->created_at))}}</span>
                        <img src="
                            @if($chat->message->teacher->photo == null)
                                https://www.gravatar.com/avatar/18c09435dd06ec766fd8ade4631cf4d7?s=100&#038;r=g&#038;d=mm
                            @else
                                {{route('index')}}/assets/images/teachers/{{$chat->message->teacher->photo}}
                            @endif
                        " alt="avatar" style="width:45px; height:45px;">
                    </div>
                    <div class="message my-message"> {{$chat->text}} </div>
                </li>
                @else
                <li class="clearfix text-right" style="text-align:right;">
                    <div class="message-data">
                        <span class="message-data-time">{{date('h:i A', strtotime($chat->created_at))}}, {{date('d M Y', strtotime($chat->created_at))}}</span>
                        <img src="
                            @if($chat->message->student->photo == null)
                                https://www.gravatar.com/avatar/18c09435dd06ec766fd8ade4631cf4d7?s=100&#038;r=g&#038;d=mm
                            @else
                                {{route('index')}}/assets/images/students/{{$chat->message->student->photo}}
                            @endif
                        " alt="avatar" style="width:45px; height:45px;">
                    </div>
                    <div class="message other-message float-right"> {{$chat->text}} </div>
                </li>
                @endif
                @endforeach

            </ul>
        </div>
    </div>
</div>
<script>
        let container = document.getElementById("scroll-to-bottom");
        addEventListener("DOMContentLoaded", () => {
            scrollDown();
        });

        addEventListener("scrolldown", () => {
            livewire.hook('message.processed', () => {
                if (container.scrollTop + container.clientHeight + 300 < container.scrollHeight)
                {
                    return;
                }
                scrollDown();
            });
        });
        addEventListener("do", () => {
                scrollDown();
        });

        function scrollDown() {
            container.scrollTop = container.scrollHeight;
        }
    </script>
