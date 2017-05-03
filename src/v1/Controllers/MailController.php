<?php

namespace ErpNET\Mailsend\v1\Controllers;

use ErpNET\Mailsend\v1\Entities\UserMailsend;
use Illuminate\Http\Request;

class MailController extends Controller
{
    /**
     * Controller constructor.
     */
    public function __construct()
    {
        //
    }

    public function manageVue()
    {
        return view('mailsend::mail');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View | \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->method()=="POST") {
            (new \App\User([
                'name'=>'teste',
                'email'=>'luciano.bapo@gmail.com',
            ]))->notify(new \App\Notifications\Email($request->only('message')));
        }
        $items = \App\User::paginate(3);

        $response = [
            'pagination' => [
                'total' => $items->total(),
                'per_page' => $items->perPage(),
                'current_page' => $items->currentPage(),
                'last_page' => $items->lastPage(),
                'from' => $items->firstItem(),
                'to' => $items->lastItem()
            ],
            'data' => $items
        ];
        return response()->json($response);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);

        $create = UserMailsend::create($request->all());

        return response()->json($create);
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
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);

        $edit = UserMailsend::find($id)->update($request->all());

        return response()->json($edit);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        UserMailsend::find($id)->delete();
        return response()->json(['done']);
    }
}
