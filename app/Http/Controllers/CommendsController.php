<?php

namespace App\Http\Controllers;

use App\Models\commends;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommendsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $commands = commends::with('product')->where('user_id', Auth::id())->paginate(4);
        //dd($commands);
    return view('command.index', compact('commands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $productId = $request->input('product_id');
        $userId = Auth::id();

        commends::create([
            'products_id' => $productId,
            'user_id' => $userId
        ]);


        return redirect()->back()->with('success' , 'kyn');

    }
    

    /**
     * Display the specified resource.
     */
    public function show(commends $commends)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(commends $commends)
    {
      
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, commends $command) 
    {
        
 
        dd($command);
    
        $command->update([
            'commend' => $request->input('status')
        ]);
    
        //return redirect()->back()->with('status', 'Update successful');
    }
    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(commends $commends)
    {
        //
    }
}
