<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {

        $turmas = ['Nenhuma','Administração', 'Contabilidade', 'Eletrônica', 'Mecânica', 'Informática', 'Petróleo e Gás', 'Processos Fotográficos','Jogos Digitais'];
        $anoSeries = ['Nenhum','1°', '2°', '3°', '4°'];
        return view('auth.register', compact('turmas', 'anoSeries'));

    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([

            'nome' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'matricula' => ['required', 'int'],
            'numeroTelefone' => ['required', 'string', 'max:15'],
            'turma' => ['required', 'string', 'in:Nenhuma,Administração,Contabilidade,Eletrônica,Mecânica,Informática,Petróleo e Gás,Processos Fotográficos,Jogos Digitais'],
            'anoSerie' => ['required', 'string', 'in:Nenhum,1°,2°,3°,4°'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],

        ]);

        if ($request->anoSerie === '4°' && !in_array($request->turma, ['Informática', 'Jogos Digitais'])) {

            $errorMessage = 'A série 4° só pode ser selecionada para as turmas Informática ou Jogos Digitais.';

            return back()->withErrors(['anoSerie' => $errorMessage])->withInput();

        }

        $user = User::create([
            'nome' => $request->nome,
            'matricula' => $request->matricula,
            'numeroTelefone' => $request->numeroTelefone,
            'turma' => $request->turma,
            'anoSerie' => $request->anoSerie,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
    
}
