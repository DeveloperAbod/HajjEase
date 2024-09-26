<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CheckUserStatus;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(CheckUserStatus::class);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users_unm = User::all()->count();
        $Roles_unm = Role::all()->count();

        $news_unm = 1;
        $events_unm = 1;
        $athletes_unm = 1;
        $talented_unm = 1;
        $faqs_unm = 1;
        $pdfRules_unm = 1;



        return view('index', compact('news_unm', 'events_unm', 'athletes_unm', 'talented_unm', 'faqs_unm', 'pdfRules_unm', 'users_unm', 'Roles_unm'));
    }
}
