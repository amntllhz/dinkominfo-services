<?php

namespace App\Http\Controllers;

use App\Models\RequestSubmission;
use App\Models\Service;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('front.index', compact('services'));
    }

    public function services()
    {
        $services = Service::all();
        return view('front.services', compact('services'));
    }

    public function cekStatus()
    {
        return view('front.status');
    }

    public function cekStatus_details(Request $request)
    {
        $request->validate([
            'receipt' => ['required', 'string', 'max:255'],
        ]);

        $receipt = $request->receipt;

        $details = RequestSubmission::with('service')
            ->where('receipt', $receipt)
            ->first();

        if (!$details) {
            return view('front.status_details', ['details' => null, 'receipt' => $receipt]);
        }
        return view('front.status_details', compact('details'));
    }
}
