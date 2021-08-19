<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Foundation\Auth\ResetsPasswords;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()){
          $data = Auth::user();
          if($data->role == 'pelapor'){
            return redirect('/dashboard');
          }else if($data->role == 'admin'){
            return redirect('/admin');
          }
          return abort(404);
        }else{
          return view('/welcome');
        }
        return abort(404);
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

    public function login()
    {
      if(Auth::user()){
        return redirect('/dashboard');
      }else{
        return view('auth.login');
      }
    }

    public function postlogin()
    {
      if(Auth::attempt($request->only('email', 'password'))){
        return redirect('/dashboard');
      }else{
        return redirect('/login');
      }
    }

    public function logout()
    {
      Auth::logout();
      return redirect('/');
    }

    /**
    * Send password reset link.
    */
    public function sendPasswordResetLink(Request $request)
    {
      return $this->sendResetLinkEmail($request);
    }

    /**
    * Get the response for a successful password reset link.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  string  $response
    * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
    */
    protected function sendResetLinkResponse(Request $request, $response)
    {
      return response()->json([
        'message' => 'Password reset email sent.',
        'data' => $response
      ]);
    }

    /**
    * Get the response for a failed password reset link.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  string  $response
    * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
    */
    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
      return response()->json(['message' => 'Email could not be sent to this email address.']);
    }

    /**
    * Handle reset password
    */
    public function callResetPassword(Request $request)
    {
    return $this->reset($request);
    }

}
