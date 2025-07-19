<?php

namespace App\Http\Controllers\Creator;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

/**
 * Controller untuk mengelola profil kreator.
 * Menyediakan fungsi edit, update, dan hapus akun pengguna.
 */
class ProfileCreatorController extends Controller
{
    /**
     * Menampilkan halaman edit profil kreator.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(Request $request): View
    {
        // Mengembalikan view dengan data user yang sedang login
        return view('creator.profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Memproses pembaruan data profil kreator.
     * Melakukan validasi dan menyimpan data ke database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $user = auth()->user(); // Ambil data user saat ini

        // Pesan validasi khusus
        $messages = [
            'name.required' => 'The name field is required.',
            'name.string' => 'The name must be a valid string.',
            'name.max' => 'The name may not be greater than 255 characters.',

            'username.required' => 'The username field is required.',
            'username.string' => 'The username must be a valid string.',
            'username.max' => 'The username may not be greater than 255 characters.',
            'username.unique' => 'This username is already taken.',

            'profile.image' => 'The profile picture must be an image.',
            'profile.mimes' => 'Allowed image formats are jpeg, png, jpg, gif, and svg.',
            'profile.max' => 'The profile picture may not be larger than 2MB.',
        ];

        // Validasi input dari form
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:user,username,' . $user->id,
            'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], $messages);

        // Simpan nama dan username yang baru
        $user->name = $request->name;
        $user->username = $request->username;

        // Jika ada file gambar profil yang diunggah
        if ($request->hasFile('profile')) {
            // Hapus file lama jika ada
            if ($user->profile && Storage::disk('public')->exists($user->profile)) {
                Storage::disk('public')->delete($user->profile);
            }

            // Simpan gambar baru ke dalam folder 'profile' di disk 'public'
            $path = $request->file('profile')->store('profile', 'public');
            $user->profile = $path;
        }

        $user->save(); // Simpan perubahan ke database

        // Kembalikan ke halaman sebelumnya dengan flash message
        return back()->with('status', 'Profile updated successfully!');
    }

    /**
     * Menghapus akun pengguna setelah verifikasi password.
     * Logout, hapus akun, dan invalidate session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Validasi bahwa password yang diberikan sesuai
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user(); // Ambil data user

        Auth::logout(); // Logout user terlebih dahulu

        $user->delete(); // Hapus data user dari database

        // Invalidate dan regenerate session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect ke halaman utama dengan pesan sukses
        return Redirect::to('/')->with('success', 'Account deleted successfully!');
    }
}
