<?php
namespace App\Http\Controllers;

use App\Helpers\AdminMenu;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $menu = AdminMenu::menu();

        \Session::put('menu', $menu);

        return view('admin.home.home',compact('menu'));
    }

}