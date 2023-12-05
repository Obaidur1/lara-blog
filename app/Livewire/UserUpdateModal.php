<?php


namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Illuminate\Support\Facades\DB;

class UserUpdateModal extends ModalComponent
{

    public $user;
    public function mount($id)
    {
        $this->user = User::findOrFail($id)->toArray();
    }
    public function update()
    {
        try {
            $user_up = User::findOrFail($this->user['id']);
            // Authorization logic here
            $user_up->update($this->user);
            $this->closeModal();
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
    public function delete_user()
    {
        //add authorization
        try {
            $user = User::findOrfail($this->user['id']);
            $user->delete();
            $this->closeModal();
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.user-update-modal');
    }
}
