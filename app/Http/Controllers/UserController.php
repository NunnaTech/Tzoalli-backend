<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        try {

            $users = User::all();

            return json( 0, "Listado", json_decode( $users ) );

        } catch (\Exception $e) {
            return json( 0, $e->getMessage() );
        }
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
        try {

            $user = new User();
            $user->name = $request->name;
            $user->second_name = $request->second_name;
            $user->last_name = $request->last_name;

            $user->email = $request->email;
            $user->password = $request->password;
            $user->is_Admin = $request->is_Admin;
            $user->save();

            return json( 0, "Guardado", json_decode( $user ) );

        } catch (\Exception $e) {
            return json( 0, $e->getMessage() );
        }
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
    public function update(Request $request)
    {
        try {

            $user = User::findOrFail($request->id);
            $user->name = $request->name;
            $user->second_name = $request->second_name;
            $user->last_name = $request->last_name;

            $user->email = $request->email;
            $user->password = $request->password;
            $user->is_Admin = $request->is_Admin;

            $user->save();
            return json( 0, "Actualizado", json_decode( $user ) );

        } catch (\Exception $e) {
            return json( 0, $e->getMessage() );
        }

        return $user;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            $user = User::destroy($id);
            return json( 1, "Borrado",);

        } catch (\Exception $e) {
            return json( 0, $e->getMessage() );
        }
    }

}
