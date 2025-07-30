<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index', ['user' => Auth::user()]);
    }

    public function update(Request $request)
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255', 'unique:users,phone' . $request->user()->id]
        ];

        $user = $request->user();

        if (!$user->isOauthUser()) {
            $rules['email'] = ['required', 'string', 'email', 'max:255', 'unique:users,email' . $user->id];
        }

        $data = $request->validate($rules);

        $user->fill($data);

        $success = 'Your profile was updated!';

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
            $user->sendEmailVerificationNotification();
            $success .= ' Email Verification was sent. Please verify!';
        }

        $user->save();

        return redirect()->route('profile.index')->with('success', $success);
    }

    public function updatePassword(Request $request)
    {
        $rule = [
            'current_password' => ['required', 'current_password'],
            'password' => [
                'required',
                'confirmed',
                Password::min(8)
                    ->max(24)
                    ->numbers()
                    ->mixedCase()
                    ->symbols()
                    ->uncompromised()
            ]
        ];

        $data = $request->validate($rule);

        $request->user()->update([
            'password' => Hash::make($data['password'])
        ]);

        return redirect()->route('profile.index')->with('success', 'Password updated successfuly');
    }
}
