<?php

namespace App\Services;

use App\Libraries\GateWay;
use App\Libraries\MongoDB;

/**
 * socket Service
 * Class Socket
 * @package App\Services
 */
class Socket
{
    private $client;

    private $gateWay;

    private $names = [
        '喽喽', '渣渣', '大王'
    ];

    public function __construct()
    {
        $this->client = $this->initClient();
        $this->client->on('open', function ($ws, $request) {
            $client = $request->fd;

            $this->gateWay->join($client);

            $welcome = [
                'type' => 'welcome',
                'id'   => $client
            ];

            $this->gateWay->sendTo($client, json_encode($welcome));
        });
        $this->client->on('message', function ($ws, $request) {
            $this->message($ws, $request);
        });
        $this->client->on('close', function ($ws, $request) {
            $this->gateWay->close($request);

            echo "end...". PHP_EOL;
        });
    }

    public function getStart()
    {
        $this->client->on('open', function ($ws, $request) {
            $this->onOpen($ws, $request);
        });
        $this->client->on('message', function ($ws, $request) {
            $this->message($ws, $request);
        });
        $this->client->on('close', function ($ws, $request) {
            $this->onClose($ws, $request);
        });

        return true;
    }

    public function getStop()
    {
        echo "stop";
        return true;
    }

    private function initClient()
    {
        $port = "8281";
        $host = "0.0.0.0";

        $this->client = new \swoole_websocket_server($host, $port);
        $this->client->set([
            'worker_num' => 8,
            'daemonize'  => false
        ]);

        $this->gateWay = new GateWay($this->client);

        return $this->client;
    }

    private function onOpen($socket, $request)
    {
        $client = $request->fd;

        $this->gateWay->join($client);

        $welcome = [
            'type' => 'welcome',
            'id'   => $client
        ];

        $this->gateWay->sendTo($client, json_encode($welcome));
    }

    private function message($socket, $request)
    {
        $client = $request->fd;
        $message = json_decode($request->data, true);
        if (!$message) return '';

        $type = $message['type'];

        switch ($type) {
            case "login":
                break;
            case 'update':
                $mongo = new MongoDB();
                $status = [
                    'type' => 'update',
                    'id'    => $client,
                    'angle' => $message['angle'] + 0,
                    'momentum'  => $message['momentum'] + 0,
                    'x' => $message['x'] + 0,
                    'y' => $message['y'] + 0,
                    'life'  => 1,
                    'size'  => $mongo->getGender($client) == 1 ? 20 : 4,
                    'name'  => isset($message['name']) ? $message['name'] : $this->names[array_rand($this->names)],
                    'authorized'    => false
                ];
                return $this->gateWay->updateLocation($client, $status);
            case "message":
                $newMessage = [
                    'type'  => 'message',
                    'id'    => $client,
                    'message'   => $message['message']
                ];
                $this->gateWay->sendMessage($newMessage);
        }
    }

    private function onClose($socket, $request)
    {
        $this->gateWay->close($request);
    }

    public function start()
    {
        $this->client->start();
    }

}