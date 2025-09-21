<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Http\Resources\ClientResource;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Client::class, 'client');
    }

    public function index(Request $request)
    {
        $q = trim($request->get('q', ''));
        $clients = Client::query()
            ->when($q, function ($qb) use ($q) {
                $qb->where(function ($w) use ($q) {
                    $w->where('rut_empresa', 'like', "%$q%")
                        ->orWhere('razon_social', 'like', "%$q%")
                        ->orWhere('contacto_nombre', 'like', "%$q%")
                        ->orWhere('contacto_email', 'like', "%$q%");
                });
            })
            ->orderBy('razon_social')
            ->paginate(15)
            ->withQueryString();
        return ClientResource::collection($clients);
    }
    public function show(Client $client)
    {
        return new ClientResource($client);
    }
    public function store(\App\Http\Requests\StoreClientRequest $request)
    {
        $data = $request->validate([
            'rut_empresa' => ['required', 'string', 'max:20', 'unique:clients,rut_empresa'],
            'rubro' => ['required', 'string', 'max:100'],
            'razon_social' => ['required', 'string', 'max:150'],
            'telefono' => ['required', 'string', 'max:50'],
            'direccion' => ['required', 'string', 'max:255'],
            'contacto_nombre' => ['required', 'string', 'max:100'],
            'contacto_email' => ['required', 'email', 'max:150'],
        ]);
        //$data = $request->validated();
        $client = \App\Models\Client::create($request->validated());
        return response()->json($client, 201);
    }
    public function update(UpdateClientRequest $request, \App\Models\Client $client)
    {
        $data = $request->validate([
            'rut_empresa' => ['required', 'string', 'max:20', 'unique:clients,rut_empresa,' . $client->id],
            'rubro' => ['required', 'string', 'max:100'],
            'razon_social' => ['required', 'string', 'max:150'],
            'telefono' => ['required', 'string', 'max:50'],
            'direccion' => ['required', 'string', 'max:255'],
            'contacto_nombre' => ['required', 'string', 'max:100'],
            'contacto_email' => ['required', 'email', 'max:150'],
        ]);
        //$data = $request->validated();
        $client->update($request->validated());
        return response()->json($client);
    }
    public function destroy(Client $client)
    {
        // si tiene pedidos, devuelve 422 (misma regla que en Web si la aplicaste)
        if (method_exists($client, 'orders') && $client->orders()->exists()) {
            return response()->json(['message' => 'El cliente tiene pedidos sin despachar.'], 422);
        }
        $client->delete();
        return response()->json(null, 204);
    }
}
