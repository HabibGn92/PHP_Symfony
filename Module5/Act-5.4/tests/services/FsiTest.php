<?php

namespace App\Tests;

use App\Services\FileSystemImproved;
use PHPUnit\Framework\TestCase;

class FsiTest extends TestCase {


    public function testState(){
        $fsi = new FileSystemImproved();
        $this->assertSame(['habib.txt','test.txt','test2.txt'], $fsi->state());
    }

    public function testCreateFile(){
        $fsi = new FileSystemImproved();
        $this->assertSame(['habib.txt','test.txt','test2.txt','test3.txt'],$fsi->createFile('test3.txt'));
    }

    public function testDeleteFile(){
        $fsi = new FileSystemImproved();
        $this->assertSame(true,$fsi->deleteFile('test3.txt'));
    }

    public function testDeleteInexistantFile() {
        $fsi = new FileSystemImproved();
        $this->assertSame(false,$fsi->deleteFile('test5.txt'));
    }

    public function testWriteInFile(){
        $fsi = new FileSystemImproved();
        $this->assertSame(true,$fsi->writeInFile('test.txt', 'text'));
    }

    public function testWriteInInexistantFile(){
        $fsi = new FileSystemImproved();
        $this->assertSame(false,$fsi->writeInFile('habib23.txt','text'));
    }

    public function testReadFile(){
        $fsi = new FileSystemImproved();
        $this->assertNotFalse($fsi->readFile('habib.txt'));
    }

    public function testReadInexistantFile(){
        $fsi = new FileSystemImproved();
        $this->assertFalse($fsi->readFile('habib88.txt'));
    }

}