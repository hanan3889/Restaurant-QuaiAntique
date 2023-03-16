<?php

namespace App\Service;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class PictureService
{
  private $params;

  public function __construct(ParameterBagInterface $params)
  {
    $this->params = $params;
  }

  public function add(UploadedFile $picture, ?string $folder = '',
  ?int $width = 250, ?int $height = 250)
  {
    //on recupère les infos de l'image
    $picture_infos = getimagesize($picture);

  }

}