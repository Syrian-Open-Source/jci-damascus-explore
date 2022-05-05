<?php

namespace App\Http\Controllers;

use App\Events\SendEmail;
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
}
