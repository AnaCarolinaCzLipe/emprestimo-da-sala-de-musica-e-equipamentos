<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;


class ProfileController extends Controller
{

    public function userStatus(Request $request): View
    {

        $userId = $request->user()->id;

        $user = User::find($userId);

        if ($user) 
        {

            return view('profile.user-status', compact('user'));
            
        } 
        else {

            return redirect()->route('dashboard');

        }

    }

    public function index(Request $request): View
    {
        $userId = $request->user()->id;

        $user = User::find($userId);

        return view("profile.show-profile", compact('user'));

    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {

        $user = $request->user()->fill($request->validated());

        $matriculaIgual = User::where('matricula', $request->input('matricula'))->where('id', '!=', $user->id)->first();

        if ($matriculaIgual) {

            return Redirect::back()->withErrors(['matricula' => 'Esta matrícula já está registrada.'])->withInput();

        }

        if ($request->user()->isDirty('email')) {

            $request->user()->email_verified_at = null;
                
        }
    
        $request->user()->save();

        return Redirect::route('profile.index')->with('status', 'profile-updated');

    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            
            'password' => ['required', 'current_password'],

        ]);

        $user = $request->user();

        if ($user->imagem) 
        {

            if (file_exists(public_path($user->imagem))) 
            {

                unlink(public_path($user->imagem)); 

            }
            
        }
    
        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');

    }

    public function gerenciarFotoPerfil(Request $request)
    {

        $request->validate([

            'imagem' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
                
        ]);
        
        $userId = $request->user()->id;
        $user = User::find($userId);

        if ($user->imagem) 
        {

            if (file_exists(public_path($user->imagem))) 
            {

                unlink(public_path($user->imagem));

            }
        }

        $imagem = time().'.'.$request->imagem->extension();
        $request->imagem->move(public_path('users'), $imagem);
        $path = "/users/".$imagem;

        $user->imagem = $path;
        $user->save();
        
        return redirect()->route('profile.userStatus')->with('status', 'profile-updated');

    }

    public function deletarFotoPerfil(Request $request) 
    {

        $userId = $request->user()->id;
        $user = User::find($userId);

        if ($user->imagem) 
        {

            if (file_exists(public_path($user->imagem))) {

                unlink(public_path($user->imagem));

            }

            $user->imagem = NULL;
            $user->save();

            return redirect()->route('profile.userStatus')->with('status', 'profile-image-deleted');

        } else {
                
            return redirect()->route('profile.userStatus')->with('status', 'no-profile-image');

        }

    }
    
}
