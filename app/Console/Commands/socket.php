<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Facades\Socket as SocketService;

/**
 * socket开关控制
 * Class socket
 * @package App\Console\Commands
 */
class socket extends Command
{
    protected $signature = "socket {action : start|stop|restart}";

    protected $description = "操作socket服务";

    public function handle()
    {
        $action = trim($this->argument('action'));

        switch ($action) {
            case "start":
                $this->startHandler();
                break;
            case "stop":
                $this->stopHandler();
                break;
            case "restart":
                $this->stopHandler();
                $this->startHandler();
                break;
            default:
                $this->error("该操作不存在");
                break;
        }
    }

    private function startHandler()
    {
        $this->info("starting...");
        SocketService::start();
        return;
    }

    private function stopHandler()
    {
        $this->info('stopping...');

        $result = SocketService::getStop();
        if ($result) {
            $this->info('stop successfully');
            return;
        }

        $this->error("stop failed");
        return;
    }
}