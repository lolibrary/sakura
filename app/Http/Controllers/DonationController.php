<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class DonationController extends Controller
{
    /**
     * Redirect to PayPal.
     *
     * @return RedirectResponse
     */
    public function paypal()
    {
        return redirect(config('services.donation.paypal'));
    }

    /**
     * Redirect to Patreon.
     *
     * @return RedirectResponse
     */
    public function patreon()
    {
        return redirect(config('services.donation.patreon'));
    }

    /**
     * Get the base donation page.
     *
     * @return View
     */
    public function index()
    {
        return view('donations.donate');
    }

    /**
     * Add a view to say thanks to users for donations.
     *
     * @return View
     */
    public function thanks()
    {
        return view('donations.thanks');
    }
}
