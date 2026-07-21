<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\BookingModel;
use App\Models\HotelModel;
use Dompdf\Dompdf;
use Stripe\StripeClient;

class PaymentController extends BaseController
{
    // =========================
    // CREATE INTENT
    // =========================
    public function createIntent()
    {
        $data = $this->request->getJSON(true);

        $stripe = new StripeClient(env('stripe.secret'));

        $intent = $stripe->paymentIntents->create([
            'amount'   => (int) ($data['grand_total'] * 100),
            'currency' => 'usd',
            'automatic_payment_methods' => ['enabled' => true],
            'metadata' => [
                'user_id'   => $data['user_id'] ?? null,
                'hotel_id'  => $data['hotel_id'],
                'name'      => $data['name'],
                'email'     => $data['email'],
                'phone'     => $data['phone'],
                'check_in'  => $data['check_in'],
                'check_out' => $data['check_out'],
                'adults'    => $data['adults'],
                'children'  => $data['children'],
                'infants'   => $data['infants'],
                'rooms'     => json_encode($data['rooms']),
                'amount'    => $data['grand_total'],
            ],
        ]);

        return $this->response->setJSON([
            'clientSecret' => $intent->client_secret,
            'paymentIntentId' => $intent->id,
        ]);
    }

    // =========================
    // FRONTEND CONFIRM
    // =========================
    public function confirmPayment()
    {
        return $this->response->setJSON([
            'success' => true
        ]);
    }

    // =========================
    // PROCESSING PAGE
    // =========================
    public function processing($paymentIntentId)
    {
        $booking = (new BookingModel())
            ->where('payment_id', $paymentIntentId)
            ->first();

        if ($booking) {
            return redirect()->to('booking-confirmation/' . $booking['pnr_no']);
        }

        return view('fronts/user/payment-processing', [
            'payment_intent_id' => $paymentIntentId
        ]);
    }

    // =========================
    // CONFIRMATION
    // =========================
    public function confirmation($pnr)
    {
        $booking = (new BookingModel())
            ->where('pnr_no', $pnr)
            ->first();

        if (!$booking) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('fronts/user/Booking-confirmation', [
            'booking' => $booking,
            'hotel'   => (new HotelModel())->find($booking['hotel_id']),
            'rooms'   => json_decode($booking['rooms'], true),
        ]);
    }

    // =========================
    // INVOICE PDF
    // =========================
    public function invoicePDF($pnr)
    {
        $booking = (new BookingModel())
            ->where('pnr_no', $pnr)
            ->first();

        if (!$booking) return redirect()->back();

        $dompdf = new Dompdf();

        $dompdf->loadHtml(view('fronts/user/InvoicePDF', [
            'booking' => $booking,
            'rooms'   => json_decode($booking['rooms'], true),
        ]));

        $dompdf->setPaper('A4');
        $dompdf->render();

        return $dompdf->stream("Invoice-$pnr.pdf");
    }
}
