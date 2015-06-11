<?php
namespace App\Http\Controllers\Admin;

use App\Helpers\FormX;
use App\Repositories\User\UserRepo;

class UsersController extends CRUDController
{
    protected $rules = array(

    );
    protected $module = '_users';

    function __construct(UserRepo $userRepo)
    {
        parent::__construct();
        $this->repo = $userRepo;
    }

    public function fields($data=null)
    {
        $type = [
            'administrator' => 'Administrador',
            'recorder' => 'Digitador'
        ];

        if($data)
        {
            return FormX::make()
                ->input('email','Email','Email',$data->email)
                ->select('type','Tipo:',$type,$data->type)
                ->input('name','Nombre','Nombre',$data->name);
        }
        else
        {
            return FormX::make()
                ->input('email','Email:','Email')
                ->input('password','Contraseña:','Contraseña','','password')
                ->select('type','Tipo:',$type)
                ->input('name','Nombre:','Nombre');
        }
    }

    public function change_password(Request $request)
    {
        // Get user active
        $user = $this->repo->findOrFail(\Auth::id());

        if($user)
        {
            $data = $request->all();
            $success = true;
            $message = "Contraseña actualizada exitosamente";

            // Validate data
            $validator = \Validator::make($data, [
                'password' => 'required',
                'new-password' => 'required|min:5',
                'new-password-confirm' => 'required|same:new-password'
            ]);

            if($validator->passes())
            {
                $data['password'] = \Hash::make($data['new-password']);
                $this->repo->update($user,$data);
            }
            else
            {
                $success = false;
                $message = "Algunos campos son requeridos";
            }

            return compact('success','message');
        }
    }
}