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
class UserGeneratorController extends AppBaseController
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
     */
    public function index()
    {
        $users = User::factory()->count(1000)->make();
        return view('admin.factory.index', compact('users'));
    }
}
