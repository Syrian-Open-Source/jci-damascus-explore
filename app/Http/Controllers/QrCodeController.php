<?php

namespace App\Http\Controllers;

use App\Http\Requests\HasActivityRequest;
use App\Models\Activity;
use App\Models\User;

class QrCodeController extends Controller
{

    /**
     * load the main web page.
     *
     * @author yahia bajbouj
     */
    public function QrGenerate(User $user)
    {
        $qrCode = base64_encode(QrCode::size(150)->generate($user->id));
        $pdf = PDF::loadView('file.identification', compact('qrCode'));
        return $pdf->download("$user->name.pdf");
    }

    public function qrCode(){
        $activities = Activity::all();
        return view('vendor.voyager.qrcode', compact('activities'));
    }

    public function checkActivity(HasActivityRequest $request){
        $user = User::find($request->user_id);
        $result = $user->activities->pluck('id')->contains($request->activity_id);
        return view('vendor.voyager.result', compact('user', 'result'));
    }
}
