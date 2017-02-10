<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Mail;
use Auth;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    public function postRegister(Request $request){
        
        $rules = [
            'name' => 'required|min:3|max:16|regex:/^[a-záéíóúàèìòùäëïöüñ\s]+$/i',
            'email' => 'required|email|max:255|unique:users,email',
            'telefono' => 'required|min:6|max:15',
            'address' => 'required|min:10|max:50',
            'username' => 'required|min:6|max:20',
            'password' => 'required|min:6|max:18|confirmed',
        ];
        
        $messages = [
            'name.required' => 'El campo es requerido',
            'name.min' => 'El mínimo de caracteres permitidos son 3',
            'name.max' => 'El máximo de caracteres permitidos son 16',
            'name.regex' => 'Sólo se aceptan letras',
            'email.required' => 'El campo es requerido',
            'email.email' => 'El formato de email es incorrecto',
            'email.max' => 'El máximo de caracteres permitidos son 255',
            'email.unique' => 'El email ya existe',
            'telefono.required' => 'El campo es requerido',
            'telefono.min' => 'El mínimo de caracteres permitidos son 6',
            'telefono.max' => 'El máximo de caracteres permitidos son 15',
            'address.required' => 'El campo es requerido',
            'address.min' => 'El mínimo de caracteres permitidos son 10',
            'address.max' => 'El máximo de caracteres permitidos son 50',
            'username.required' => 'El campo es requerido',
            'username.min' => 'El mínimo de caracteres permitidos son 6',
            'username.max' => 'El máximo de caracteres permitidos son 20',
            
            'password.required' => 'El campo es requerido',
            'password.min' => 'El mínimo de caracteres permitidos son 6',
            'password.max' => 'El máximo de caracteres permitidos son 18',
            'password.confirmed' => 'Los passwords no coinciden',
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages);
        
        if ($validator->fails()){
            return redirect("auth/register")
            ->withErrors($validator)
            ->withInput();
        }
        else{
            $user = new User;
            $data['name'] = $user->name = $request->name;
            $data['email'] = $user->email = $request->email;
            $data['telefono'] = $user->telefono = $request->telefono;
            $data['address'] = $user->address = $request->address;
            $data['username'] = $user->username = $request->username;
            $user->password = bcrypt($request->password);
            $user->tipousuarioid = 2;
            $user->remember_token = str_random(100);
            $data['confirm_token'] = $user->confirm_token = str_random(100);
            $user->save();
            
            /*Mail::send('mails.register', ['data' => $data], function($mail) use($data){
                $mail->subject('Confirma tu cuenta');
                $mail->to($data['email'], $data['name']);
            });*/
            
            /*return redirect("auth/register")
            ->with("message", "Hemos enviado un enlace de confirmación a su cuenta de correo electrónico");*/
            return redirect("auth/register")
            ->with("message", 'Enhorabuena ' . $user[0]['name'] . ' ya puede iniciar sesión');
        }         
        
    }

    public function confirmRegister($email, $confirm_token){
        $user = new User;
        $the_user = $user->select()->where('email', '=', $email)
        ->where('confirm_token', '=', $confirm_token)->get();

        if (count($the_user) > 0){
        $active = 1;
        $confirm_token = str_random(100);
        $user->where('email', '=', $email)
        ->update(['active' => $active, 'confirm_token' => $confirm_token]);
        return redirect('auth/register')
        ->with('message', 'Enhorabuena ' . $the_user[0]['name'] . ' ya puede iniciar sesión');
        }
        else
        {
        return redirect('');
        }
    }

    public function postLogin(Request $request){
        
        if (Auth::attempt(
                [
                    'username' => $request->username,
                    'password' => $request->password,
                    'active' => 1
                ]
                , $request->has('remember')
                )){
            return redirect()->intended($this->redirectPath());
        }
        else{
            $rules = [
                'username' => 'required',
                'password' => 'required',
            ];
            
            $messages = [
                'username.required' => 'El campo usuario es requerido',
                'password.required' => 'El campo password es requerido',
            ];
            
            $validator = Validator::make($request->all(), $rules, $messages);
            
            return redirect('auth/login')
            ->withErrors($validator)
            ->withInput()
            ->with('message', 'Error al iniciar sesión');
        }
    }
    /*public function postLogin(Request $request){
        
        if (Auth::attempt(
                [
                    'email' => $request->email,
                    'password' => $request->password,
                    'active' => 1
                ]
                , $request->has('remember')
                )){
            return redirect()->intended($this->redirectPath());
        }
        else{
            $rules = [
                'email' => 'required|email',
                'password' => 'required',
            ];
            
            $messages = [
                'email.required' => 'El campo email es requerido',
                'email.email' => 'El formato de email es incorrecto',
                'password.required' => 'El campo password es requerido',
            ];
            
            $validator = Validator::make($request->all(), $rules, $messages);
            
            return redirect('auth/login')
            ->withErrors($validator)
            ->withInput()
            ->with('message', 'Error al iniciar sesión');
        }
    }*/
}
