<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Ginecologo;
use App\Models\Paciente;
use App\Models\Administrativo;
use App\Providers\RouteServiceProvider;
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
        return view('auth.register');
    }

    public function create_ginecologo()
    {
        return view('auth.register-ginecologo');
    }

    public function create_paciente()
    {
        return view('auth.register-paciente');
    }

    private function getReglasValidacionRegistroGinecologo(){
        return [
            //'fecha_contratacion' => 'required|date',
            //'vacunado' => 'required|boolean',
            //'sueldo' => 'required|numeric',
            //'especialidad_id' => 'required|exists:especialidads,id'
        ];
    }

    private function getReglasValidacionRegistroPaciente(){
        return [//'nuhsa' => ['required', 'string', 'max:12', 'min:12', new Nuhsa]
        ];
    }

    private function getReglasValidacionRegistro(Request $request){
        $reglasValidacionRegistro = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'tipo_usuario_id' => 'required|numeric'
        ];
        if(intval($request->tipo_usuario_id) == 1)
            //Ginecólogo
            return array_merge($reglasValidacionRegistro, $this->getReglasValidacionRegistroGinecologo());
        if(intval($request->tipo_usuario_id) == 2)
            //Paciente
            return array_merge($reglasValidacionRegistro, $this->getReglasValidacionRegistroPaciente());
    }

    private function crearUsuarioBase(Request $request): User
    {
        return User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    }

    private function crearGinecologo(Request $request, User $user){
        $medico = new Ginecologo($request->all());
        $medico->user_id = $user->id;
        $medico->save();
    }

    private function crearPaciente(Request $request, User $user){
        $paciente = new Paciente($request->all());
        $paciente->user_id = $user->id;
        $paciente->save();
    }

    private function crearSubclaseUserSegunTipoUsuario(Request $request, User $user){
        if(intval($request->tipo_usuario_id) == 1)
            $this->crearGinecologo($request, $user);
        elseif(intval($request->tipo_usuario_id) == 2){
            $this->crearPaciente($request, $user);
        }


    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate($this->getReglasValidacionRegistro($request));
        $user = $this->crearUsuarioBase($request);
        $this->crearSubclaseUserSegunTipoUsuario($request, $user);
        $user->fresh();
        event(new Registered($user));
        Auth::login($user);
        return redirect(RouteServiceProvider::HOME);
    }
}
