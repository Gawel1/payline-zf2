<?php

namespace SDK;

class LogZF2
{
    protected $filename;
    protected $path;

    public function __construct($filename, $path)
    {
        $this->filename = $filename;
        $this->path     = $path;
    }

    public function write($message)
    {
        $file = $this->path.$this->filename;
        $handle = fopen($file, 'a+');
        fwrite($handle, date('Y-m-d G:i:s') . ' - ' . $message . "\n");
        fclose($handle);
    }
}