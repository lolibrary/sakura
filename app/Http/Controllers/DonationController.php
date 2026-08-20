<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class DonationController extends Controller
{
    /**
     * Redirect to PayPal.
     */
    public function paypal(): RedirectResponse
    {
        return redirect(config('services.donation.paypal'));
    }

    /**
     * Redirect to Patreon.
     */
    public function patreon(): RedirectResponse
    {
        return redirect(config('services.donation.patreon'));
    }

    /**
     * Get the base donation page.
     */
    public function index(): View
    {
        return view('donations.donate');
    }

    /**
     * Add a view to say thanks to users for donations.
     */
    public function thanks(): View
    {
        return view('donations.thanks');
    }
}
