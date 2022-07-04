<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Path;
use Symfony\Component\Finder\Finder;
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
}
