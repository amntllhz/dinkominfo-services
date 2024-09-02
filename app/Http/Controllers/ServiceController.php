<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReqSubmission;
use App\Http\Requests\RequestClearance;
use App\Http\Requests\RequestDomain;
use App\Http\Requests\RequestHosting;
use App\Http\Requests\RequestReport;
use App\Http\Requests\RequestSubmission as RequestsRequestSubmission;
use App\Http\Requests\RequestVPS;
use App\Mail\SendEmail;
use App\Models\Instansi;
use App\Models\Report;
use App\Models\ReqDetailVPS;
use App\Models\RequestSubmission;
use App\Models\Service;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ServiceController extends Controller
{

    public function showForm($slug)
    {
        $service = Service::where('slug', $slug)->firstOrFail();
        $instansi = Instansi::all();

        // Logika untuk menentukan view yang sesuai berdasarkan slug
        $viewName = 'forms.' . $slug;

        // Periksa apakah view exists
        if (view()->exists($viewName)) {
            return view($viewName, compact('service', 'instansi'));
        }

        // Jika view tidak ditemukan, gunakan view default atau tampilkan error
        return view('forms.default', compact('service'));
    }

    public function viewForm($slug)
    {
        $service = Service::where('slug', $slug)->get();
        $instansi = Instansi::all();

        // Logika untuk menentukan view yang sesuai berdasarkan slug
        $viewName = 'forms.' . $slug;


        // Periksa apakah view exists
        if (view()->exists($viewName)) {
            return view('forms.form-services', compact('service', 'instansi'));
        }

        return view('forms.form-services', compact('service', 'instansi'));
    }

    public function submitForm(ReqSubmission $request)
    {
        $submission_id = null;

        $service_id = $request->service_id;

        $service = Service::where('id', $service_id)->firstOrFail();

        $slug = Service::where('id', $service_id)->firstOrFail()->slug;

        DB::transaction(function () use ($request, $service, $service_id, $slug, &$submission_id) {
            $validated = $request->validated();

            $newRequestSubmission = RequestSubmission::create([
                'applicant' => $validated['applicant'],
                'instansi_id' => $validated['instansi'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'service_id' => $service_id,
            ]);

            $submission_id = $newRequestSubmission->id;


            switch ($service->slug) {
                case str_contains($service->slug, 'domain'):
                    $domainData = [
                        'request_submission_id' => $submission_id,
                        'app_name' => $validated['app_name'],
                        'desc_name' => $validated['desc_name'],
                        'site' => $validated['site'],
                        'ip' => $validated['ip'],
                        'add_inform' => $validated['add_inform'],
                    ];

                    if ($request->hasFile('document')) {
                        $docPath = $request->file('document')->store('documents/domain', 'public');
                        $domainData['document'] = $docPath;
                    }

                    $newRequestSubmission->reqDetailDomains()->create($domainData);
                    break;

                case str_contains($service->slug, 'clearance'):
                    $clearanceData = [
                        'request_submission_id' => $submission_id,
                        'purpose' => $validated['purpose'],
                        'title_req' => $validated['title_req'],
                        'add_inform' => $validated['add_inform'],
                    ];

                    // Handle multiple file uploads
                    if ($request->hasFile('documents')) {
                        $documentPaths = [];
                        foreach ($request->file('documents') as $document) {
                            $path = $document->store('documents/clearance', 'public');
                            $documentPaths[] = $path;
                        }
                        // Store file paths as JSON array
                        $clearanceData['documents'] = $documentPaths;
                    }

                    $newRequestSubmission->reqDetailClearances()->create($clearanceData);
                    break;

                case str_contains($service->slug, 'vps'):
                    $vpsData = [
                        'request_submission_id' => $submission_id,
                        'cpu' => $validated['cpu'],
                        'ram' => $validated['ram'],
                        'storage' => $validated['storage'],
                        'os' => $validated['os'],
                        'purpose' => $validated['purpose'],
                        'add_inform' => $validated['add_inform'],
                    ];

                    if ($request->hasFile('document')) {
                        $docPath = $request->file('document')->store('documents/vps', 'public');
                        $vpsData['document'] = $docPath;
                    }

                    $newRequestSubmission->reqDetailVPSs()->create($vpsData);
                    break;

                case str_contains($service->slug, 'hosting'):
                    $hostingData = [
                        'request_submission_id' => $submission_id,
                        'cpu' => $validated['cpu'],
                        'ram' => $validated['ram'],
                        'storage' => $validated['storage'],
                        'purpose' => $validated['purpose'],
                        'add_inform' => $validated['add_inform'],
                    ];

                    if ($request->hasFile('document')) {
                        $docPath = $request->file('document')->store('documents/hosting' . $slug, 'public');
                        $hostingData['document'] = $docPath;
                    }

                    $newRequestSubmission->reqDetailHostings()->create($hostingData);
                    break;
                default:
                    $defaultData = [
                        'request_submission_id' => $submission_id,
                        'purpose' => $validated['purpose'],
                        'add_inform' => $validated['add_inform'],
                    ];

                    // Handle multiple file uploads
                    if ($request->hasFile('documents')) {
                        $documentPaths = [];
                        foreach ($request->file('documents') as $document) {
                            $path = $document->store('documents/other', 'public');
                            $documentPaths[] = $path;
                        }
                        // Store file paths as JSON array
                        $defaultData['documents'] = $documentPaths;
                    }

                    $newRequestSubmission->reqDetailOthers()->create($defaultData);
                    break;
            }
        });

        return redirect()->route('forms.success', $submission_id);
    }

    public function success($submission_id)
    {
        $submission = RequestSubmission::findOrFail($submission_id);

        Mail::to($submission->email)->send(new SendEmail(
            [
                'name' => $submission->applicant,
                'service' => $submission->service->name,
                'receipt' => $submission->receipt,
                'status' => $submission->status,
            ]
        ));
        return view('forms.success-service', compact('submission'));
    }
}
