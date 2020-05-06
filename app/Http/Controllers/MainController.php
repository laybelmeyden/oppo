<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Filform;
use Excel;
use DB;
use App\Exports\ProjectExport;

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
            'numb' => request('numb'),
            'email' => request('email'),
            'model' => request('model'),
            'shop' => request('shop'),
            'date' => request('date'),
            'app' => request('app'),
        );
        \Mail::send('email.mailmain', $data, function($message1) use($data)
        {   
            $mail_admin = env('MAIL_ADMIN_FORM');
            $message1->from($data['email'], $data['name_fill'], $data['years'], $data['city'], $data['numb'], $data['model'], $data['shop'], $data['date'], $data['app']);
            $message1->to($mail_admin, 'For Admin')->subject('Message from site');
           
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
