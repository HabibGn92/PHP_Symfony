<?php

namespace App\Tests;

use App\Services\FileSystemImproved;
use PHPUnit\Framework\TestCase;

class FsiTest extends TestCase {

    public function testState(){
        $fsi = new FileSystemImproved();
        $this->assertSame(['habib.txt','test.txt'], $fsi->state());
    }

    public function testCreateFile(){
        $fsi = new FileSystemImproved();
        $this->assertSame(['habib.txt','test.txt','test2.txt','test3.txt'],$fsi->createFile('test3'));
    }

    public function testDeleteFile(){
        $fsi = new FileSystemImproved();
        $this->assertSame(true,$fsi->deleteFile('test3'));
    }

    public function testDeleteInexistantFile() {
        $fsi = new FileSystemImproved();
        $this->assertSame(true,$fsi->deleteFile('test5'));
    }

}