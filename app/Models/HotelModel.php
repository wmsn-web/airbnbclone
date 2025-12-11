<?php

namespace App\Models;

use CodeIgniter\Model;

class HotelModel extends Model
{
    protected $table            = 'hotels';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';

    protected $allowedFields = [
        'property_name',
        'property_name_slug',
        'description',
        'rating',
        'email',
        'phone',
        'chain_name',
        'thumbnail',
    ];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation rules (optional)
    protected $validationRules    = [];
    protected $validationMessages = [];

    protected $skipValidation     = false;

    public function getHotel($id)
    {
        if (! is_numeric($id) || $id <= 0) {
            return null;
        }

        $hotel = $this->find($id);
        return $hotel;
    }
    public function getHotelBySlug($slug)
    {
        $hotel = $this->select()->where('property_name_slug', $slug)->first();
        return $hotel;
    }

    public function getHotelFullListing($limit = null)
    {
        $results = $this->select('
            hotels.id, 
            hotels.property_name, 
            hotels.description, 
            hotels.email, 
            hotels.phone, 
            hotels.rating, 
            hotels.chain_name,
            hotels.thumbnail,
            hotel_locations.state,
            hotel_locations.country_or_region,
            hotel_amenities.amenities,
        ')->orderBy('hotels.rating', 'DESC')
            ->join('hotel_locations', 'hotel_locations.hotel_id = hotels.id', 'left')
            ->join('hotel_amenities', 'hotel_amenities.hotel_id = hotels.id', 'left')
            ->findAll($limit);

        foreach ($results as &$item) {
            if (!empty($item['amenities'])) {
                $item['amenities'] = json_decode($item['amenities'], true);
            }
        }

        return $results;
    }

    public function getSingleHotel($value)
    {
        $builder = $this->select('
        hotels.*,
        hotel_locations.street_name,
        hotel_locations.city,
        hotel_locations.state,
        hotel_locations.zip_code,
        hotel_locations.country_or_region,
        hotel_locations.latitude,
        hotel_locations.longitude,

        hotel_amenities.amenities,
        hotel_gallery.photos,
        
        hotel_finance.cash_payment, 
        hotel_finance.card_payment, 
        hotel_finance.online_payment, 
        
        hotel_policies.ci_type,
        hotel_policies.ci_start_time,
        hotel_policies.ci_end_time,
        hotel_policies.late_ci,
        hotel_policies.age_restriction,
        hotel_policies.deposit_at_ci,
        hotel_policies.doc_at_ci,
        hotel_policies.co_before,
        hotel_policies.flexible_co_status,
        hotel_policies.flexible_co_type,
        hotel_policies.flexible_co_condition,
        hotel_policies.refund_policy_type,
        hotel_policies.full_refund_allowed,
        hotel_policies.partial_refund_allowed,
        hotel_policies.pet_policy_type,
        hotel_policies.pet_restricted_zones,
        hotel_policies.pet_additional_charges,
        hotel_policies.age_segments,
        hotel_policies.child_doc_requirement,
        hotel_policies.vat_included,
        hotel_policies.gst_included,
        hotel_policies.hotel_tax_included,
        hotel_policies.city_dist_tax_included,
        hotel_policies.tourist_tax_included,
        hotel_policies.property_registration_no,
        hotel_policies.business_registration_no,
        hotel_policies.taxpayer_identification_no,

    ')
            ->join('hotel_locations', 'hotel_locations.hotel_id = hotels.id', 'left')
            ->join('hotel_finance', 'hotel_finance.hotel_id = hotels.id', 'left')
            ->join('hotel_policies', 'hotel_policies.hotel_id = hotels.id', 'left')
            ->join('hotel_amenities', 'hotel_amenities.hotel_id = hotels.id', 'left')
            ->join('hotel_gallery', 'hotel_gallery.hotel_id = hotels.id', 'left');

        // Auto-detect ID or slug
        if (is_numeric($value)) {
            $builder->where('hotels.id', $value);
        } else {
            $builder->where('hotels.property_name_slug', $value);
        }

        return $builder->first();
    }
    public function searchHotel($keyword)
    {
        return $this->like('property_name', $keyword)
            ->orWhere('id', $keyword)
            ->findAll(10);
    }

    // Get Hotels With Minimum Room Price
    public function homepageHotels($limit = null)
    {
        return $this->select("
            hotels.id,
            hotels.property_name,
            hotels.property_name_slug,
            hotel_locations.city,
            hotels.rating,
            MIN(rooms.price) AS starting_price,
            rooms.room_slug AS sample_room_slug
        ")
            ->join('rooms', 'rooms.hotel_id = hotels.id', 'left')
            ->join('hotel_locations', 'hotel_locations.hotel_id = hotels.id', 'left')
            ->groupBy('hotels.id')
            ->orderBy('starting_price', 'ASC')  // optional
            ->findAll($limit);
    }
    public function hotelsByLocation($limit = null)
    {
        // Step 1: fetch hotels with city + starting room price
        $results = $this->select("
            hotels.id,
            hotels.property_name,
            hotels.property_name_slug,
            hotels.description,
            hotels.thumbnail,
            hotel_locations.city,
            hotels.rating,
        ")
            ->join('hotel_locations', 'hotel_locations.hotel_id = hotels.id', 'left')
            ->join('rooms', 'rooms.hotel_id = hotels.id', 'left')
            ->groupBy('hotels.id')
            ->orderBy('hotel_locations.city', 'ASC')
            ->findAll($limit);

        // Step 2: group by city
        $grouped = [];
        $totalHotels = 0;

        foreach ($results as $row) {

            $city = $row['city'] ?? "Unknown";

            if (!isset($grouped[$city])) {
                $grouped[$city] = [
                    "city" => $city,
                    "hotels" => []
                ];
            }

            $grouped[$city]["hotels"][] = [
                "id" => $row["id"],
                "property_name" => $row["property_name"],
                "property_name_slug" => $row["property_name_slug"],
                'description' => $row["description"],
                "rating" => $row["rating"],
                'thumbnail' => $row["thumbnail"],
            ];

            $totalHotels++; // count each hotel
        }

        // Prepare final output
        return [
            "total_hotels" => $totalHotels,
            "total_cities" => count($grouped),
            "locations" => array_values($grouped)
        ];
    }
}
