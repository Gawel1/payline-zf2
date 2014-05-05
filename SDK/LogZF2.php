<?php

namespace SDK;

class LogZF2
{
    const LOG_PATH = 'logs/';

    protected $filename;
    protected $path = self::LOG_PATH;
    protected $logger;

    public function __construct($filename, $path = null)
    {
        $this->filename = $filename;

        if ($path != null) {
            $this->path = $path;
        }

        $this->logger   = new \Zend\Log\Logger();
        $appWrite = new \Zend\Log\Writer\Stream($this->path . $this->filename, 'a');
        $this->logger->addWriter($appWrite);
    }

    public function write($message)
    {
        $this->logger->info(date('Y-m-d G:i:s') . ' - ' . $message . "\n");
    }
}