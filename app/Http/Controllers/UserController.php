<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function index()
    {
        try {

            $users = User::all();

            return $this->getResponse201('Users', 'consult', $users);

        } catch (\Exception $e) {
            return $this->getResponse500([$e->getMessage()]);
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
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'second_name' => 'required',    
            'last_name' => 'required',   
            'email' => 'required',            
            'password' => 'required',            
            'is_Admin' => 'required',            
        ]);

        if (!$validator->fails()) {
            DB::beginTransaction();

            try {

                $user = new User();
                $user->name = $request->name;
                $user->second_name = $request->second_name;
                $user->last_name = $request->last_name;

                $user->email = $request->email;
                $user->password = $request->password;
                $user->is_Admin = $request->is_Admin;
                $user->save();

                DB::commit();
                return $this->getResponse201('New User', 'created', $user);
            } catch (Exception $e) {
                DB::rollBack();
                return $this->getResponse500([$e->getMessage()]);
            }
        } else {
            return $this->getResponse500([$validator->errors()]);
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
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'second_name' => 'required',    
            'last_name' => 'required',   
            'email' => 'required',            
            'password' => 'required',            
            'is_Admin' => 'required',            
        ]);

        if (!$validator->fails()) {
            DB::beginTransaction();
            try {

                $user = User::findOrFail($request->id);
                $user->name = $request->name;
                $user->second_name = $request->second_name;
                $user->last_name = $request->last_name;

                $user->email = $request->email;
                $user->password = $request->password;
                $user->is_Admin = $request->is_Admin;

                $user->save();
                DB::commit();
                return $this->getResponse201('User', 'update', $user);
            } catch (Exception $e) {
                DB::rollBack();
                return $this->getResponse500([$e->getMessage()]);
            }
        } else {
            return $this->getResponse500([$validator->errors()]);
        }
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
            if (!User::find($id)) {
                return $this->getResponse404("No existe!!",);
            }

            $user = User::destroy($id);
            return $this->getResponseDelete200("Users");

        } catch (\Exception $e) {
            return $this->getResponse500([$e->getMessage()]);
        }
    }

}
