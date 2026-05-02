<?php


namespace App\Http\Services\Admin;

use App\Mail\UserCreatedMail;
use App\Models\Admin\Client;
use App\Models\Admin\Language;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use Flash;

class ClientService
{
    /**
     * ClientService constructor.
     *
     */
    public function __construct()
    {

    }

    /**
     * store(Request $request)
     * Store a newly created Client in storage.
     * @param  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws Exception
     */
    public function store($request)
    {
        $foto = null;
        if ($request->hasFile('image')) {
            $foto = $request->file('image');
           // $foto = $foto[0];

            $foto->store('assets/img/client', 'public');
        }

        $description=$request->input('description');
        $languages = Language::where('active',true)->get();
        $translations=[];
        foreach ($languages as $key => $language){
            if($description[$key] != null) {
                $translations += [
                    $language['code'] => $description[$key],
                ];
            }
            else{
                $translations += [
                    $language['code'] => " ",
                ];
            }
        }
        //create the user
        $password = Str::random(8);
        $user= User::create([
            'email'=>$request->input('email'),
            'name'=>$request->input('name'),
            'active'=>true,
            'profile_photo_path'=> !empty($foto) ? $foto : 'assets/img/avatar/avatar.jpg',
            'password' => Hash::make($password),
            'language_id' =>$request->input('language_id'),
            'treatment'=>null,
            'last_name'=>"Client",
            'sex'=>true
        ]);
        $role = Role::findByName('client');
        $user->assignRole($role->name);

        //create the client
        $client=Client::create([
            'description'=>$description[0],
            'name'=>$request->input('name'),
            'active'=>1,
            'power'=>false,
            'user_id'=>$user->id
        ]);
        $client->power = $request->has('power') ? true : false;
        $client->save();

        if($request->hasfile('image')){
            $image=$request->file('image');
            $client->image=$image->store('assets/img/client','public');
            $user->profile_photo_path=$image->store('assets/img/avatar','public');
            $user->save();
            $client->save();
        }

        $client
            ->setTranslations('description', $translations)
            ->save();

        //enviar un correo al usuario con la cuenta y la contraseña

        $data = [
            'user' => $user,
            'textPlainPass' => $password,
            'url' => env('APP_URL')
        ];

        try {

            Mail::to([$user->email])
                ->send(new UserCreatedMail($data));

        }catch (Swift_TransportException $e){
            echo $e->getMessage();
        }
    }

    /**
     * update($id, Request $request)
     * Update the specified Client in storage.
     * @param $id
     * @param $request
     *
     */
    public function update($id, $request)
    {
        $client = Client::with(['user'])->find($id);
        $user = $client->user;

        if (empty($client)) {
            Flash::error('Client not found');
            return redirect(route('clients.index'));
        }
        if($request->has('name')){
            $client->name=$request->input('name');
            $user->name=$request->input('name');
        }
        if($request->has('email')){
            $user->email=$request->input('email');
        }
        if($request->has('language_id')){
            $user->language_id=$request->input('language_id');
        }
        $client->power = $request->has('power') ? true : false;

        if($request->hasfile('image')){
            $image=$request->file('image');

            if($client->image !='assets/img/client/avatar.jpg'){
                Storage::disk('public')->delete($client->image);
            }
            $client->image=$image->store('assets/img/client','public');
        }

        $description = $request->input('description');

        $languages = Language::where('active',true)->get();
        $translations=[];
        foreach ($languages as $key => $language){
            if($description[$key] != null) {
                $translations += [
                    $language['code'] => $description[$key],
                ];
            }
            else{
                $translations += [
                    $language['code'] => " ",
                ];
            }
        }
        $client
            ->setTranslations('description', $translations)
            ->save();
        $user->save();
    }
}
