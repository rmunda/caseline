<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Client;
use App\http\Requests\StoreClientRequest;
use App\DataTables\ClientsDataTable;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ClientsDataTable $dataTable)
    {
        return $dataTable->render('clients.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientRequest $request)
    {
        Client::create($request->validated());

        return redirect()->route('clients.index')
                             ->with('success', 'Client created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Read-Only
        return redirect()->route('clients.edit', $id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $client = Client::findOrFail($id);
        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreClientRequest $request, string $id)
    {
        $client = Client::findOrFail($id);

        $data = $request->validated();

        $client->update($data);

        return redirect()->route('clients.index')
                             ->with('success', 'Client updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = Client::findOrFail($id);
        $client->delete();

        return redirect()->route('clients.index')
                              ->with('success', 'client deleted successfully.');
    }
}
