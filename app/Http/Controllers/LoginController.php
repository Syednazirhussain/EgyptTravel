<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\User;

class LoginController extends Controller
{

    public function viewLogin()
    {
        return view('auth.login');
    }

    public function login_action(Request $request)
    {
       if(Auth::attempt(['email' => $request->input('email'),'password' => $request->input('password'),'user_role_code' => 'admin','status_code' => 'active']))
       {
            return redirect()->route('admin.dashboard');
       }
       else
       {
            $error = \Illuminate\Validation\ValidationException::withMessages([
               'Assess Denied' => ['Invalid email or password']
            ]);
            throw $error;
            return redirect()->route('admin.view.login');
       }
    }

    public function logout(Request $request)
    {
        if(Auth::check())
        {
            Auth::logout();
            $request->session()->flush();
            return redirect()->route('admin.view.login');
        }
        else
        {
            return redirect()->back();
        }
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
