<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Services\UserServices;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private UserServices $services;

    /**
     * @param UserServices $services
     */
    public function __construct(UserServices $services)
    {
        $this->services = $services;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // //1 maneira
        // $users = DB::select("
        //     select * from users;
        // ");

        // //2 maneira
        // $users = DB::table('users')->select()->get();


        // //3 maneira
        // $users = User::all();


         //4 maneira
         //nunca acesso model por controller
        $users =  $this->services->getAll();
        return view('users.index', compact('users'));
        // return response()->json(['data'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {

        try {
            $this->validate($request->all());


            $user = $this->services->createOrUpdate($request->all());
            $response = [
                'message' => 'Usuário cadastrado com sucesso.',
                'data' => $user->toArray(),
            ];
            return redirect()->back()->with('message', $response['message']);
        }catch (\Exception $exception ){
            dd($exception);
            return redirect()->back()->withErrors($exception->getMessageBag())->withInput();
        }






    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd('cai na rota errada');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->services->find($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = $this->services->createOrUpdate($request->all());
        $response = [
            'message' => 'Usuário atualizado com sucesso.',
            'data' => $user->toArray(),
        ];
        return redirect()->back()->with('message', $response['message']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->services->destroy($id);

        $response = [
            'message' => 'Usuário deletado com sucesso.',
        ];
        return redirect()->back()->with('message', $response['message']);
    }
}
