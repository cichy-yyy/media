<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;

class DeleteUserController extends Controller
{
    // use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function delete(Request $request)
    {
        $user = User::select('id', 'name')->get();
        return view('auth.deleteUser', [
            'users' => $user
        ]);
        //var_dump($user);
        // dd($request->user());
    }

    public function confirmDelete(Request $request)
    {
        // dd($request);
        $users = User::select('id', 'name')->get();
        $selectedUser = User::find($request->selectedUser);
        // dd($slectedUser);
        return view('auth.deleteUser', [
            'users' => $users,
            'user' => $selectedUser,
            'confirmDelete' => TRUE
        ]);
    }

    public function deleteUser(Request $request)
    {

        $selectedUser = User::find($request->deletingUser);
        //dd($selectedUser);

        if(!$selectedUser)
        {
            return view('message', [
                'message' => 'Brak danych użytkownika.'
            ]);
        }

        if($selectedUser->role === 'admin')
        {
            return view('message', [
                'message' => 'Nie można usunąć użytkownika, który jest administratorem.'
            ]);
        }

        $userName = $selectedUser->name;
        $selectedUser->delete();
        return view('message', [
            'message' => 'Użytkownik: '.$userName.' został usunięty.'
        ]);
    }
}
