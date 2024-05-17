<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class Posts extends Component
{

    // attributs des clesses
    public $title, $body;

    //lises des posts
    public $posts;

    //
    public $isOpen = 0;

    //edit
    public $edit_model = false;

    public $post_id;


    

    //methode crud
    public function store(){
        $validated_data = $this->validate([
            'title' => 'required',
            'body' => 'required',

        ]);

        Post::create($validated_data);
        session()->flash('message', 'Post created Successfully');
        $this->resetInputfield();
    }

    //vider les champs de saisie après soumissions
    protected function resetInputfield(){
        $this->title = '';
        $this->body = '';
    }


    //edit
    public function edit($id){
        $this->edit_model = true;
        $post = Post::findOrFail($id);
        $this->title = $post->title;
        $this->body = $post->body;
        $this->post_id = $id;

        // $this->openModal();

    }

    //update
    public function update(){
        $validated_data = $this->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $post = Post::findOrFail($this->post_id);
        $post->update();

        session()->flash('message', 'success updated');
        $this->resetInputfield();
        $this->edit_model = false;
    }


    //cancelUpdate
    public function cancelUpdate(){
        $this->edit_model = false;
        $this->resetInputfield();
    }
    


    //delete fonctuon

    public function delete($id){
        $post = Post::findOrFail($id);
        $post->delete();

    }


    public function render()
    {
        $this->posts = Post::all();
        return view('livewire.posts');
    }

    public function openModal(){
        $this->isOpen = true;
    }

    public function closeModal(){
        $this->isOpen = false;
    }


    

}


