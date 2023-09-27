<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\Type;
use App\Facades\UserPermissions;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create() {

        $types = Type::orderBy('nome')->get();
        return view('auth.register', compact('types'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'type_id' => ['required', 'exists:types,id'], // Certifique-se de que o tipo existe
            'lattes' => ['nullable', 'string'], // Adicione uma regra de validação para 'lattes'
        ]);
    
        $userData = [
            'name' => $request->name,
            'email' => $request->email,
            'type_id' => $request->type_id,
            'password' => Hash::make($request->password),
        ];
    
        // Adicione o campo 'lattes' ao array de dados do usuário se o tipo for 'professor'
        if ($request->type_id == 'valor_do_tipo_professor') {
            $userData['lattes'] = $request->lattes;
        }
    
        $user = User::create($userData);
    
        event(new Registered($user));
    
        // Redirecionar de volta para a rota anterior (ou para uma rota personalizada)
        return redirect('/admin')->with('success', 'Registro bem-sucedido! Você está logado agora.');
    }
    
}
