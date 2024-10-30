<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FCMToken;
use Exception;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\AndroidConfig;
use Kreait\Firebase\Messaging\ApnsConfig;
use Kreait\Firebase\Messaging\WebPushConfig;

use Illuminate\Support\Facades\Http;

class FCMController extends Controller
{
    public function sendMessageUsingToken(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'token' => 'required',
        ]);

        try {

            $fcmMessaging = app('firebase.messaging');

            $androidConfig = AndroidConfig::fromArray([
                'ttl' => '3600s',
                'priority' => 'normal',
                'notification' => [
                    'icon' => 'stock_ticker_update',
                    'color' => '#f45342',
                    'sound' => 'default',
                ],
            ]);

            $appleConfig = ApnsConfig::fromArray([
                'headers' => [
                    'apns-priority' => '10',
                ],
                'payload' => [
                    'aps' => [
                        'badge' => 42,
                        'sound' => 'default',
                    ],
                ],
            ]);

            $webConfig = WebPushConfig::fromArray([
                'notification' => [
                    'icon' => 'https://my-server.example/icon.png',
                ],
                'fcm_options' => [
                    'link' => 'https://my-server.example/some-page',
                ],
            ]);

            $token = $validated['token'];
            $title = $validated['title'];
            $content = $validated['content'];

            $fcmMessage = CloudMessage::withTarget('token', $token)
                ->withNotification(['title' => $title, 'body' => $content])
                ->withAndroidConfig($androidConfig)
                ->withApnsConfig($appleConfig)
                ->withWebPushConfig($webConfig);

            $fcmMessaging->send($fcmMessage);


            return response()->json([
                'status' => true,
                'message' => 'Berhasil'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function sendMessageUsingTopic(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'topic' => 'required',
        ]);

        try {

            $fcmMessaging = app('firebase.messaging');

            $androidConfig = AndroidConfig::fromArray([
                'ttl' => '3600s',
                'priority' => 'normal',
                'notification' => [
                    'icon' => 'stock_ticker_update',
                    'color' => '#f45342',
                    'sound' => 'default',
                ],
            ]);

            $appleConfig = ApnsConfig::fromArray([
                'headers' => [
                    'apns-priority' => '10',
                ],
                'payload' => [
                    'aps' => [
                        'badge' => 42,
                        'sound' => 'default',
                    ],
                ],
            ]);

            $webConfig = WebPushConfig::fromArray([
                'notification' => [
                    'icon' => 'https://my-server.example/icon.png',
                ],
                'fcm_options' => [
                    'link' => 'https://my-server.example/some-page',
                ],
            ]);

            $topic = $validated['topic'];
            $title = $validated['title'];
            $content = $validated['content'];

            $fcmMessage = CloudMessage::withTarget('topic', $topic)
                ->withNotification(['title' => $title, 'body' => $content])
                ->withAndroidConfig($androidConfig)
                ->withApnsConfig($appleConfig)
                ->withWebPushConfig($webConfig);

            $fcmMessaging->send($fcmMessage);


            return response()->json([
                'status' => true,
                'message' => 'Berhasil'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }
}
