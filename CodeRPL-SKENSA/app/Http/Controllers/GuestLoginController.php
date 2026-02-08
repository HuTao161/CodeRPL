<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class GuestLoginController extends Controller
{
    public function login(Request $request)
    {
        /**
         * =========================================================
         * LOGIN SEBAGAI GUEST
         * =========================================================
         * - Tidak pakai password
         * - Role: guest
         * - Email dummy unik
         */

        $guestEmail = 'guest_' . uniqid() . '@guest.local';

        $guest = User::create([
            'name'     => 'Guest User',
            'email'    => $guestEmail,
            'password' => bcrypt(str()->random(16)),
            'role'     => 'guest', // optional
        ]);

        Auth::login($guest);

        return redirect()->route('dashboard'); // sesuaikan
    }
}
