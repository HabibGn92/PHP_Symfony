<?php

namespace App\Services;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class UploaderService {

    private $targetDirectory;

    public function __construct($targetDirectory)
    {
        $this->targetDirectory = $targetDirectory;
    }


    public function uploadCv(UploadedFile $cv)
    {
        $originalFilename = pathinfo($cv->getClientOriginalName(), PATHINFO_FILENAME);
        $newFilename = $originalFilename.'-'.uniqid().'.'.$cv->guessExtension();

        $cv->move(
            $this->getTargetDirectory(),
            $newFilename
        );
    }

    public function getTargetDirectory()
    {
        return $this->targetDirectory;
    }
}