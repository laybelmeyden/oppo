<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Filform;
use Excel;
use DB;
use App\Exports\ProjectExport;
use Illuminate\Support\Facades\Mail;

class MainController extends Controller
{
    public function upload_from(Request $request)
    {
        if ($request->hasFile('app')) {
            Filform::create(
                [
                    'name_fill' => request('name_fill'),
                    'years' => request('years'),
                    'radio' => request('radio'),
                    'city' => request('city'),
                    'numb' => request('numb'),
                    'email' => request('email'),
                    'model' => request('model'),
                    'shop' => request('shop'),
                    'date' => request('date'),
                    'app' => request('app')->store('storage/upload'),
                ]
            );
            $request->app->store('public/upload');
        } else {
            Filform::create(
                [
                    'name_fill' => request('name_fill'),
                    'years' => request('years'),
                    'radio' => request('radio'),
                    'city' => request('city'),
                    'numb' => request('numb'),
                    'email' => request('email'),
                    'model' => request('model'),
                    'shop' => request('shop'),
                    'date' => request('date'),
                    'app' => request('app'),
                ]
            );
        }

        $data = array(
            'name_fill' => request('name_fill'),
            'years' => request('years'),
            'city' => request('city'),
            'radio' => request('radio'),
            'numb' => request('numb'),
            'email' => request('email'),
            'model' => request('model'),
            'shop' => request('shop'),
            'date' => request('date'),
            'app' => request('app'),
        );
        $to_name = env("MAIL_ADMIN_NAMEFORM");
        $to_email = env("MAIL_ADMIN_FORM");
        $data = array(
            'name_fill' => request('name_fill'),
            'years' => request('years'),
            'city' => request('city'),
            'numb' => request('numb'),
            'radio' => request('radio'),
            'email' => request('email'),
            'model' => request('model'),
            'shop' => request('shop'),
            'date' => request('date'),
            'app' => request->file,
        );
        Mail::send('email.mailmain', $data, function ($message) use ($data, $to_email, $to_name) {
            $message->from($to_email, $data['name_fill'], $data['years'], $data['city'], $data['numb'], $data['email'], $data['model'], $data['shop'], $data['date'], $data['radio']);
            $message->to($to_email)->subject('Message from site');
            $message->attach($data['app']->getRealPath(), array(
                'as' => 'app.' . $data['app']->getClientOriginalExtension(),
                'mime' => $data['app']->getMimeType())
            );
        });

        back()->with('message_1', 'После обработки вашей анкеты, мы свяжемся с вами.');
        return redirect('/')->with('message', 'ВАША ЗАЯВКА ОТПРАВЛЕНА!');
    }
    public function excel_export()
    {
        return Excel::download(new ProjectExport, 'projects.xlsx');
    }
    public function update_main_form(Request $request)
    {
        return "ok";
    }
}
