<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class HomeController extends Controller
{

    public function index() {
        return view('index');
    }

    public function postIndex(Request $request) {
        $link = $request->input('link');
        if (!$link) abort(400);
        $protocolFreeUrl = preg_replace('/(^\w+:|^)\/\//', '', $link);
        $meetingId = explode('/', parse_url($link)['path'])[2];
        $params = [];
        parse_str(parse_url($link)['query'], $params);
        $meetingPass = $params['pwd'];
        $signature = $this->generateSignature($meetingId, 0);

        $content = Crypt::encryptString("$signature.$meetingId.$meetingPass");
        return view('result', compact('content'));
    }
    public function share(Request $request) {
        $id = $request->input('id');
        $content = explode('.', Crypt::decryptString($id));
        $key = config('zoom.jwt.key');
        $signature = $content[0];
        $meetingId = $content[1];
        $password = $content[2];
        $email = '';
        $name = 'Your Name '.time();
        return view('meeting',
            compact('signature', 'meetingId', 'password',
                'email', 'name', 'key'));
    }

    public function meeting() {
        return view('meeting');
    }

    function generateSignature($meeting_number, $role){
        $api_key = config('zoom.jwt.key');
        $api_sercet = config('zoom.jwt.secret');
        $time = time() * 1000;
        $data = base64_encode($api_key . $meeting_number . $time . $role);
        $hash = hash_hmac('sha256', $data, $api_sercet, true);
        $_sig = $api_key . "." . $meeting_number . "." . $time . "." . $role . "." . base64_encode($hash);
        return rtrim(strtr(base64_encode($_sig), '+/', '-_'), '=');
    }

}
