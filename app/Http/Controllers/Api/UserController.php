<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use App\Rules\VentasfixEmail;

class UserController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }

    public function index(Request $request)
    { 
         $q = trim($request->get('q',''));
        $users = User::query()
            ->when($q, function($qb) use ($q) {
                $qb->where(function($w) use ($q) {
                    $w->where('rut','like',"%$q%")
                      ->orWhere('nombre','like',"%$q%")
                      ->orWhere('apellido','like',"%$q%")
                      ->orWhere('email','like',"%$q%");
                });
            })
            ->orderBy('apellido')->orderBy('nombre')
            ->paginate(15)->withQueryString();

        return UserResource::collection($users);
    }
     
    public function show(User $user){ return response()->json($user); }
//****************************************************************************************************** */
    public function store(StoreUserRequest $request)
    {
        $data = $request->validate([
            'rut'=>['required','string','max:20'],
            'nombre'=>['required','string','max:100'],
            'apellido'=>['required','string','max:100'],
            'email'=>['required','email','max:150','unique:users,email',new VentasfixEmail()],
            'password'=>['required', Password::defaults()],
        ]);
        
        $data['password'] = Hash::make($data['password']);
        $user = \App\Models\User::create($data);
        return response()->json($user, 201);
        
    }
//****************************************************************************************************** */

    public function update(UpdateUserRequest $request, \App\Models\User $user){
        
        $data = $request->validate([
            'rut'=>['required','string','max:20'],
            'nombre'=>['required','string','max:100'],
            'apellido'=>['required','string','max:100'],
            'email' => ['required','email','max:150','unique:users,email,'.$user->id, new VentasfixEmail()],
            'password'=>['nullable', Password::defaults()],
            //roduct_id' => ['required','exists:products,id'],
            //'cantidad'   => ['required','integer','min:1'],
            // 'descuento_neto' => ['nullable','integer','min:0'],
        ]);
        if(!empty($data['password'])){
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }
        //$data['name'] = $data['nombre'].' '.$data['apellido'];
        $user->update($data);
        return response()->json($user);
    }

    public function destroy(Request $request, User $user)
    {
        // evita borrarte a ti mismo
        if ($request->user() && $request->user()->is($user)) {
            return response()->json(['message' => 'No puedes eliminar a ti mismo.'], 422);
        }
        $user->delete();
        return response()->json(null, 204);
    }
}
