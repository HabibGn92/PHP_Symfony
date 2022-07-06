<?php

namespace App\Event;

use App\Services\FileSystemImproved;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;


class ExceptionListener
{
    protected $fsi;
    protected $fs;

    public function __construct(FileSystemImproved $fsi, Filesystem $fs)
    {
        $this->fsi = $fsi;
        $this->fs = $fs;
    }
    
    public function onKernelException(ExceptionEvent $event)
    {
        $exception = $event->getThrowable();
        $this->fsi->createFile('error_file');
        // $this->fsi->writeInFile('error_file',$exception->getMessage());
        $this->fs->appendToFile(dirname(getcwd()) . "\\vendor\symfony\http-client-contracts\Test\Fixtures\web\\fsi\\error_file.txt",$exception->getMessage());
    }
}