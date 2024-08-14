<?php

namespace App\Controllers;

class DashboardController
{
    public function index(): void
    {
        view('customer/dashboard',[
            'page_title' => 'Dashboard',
        ]);
    }

    public function getDeposit()
    {
        view('customer/deposit',[
            'page_title' => 'Dashboard',
        ]);
    }

    public function getWithdraw()
    {
        view('customer/withdraw',[
            'page_title' => 'Dashboard',
        ]);
    }

    public function getTransfer()
    {
        view('customer/transfer',[
            'page_title' => 'Dashboard',
        ]);
    }
}