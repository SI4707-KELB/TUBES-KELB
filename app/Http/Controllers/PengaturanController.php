<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengaturanController extends Controller
{
    /**
     * Show the profile settings page.
     *
     * @return \Illuminate\View\View
     */
    public function profile()
    {
        return view('pengaturan.profil');
    }

    /**
     * Show the notification settings page.
     *
     * @return \Illuminate\View\View
     */
    public function notifikasi()
    {
        return view('pengaturan.notifikasi');
    }

    /**
     * Show the security settings page.
     *
     * @return \Illuminate\View\View
     */
    public function keamanan()
    {
        return view('pengaturan.keamanan');
    }

    /**
     * Show the preferences settings page.
     *
     * @return \Illuminate\View\View
     */
    public function preferensi()
    {
        return view('pengaturan.preferensi');
    }

    /**
     * Show the account settings page.
     *
     * @return \Illuminate\View\View
     */
    public function akun()
    {
        return view('pengaturan.akun');
    }

    /**
     * Update user profile.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateProfile(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . auth()->id(),
            'phone_number' => 'nullable|string|max:20',
            'city' => 'nullable|string|max:255',
            'address' => 'nullable|string',
        ]);

        auth()->user()->update($validated);

        return redirect()->route('pengaturan.profile')->with('success', 'Profil berhasil diperbarui');
    }

    /**
     * Update user password.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required|current_password',
            'password' => 'required|string|min:8|confirmed',
        ]);

        auth()->user()->update([
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('pengaturan.keamanan')->with('success', 'Password berhasil diperbarui');
    }
}
