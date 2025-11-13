<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Libraries\CiAdmin;
use App\Models\HotelModel;
use App\Models\HotelLocationModel;
use App\Models\AmenitiesModel;
use App\Models\HotelAmenitiesModel;
use App\Models\HotelGalleryModel;
use App\Models\HotelFinanceModel;
use App\Models\HotelPoliciesModel;
use App\Libraries\FileUploader;
use App\Libraries\Slug;

class Addproperty extends BaseController
{
    protected $helpers = ['url', 'form', 'wizard_helper'];

    public function info($hotelId = null)
    {
        $hModel = new HotelModel();
        $hotelInfo = $hModel->getHotel($hotelId);

        $data = [
            'pageTitle' => 'add-property',
            'hotelId'   => $hotelId,
            'hotelInfo'   => $hotelInfo,
        ];
        return view('fronts/admin/add-property/tabs/HotelInfo', $data);
    }

    public function location($hotelId)
    {
        $hModel = new HotelLocationModel();
        $hotelLocation = $hModel->getHotelLocation($hotelId);

        $data = [
            'pageTitle' => 'add-property',
            'hotelId'   => $hotelId,
            'hotelLocation'   => $hotelLocation,
        ];
        return view('fronts/admin/add-property/tabs/HotelLocation', $data);
    }
    public function amenities($hotelId)
    {
        $amModel = new AmenitiesModel();
        $amsData = $amModel->getAmsWithCat();
        $hAmModel = new HotelAmenitiesModel();
        $hamData = $hAmModel->getHotelAmenities($hotelId);

        $data = [
            'pageTitle' => 'add-property',
            'hotelId'   => $hotelId,
            'amsData'   => $amsData,
            'hamData'   => $hamData,
        ];
        return view('fronts/admin/add-property/tabs/HotelAmenities', $data);
    }
    public function photos($hotelId)
    {
        $hModel = new HotelGalleryModel();
        $hotelPhotos = $hModel->getHotelPhotos($hotelId);

        $data = [
            'pageTitle' => 'add-property',
            'hotelId'   => $hotelId,
            'hotelPhotos'   => $hotelPhotos,
        ];
        return view('fronts/admin/add-property/tabs/HotelPictures', $data);
    }
    public function finance($hotelId)
    {
        $hModel = new HotelFinanceModel();
        $hotelFinances = $hModel->getHotelFinances($hotelId);

        $data = [
            'pageTitle' => 'add-property',
            'hotelId'   => $hotelId,
            'hotelFinances'   => $hotelFinances,
        ];
        return view('fronts/admin/add-property/tabs/HotelFinances', $data);
    }
    public function policies($hotelId)
    {
        $hModel = new HotelPoliciesModel();
        $hotelPolicies = $hModel->getHotelPolicies($hotelId);

        $data = [
            'pageTitle' => 'add-property',
            'hotelId'   => $hotelId,
            'hotelPolicies'   => $hotelPolicies,
        ];
        return view('fronts/admin/add-property/tabs/HotelPolicies', $data);
    }
    public function review($hotelId)
    {
        $hModel = new HotelModel();
        $hotelInfo = $hModel->getHotel($hotelId);

        $data = [
            'pageTitle' => 'add-property',
            'hotelId'   => $hotelId,
            'hotelInfo'   => $hotelInfo,
        ];
        return view('fronts/admin/add-property/tabs/HotelReview', $data);
    }

    public function saveHotel($hotelId = null)
    {
        // Check if it's an AJAX request
        if (!$this->request->isAJAX()) {
            $formData = $this->request->getPost();
            return $this->response->setJSON([
                'error' => true,
                'type' => 'response',
                'msg' => 'Invalid request!',
            ])->setStatusCode(400);
        }

        // Get form data
        $formData = $this->request->getPost();

        // Define validation rules
        $rules = [
            'property_name' => 'required|min_length[3]|max_length[90]',
            'description'   => 'permit_empty',
            'rating'        => 'required|in_list[1,2,3,4,5]|integer',
            'email'         => 'required|valid_email|max_length[100]',
            'phone'         => 'required|regex_match[/^[0-9]{10,15}$/]',
            'chain_name'    => 'permit_empty',
            'thumbnail'     => 'uploaded[thumbnail]|is_image[thumbnail]|max_size[thumbnail,2048]',
        ];

        // Custom error messages
        $messages = [
            'property_name' => [
                'required'   => 'Property name is required.',
                'min_length' => 'Property name must be at least 3 characters.',
                'max_length' => 'Property name must not exceed 90 characters.',
            ],
            'rating' => [
                'required'   => 'Rating is required.',
                'in_list'    => 'Rating must be between 1 and 5.',
                'integer'    => 'Rating must be a number.',
            ],
            'email' => [
                'required'    => 'Email is required.',
                'valid_email' => 'Please enter a valid email address.',
                'max_length'  => 'Email must not exceed 100 characters.',
            ],
            'phone' => [
                'required'    => 'Phone number is required.',
                'regex_match' => 'Phone number must be 10 to 15 digits only.',
            ],
            'thumbnail' => [
                'uploaded'   => 'A thumbnail image is required.',
                'is_image'   => 'The uploaded file must be a valid image.',
                'max_size'   => 'Thumbnail must not exceed 2MB in size.',
            ],
        ];

        // Conditionally add chain_name validation
        if (isset($formData['checkIsHotelRadio']) && $formData['checkIsHotelRadio'] === 'yes') {
            $rules['chain_name'] = 'required|min_length[2]';
            $messages['chain_name'] = [
                'required' => 'Chain name is required when hotel is part of a chain.',
                'min_length' => 'Chain name must be at least 2 characters.',
            ];
        } else {
            $formData['chain_name'] = null;
        }

        // Validate the form data
        if (!$this->validate($rules, $messages)) {
            return $this->response->setJSON([
                'error' => true,
                'type'  => 'validation',
                'msg'   => $this->validator->getErrors(),
            ]);
        }

        // Handle file upload
        $file = $this->request->getFile('thumbnail');
        $uploader = new FileUploader(WRITEPATH . 'uploads/hotel-thumbnails');
        $result = $uploader->upload($file);

        // Check if upload was successful
        if (!$result['status']) {
            return $this->response->setJSON([
                'error' => true,
                'type'  => 'upload',
                'msg'   => $result['message']
            ]);
        }

        // Prepare data for database
        $formData['thumbnail'] = $result['file_name'];
        $insertableData = [
            'property_name' => $formData['property_name'],
            'description'   => $formData['description'],
            'rating'        => $formData['rating'],
            'email'         => $formData['email'],
            'phone'         => $formData['phone'],
            'chain_name'    => $formData['chain_name'],
            'thumbnail'     => $formData['thumbnail'],
        ];
        // dd($insertableData);
        // Save to database
        $hotelModel = new HotelModel();

        try {
            if (is_numeric($hotelId) && $hotelId > 0) {
                // Update existing hotel
                $existingHotel = $hotelModel->find($hotelId);

                if (!empty($existingHotel)) {
                    // Delete old thumbnail
                    $oldPath = WRITEPATH . 'uploads/hotel-thumbnails/' . $existingHotel['thumbnail'];
                    if (file_exists($oldPath)) {
                        unlink($oldPath);
                    }

                    // Update record
                    $hotelModel->update($hotelId, $insertableData);
                    $newHotelId = $hotelId;
                } else {
                    return $this->response->setJSON([
                        'error' => true,
                        'type'  => 'database',
                        'msg'   => 'Hotel not found for update.'
                    ]);
                }
            } else {
                // Insert new hotel
                $newHotelId = $hotelModel->insert($insertableData, true);

                if (!$newHotelId) {
                    return $this->response->setJSON([
                        'error' => true,
                        'type'  => 'database',
                        'msg'   => 'Failed to save hotel data.'
                    ]);
                }
            }

            // Return success response
            return $this->response->setJSON([
                'success' => true,
                'msg'     => is_numeric($hotelId) && $hotelId > 0 ?
                    'Hotel information updated successfully!' :
                    'Hotel information saved successfully!',
                'hotelId' => $newHotelId,
                'nextTab' => is_numeric($hotelId) && $hotelId > 0 ? 'tab7' : 'tab2'
            ]);
        } catch (\Exception $e) {
            // Delete uploaded file if there was an error
            if (isset($result['file_name'])) {
                $filePath = WRITEPATH . 'uploads/hotel-thumbnails/' . $result['file_name'];
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }

            return $this->response->setJSON([
                'error' => true,
                'type'  => 'exception',
                'msg'   => 'An error occurred: ' . $e->getMessage()
            ]);
        }
    }

    public function saveLocation($hotelId)
    {
        // Check if it's an AJAX request
        if (!$this->request->isAJAX()) {
            return $this->response->setJSON([
                'error' => true,
                'type' => 'response',
                'msg' => 'Invalid request!'
            ])->setStatusCode(400);
        }

        // Get form data
        $formData = $this->request->getPost();

        // Define validation rules
        $rules = [
            'street_name'       => 'string|max_length[100]',
            'city'              => 'required|string|max_length[100]',
            'state'             => 'required|string|max_length[100]',
            'zip_code'          => 'required|string|max_length[10]',
            'country_or_region' => 'required|string|max_length[100]',
        ];

        // Custom error messages
        $messages = [
            'street_name' => [
                'string'      => 'Street name must be a valid.',
                'max_length'  => 'Max 100 characters.',
            ],
            'city' => [
                'required'    => 'City is required.',
                'string'      => 'City must be a valid.',
                'max_length'  => 'Max 100 characters.',
            ],
            'state' => [
                'required'    => 'State is required.',
                'string'      => 'State must be a valid.',
                'max_length'  => 'Max 100 characters.',
            ],
            'zip_code' => [
                'required'    => 'ZIP code is required.',
                'string'      => 'ZIP code must be a valid.',
                'max_length'  => 'Max 10 characters.',
            ],
            'country_or_region' => [
                'required'    => 'Country or region is required.',
                'string'      => 'Country or region must be a valid.',
                'max_length'  => 'Max 100 characters.',
            ],
        ];

        // Validate the form data
        if (!$this->validate($rules, $messages)) {
            return $this->response->setJSON([
                'error' => true,
                'type'  => 'validation',
                'msg'   => $this->validator->getErrors(),
            ]);
        }

        // Prepare data for database
        $insertableData = [
            'hotel_id'          => $hotelId,
            'street_name'       => !empty($formData['street_name']) ? $formData['street_name'] : null,
            'city'              => $formData['city'],
            'state'             => $formData['state'],
            'zip_code'          => $formData['zip_code'],
            'country_or_region' => $formData['country_or_region'],
            'latitude'          => !empty($formData['latitude']) ? $formData['latitude'] : null,
            'longitude'         => !empty($formData['longitude']) ? $formData['longitude'] : null,
        ];

        // Save to database
        $hotelLocationModel = new HotelLocationModel();

        try {
            $existingLocation = $hotelLocationModel->where('hotel_id', $hotelId)->first();

            if (!empty($existingLocation)) {
                // Update existing location
                if ($hotelLocationModel->update($existingLocation['id'], $insertableData)) {
                    return $this->response->setJSON([
                        'success' => true,
                        'msg'     => 'Location updated successfully!',
                        'hotelId' => $hotelId,
                        'nextTab' => 'tab7' // Redirect to tab7 after update
                    ]);
                } else {
                    return $this->response->setJSON([
                        'error' => true,
                        'type'  => 'database',
                        'msg'   => 'Location update failed!'
                    ]);
                }
            } else {
                // Insert new location
                if ($hotelLocationModel->insert($insertableData)) {
                    return $this->response->setJSON([
                        'success' => true,
                        'msg'     => 'Location saved successfully!',
                        'hotelId' => $hotelId,
                        'nextTab' => 'tab3' // Redirect to tab3 after insert
                    ]);
                } else {
                    return $this->response->setJSON([
                        'error' => true,
                        'type'  => 'database',
                        'msg'   => 'Location insert failed!'
                    ]);
                }
            }
        } catch (\Exception $e) {
            return $this->response->setJSON([
                'error' => true,
                'type'  => 'exception',
                'msg'   => 'An error occurred: ' . $e->getMessage()
            ]);
        }
    }

    public function addAmenities()
    {
        // Check if it's an AJAX request
        if (!$this->request->isAJAX()) {
            return $this->response->setJSON([
                'error' => true,
                'type' => 'response',
                'msg' => 'Invalid request!'
            ])->setStatusCode(400);
        }

        // Get form data
        $formData = $this->request->getPost();

        // Define validation rules
        $rules = [
            'amenities-catagory' => 'required|max_length[255]',
            'amenities'          => 'required|max_length[255]',
        ];

        // Custom error messages
        $messages = [
            'amenities-catagory' => [
                'required'   => 'Amenities category is required.',
                'max_length' => 'Amenities category must not exceed 255 characters.',
            ],
            'amenities' => [
                'required'   => 'Amenities name is required.',
                'max_length' => 'Amenities name must not exceed 255 characters.',
            ],
        ];

        // Validate the form data
        if (!$this->validate($rules, $messages)) {
            return $this->response->setJSON([
                'error' => true,
                'type'  => 'validation',
                'msg'   => $this->validator->getErrors(),
            ]);
        }

        // Check for duplicate amenity
        $amModel = new AmenitiesModel();
        $am_slug = $amModel->where('am_slug', Slug::slugify($formData['amenities']))->first();

        if ($am_slug) {
            return $this->response->setJSON([
                'error' => true,
                'type'  => 'duplicate',
                'msg'   => 'Amenity already exists!'
            ]);
        }

        // Prepare data for database
        $insertableData = [
            'cat'       => $formData['amenities-catagory'],
            'am_name'   => $formData['amenities'],
            'cat_slug'  => Slug::slugify($formData['amenities-catagory']),
            'am_slug'   => Slug::slugify($formData['amenities']),
        ];

        // Save to database
        try {
            if ($amModel->insert($insertableData)) {
                return $this->response->setJSON([
                    'success' => true,
                    'msg'     => 'Amenity added successfully!',
                ]);
            } else {
                return $this->response->setJSON([
                    'error' => true,
                    'type'  => 'database',
                    'msg'   => 'Failed to add amenity!'
                ]);
            }
        } catch (\Exception $e) {
            return $this->response->setJSON([
                'error' => true,
                'type'  => 'exception',
                'msg'   => 'An error occurred: ' . $e->getMessage()
            ]);
        }
    }

    public function saveHotelAmenities($hotelId)
    {
        // Check if it's an AJAX request
        if (!$this->request->isAJAX()) {
            return $this->response->setJSON([
                'error' => true,
                'type' => 'response',
                'msg' => 'Invalid request!'
            ])->setStatusCode(400);
        }

        // Get form data
        $formData = $this->request->getPost();
        $formattedAmenities = [];

        // Process amenities data
        if (isset($formData['am_data']) && is_array($formData['am_data'])) {
            foreach ($formData['am_data'] as $amSlug) {
                $typeKey = $amSlug . '-radio';
                $conditionKey = $amSlug . '-condition';
                $type = $formData[$typeKey] ?? '';
                $condition = $type === 'paid' ? ($formData[$conditionKey] ?? '') : '';

                $formattedAmenities[$amSlug] = [
                    'type' => $type,
                    'condition' => $condition
                ];
            }
        }

        // Prepare data for database
        $hAmModel = new HotelAmenitiesModel();
        $insertableData = [
            "hotel_id" => $hotelId,
            "amenities" => json_encode($formattedAmenities),
        ];

        try {
            $existing = $hAmModel->where('hotel_id', $hotelId)->first();

            if (!empty($existing)) {
                // Update existing record
                if ($hAmModel->update($existing['id'], $insertableData)) {
                    return $this->response->setJSON([
                        'success' => true,
                        'msg'     => 'Hotel amenities updated successfully!',
                        'hotelId' => $hotelId,
                        'nextTab' => 'tab7' // Redirect to tab7 after update
                    ]);
                } else {
                    return $this->response->setJSON([
                        'error' => true,
                        'type'  => 'database',
                        'msg'   => 'Failed to update hotel amenities!'
                    ]);
                }
            } else {
                // Insert new record
                if ($hAmModel->insert($insertableData)) {
                    return $this->response->setJSON([
                        'success' => true,
                        'msg'     => 'Hotel amenities saved successfully!',
                        'hotelId' => $hotelId,
                        'nextTab' => 'tab4' // Redirect to tab4 after insert
                    ]);
                } else {
                    return $this->response->setJSON([
                        'error' => true,
                        'type'  => 'database',
                        'msg'   => 'Failed to save hotel amenities!'
                    ]);
                }
            }
        } catch (\Exception $e) {
            return $this->response->setJSON([
                'error' => true,
                'type'  => 'exception',
                'msg'   => 'An error occurred: ' . $e->getMessage()
            ]);
        }
    }


    public function savePhotos($hotelId)
    {
        // Check if it's an AJAX request
        if (!$this->request->isAJAX()) {
            return $this->response->setJSON([
                'error' => true,
                'type' => 'response',
                'msg' => 'Invalid request!'
            ])->setStatusCode(400);
        }
        // Check if files were uploaded
        if (empty($_FILES['photos']['name'][0])) {
            return $this->response->setJSON([
                'error' => true,
                'type' => 'validation',
                'msg' => ['photos' => 'Please select at least one photo to upload.']
            ]);
        }

        $files = $this->request->getFileMultiple('photos');
        $uploadPath = WRITEPATH . 'uploads/hotel-gallery';
        $fileUploader = new FileUploader($uploadPath);
        $uploadResults = $fileUploader->uploadMultiple($files);

        $uploadedFileNames = [];
        $errors = [];

        foreach ($uploadResults as $result) {
            if ($result['status'] === true) {
                $uploadedFileNames[] = $result['file_name'];
            } else {
                $errors[] = $result['message'];
            }
        }

        // If there are errors, return error response
        if (!empty($errors)) {
            // Clean up any successfully uploaded files if there were errors
            foreach ($uploadedFileNames as $fileName) {
                $filePath = $uploadPath . '/' . $fileName;
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }

            return $this->response->setJSON([
                'error' => true,
                'type' => 'upload',
                'msg' => $errors
            ]);
        }

        // Save to database
        $hotelPDb = new HotelGalleryModel();
        $currentHid = $hotelPDb->where('hotel_id', $hotelId)->first();

        $indata = [
            'hotel_id' => $hotelId,
            'photos'   => json_encode($uploadedFileNames),
        ];

        try {
            if (!empty($currentHid)) {
                // Delete old photos
                $oldPhotos = json_decode($currentHid['photos'], true);
                if (!empty($oldPhotos)) {
                    foreach ($oldPhotos as $oldFile) {
                        $fullPath = $uploadPath . '/' . $oldFile;
                        if (is_file($fullPath)) {
                            unlink($fullPath);
                        }
                    }
                }

                $hotelPDb->update($currentHid['id'], $indata);

                return $this->response->setJSON([
                    'success' => true,
                    'msg'     => 'Hotel photos updated successfully!',
                    'hotelId' => $hotelId,
                    'nextTab' => 'tab7'
                ]);
            } else {
                $hotelPDb->insert($indata);

                return $this->response->setJSON([
                    'success' => true,
                    'msg'     => 'Hotel photos added successfully!',
                    'hotelId' => $hotelId,
                    'nextTab' => 'tab5'
                ]);
            }
        } catch (\Exception $e) {
            // Clean up uploaded files if database operation failed
            foreach ($uploadedFileNames as $fileName) {
                $filePath = $uploadPath . '/' . $fileName;
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }

            return $this->response->setJSON([
                'error' => true,
                'type'  => 'exception',
                'msg'   => 'An error occurred: ' . $e->getMessage()
            ]);
        }
    }

    public function saveFinance($hotelId)
    {
        // Check if it's an AJAX request
        if (!$this->request->isAJAX()) {
            return $this->response->setJSON([
                'error' => true,
                'type' => 'response',
                'msg' => 'Invalid request!'
            ])->setStatusCode(400);
        }

        // Get form data
        $formData = $this->request->getPost();

        // Set default 1/0 for checkboxes
        $formData['cashPayment']   = isset($formData['cashPayment']) ? 1 : 0;
        $formData['cardPayment']   = isset($formData['cardPayment']) ? 1 : 0;
        $formData['onlinePayment'] = isset($formData['onlinePayment']) ? 1 : 0;

        // Prepare data for database
        $insertableData = [
            "hotel_id"      => $hotelId,
            "cash_payment"  => $formData['cashPayment'],
            "card_payment"  => $formData['cardPayment'],
            "online_payment" => $formData['onlinePayment'],
        ];

        // Save to database
        $hotelFDb = new HotelFinanceModel();

        try {
            $currentHid = $hotelFDb->where('hotel_id', $hotelId)->first();

            if (!empty($currentHid)) {
                // Update existing record
                if ($hotelFDb->update($currentHid['id'], $insertableData)) {
                    return $this->response->setJSON([
                        'success' => true,
                        'msg'     => 'Hotel finances updated successfully!',
                        'hotelId' => $hotelId,
                        'nextTab' => 'tab7'
                    ]);
                } else {
                    return $this->response->setJSON([
                        'error' => true,
                        'type'  => 'database',
                        'msg'   => 'Failed to update hotel finances!'
                    ]);
                }
            } else {
                // Insert new record
                if ($hotelFDb->insert($insertableData)) {
                    return $this->response->setJSON([
                        'success' => true,
                        'msg'     => 'Hotel finances added successfully!',
                        'hotelId' => $hotelId,
                        'nextTab' => 'tab6'
                    ]);
                } else {
                    return $this->response->setJSON([
                        'error' => true,
                        'type'  => 'database',
                        'msg'   => 'Failed to add hotel finances!'
                    ]);
                }
            }
        } catch (\Exception $e) {
            return $this->response->setJSON([
                'error' => true,
                'type'  => 'exception',
                'msg'   => 'An error occurred: ' . $e->getMessage()
            ]);
        }
    }


    public function savePolicies($hotelId)
    {
        // Check if it's an AJAX request
        if (!$this->request->isAJAX()) {
            return $this->response->setJSON([
                'error' => true,
                'type' => 'response',
                'msg' => 'Invalid request!'
            ])->setStatusCode(400);
        }

        // Get form data
        $formData = $this->request->getPost();

        // Set default 0 for checkboxes or radio inputs not posted
        $defaultZeroFields = [
            'checkIn',
            'late_ci',
            'age_restriction',
            'deposit_at_ci',
            'doc_at_ci',
            'flexible_co_type',
            'flexible_co_status',
            'refund_policy_type',
            'full_refund_allowed',
            'partial_refund_allowed',
            'pet_policy_type',
            'pet_restricted_zones',
            'pet_additional_charges',
            'child_doc_requirement',
            'vat_included',
            'gst_included',
            'hotel_tax_included',
            'city_dist_tax_included',
            'tourist_tax_included'
        ];

        foreach ($defaultZeroFields as $field) {
            $formData[$field] = isset($formData[$field]) ? $formData[$field] : 0;
        }

        // Set NULL for text fields if empty
        $nullableFields = [
            'cin',
            'cie',
            'co_before',
            'flexible_co_condition',
            'vat_condition',
            'gst_condition',
            'hotel_tax_condition',
            'cdt_condition',
            'tourist_tax_condition',
            'property_registration_no',
            'business_registration_no',
            'taxpayer_identification_no'
        ];

        foreach ($nullableFields as $field) {
            $formData[$field] = !empty($formData[$field]) ? $formData[$field] : null;
        }

        $defaultFreeFields = [
            'flexible_checkout_radio',
            'vat_radio',
            'gst_radio',
            'hotel_tax_radio',
            'regional_location_tax_radio',
            'tourist_tax_radio',
        ];

        foreach ($defaultFreeFields as $field) {
            $formData[$field] = (isset($formData[$field]) && $formData[$field] === 'paid') ? 1 : 0;
        }

        // Handle JSON for age_segments
        $formData['age_segments'] = !empty($formData['age_segments']) ? json_encode($formData['age_segments']) : null;

        // Prepare data for database
        $insertableData = [
            'hotel_id'                  => $hotelId,
            'ci_type'                   => $formData['checkIn'],
            'ci_start_time'             => $formData['cin'],
            'ci_end_time'               => $formData['cie'],
            'late_ci'                   => $formData['late_ci'],
            'age_restriction'           => $formData['age_restriction'],
            'deposit_at_ci'             => $formData['deposit_at_ci'],
            'doc_at_ci'                 => $formData['doc_at_ci'],
            'co_before'                 => $formData['co_before'],
            'flexible_co_status'        => $formData['flexible_co_status'],
            'flexible_co_type'          => $formData['flexible_checkout_radio'],
            'flexible_co_condition'     => $formData['flexible_co_condition'],
            'refund_policy_type'        => $formData['refund_policy_type'],
            'full_refund_allowed'       => $formData['full_refund_allowed'],
            'partial_refund_allowed'    => $formData['partial_refund_allowed'],
            'pet_policy_type'           => $formData['pet_policy_type'],
            'pet_restricted_zones'      => $formData['pet_restricted_zones'],
            'pet_additional_charges'    => $formData['pet_additional_charges'],
            'age_segments'              => $formData['age_segments'],
            'child_doc_requirement'     => $formData['child_doc_requirement'],
            'vat_included'              => $formData['vat_included'],
            'vat_radio'                 => $formData['vat_radio'],
            'vat_condition'             => $formData['vat_condition'],
            'gst_included'              => $formData['gst_included'],
            'gst_radio'                 => $formData['gst_radio'],
            'gst_condition'             => $formData['gst_condition'],
            'hotel_tax_included'        => $formData['hotel_tax_included'],
            'hotel_tax_radio'           => $formData['hotel_tax_radio'],
            'hotel_tax_condition'       => $formData['hotel_tax_condition'],
            'city_dist_tax_included'    => $formData['city_dist_tax_included'],
            'regional_location_tax_radio' => $formData['regional_location_tax_radio'],
            'cdt_condition'             => $formData['cdt_condition'],
            'tourist_tax_included'      => $formData['tourist_tax_included'],
            'tourist_tax_radio'         => $formData['tourist_tax_radio'],
            'tourist_tax_condition'     => $formData['tourist_tax_condition'],
            'property_registration_no'  => $formData['property_registration_no'],
            'business_registration_no'  => $formData['business_registration_no'],
            'taxpayer_identification_no' => $formData['taxpayer_identification_no'],
        ];

        // Save to database
        $hotelPoliDb = new HotelPoliciesModel();

        try {
            $current = $hotelPoliDb->where('hotel_id', $hotelId)->first();

            if ($current) {
                // Update existing record
                if ($hotelPoliDb->update($current['id'], $insertableData)) {
                    return $this->response->setJSON([
                        'success' => true,
                        'msg'     => 'Policies updated successfully!',
                        'hotelId' => $hotelId,
                        'nextTab' => 'tab7' // Stay on tab7 after update
                    ]);
                } else {
                    return $this->response->setJSON([
                        'error' => true,
                        'type'  => 'database',
                        'msg'   => 'Failed to update policies!'
                    ]);
                }
            } else {
                // Insert new record
                if ($hotelPoliDb->insert($insertableData)) {
                    return $this->response->setJSON([
                        'success' => true,
                        'msg'     => 'Policies added successfully!',
                        'hotelId' => $hotelId,
                        'nextTab' => 'tab7' // Go to tab7 after insert
                    ]);
                } else {
                    return $this->response->setJSON([
                        'error' => true,
                        'type'  => 'database',
                        'msg'   => 'Failed to add policies!'
                    ]);
                }
            }
        } catch (\Exception $e) {
            return $this->response->setJSON([
                'error' => true,
                'type'  => 'exception',
                'msg'   => 'An error occurred: ' . $e->getMessage()
            ]);
        }
    }
}
