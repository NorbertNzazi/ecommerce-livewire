<?php

namespace App\Livewire\Views\Auth;

use App\Models\AccountRecovery;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class NewPassword extends Component
{
    public $email, $password, $passwordConfirmation, $resetInstance;

    public function mount(Request $request)
    {
        $this->email = Crypt::decrypt($request->email);

        $this->resetInstance = AccountRecovery::find($this->email);

        if (!$this->resetInstance) {
            return redirect()->route('home')->with('error', 'Invalid token');
        }
    }

    public function updatePassword()
    {
        $this->validate([
            'password' => ['required', 'min:8'],
            'passwordConfirmation' => ['required', 'same:password']
        ]);

        try {
            User::where('email', $this->email)->first()->update([
                'password' => Hash::make($this->password)
            ]);

            $this->resetInstance->delete();

            return redirect()->route('home')->with('success', 'Your password was changed successfully');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('home')->with('error', $th->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.views.auth.new-password');
    }
}
