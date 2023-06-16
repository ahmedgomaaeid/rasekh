<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\ZoomIntegration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ZoomIntegrationController extends Controller
{
    public function index()
    {
        $zoom_integration = ZoomIntegration::where('teacher_id', Auth::guard('teacher')->user()->id)->first();
        $c_id = '';
        $c_secret = '';
        $jwt = '';
        $zoom_email = '';
        if ($zoom_integration) {
            $c_id = $zoom_integration->client_id;
            $c_secret = $zoom_integration->client_secret;
            $jwt = $zoom_integration->jwt;
            $zoom_email = $zoom_integration->zoom_email;
        }
        return view('teacher.zoom.integration', compact('c_id', 'c_secret', 'jwt', 'zoom_email'));
    }
    public function store()
    {
        ZoomIntegration::updateOrCreate(
            ['teacher_id' => Auth::guard('teacher')->user()->id],
            [
                'client_id' => request('client_id'),
                'client_secret' => request('client_secret'),
                'jwt' => request('jwt'),
                'zoom_email' => request('zoom_email'),
            ]
        );
        return redirect()->route('get.teacher.dashboard')->with('success', 'تم تحديث البيانات بنجاح');
    }
}
