<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Client::class, 'client');
    }

    public function index(Request $request)
    {
        $q = trim($request->get('q',''));
        $clients = Client::query()
            ->when($q, function($qb) use ($q) {
                $qb->where(function($w) use ($q) {
                    $w->where('rut_empresa','like',"%$q%")
                      ->orWhere('razon_social','like',"%$q%")
                      ->orWhere('contacto_nombre','like',"%$q%")
                      ->orWhere('contacto_email','like',"%$q%");
                });
            })
            ->orderBy('razon_social')
            ->paginate(15)
            ->withQueryString();

        return view('clients.index', compact('clients','q'));
    }

    public function create()
    {
        return view('clients.create', ['client' => new Client()]);
    }
//****************************************************************************************************** */
    public function store(\App\Http\Requests\StoreClientRequest $request)
    {
      //  $data = $request->validated();
    $client = \App\Models\Client::create($request->validated());

    return redirect()->route('clients.index')->with('status','Cliente creado');
       
    }
//****************************************************************************************************** */
    public function show(Client $client)
    {
        return view('clients.show', compact('client'));
    }

    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }
//****************************************************************************************************** */
    public function update(\App\Http\Requests\UpdateClientRequest $request, \App\Models\Client $client)
    {
        // $data = $request->validated();
    $client->update($request->validated());

    return redirect()->route('clients.index')->with('status','Cliente actualizado');
        
    }

    public function destroy(Client $client)
{
    // Chequeo directo en BD (sin depender de relación)
    $tienePedidos = DB::table('orders')->where('client_id', $client->id)->exists();
    if ($client->orders()->exists()) {{
        return back()->with('error', 'No se puede eliminar: el cliente tiene pedidos asociados.');
        
      }

      return redirect()->route('clients.index')->with('status','Cliente eliminado');
    }
    try {
        $client->delete();
        return redirect()->route('clients.index')->with('status', 'Cliente eliminado');
    } catch (QueryException $e) {
        // Si por algún motivo la FK se dispara igual
        return redirect()
            ->route('clients.index')
            ->withErrors('¡El cliente no se puede eliminar, porque tiene pedidos sin despachar!');
    }
}
    
    
    
    
        
    
    
    
    
    
    
    
    


    
}