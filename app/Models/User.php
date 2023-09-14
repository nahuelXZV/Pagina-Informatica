<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    // TODO VALIDATIONS
    static public $validate = [
        'userArray.name' => 'required',
        'userArray.email' => 'required|email|unique:users,email',
        'userArray.password' => 'required',
        'userArray.rol' => 'required'
    ];
    static public $messages = [
        'userArray.name.required' => 'El nombre es requerido',
        'userArray.email.required' => 'El correo es requerido',
        'userArray.email.email' => 'El correo no es valido',
        'userArray.password.required' => 'La contraseña es requerida',
        'userArray.rol.required' => 'El rol es requerido',
        'userArray.email.unique' => 'El correo ya existe'
    ];

     // Funciones
     static public function CreateUsuario(array $data)
     {
         $new = User::create([
             'name' => $data['name'],
             'email' => $data['email'],
             'password' => bcrypt($data['password'])
         ]);
         return $new;
     }

     static public function UpdateUsuario($id, array $data)
     {
         $user = User::find($id);
         $user->name = $data['name'];
         $user->email = $data['email'];
         $user->password = bcrypt($data['password']);
         $user->save();
         return $user;
     }

     static public function DeleteUsuario($id)
     {
         $user = User::find($id);
         $user->delete();
         return $user;
     }

     static public function GetUsuarios($attribute, $order = "desc", $paginate)
     {
         $users = User::where('name', 'ILIKE', '%' . strtolower($attribute) . '%')
             ->orWhere('email', 'ILIKE', '%' . strtolower($attribute) . '%')
             ->orderBy('id', $order)
             ->paginate($paginate);
         return $users;
     }

     static public function GetAllUsuarios()
     {
         $users = User::all();
         return $users;
     }

     static public function GetUsuario($id)
     {
         $user = User::find($id);
         return $user;
     }
}
