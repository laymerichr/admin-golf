<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\CreateUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\Mail\UserCreatedMail;
use App\Models\Admin\Clubes;
use App\Models\Admin\FederacionTerritorial;
use App\Models\Admin\Language;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Laracasts\Flash\Flash;
//use Flash;
use Spatie\Permission\Models\Role;

/**
 * Class UserController
 * @package App\Http\Controllers\Admin
 */
class UserController extends AppBaseController
{
    /**
     * public function __construct()
     *
     * UserController constructor.
     */
    public function __construct()
    {

    }
    /**
     * index()
     *
     * Display a listing of the users.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('Activo', true)
        ->where('bloqueado', false)
        ->get();

        foreach ($users as $user)
        {
            $club = Clubes::where('CodClub', $user->NombreWeb)->first();
            $user->club = !empty($club) ? $club->Club : '';
            $user->cod_club = !empty($club) ? $club->CodClub : '';
            $federacion = FederacionTerritorial::where('IdFed', $user->IdFed)->first();
            $user->federacion = $federacion ? $federacion->Federacion : '';
        }

        return view('admin.users.index')
            ->with('users', $users);
    }

    /**
     * create()
     *
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        $clubes = Clubes::where('Club', '<>', '')->get()->sortBy('Club');
        $federaciones = FederacionTerritorial::all();
        return view('admin.users.fields', compact('roles', 'clubes', 'federaciones'));
    }

    /**
     * store(CreateUserRequest $request)
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $input['profile_photo_path']='assets/img/avatar/avatar.jpg';
        $input['Bloqueado']=false;
        $input['Activo']=true;
        $input['NombreWeb']=$input['cod_club'] ?? '';
        $input['IdFed']=$input['id_fed'] ?? '';
        $user = User::create($input);

        $role = Role::findById($request->role_id);
        $user->assignRole($role['name']);

       // Flash::success('Datos guardados satisfactoriamente.');
        return redirect(route('users.index'));
    }

    /**
     * edit($id)
     * Show the form for editing the specified User.
     * @param int $id
     * @return Response
     * @throws \Exception
     */
    public function edit($id)
    {
        $user = User::find($id);
        if (empty($user)) {
            Flash::error('Usuario no encontrado');

            return redirect(route('users.index'));
        }
        $roles = Role::all();
        $currentRole = Role::findByName($user->getRoleNames()[0]);
        $clubes = Clubes::where('Club', '<>', '')->get()->sortBy('Club');
        $federaciones = FederacionTerritorial::all();

        return view('admin.users.fields_edit', compact('user', 'roles', 'currentRole', 'clubes', 'federaciones'));
    }

    /**
     * update( UpdateUserRequest $request)
     *
     * Update the specified User in storage.
     * @param UpdateUserRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(UpdateUserRequest $request)
    {
        $user = User::find($request->id);
        if (empty($user)) {
            Flash::error('Usuario no encontrado');
            return redirect(route('users.index'));
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->NombreWeb = $request->cod_club  ?? '';
        $user->IdFed = $request->id_fed  ?? '';

        $role = Role::findById($request->role_id);
        $user->syncRoles($role['name']);

        if (!empty($request->password))
            $user->password = Hash::make($request->password);

        $user->save();
      //  Flash::success('Datos actualizados satisfactoriamente.');

        return redirect(route('users.index'));
    }

    /**
     * destroy($id)
     *
     * Remove the specified User from storage.
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if (empty($user)) {
            Flash::error('Usuario no encontrado');
            return redirect(route('users.index'));
        }

        $user->delete();
        Flash::success('Usuario eliminado satisfactoriamente.');
        return redirect(route('users.index'));
    }
}
