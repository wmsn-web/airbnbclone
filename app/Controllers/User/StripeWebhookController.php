<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\BookingModel;
use Stripe\Webhook;

class StripeWebhookController extends BaseController
{
    public function handle()
    {
        $payload   = file_get_contents('php://input');
        $signature = $_SERVER['HTTP_STRIPE_SIGNATURE'] ?? '';
        $secret    = env('stripe.webhook_secret');

        try {
            $event = Webhook::constructEvent($payload, $signature, $secret);
        } catch (\Exception $e) {
            log_message('error', 'Stripe Webhook Error: ' . $e->getMessage());
            return $this->response->setStatusCode(400);
        }

        if ($event->type === 'payment_intent.succeeded') {
            $this->paymentSucceeded($event->data->object);
        }

        return $this->response->setStatusCode(200);
    }

    private function paymentSucceeded($intent)
    {
        $bookingModel = new BookingModel();

        // 🔒 Idempotency
        if ($bookingModel->where('payment_id', $intent->id)->first()) {
            return;
        }

        $meta  = $intent->metadata;
        $rooms = json_decode($meta->rooms, true);

        $pnr = $bookingModel->generatePnr();

        $bookingModel->insert([
            'pnr_no'         => $pnr,
            'user_id'        => $meta->user_id ?: null,
            'hotel_id'       => (int) $meta->hotel_id,
            'name'           => $meta->name,
            'email'          => $meta->email,
            'phone'          => $meta->phone,
            'check_in'       => $meta->check_in,
            'check_out'      => $meta->check_out,
            'adults'         => (int) $meta->adults,
            'children'       => (int) $meta->children,
            'infants'        => (int) $meta->infants,
            'rooms'          => json_encode($rooms),
            'amount'         => (float) $meta->amount,
            'payment_status' => 'paid',
            'payment_method' => 'stripe',
            'payment_id'     => $intent->id,
            'transaction_id' => $bookingModel->generateTransactionId(),
            'booking_status' => 'confirmed',
        ]);

        // 📧 Email (safe)
        try {
            $this->sendBookingEmail($meta->email, $pnr);
        } catch (\Throwable $e) {
            log_message('error', 'Email failed: ' . $e->getMessage());
        }
    }

    private function sendBookingEmail($to, $pnr)
    {
        $email = service('email');

        $email->setFrom(env('email.fromEmail'), env('email.fromName'));
        $email->setTo($to);
        $email->setSubject('Booking Confirmed');

        $email->setMessage(view('fronts/email-templates/EmailSuccessBooking', [
            'pnr'  => $pnr,
            'link' => base_url('booking-confirmation/' . $pnr),
        ]));

        $email->send();
    }
}
