<?php

namespace App\Livewire\Views\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class Users extends Component
{
    public $search;

    public function mount()
    {
        // $this->users = User::all()->except(Auth::user()->user_id);
    }

    public function viewUser($id)
    {
        return redirect()->route('admin-user', ['id' => Crypt::encrypt($id)]);
    }

    public function render()
    {
        return view('livewire.views.admin.users', [
            'users' => User::where('user_id', '!=', Auth::user()->user_id)
                ->where('name', 'like', '%' . $this->search . '%')
                ->get(),
        ]);
    }
}
