<?php

namespace ErpNET\Mailsend\v1\Controllers;

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

    /**
     * @param string $provider
     * @param string $id
     * @return \Illuminate\Contracts\View\View | \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        return view('mailsend:mail');
    }
}
