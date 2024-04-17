<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\commends;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function index()
{
    $users = User::withCount([
        'commands',
        'commands as paid_commands_count' => function ($query) {
            $query->where('status', 'valide');
        },
        'commands as unpaid_commands_count' => function ($query) {
            $query->where('status', 'invalid');
        },
    ])->get();

   
    return view('DashbordAdmin.users.index', compact('users'));
}

     
    


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
       
    }

    
     /**
     * Display the specified resource.
     */


    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        dd($user);
    }


  
    
}
