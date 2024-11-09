<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;


class ProfileController extends Controller
{
    // show the profile info form
    public function show() {
        return view('dashboard.profile');        
    }

    // update email, first name and last name
    public function updateGeneralInfo(Request $request)
    {
        $user = auth()->user();

        // Validación de los datos
        $request->validate([
            'fname' => 'required|string|max:50',
            'lname' => 'string|max:50',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        // Actualización de los datos
        $user->update([
            'fname' => $request->input('fname'),
            'lname' => $request->input('lname'),
            'email' => $request->input('email'),
        ]);


        // Redirigir con un mensaje de éxito
        return back()->with('generalInfo', 'Profile updated successfully!');
    }

    // update the password
    public function updatePassword(Request $request)
    {
        $user = auth()->user();

        // Validar la contraseña actual, la nueva contraseña y su confirmación
        $request->validate([
            'current_password' => ['required'],
            'password' => ['required', 'confirmed', Password::min(8)->mixedCase()],
        ]);

        // Verificar que la contraseña actual sea correcta
        if (!Hash::check($request->input('current_password'), $user->password)) {
            return back()->withErrors(['current_password' => 'The current password is incorrect.']);
        }

        // Actualizar la contraseña
        $user->update([
            'password' => Hash::make($request->input('password')),
        ]);

        // Redirigir con un mensaje de éxito
        return back()->with('pwd', 'Password updated successfully!');
    }

    //delete an account
    public function destroy(Request $request)
    {
        $user = Auth::user();

        // Cerrar la sesión del usuario antes de eliminarlo
        Auth::logout();

        // Eliminar el usuario
        $user->delete();

        // Redirigir a la página de inicio con un mensaje de éxito
        return redirect('/login')->with('status', 'Your account has been deleted successfully.');
    }
}
