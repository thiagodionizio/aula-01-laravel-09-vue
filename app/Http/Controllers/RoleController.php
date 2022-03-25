<?php

namespace App\Http\Controllers;

use App\Services\RoleService;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    private RoleService $service;

    /**
     * @param RoleService $service
     */
    public function __construct(RoleService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (\request()->wantsJson()) {

            $data = $this->service->getAll();
            return response()->json($data, 200);
        }

        return view('roles.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {


//            $this->validate($request);
            $role = $this->service->create($request->all());
            $response = [
                'message' => 'Perfil cadastrado com sucesso.',
                'data' => $role,
            ];
            return response()->json($response);
        } catch (\Exception $exception) {
            dd($exception);
            return redirect()->back()->withErrors($exception->getMessageBag())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = $this->service->find($id);

        return view('roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        try {


//            $this->validate($request);
            $role = $this->service->update($id, $request->all());
            $response = [
                'message' => 'Perfil atualizado com sucesso.',
                'data' => $role,
            ];
            return response()->json($response);
        } catch (\Exception $exception) {
            dd($exception);
            return redirect()->back()->withErrors($exception->getMessageBag())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
