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
        


        if (!$this->fs->exists('C:\Users\hhajjem\Desktop\PHP_Symfony\Module5\Act-5.4\vendor\symfony\http-client-contracts\Test\Fixtures\web\\fsi')) {
            $this->fs->mkdir('C:\Users\hhajjem\Desktop\PHP_Symfony\Module5\Act-5.4\vendor\symfony\http-client-contracts\Test\Fixtures\web\\fsi');
        }
    }

    public function state(){
        $this->finder->in(dirname(getcwd()))->path('fsi');
        foreach ($this->finder as $file) {
            $path = $file->getPath().'\\';
        }

        $resultat = $this->finder->files()->in($path);
        foreach ($resultat as $file) {
            $files[] = $file->getFilename();
        }
        return $files;
    }

    public function createFile($filename){

        $this->fs->touch("C:\Users\hhajjem\Desktop\PHP_Symfony\Module5\Act-5.4\\vendor\symfony\http-client-contracts\Test\Fixtures\web\\fsi\\".$filename.".txt");
        return $this->state();
    }

    public function deleteFile($filename)
    {
        $files = $this->finder->in(dirname(getcwd()))->path($filename.'.txt');
        if (!$files->hasResults()) {
            return false;
        }

        foreach ($files as $file) {
            $path = $file->getRealPath();
        }

        $this->fs->remove($path);
        return true;
    }

    public function writeInFile($filename, $text, $offset = 0)
    {
        $files = $this->finder->in(dirname(getcwd()))->path($filename.'.txt');
        if (!$files->hasResults()) {
            return false;
        }
        foreach ($files as $file) {
            $path = $file->getRealPath();
        }
        $file = fopen($path,'a+');
        fseek($file,$offset);
        fwrite($file,$text);
        fclose($file);
        return true;
    }

    public function readFile($filename){
        $files = $this->finder->in(dirname(getcwd()))->path($filename.'.txt');
        if (!$files->hasResults()) {
            return false;
        }
        foreach ($files as $file) {
            $path = $file->getRealPath();
        }
        $file = fopen($path,'r+');
        $res = fread($file,filesize($path));
        return $res;
    }
} 