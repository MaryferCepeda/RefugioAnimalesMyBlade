<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function enviarcorreo(Request $request) {
        try {
            $nombre = $request->input('nombre');
            $asunto = $request->input('asunto');
            $email = $request->input('email');
            $mensaje = $request->input('mensaje');  
            $para = 'arely06122003@gmail.com';
    
            Mail::send('correo.email', $request->all(), function($msg) use($asunto, $nombre, $email, $para) {
                $msg->from($email, $nombre);
                $msg->subject($asunto);
                $msg->to($para);
            });
    
            // Redirigir a la misma página con un mensaje de éxito
            return redirect()->back()->with('success', '¡Correo enviado exitosamente!');
        } catch (\Exception $e) {
            // Redirigir a la misma página con un mensaje de error
            return redirect()->back()->with('error', 'Hubo un problema al enviar el correo. Por favor, inténtalo de nuevo.');
        }
    }
    
}
    /*  
    public function enviodecorreo(Request $request){

        $para = 'Nosotros@gmail.com';

        Mail::send('email.correo',$request->all(), function($msj) use($asunto,$nombre,$email,$para){
            $msj->from($email,$nombre);
            $msj->subject($asunto);
            $msj->to($para);
        });
        return view('welcome');

    }
    */