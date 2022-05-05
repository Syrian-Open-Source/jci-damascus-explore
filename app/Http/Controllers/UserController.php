<?php

namespace App\Http\Controllers;

use App\Events\SendEmail;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;

class UserController extends Controller
{
    public function usersExport(){
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
