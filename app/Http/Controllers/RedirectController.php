<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistRedirectRequest;
use App\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect as IlluminateRedirect;

class RedirectController extends Controller
{
    public function getByLitleHash($hash){

        $r = Redirect::where('id',hexdec($hash))->first();

        if($r == null){
            return abort(404);
        }

        $r->count++;
        $r->save();

        return IlluminateRedirect::to($r->to_url);
    }

    public function regist(){

        return view('register');
    }

    public function registurl(RegistRedirectRequest $request){

        $redirect = new Redirect($request->only(['to_url']));


        if($redirect->save()){

            return view('urldata',['redirect'=>$redirect]);
        }
        else{

            abort(500);

        }
    }

    public function show($hash){

        $redirect = Redirect::where('id',hexdec($hash))->first();

        if($redirect == null){
            return abort(404);
        }

        return view('urldata',['redirect'=>$redirect]);
    }
}
