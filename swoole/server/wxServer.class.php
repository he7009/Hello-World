<?php


class wxServer
{
    const HOST = "0.0.0.0";
    const PORT = 9511;

    public $wsS = null;

    public function __construct()
    {
        $this->wsS = new Swoole\WebSocket\Server(self::HOST,self::PORT);
        $this->wsS->on("open",[$this,"onOpen"]);
        $this->wsS->on("message",[$this,"onMessage"]);
        $this->wsS->on("close",[$this,"onClose"]);
        $this->wsS->start();
    }

    /**
     * 连接成功
     * @param $wsS
     * @param $request
     */
    public function onOpen($wsS,$request)
    {
        echo "server: Connect Success with fd {$request->fd}" . PHP_EOL;
        swoole_timer_tick(2000,function ($timer_id){
            echo "timerId:{$timer_id} 输出数据\n";
        });
    }

    /**
     * 接收到数据
     * @param $wsS
     * @param $frame
     */
    public function onMessage($wsS,$frame)
    {
        echo "receive from {$frame->fd}:{$frame->data},opcode:{$frame->opcode},fin:{$frame->finish}\n";
        swoole_timer_after(5000,function() use ($wsS,$frame){
            $wsS->push($frame->fd,"swoole_timer_after send Data");
        });
        $wsS->push($frame->fd,"this is server");
    }

    /**
     * @客户端关闭
     * @param $ser
     * @param $fd
     */
    public function onClose($ser, $fd)
    {
        echo "client {$fd} closed\n";
    }


}

$wxServer = new wxServer();