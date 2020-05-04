<?php
/**
 * Created by PhpStorm.
 * User: duanyude
 * Date: 2020/4/28 22:04
 */

class tcpServer
{
    private $server = null;

    private $test = 10;

    public function __construct()
    {
        $this->server = new Swoole\Server("127.0.0.1",9501);
        $this->server->set([
            'reactor_num' => 2,
            'worker_num' => 2,
            'max_request' => 1000,
            'max_connection' => 1000,
            'task_worker_num' => 10,
            'task_max_request' => 1000,
            'log_file' => __DIR__ . "/../log/log.txt"
        ]);
        $this->server->on("Connect",[$this,"connect"]);
        $this->server->on("Receive",[$this,"receive"]);
        $this->server->on("Task",[$this,"task"]);
        $this->server->on("Finish",[$this,"finish"]);
        $this->server->on("Close",[$this,"close"]);
        $this->server->start();
    }

    /**
     * @连接
     * @param \Swoole\Server $server
     * @param int $fd
     * @param int $reactorId
     */
    public function connect(Swoole\Server $server, int $fd, int $reactorId)
    {
        echo "Connect Success - fd: {$fd}; reactorId: {$reactorId}" . PHP_EOL;
    }

    /**
     * @接收到数据
     * @param \Swoole\Server $server
     * @param int $fd
     * @param int $reactorId
     * @param $data
     */
    public function receive(Swoole\Server $server, int $fd, int $reactorId,$data)
    {
        echo "Receive" . $fd . PHP_EOL;
        $taskData = [
          'taskId' => "task_1",
          'name' => "段育德",
            'fd' => $fd
        ];
        $taskStr = "TTTTssss";
        $server->task($taskData,-1);
        $server->send($fd,"Server: ".$data);
    }

    /**
     * @task
     * @param \Swoole\Server $server
     * @param int $taskId
     * @param int $srcWorkerId
     * @param $data
     */
    public function task(Swoole\Server $server, int $taskId, int $srcWorkerId, $data)
    {
        echo "\nTask------start\n";
        var_dump($taskId);
        var_dump($srcWorkerId);
        var_dump($data);
        var_dump($this->test);
        echo "Task------end\n";
        $server->finish($data);
    }

    /**
     * @finish
     * @param \Swoole\Server $server
     * @param int $taskId
     * @param $data
     */
    public function finish(Swoole\Server $server, int $taskId, $data)
    {
        echo "Finish------start\n";
        var_dump($taskId);
        var_dump($data);
        var_dump($this->test);
        echo "Finish------end\n";
//        $data += 1;
//        $server->send($data,"task success");
    }

    /**
     * @连接关闭
     * @param \Swoole\Server $server
     * @param int $fd
     * @param int $reactorId
     */
    public function close(Swoole\Server $server, int $fd, int $reactorId)
    {
        echo "Client: Close." . PHP_EOL;
    }
}

$tcpServer = new tcpServer();