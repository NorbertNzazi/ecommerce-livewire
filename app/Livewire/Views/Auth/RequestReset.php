<?php

namespace App\Livewire\Views\Auth;

use App\Models\AccountRecovery;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class RequestReset extends Component
{
    public $email;

    public function getLink()
    {

        $user = User::where('email', $this->email)->first();

        if ($user) {

            try {
                $token = Str::random(10);
                $email = Crypt::encrypt($user->email);
                $url = "https://store-in.shop/auth/new-password?email=" . $email . '&token=' . $token;

                AccountRecovery::create([
                    'email' => $user->email,
                    'token' => $token
                ]);

                Mail::to($user->email)->send(new \App\Mail\RequestReset($token, $email, $url));
            } catch (\Throwable $th) {
                //throw $th;
                dd($th);
            }
        }

        return redirect()->route('request-response');
    }

    public function render()
    {
        return view('livewire.views.auth.request-reset');
    }
}
