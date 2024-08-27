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

        $questions = [
            "Hai?",
            "Hai?",
            "Is there a Figma file available?",
            "What are the differences between Flowbite and Tailwind UI?"
        ];

        $answers = [
            "Flowbite is an open-source library of interactive components built on top of Tailwind CSS including buttons, dropdowns, modals, navbars, and more.",
            "Flowbite is an open-source library of interactive components built on top of Tailwind CSS including buttons, dropdowns, modals, navbars, and more.",
            "Flowbite is first conceptualized and designed using the Figma software so everything you see in the library has a design equivalent in our Figma file.",
            "The main difference is that the core components from Flowbite are open source under the MIT license, whereas Tailwind UI is a paid product."
        ];

        return view('front.index', compact('services', 'questions', 'answers'));
    }
    public function tes()
    {
        $services = Service::all();
        return view('front.tes', compact('services'));
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
