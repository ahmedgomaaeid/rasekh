<div>
    <div class="chat-message clearfix">
        <div class="input-group mb-0">
            <div class="input-group-prepend" wire:click.prevent="send">
                <span class="input-group-text"><i class="fa fa-send"></i></span>
            </div>
            <input type="text" class="form-control" wire:model="conv" placeholder="اكتب رسالتك هنا ..." wire:keydown.enter="send">
        </div>
    </div>
</div>

