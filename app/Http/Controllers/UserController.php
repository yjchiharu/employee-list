<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        $all_users = $this->user->latest()->paginate(8);
    
        return view('users.index')->with('all_users', $all_users);
    }

    public function edit()
    {
        $user = $this->user->findOrFail(Auth::user()->id);

        return view('users.edit')->with('user',$user);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' =>'required|min:1|max:50',
            'department' => 'required|min:1|max:100',
            'salary' => 'required|min:1|max:1000000',
            'email' => 'required|email|max:255|unique:users,email,'.Auth::user()->id,
        ]);
        
        $user = $this->user->findOrFail(Auth::user()->id);
        $user->name = ucwords(strtolower($request->name));
        $user->department = $request->department;
        $user->salary = $request->salary;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('index');
    }


    public function destroy($id)
    {
        $user = $this->user->findOrFail($id);
        $this->user->destroy($id);
        
        return redirect()->back();
    }

    public function search(Request $request)
    {
        $users = $this->user->where('name', 'like', '%'.$request->search. '%')->get();

        return view('users.search')
                                ->with('users', $users)
                                ->with('search', $request->search); 
}

}