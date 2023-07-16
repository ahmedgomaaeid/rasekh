<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\ZoomIntegration;
use App\Models\ZoomToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ZoomIntegrationController extends Controller
{
    public function index()
    {
        $zoom_integration = ZoomIntegration::where('teacher_id', Auth::guard('teacher')->user()->id)->first();
        $oauth_c_id = '';
        $oauth_c_secret = '';
        $sdk_c_id = '';
        $sdk_c_secret = '';
        if ($zoom_integration) {
            $oauth_c_id = $zoom_integration->oauth_client_id;
            $oauth_c_secret = $zoom_integration->oauth_client_secret;
            $sdk_c_id = $zoom_integration->sdk_client_id;
            $sdk_c_secret = $zoom_integration->sdk_client_secret;
        }
        $zoom_token = ZoomToken::where('teacher_id', Auth::guard('teacher')->user()->id)->first();
        return view('teacher.zoom.integration', compact('oauth_c_id', 'oauth_c_secret', 'sdk_c_id', 'sdk_c_secret', 'zoom_token'));
    }
    public function store()
    {
        ZoomIntegration::updateOrCreate(
            ['teacher_id' => Auth::guard('teacher')->user()->id],
            [
                'oauth_client_id' => request('oauth_client_id'),
                'oauth_client_secret' => request('oauth_client_secret'),
                'sdk_client_id' => request('sdk_client_id'),
                'sdk_client_secret' => request('sdk_client_secret'),
            ]
        );
        return redirect()->route('get.teacher.zoom-integration')->with('success', 'تم تحديث البيانات بنجاح');
    }
}
