<?php

namespace App\Livewire\Views\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class NewUser extends Component
{
    public $imagePlaceholder, $name, $surname, $can_sell, $email, $password, $passwordConfirmation;

    public function mount()
    {
        $this->imagePlaceholder = asset('img/profile.png');
    }

    public function resetForm()
    {
        return $this->reset('name', 'surname', 'email', 'password', 'passwordConfirmation');
    }

    public function createUser()
    {
        $this->validate([
            'name' => ['required', 'string'],
            'surname' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:8'],
            'passwordConfirmation' => ['required', 'same:password']
        ]);

        try {
            $user = User::create([
                'name' => $this->name,
                'surname' => $this->surname,
                'email' => $this->email,
                'can_sell' => $this->can_sell ?? 0,
                'password' => Hash::make($this->password)
            ]);

            if ($user) {
                self::resetForm();
                return redirect()->route('admin-new-user')->with('success', 'User created successfully');
            }
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }

        dd('We can create a new user');
    }

    public function render()
    {
        return view('livewire.views.admin.new-user');
    }
}
