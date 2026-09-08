<?php

namespace App\Http\Controllers;

use App\Mail\VerificationMailCode;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function AdminLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            $user = Auth::user();

            $authenticationCode = random_int(100000, 999999);

            session([
                'verification_code' => $authenticationCode,
                'user_id' => $user->id,
            ]);

            Mail::to($user->email)
                ->send(new VerificationMailCode($authenticationCode));

            Auth::logout();

            return redirect()
                ->route('custom.verification.form')
                ->with('status', 'Verification code sent to your mail');
        }

        return redirect()
            ->back()
            ->withErrors([
                'email' => 'Invalid credentials provided'
            ]);
    }

    public function ShowVerification()
    {
        return view('auth.verify');
    }

    public function VerificationVerify(Request $request)
    {
        $request->validate([
            'code' => 'required|numeric',
        ]);

        if ($request->code == session('verification_code')) {

            Auth::loginUsingId(session('user_id'));

            session()->forget([
                'verification_code',
                'user_id'
            ]);

            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'code' => 'Invalid verification code'
        ]);
    }

    public function AdminProfile()
    {
        $userprofile = Auth::user();

        return view('admin.admin_profile', compact('userprofile'));
    }

   public function ProfileStore(Request $request)
{
    $user = Auth::user();


    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'nullable|string|max:50',
        'address' => 'nullable|string|max:1000',
        'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
    ]);

    $user->name = $request->name;
    $user->email = $request->email;
    $user->phone = $request->phone;
    $user->address = $request->address;

    if ($request->hasFile('photo')) {

        // Save the old photo name
        $oldPhoto = $user->photo;

        // Get the new photo
        $photo = $request->file('photo');

        // Create unique filename
        $filename = time() . '.' . $photo->getClientOriginalExtension();

        // Upload new photo
        $photo->move(
            public_path('backend/assets/images/users'),
            $filename
        );

        // Update database with new photo
        $user->photo = $filename;

        // Delete old photo
        if (
            !empty($oldPhoto) &&
            $oldPhoto !== 'user-11.jpg'
        ) {

            $oldPhotoPath = public_path(
                'backend/assets/images/users/' . $oldPhoto
            );

            if (file_exists($oldPhotoPath)) {
                unlink($oldPhotoPath);
            }
        }
}

$user->save();

return redirect()
    ->back()
    ->with('success', 'Profile updated successfully.');


}


    public function ChangePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8',
            'confirm_password' => 'required|same:new_password',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->old_password, $user->password)) {
            return back()->withErrors([
                'old_password' => 'Old password is incorrect.'
            ]);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()
            ->back()
            ->with('success', 'Password changed successfully.');
    }
}