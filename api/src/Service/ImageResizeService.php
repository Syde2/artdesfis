<?php

namespace App\Service;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;
use Psr\Log\LoggerInterface;

class ImageResizeService
{
    private int $maxWidth;
    private int $maxHeight;
    private LoggerInterface $logger;
    private ImageManager $manager;



    public function __construct(int $maxWidth = 800, int $maxHeight = 600, LoggerInterface $logger, ImageManager $manager)
    {
        $this->maxWidth = $maxWidth;
        $this->maxHeight = $maxHeight;
        $this->logger = $logger;
        $this->manager = $manager;
        
    }

    public function resize(string $imagePath): void
    {
        $this->logger->info("Tentative de redimensionnement de l'image: {$imagePath}");
        
        try {

            $image = $this->manager->read($imagePath);
            $originalSize = $image->width() . 'x' . $image->height();

            if ($image->width() > $this->maxWidth || $image->height() > $this->maxHeight) {
                $image->resize($this->maxWidth, $this->maxHeight, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });

                $image->save();
                $newSize = $image->width() . 'x' . $image->height();
                $this->logger->info("Image redimensionnée: {$imagePath}", [
                    'original_size' => $originalSize,
                    'new_size' => $newSize
                ]);
            } else {
                $this->logger->info("L'image ne nécessite pas de redimensionnement: {$imagePath}");
            }
        } catch (\Exception $e) {
            $this->logger->error("Erreur lors du redimensionnement de l'image: {$imagePath}", [
                'error' => $e->getMessage()
            ]);
        }
    }
}
