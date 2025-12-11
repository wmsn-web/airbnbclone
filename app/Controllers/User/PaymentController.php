<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\HotelModel;
use App\Models\RoomModel;
use App\Models\BookingModel;
use Dompdf\Dompdf;
use Stripe\StripeClient;
use Exception;

class PaymentController extends BaseController
{
    public function crateIntent()
    {
        try {
            $json = $this->request->getJSON(true);

            // Create payment intent 
            $stripe = new StripeClient(env('stripe.secret'));
            $paymentIntent = $stripe->paymentIntents->create([
                'amount' => (int)$json['price'],
                'currency' => 'usd',
                'automatic_payment_methods' => [
                    'enabled' => true,
                ],
                'metadata' => [
                    'user_id' => (int)$json['user_id'],
                    'email' => $json['email'],
                    'phone' => $json['phone'],
                    'adults' => $json['adults'],
                    'children' => $json['children'],
                    'infants' => $json['infants'],
                    'startDate' => $json['check_in'],
                    'endDate' => $json['check_out'],
                    'nights' => (int)$json['nights'],
                    'hotelId' => (int)$json['hotel_id'],
                    'roomId' => (int)$json['room_id'],
                    'price' => (int)$json['price'],
                ]
            ]);

            return $this->response->setJSON([
                'success' => true,
                'paymentIntent' => $paymentIntent,
                'postData' => $json
            ]);
        } catch (Exception $e) {
            return $this->response->setStatusCode(500)->setJSON([
                'error' => true,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function confirmPayment()
    {
        try {
            $data = $this->request->getPost();

            // Save booking in DB
            $bookingModel = new BookingModel();

            $data['check_in']  = date('Y-m-d', strtotime($data['check_in']));
            $data['check_out'] = date('Y-m-d', strtotime($data['check_out']));

            $insert = [
                'pnr_no'        => $bookingModel->generatePnr(),
                'user_id'       => session()->get('user_id') ?: null,
                'hotel_id'      => (int) $data['hotel_id'],
                'room_id'       => (int) $data['room_id'],
                'name'          => $data['name'],
                'email'         => $data['email'],
                'phone'         => $data['phone'],
                'check_in'      => $data['check_in'],
                'check_out'     => $data['check_out'],
                'adults'        => (int)$data['adults'],
                'children'      => (int)$data['children'],
                'infants'       => (int)$data['infants'],
                'amount'        => (int)$data['price'],
                'payment_status' => 'paid', // or set conditionally depending on Stripe PI status
                'payment_method' => 'stripe',
                'payment_id'    => $data['payment_intent_id'],
                'transaction_id' => $bookingModel->generateTransactionId(),
                'booking_status' => 'confirmed',
            ];
            $bookingId = $bookingModel->insert($insert);
            if (!$bookingId) {
                // Insert failed — return errors (Model->errors() may exist if validation fired)
                $errors = $bookingModel->errors();
                return $this->response->setStatusCode(500)->setJSON([
                    'error' => true,
                    'message' => 'Booking failed!',
                    'errors' => $errors
                ]);
            }
            $pnrNo = $bookingModel->where('id', $bookingId)->select('pnr_no')->first()['pnr_no'];
            $this->sendSuccessBookingEmail($insert['email'], $pnrNo);
            // Success — return JSON with id and redirect URL
            return $this->response->setJSON([
                'success' => true,
                'bookingId' => $pnrNo,
                'redirect' => base_url("booking-confirmation/{$pnrNo}")
            ]);
        } catch (\Exception $e) {
            return $this->response->setStatusCode(500)->setJSON([
                'error' => true,
                'message' => $e->getMessage()
            ]);
        }
    }
    private function sendSuccessBookingEmail($to, $pnr)
    {
        $email = service('email');
        // Load Mailtrap credentials from .env
        $config = [
            'protocol'   => 'smtp',
            'SMTPHost'   => env('email.SMTPHost'),
            'SMTPUser'   => env('email.SMTPUser'),
            'SMTPPass'   => env('email.SMTPPass'),
            'SMTPPort'   => (int) env('email.SMTPPort'),
            'SMTPCrypto' => env('email.SMTPCrypto'),
            'mailType'   => 'html',
            'charset'    => 'utf-8',
            'wordWrap'   => true,
            'fromEmail'  => env('email.fromEmail'),
            'fromName'   => env('email.fromName'),
        ];
        // Initialize with runtime config
        $email->initialize($config);
        // Compose and send
        $data = [
            'to'   => $to,
            'pnr'  => $pnr,
            'link' => base_url('download-invoice/'.$pnr)
        ];
        $messageView = view('fronts/email-templates/EmailSuccessBooking', $data);
        $email->setFrom($config['fromEmail'], $config['fromName']);
        $email->setTo($to);
        $email->setSubject('Successfull booking');
        $email->setMessage($messageView ?: "Your booing PNR is: <b>{$pnr}</b>");

        if (!$email->send()) {
            log_message('error', 'Mailtrap send failed: ' . print_r($email->printDebugger(['headers']), true));
        }
    }
    public function confirmation($pnrNo)
    {
        $bookingModel = new BookingModel();
        $hotelModel   = new HotelModel();
        $roomModel    = new RoomModel();

        // Get booking (single row)
        $booking = $bookingModel
            ->where('pnr_no', $pnrNo)
            ->first();

        if (!$booking) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Invalid PNR");
        }

        // Load hotel + room details
        $hotel = $hotelModel->find($booking['hotel_id']);
        $room  = $roomModel->find($booking['room_id']);

        $data = [
            'pageTitle' => 'Booking Invoice',
            'booking'   => $booking,
            'hotel'     => $hotel,
            'room'      => $room,
        ];

        return view('fronts/user/Booking-confirmation', $data);
    }

    public function invoicePDF($pnrNo)
    {
        $bookingModel = new BookingModel();
        $hotelModel   = new HotelModel();
        $roomModel    = new RoomModel();

        $booking = $bookingModel->where('pnr_no', $pnrNo)->first();
        if (!$booking) return redirect()->back();

        $hotel = $hotelModel->find($booking['hotel_id']);
        $room  = $roomModel->find($booking['room_id']);

        $data = [
            'booking' => $booking,
            'hotel'   => $hotel,
            'room'    => $room
        ];

        $dompdf = new Dompdf();

        $html = view('fronts/user/InvoicePDF', $data); // a pdf-specific view

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        return $dompdf->stream("Invoice-$pnrNo.pdf", ["Attachment" => true]);
    }
}
