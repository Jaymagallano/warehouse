<?php

namespace App\Controllers;

class TopManagementController extends BaseController
{
    public function dashboard()
    {
        return view('top_management/dashboard');
    }
}
