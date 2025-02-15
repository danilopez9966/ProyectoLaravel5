<?php

namespace App\Http\Controllers;

use App\Mail\ContactoMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ContactoController extends Controller
{
    public function pintarFcontacto()
    {
        return view('formContacto.fcontacto');
    }

    public function procesarF(Request $request){
    // Verifica si el usuario está autenticado
    if (Auth::user() != null) { 
        // Si el usuario está autenticado, se validan los datos del formulario
        $request->validate([
            'nombre' => ['required', 'string', 'min:4', 'max:40'],
            'email' => ['nullable', 'email'],
            'body' => ['required', 'string', 'min:5', 'max:80']
        ]);
    } else { 
        // Si el usuario NO está autenticado, el email es obligatorio
        $request->validate([
            'nombre' => ['required', 'string', 'min:4', 'max:40'],
            'email' => ['required', 'email'],
            'body' => ['required', 'string', 'min:5', 'max:80']
        ]);
    }

    try {
        // Intenta enviar el correo a la dirección especificada
        Mail::to('support@contacto.org')
        ->send(new ContactoMailable($request->nombre, $request->email ?? Auth::user()->email,$request->body
        ));
        // Redirige al usuario a la página de inicio con un mensaje de éxito
        return redirect()->route('inicio')->with('mensaje','se envio el mensaje');
    } catch (\Exception $ex) {
        // Si hay un error al enviar el email, muestra un mensaje de error
        dd('Error al enviar el email:'.$ex->getMessage()); // Debugging (detiene la ejecución y muestra el error)       
        // Redirige al usuario a la página de inicio con un mensaje de error
        return redirect()->route('inicio')->with('mensaje','NO envio el mensaje');
    }
}

}
