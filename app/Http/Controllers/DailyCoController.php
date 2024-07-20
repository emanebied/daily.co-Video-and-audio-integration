<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class DailyCoController extends Controller
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://api.daily.co/v1/',
            'headers' => [
                'Authorization' => 'Bearer ' . env('DAILY_CO_API_KEY'),
                'Content-Type'  => 'application/json',
            ]
        ]);
    }

    public function createRoom(Request $request)
    {
        // List existing rooms
        $roomsResponse = $this->client->get('rooms');
        $roomsData = json_decode($roomsResponse->getBody()->getContents(), true);


        if (count($roomsData['data']) >= 50) {
            // Delete the oldest room
            $oldestRoom = $roomsData['data'][0]['name'];
            $this->client->delete("rooms/{$oldestRoom}");
        }

        // Create a new room
        $response = $this->client->post('rooms', [
            'json' => [
                'properties' => [
                    'enable_chat' => true,
                    'start_video_off' => true,
                    'start_audio_off' => true,
                ]
            ]
        ]);

        $data = json_decode($response->getBody()->getContents(), true);

        return view('room', ['url' => $data['url']]);
    }

    public function joinRoom($name,$grade)
    {
        return view('room', ['url' => 'https://your-subdomain.daily.co/' . $name]);
    }
}

