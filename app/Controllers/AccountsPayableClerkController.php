<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class AccountsPayableClerk extends Controller
{
    public function index()
    {
        return view('accounts_payable_clerk/dashboard');
    }

    public function invoices()
    {
        return view('accounts_payable_clerk/invoices');
    }

    public function payments()
    {
        return view('accounts_payable_clerk/payments');
    }

    public function reports()
    {
        return view('accounts_payable_clerk/reports');
    }
}
