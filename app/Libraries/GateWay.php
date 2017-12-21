<?php
namespace App\Libraries;

use Predis\Client;

class GateWay
{
    private $set_name = "pool";

    private $server;

    private $redis;

    protected $single_server = [
        'host' => '127.0.0.1',
        'port' => 6379,
        'database' => 14,
        'password' => 123456,
    ];

    public function __construct(\swoole_websocket_server $server)
    {
        $this->server = $server;

        $redis = new Client($this->single_server, ['profile' => '2.8']);
        $this->redis = $redis;
    }

    public function join($client)
    {
        $this->redis->sadd($this->set_name, 'member:'. $client);
    }

    public function close($client)
    {
        $this->redis->srem($this->set_name, 'member:'. $client);
        $this->sendMessage(json_encode(['type'=>'closed', 'id'=> $client]));
    }

    public function sendMessage($message)
    {
        $allTadpole = $this->getAllTadpole();

        foreach ($allTadpole as $item) {
            $this->server->push($item, json_encode($message));
        }
    }

    public function getAllTadpole()
    {
        return str_replace('member:', '', $this->redis->smembers($this->set_name));
    }

    public function getNum()
    {
        return count($this->redis->smembers($this->set_name));
    }

    public function sendTo($client, $message)
    {
        $this->server->push($client, $message);
    }

    public function updateLocation($client, $message)
    {
        $allTadpole = $this->getAllTadpole();

        foreach ($allTadpole as $item) {
            $this->server->push($item, json_encode($message));
        }
    }
}