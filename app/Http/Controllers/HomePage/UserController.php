<?php

namespace App\Http\Controllers\HomePage;

use App\Http\Controllers\AppBaseController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Laracasts\Flash\Flash;
use Spatie\Permission\Models\Role;

/**
 * Class UserController
 * @package App\Http\Controllers\HomePage
 */
class UserController extends AppBaseController
{
    /**
     * UserController constructor.
     */
    public function __construct()
    {

    }

    /**
     * show()
     * Show profile
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function show()
    {
        $user = User::find(Auth::user()->id);
        if (empty($user)) {
            Flash::error('Usuario no encontrado');
            return back();
        }
        $role = Role::findByName($user->getRoleNames()[0]);

        return view('homepage.users.show', compact('user', 'role'));
    }

    /**
     *  resetPassword(Request $request,$id)
     * Change password
     * @param $id
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Validation\ValidationException
     */
    public function resetPassword(Request $request, $id)
    {
        $user = User::find($id);
        if (empty($user)) {
            Flash::error('Usuario no encontrado');
            return back();
        }
        $rules = [
            'password' => ['required',
                'confirmed',
                Password::min(8)
                ->mixedCase()
                ->letters()
                ->numbers()
                ->symbols()
                ],
        ];

        $this->validate($request, $rules);
        if ($request->has('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        Flash::success('Actualización satisfactoria.');
        return back();
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function editProfile(Request $request, $id)
    {
        $user = User::find($id);
        if (empty($user)) {
            Flash::error('Usuario no encontrado');
            return back();
        }
        $rules = [
            'email' =>[ 'required', 'email', 'max:255',
                    'regex:/\S+@\S+\.\S+/',
                    Rule::unique('users')
                        ->ignore( $user['id'],'id')
                    ],
            'name' => ['string', 'max:255', 'regex:/^[\pL\s\-]+$/u'],
        ];
        $this->validate($request, $rules);

        if ($request->has('name')) {
            $user->name = $request->name;
        }

        if ($request->has('email') && $user->email != $request->email) {
            $user->email = $request->email;
        }

        if ($request->hasfile('profile_photo_path')) {
            $profile_photo_path = $request->file('profile_photo_path');
            if ($user->profile_photo_path != 'assets\img\avatar\avatar.jpg') {
                Storage::disk('public')->delete($user->profile_photo_path);
            }
            $user->profile_photo_path = $profile_photo_path->store('assets/img/avatar', 'public');
        }

        $user->save();
        Flash::success('Actualización satisfactoria.');
        return back();
    }
}
