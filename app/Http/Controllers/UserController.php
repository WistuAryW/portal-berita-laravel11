<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function index(): View {
        $user = User::where('role', 'user')->get();
        return view('dashboard.user.index', compact('user'));
    }

    function edit($id) : View {
        $user = User::find($id);
        return view('dashboard.user.edit',compact('user'));
    }

    public function update(Request $request, $id)
    {        
        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;

        $user->save();
        return redirect('/user')->with('success', 'Data berhasil diedit!');
    }

    function destroy($id) :  RedirectResponse {
        $user = User::find($id);
        $user->delete();
        return redirect('/user')->with('success', 'Data berhasil dihapus!');
    }
}
