<?php

namespace App\Controllers;

class ITAdministratorController extends BaseController
{
    public function dashboard()
    {
        return view('it_administrator/dashboard');
    }
}
