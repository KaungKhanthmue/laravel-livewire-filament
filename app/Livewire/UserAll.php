<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;

class UserAll extends Component
{
    #[Url]
    #[Title('User All')]
    
    public $showSwitch = false;
    public $editUser = null;
    public $name, $email, $password, $password_confirmation, $cover_image, $profile_image;
    public $userIdBeingEdited;
    // public function editShow($id)
    // {
    //     $this->userIdBeingEdited = $id;
    //     $this->editUser = User::find($id);
    //     $this->name = $this->editUser->name;
    //     $this->email = $this->editUser->email;
    //     $this->showSwitch = true;
    // }
    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $this->userIdBeingEdited,
            'password' => 'nullable|confirmed|min:8',
            'cover_image' => 'nullable|image|max:1024',
            'profile_image' => 'nullable|image|max:1024',
        ]);

        if ($this->cover_image) {
            $coverImagePath = $this->cover_image->store('cover_images', 'public');
            $this->editUser->cover_url = $coverImagePath;
        }

        if ($this->profile_image) {
            $profileImagePath = $this->profile_image->store('profile_images', 'public');
            $this->editUser->profile_url = $profileImagePath;
        }

        $this->editUser->name = $this->name;
        $this->editUser->email = $this->email;

        if ($this->password) {
            $this->editUser->password = bcrypt($this->password);
        }

        $this->editUser->save();
        $this->resetForm();
    }

    public function editChartAction($id)
    {
        dd($id);
        $this->showSwitch = !$this->showSwitch;
    }
    public function deleteUser($id)
    {
        
        $user = User::find($id);
        dump($user);
    }

    public function render()
    {
        $users = User::get();
        return view('livewire.user-all', ['users' => $users]);
    }
}
