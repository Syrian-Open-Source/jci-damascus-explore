<?php

namespace App\Http\Controllers;

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
}
