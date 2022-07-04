<?php

namespace App\Services;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;


class FileSystemImproved {

    private $fs;
    private $finder;

    public function __construct()
    {
        $this->fs = new Filesystem();
        $this->finder  = new Finder();

        if (!$this->fs->exists(dirname(getcwd()) . "\\vendor\symfony\http-client-contracts\Test\Fixtures\web\\fsi")) {
            $this->fs->mkdir(dirname(getcwd()) . "\\vendor\symfony\http-client-contracts\Test\Fixtures\web\\fsi");
        }
    }

    public function createFile($filename){

        // $this->fs->touch(dirname(getcwd()) . "\\vendor\symfony\http-client-contracts\Test\Fixtures\web\\fsi\\".$filename.".txt");
        $this->finder->in(dirname(getcwd()))->name('fsi');
        foreach ($this->finder as $file) {
            $path = $this->finder->in($file->getRealPath());
        }
        // $resultat = $this->finder->in($path);
        // foreach ($resultat as $file) {
        //     $files[] = $file->getFilename();
        // }
        return $path;
    }
}