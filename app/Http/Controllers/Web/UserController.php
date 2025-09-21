<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

        return view('users.index', compact('users','q'));
    }

    public function create()
    {
        return view('users.create', ['user' => new User()]);
    }
//****************************************************************************************************** */
    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']); // hash

        // (opcional) nombre completo Laravel default
        $data['name'] = ($data['nombre'].' '.$data['apellido']);

        $user = \App\Models\User::create($data);

        return redirect()->route('users.index')->with('status','Usuario creado');
    }
//****************************************************************************************************** */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }
//|****************************************************************************************************** */
    public function update(UpdateUserRequest $request, \App\Models\User $user)
    {
        $data = $request->validated();

        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']); // hash si viene
        } else {
            unset($data['password']); // no tocar si viene vacío
        }

        //$data['name'] = ($data['nombre'].' '.$data['apellido']);

        $user->update($data);

        return redirect()->route('users.index')->with('status','Usuario actualizado');
    }
//****************************************************************************************************** */
    public function destroy(Request $request, User $user)
    {
        // Hard stop: no puedes borrarte a ti mismo (además de la policy).
        if ($request->user() && $request->user()->is($user)) {
            return redirect()->route('users.index')->withErrors('No puedes eliminar tu propio usuario.');
        }

        $user->delete();
        return redirect()->route('users.index')->with('status','Usuario eliminado');
    }
}
