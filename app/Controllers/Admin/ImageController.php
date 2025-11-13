<?php

namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use App\Models\HotelModel;
use CodeIgniter\Exceptions\PageNotFoundException;

// Image file server to view
class ImageController extends Controller
{
    public function hotelThumbnail($hotelId, $fileName)
    {
        $hotelModel = new HotelModel();
        $hotel = $hotelModel->find($hotelId);
        if (!$hotel) {
            throw PageNotFoundException::forPageNotFound();
        }
        $filePath = WRITEPATH . 'uploads/hotel-thumbnails/' . basename($fileName);
        return $this->serveImage($filePath);
    }

    public function hotelGallery($hotelId, $fileName)
    {
        $hotelModel = new HotelModel();
        $hotel = $hotelModel->find($hotelId);

        if (!$hotel) {
            throw PageNotFoundException::forPageNotFound();
        }
        $filePath = WRITEPATH . 'uploads/hotel-gallery/' . basename($fileName);
        return $this->serveImage($filePath);
    }

    protected function serveImage(string $filePath)
    {
        if (!is_file($filePath)) {
            throw PageNotFoundException::forPageNotFound();
        }

        return $this->response
            ->setHeader('Content-Type', mime_content_type($filePath))
            ->setBody(file_get_contents($filePath));
    }
}
