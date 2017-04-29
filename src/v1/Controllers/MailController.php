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
     * @return \Illuminate\Contracts\View\View | \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        return view('mailsend::mail');
    }
}
