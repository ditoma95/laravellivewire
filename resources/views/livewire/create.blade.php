<div class="p-6 shadow-lg w-96">
    <form action="">
        <div class="grid">
            <label for="">Title</label>
            <input type="text" placeholder="title" wire:model.live='title'>

            @error('title')
                <span class="text-red-800"> {{ $message }} </span>
            @enderror
        </div>
    
        <div class="grid mt-4">
            <label for="">Body</label>
            <textarea class="h-16 resize-none" wire:model.live='body' id="" cols="30" rows="10"></textarea>
            @error('body')
                <span class="text-red-800"> {{ $message }} </span>
            @enderror
        </div>
        <button class="flex p-2 m-auto mt-6 text-center text-white bg-blue-800 rounded-lg" wire:click.prevent='store()'>save</button>
    </form>
</div>