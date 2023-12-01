<?php

namespace App\Livewire\Views\Admin;

use App\Models\User as UserModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class User extends Component
{
    public $image, $imagePlaceholder, $name, $surname, $can_sell, $user, $email;

    public function mount($id)
    {
        $this->user = UserModel::find(Crypt::decrypt($id));

        if (!$this->user) {
            return redirect()->route('admin-users')->with('error', 'User not found');
        }

        $this->name = $this->user->name;
        $this->surname = $this->user->surname;
        $this->email = $this->user->email;

        $this->imagePlaceholder = asset('img/profile.png');
    }

    public function updateUser()
    {
        $this->validate([
            'name' => ['required', 'string'],
            'surname' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users,email,' . $this->user->user_id . ',user_id'],
        ]);

        try {
            $this->user->update([
                'name' => $this->name,
                'surname' => $this->surname,
                'email' => $this->email,
                'can_sell' => $this->can_sell ?? 0
            ]);

            return back()->with('success', 'User updated successfully. Only changes will be saved');
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }
    }

    public function deleteUser()
    {
        try {
            $this->user->delete();

            return redirect()->route('admin-users')->with('success', 'User deleted successfully');
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }
    }

    public function render()
    {
        return view('livewire.views.admin.user');
    }
}
