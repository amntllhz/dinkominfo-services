<?php

namespace App\Http\Controllers;

use App\Models\ReqDetailVPS;
use App\Models\RequestSubmission;
use App\Models\Service;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    public function showForm($slug)
    {
        $service = Service::where('slug', $slug)->firstOrFail();

        // Logika untuk menentukan view yang sesuai berdasarkan slug
        $viewName = 'forms.' . $slug;

        // Periksa apakah view exists
        if (view()->exists($viewName)) {
            return view($viewName, compact('service'));
        }

        // Jika view tidak ditemukan, gunakan view default atau tampilkan error
        return view('forms.default', compact('service'));
    }

    public function handleFormSubmission(Request $request)
    {
        $validated = $request->validate([
            'applicant' => 'required|string|max:255',
            'instansi' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'cpu' => 'required|string|max:255',
            'ram' => 'required|string|max:255',
            'storage' => 'required|string|max:255',
            'purpose' => 'required|string|max:255',
            // 'about' => 'required|string',
            // 'file-upload' => 'required|file|mimes:docx,pdf|max:10240',
            // 'comments' => 'accepted', // Checkbox harus dicentang
        ]);

        // $service = Service::where('slug', $request->slug)->firstOrFail();

        $submission = new RequestSubmission();
        // $submissionDetail = new ReqDetailVPS();

        $submission->service_id = 1;
        $submission->applicant = $validated['applicant'];
        $submission->instansi = $validated['instansi'];
        $submission->email = $validated['email'];
        $submission->phone = $validated['phone'];

        $submission->save();

        $submission->reqDetailVPSs()->create([
            'request_submission_id' => $submission->id,
            'storage' => $validated['storage'],
            'cpu' => $validated['cpu'],
            'ram' => $validated['ram'],
            'purpose' => $validated['purpose'],
            'document' => null, // Atur default null
            'add_inform' => null,
        ]);

        $submission->save();

        return view('forms.success', compact('submission'));
        // return redirect()->route('front.index')->with('success', 'Permintaan layanan berhasil dikirim');
    }
}
