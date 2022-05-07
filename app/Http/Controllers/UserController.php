<?php

namespace App\Http\Controllers;

use App\Events\SendEmail;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;

class UserController extends Controller
{
    /**
     * @param  \App\Model\User  $user
     * @author yahia bajbouj
     */
    public function resendMail(User $user)
    {
        event(new SendEmail($user));
        return back();
    }

    public function toggleApproved(User $user){
        $user->update([
            "is_approved" => !$user->is_approved,
        ]);
        return back();
    }
    
    public function usersExport(){
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
