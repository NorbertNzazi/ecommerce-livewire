<?php

namespace App\Livewire\Views\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class Access extends Component
{
    public $name, $surname, $email, $password, $auth, $valid, $emailProcessed;

    public function render()
    {
        return view('livewire.views.auth.access');
    }

    public function mount()
    {
        $this->auth = 'register';
        $this->emailProcessed = false;
    }

    // Update the form completion variable whenever a field is updated
    public function updated($field)
    {
        //
    }

    public function checkEmail()
    {
        $user = User::where('email', $this->email)->first();

        if ($user) {
            $this->auth = 'login';
        }

        $this->emailProcessed = true;
    }

    public function login()
    {
        $this->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        //Login user
        $user = Auth::attempt(['email' => $this->email, 'password' => $this->password]);

        if ($user) {
            return redirect()->route('home');
        }

        return back()->with('error', 'Invalid credentials');
    }

    public function register()
    {
        $this->validate([
            'email' => ['required', 'email', Rule::unique('users')],
            'password' => ['required', 'string', 'min:8'],
            'name' => ['required', 'string'],
            'surname' => ['required', 'string'],
        ]);

        try {
            $user = User::create([
                'name' => $this->name,
                'surname' => $this->surname,
                'email' => $this->email,
                'password' => Hash::make($this->password),
            ]);

            Auth::login($user);

            return redirect()->route('home');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function authenticate()
    {
        //
        switch ($this->auth) {
            case '':

                break;

            default:
                # code...
                break;
        }
    }
}
