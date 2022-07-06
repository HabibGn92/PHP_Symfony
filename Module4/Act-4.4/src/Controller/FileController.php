<?php

namespace App\Controller;

use App\Services\FileSystemImproved;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Path;
use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FileController extends AbstractController
{
    /**
     * @Route("/", name="app_file")
     */
    public function index(): Response
    {
        return $this->render('file/index.html.twig');
    }
    
    /**
     * @Route("/create/{file_name}", name="create_file")
     */
    public function create(Filesystem $filesystem,$file_name): Response
    {
        if (!$filesystem->exists(dirname(getcwd()) . "\\vendor\symfony\http-client-contracts\Test\Fixtures\web\\".$file_name.".txt")) {
            $filesystem->touch(dirname(getcwd()) . "\\vendor\symfony\http-client-contracts\Test\Fixtures\web\\".$file_name.".txt" );
        }
        return $this->render('file/create.html.twig');
    }

    /**
     * @Route("/write/{file_name}/{content}", name="write_file")
     */
    public function write(Filesystem $filesystem,$file_name,$content): Response
    {
        if ($filesystem->exists(dirname(getcwd()) . "\\vendor\symfony\http-client-contracts\Test\Fixtures\web\\".$file_name.".txt")) {
            $filesystem->appendToFile(dirname(getcwd()) . "\\vendor\symfony\http-client-contracts\Test\Fixtures\web\\".$file_name.".txt",$content);
        }
        return $this->render('file/write.html.twig');
    }

    /**
     * @Route("/copy/{from}/{to}", name="copy_file")
     */
    public function copy(Filesystem $filesystem,$from,$to): Response
    {
        if ($filesystem->exists(dirname(getcwd()) . "\\vendor\symfony\http-client-contracts\Test\Fixtures\web\\".$from.".txt")) {
            $filesystem->copy(dirname(getcwd()) . "\\vendor\symfony\http-client-contracts\Test\Fixtures\web\\".$from.".txt",
            dirname(getcwd()) . "\\vendor\symfony\http-client-contracts\Test\Fixtures\web\\".$to.".txt");
        }
        return $this->render('file/copy.html.twig');
    }

    /**
     * @Route("/delete/{file_name}", name="delete_file")
     */
    public function delete(Filesystem $filesystem,$file_name): Response
    {
        if ($filesystem->exists(dirname(getcwd()) . "\\vendor\symfony\http-client-contracts\Test\Fixtures\web\\".$file_name.".txt")) {
            $filesystem->remove(dirname(getcwd()) . "\\vendor\symfony\http-client-contracts\Test\Fixtures\web\\".$file_name.".txt");
        }
        return $this->render('file/delete.html.twig');
    }





    /**
     * @Route("/create_file/{file_name}", name="create_file_fsi")
     */
    public function createFileFsi(FileSystemImproved $fileSystemImproved,$file_name): Response
    {
        $res = $fileSystemImproved->createFile($file_name);
        return new JsonResponse($res);

    }

    /**
     * @Route("/delete_file/{file_name}", name="delete_file_fsi")
     */
    public function deleteFileFsi(FileSystemImproved $fileSystemImproved,$file_name): Response
    {
        $res = $fileSystemImproved->deleteFile($file_name);
        return new JsonResponse($res);
    }

    /**
     * @Route("/write_in_file/{file_name}/{content}/{offset?}", name="write_file_fsi")
     */
    public function writeFsi(FileSystemImproved $fileSystemImproved,$file_name,$content,$offset): Response
    {
        $res = $fileSystemImproved->writeInFile($file_name,$content,$offset);
        return new JsonResponse($res);
    }

    /**
     * @Route("/read_file/{file_name}", name="read_file_fsi")
     */
    public function readFsi(FileSystemImproved $fileSystemImproved,$file_name): Response
    {
        $res = $fileSystemImproved->readFile($file_name);
        return new JsonResponse($res);
    }

    /**
     * @Route("/state", name="state")
     */
    public function state(FileSystemImproved $fileSystemImproved): Response
    {
        $res = $fileSystemImproved->state();
        return new JsonResponse($res);
    }

}
