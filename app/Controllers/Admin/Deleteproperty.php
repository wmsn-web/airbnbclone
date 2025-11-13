<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Libraries\CiAdmin;
use App\Models\HotelModel;
use App\Models\HotelLocationModel;
use App\Models\HotelAmenitiesModel;
use App\Models\HotelFinanceModel;
use App\Models\HotelPoliciesModel;
use App\Models\HotelGalleryModel;

class Deleteproperty extends BaseController
{
    protected $helpers = ['url', 'form'];
    /**
     * Deletes a hotel and all its associated data.
     * This method handles deleting records from all related tables
     * and removing uploaded files (thumbnail, gallery images).
     *
     * @param int|string $hotelId The ID of the hotel to delete.
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function deleteHotel($hotelId = null)
    {
        // Optional: Implement robust authentication/authorization check here
        // For example:
        if (!CiAdmin::admin()) {
            return redirect()->to('/admin/hotel_listing')->with('errors', 'Unauthorized access.');
        }

        if (!is_numeric($hotelId) || $hotelId <= 0) {
            return redirect()->to('/admin/hotel_listing')->with('errors', 'Invalid hotel ID provided.');
        }
        // Initialize models
        $hotelModel         = new HotelModel();
        $hotelLocationModel = new HotelLocationModel();
        $hotelAmenitiesModel = new HotelAmenitiesModel();
        $hotelGalleryModel  = new HotelGalleryModel();
        $hotelFinanceModel  = new HotelFinanceModel();
        $hotelPoliciesModel = new HotelPoliciesModel();

        // Start a database transaction for atomicity
        // If any deletion fails, all previous deletions will be rolled back.
        $hotelModel->db->transBegin();

        try {
            // 1. Fetch hotel data to get file paths
            $hotelData = $hotelModel->find($hotelId);

            if (empty($hotelData)) {
                $hotelModel->db->transRollback();
                return redirect()->to('/admin/dashboard')->with('errors', 'Hotel not found.');
            }

            // 2. Delete associated files
            // Delete thumbnail
            if (!empty($hotelData['thumbnail'])) {
                $thumbnailPath = WRITEPATH . 'uploads/hotel-thumbnails/' . $hotelData['thumbnail'];
                if (file_exists($thumbnailPath) && is_file($thumbnailPath)) {
                    unlink($thumbnailPath);
                }
            }

            // Delete gallery images
            $galleryData = $hotelGalleryModel->where('hotel_id', $hotelId)->first();
            if (!empty($galleryData) && !empty($galleryData['photos'])) {
                $photos = json_decode($galleryData['photos'], true);
                if (is_array($photos)) {
                    $galleryUploadPath = WRITEPATH . 'uploads/hotel-gallery/';
                    foreach ($photos as $photoName) {
                        $fullPath = $galleryUploadPath . $photoName;
                        if (file_exists($fullPath) && is_file($fullPath)) {
                            unlink($fullPath);
                        }
                    }
                }
            }

            // 3. Delete records from associated tables (order matters for foreign key constraints, if any)
            // It's generally safest to delete child records before parent records.
            $hotelLocationModel->where('hotel_id', $hotelId)->delete();
            $hotelAmenitiesModel->where('hotel_id', $hotelId)->delete();
            $hotelGalleryModel->where('hotel_id', $hotelId)->delete();
            $hotelFinanceModel->where('hotel_id', $hotelId)->delete();
            $hotelPoliciesModel->where('hotel_id', $hotelId)->delete();

            // 4. Finally, delete the main hotel record
            $hotelModel->delete($hotelId);

            // If all operations were successful, commit the transaction
            $hotelModel->db->transCommit();
            return redirect()->to('/admin/hotel_listing')->with('success', 'Hotel and all associated data deleted successfully!');
        } catch (\Exception $e) {
            // If any error occurs, roll back the transaction
            $hotelModel->db->transRollback();
            // Log the error for debugging
            log_message('error', 'Hotel deletion failed for ID ' . $hotelId . ': ' . $e->getMessage());
            return redirect()->to('/admin/dashboard')->with('errors', 'Failed to delete hotel: ' . $e->getMessage());
        }
    }
}
