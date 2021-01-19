<?php

namespace App\Http\Controllers;

use Aginev\Datagrid\Datagrid;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::paginate(25);

        $grid = new Datagrid($users,$request->get('f',[]));

        $grid
            ->setColumn('name', 'Celé meno')
            ->setColumn('email', 'E-mail')
            ->setActionColumn([
                'wrapper' => function ($value,$row) {
                    return '<a href="' . route('user.edit', [$row->id]) . '" title="Edit" class="btn btn-sn btn-primary">Zmeniť</a>
                    <a href="' . route('user.delete', $row->id) . '" title="delete" data-method="DELETE" class="btn btn-sn btn-primary" data-confirm="Ste si istý?">Zmazať</a>' ;
                }
            ]);

        return view('user.index', [
            'grid' => $grid
        ]);
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
    public function editProfile()
    {
        if (Auth::user()) {
            return view('/user/editProfile')->with('user',auth()->user());
        } else {
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $user->password = '';
        return view('user.edit', [
            'action' => route('user.update', $user->id),
            'method' => 'put',
            'model' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, User $user) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:user,email,' .$user->id,
            'password' => 'required|min:8|confirmed',
        ]);
        $user->update($request->all());
        return redirect()->route('user.index');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(Request $request)
    {
        $user = auth()->user();
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:user,email,' .$user->id,
            'password' => 'required|min:8|confirmed',
        ]);


        $user->name = $request['name'];
        $user->email = $request['email'];

        $user->save();


        $request->session()->flash('success', 'Profil zmenený úspešne');

        return redirect()->back();
    }


    public function profile(){
        return view('/user/profile', array('user'=>Auth::user()));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index');
    }
}
