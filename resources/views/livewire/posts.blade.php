<div>
    @if (session()->has('message'))
        <div class="p-2 bg-green-800">
            {{ session('message') }}
        </div>
    @endif

    <h1 class="text-lg font-bold text-center">Livewire CRUD</h1>
    <div class="flex gap-8">
        <div>
            
            @if ($edit_model)
                @include('livewire.edit')
            @else
                @include('livewire.create')
            @endif
        </div>

        <div class="w-full p-6 text-gray-900 bg-gray-200">
            
            <h1 class="text-3xl">
                POSTS
            </h1>
            

            {{-- @if($isOpen)
                @include('livewire.dim')
            @endif --}}
            
            <div class="flex justify-center px-3 py-4">
                <table class="w-full mb-4 bg-white rounded shadow-md text-md">
                    <tbody>
                        <tr class="border-b">
                            <th class="p-3 px-5 text-left">ID</th>
                            <th class="p-3 px-5 text-left">Title</th>
                            <th class="p-3 px-5 text-left">Body</th>

                            <th></th>
                        </tr>

                        @forelse ($posts as $post)
                            <tr class="bg-gray-100 border-b hover:bg-orange-100">
                                <td class="p-6 text-black"> {{ $post->id }} </td>
                                <td class="p-6 text-black"> {{ $post->title }} </td>
                                <td class="p-6 text-black"> {{ $post->body }} </td>
                                <td class="flex justify-end p-3 px-5">

                                    <button wire:click.prevent='edit({{ $post->id }})' class="px-2 py-1 mr-3 text-sm text-white bg-green-500 rounded hover:bg-blue-700 focus:outline-none">Edit</button>
                                    <button wire:click.prevent='delete({{ $post->id }})' class="px-2 py-1 text-sm text-white bg-red-500 rounded hover:bg-red-700 focus:outline-none focus:shadow-outline">Delete</button>
                                
                                </td>
                            </tr>
                        @empty
                            <h1>Pas de posts disponiable</h1>
                        @endforelse
                        

                    </tbody>
                </table>
            </div>
        </div>
    </div>

        <!-- component -->
   
</div>
