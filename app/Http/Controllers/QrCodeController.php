<?php

namespace App\Http\Controllers;

use App\Http\Requests\HasActivityRequest;
use App\Models\Activity;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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
        $pdf = PDF::loadView('file.identification', compact('qrCode', 'user'))->setPaper('a6');
        return $pdf->download("$user->fill_name_en.pdf");
    }

    public function allQrGenerate()
    {
        $users = User::where('role_id', 2)->get();
        foreach ($users as $user) {
            $qrCode = base64_encode(QrCode::size(150)->generate($user->id));
            $pdf = Pdf::loadView('file.identification', compact('qrCode', 'user'))->setPaper('a6');
            $content = $pdf->download()->getOriginalContent();
            Storage::put("QR/$user->fill_name_en.pdf", $content);
        }

        $zip = new \ZipArchive();
        $fileName = 'QR.zip';
        if ($zip->open(public_path($fileName), \ZipArchive::CREATE) == true) {
            $files = File::files(storage_path('/app/QR'));
            foreach ($files as $key => $value) {
                $relativeName = basename($value);
                $zip->addFile($value, $relativeName);
            }
            $zip->close();
        }
        return response()->download(public_path($fileName));
    }

    public function qrCode()
    {
        $activities = Activity::with('users')->get();
        $users = User::where('role_id', 2)->get();
        return view('vendor.voyager.qrcode', compact('activities', 'users'));
    }

    public function checkActivity(HasActivityRequest $request)
    {
        $user = User::find($request->user_id);
        $result = $user->activities->pluck('id')->contains($request->activity_id);
        return view('vendor.voyager.result', compact('user', 'result'));
    }
}
