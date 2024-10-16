<?php

class tcp_comn
{
    private $ip;
    private $port;

    private $socket;

    public $connection;

    function __construct(string $ip, int $port)
    {
        $this->ip = $ip;
        $this->port = $port;
        $this->socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        try {
            $this->connection = socket_connect($this->socket, $this->ip, $this->port);
        } catch (\Exception $e) {
            // Error while sending/receiving data
            socket_close($this->socket);
            echo "Exception: " . $e->getMessage() . "\n";
        }
    }

    public function sendData(string $data): string
    {
        if ($this->connection) {
            try {
                socket_write($this->socket, $data);
                $resp = socket_read($this->socket, 1024);
            } catch (\Exception $e) {
                //Error while connecting socket
                socket_close($this->socket);
            }
        } else {
            echo "Socket connection error";
        }
        return $resp;
    }

    public function close()
    {
        socket_close($this->socket);
    }
}

