<?php

include __DIR__ . '/debugTrace_2.php';

class debugTrace
{
    public function start()
    {
        $this->second();
    }

    public function second()
    {
        $this->thied("duanyude");
    }

    public function thied($name)
    {
        $this->end();
    }

    public function end()
    {
        debugTrace_2::over();
    }
}

$debugTrace = new debugTrace();
$debugTrace->start();