<?php

namespace App\Http\Controllers;

use App\Exceptions\UserControllerException;
use App\Models\User;
use App\HTTP\Controllers\store;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateUserFormRequest;
use App\Models\Team;

class UserController extends Controller
{
    public function __construct(User $user)
    {
        $this->model = $user;
    }
    public function index(Request $request)
    {

        //$team = Team::find(1);
        //  $team->load('users');
        //  return $team;
        $users = $this->model->getUsers(
            $request->search ?? ''
        );
        return view('users.index', compact('users'));
    }
    public function show($id)
    {
        // if (!$user = User::find($id))
        // return redirect()->route('user.index');
        $user = User::find($id);
        if ($user) {
            return view('users.show', compact('user'));
        } else {
            throw new UserControllerException('user não encontrado');
        }
        //$user->load('teams');
        // return $user;
        //return view('users.show', compact('user'));
    }
    public function create()
    {
        return view("users.create");
    }
    public function store(StoreUpdateUserFormRequest $request)
    {

        /* $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->image = $request->images;
        $user->image = store('profile', 'public');
        $user->password = bcrypt($request->password);
        $user->save();*/

        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        if ($request->image) {
            $file = $request['image'];
            $path = $file->store('profile', 'public');
            $data['image'] = $path;
        }

        $this->model->create($data);
        return redirect()->route('users.index')->with('create', 'Usuário cadastrado com sucesso!!');
    }
    public function edit($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('users.index');
        }
        return view('users.edit', compact('user'));
    }
    public function update(StoreUpdateUserFormRequest $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('users.index');
        }
        $data = $request->only('name', 'email');
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }
        $data['is_admin'] = $request->admin ? 1 : 0;
        dd($data);
        $user->update($data);
        return redirect()->route('users.index')->with('edit', 'Usuário atualizado com sucesso!!');
    }
    public function destroy($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('users.index');
        }
        $user->delete();
        return redirect()->route('users.index')->with('destroy', 'Usuário deletado com sucesso!!');
    }
    public function admin()
    {
        return view('admin.index');
    }
}