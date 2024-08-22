<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestClearance;
use App\Http\Requests\RequestDomain;
use App\Http\Requests\RequestHosting;
use App\Http\Requests\RequestVPS;
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


    public function handleFormSubmissionVPS(RequestVPS $request)
    {
        $applicant = $request->applicant;
        $instansi = $request->instansi;
        $email = $request->email;
        $phone = $request->phone;
        $cpu = $request->cpu;
        $ram = $request->ram;
        $storage = $request->storage;
        $os = $request->os;
        $purpose = $request->purpose;
        $add_inform = $request->add_inform;
        $service_id = 1;

        $submission_id = null;

        DB::transaction(function () use ($request, $applicant, $instansi, $email, $phone, $cpu, $ram, $storage, $purpose, $os, $add_inform, $service_id, &$submission_id) {
            $validated = $request->validated();

            $validated['applicant'] = $applicant;
            $validated['instansi'] = $instansi;
            $validated['email'] = $email;
            $validated['phone'] = $phone;
            $validated['service_id'] = $service_id;

            $newRequestSubmission = RequestSubmission::create($validated);
            $submission_id = $newRequestSubmission->id;

            $validated['request_submission_id'] = $submission_id;
            $validated['cpu'] = $cpu;
            $validated['ram'] = $ram;
            $validated['storage'] = $storage;
            $validated['os'] = $os;
            $validated['purpose'] = $purpose;
            $validated['add_inform'] = $add_inform;
            if ($request->hasFile('document')) {
                $docPath = $request->file('document')->store('documents/vps', 'public');
                $validated['document'] = $docPath;
            }

            $newRequestSubmission->reqDetailVPSs()->create($validated);
        });
        return redirect()->route('forms.success', $submission_id);
    }

    public function handleFormSubmissionHosting(RequestHosting $request)
    {
        $applicant = $request->applicant;
        $instansi = $request->instansi;
        $email = $request->email;
        $phone = $request->phone;
        $cpu = $request->cpu;
        $ram = $request->ram;
        $storage = $request->storage;
        $purpose = $request->purpose;
        $add_inform = $request->add_inform;
        $service_id = 2;

        $submission_id = null;

        DB::transaction(function () use ($request, $applicant, $instansi, $email, $phone, $cpu, $ram, $storage, $purpose, $add_inform, $service_id, &$submission_id) {
            $validated = $request->validated();

            $validated['applicant'] = $applicant;
            $validated['instansi'] = $instansi;
            $validated['email'] = $email;
            $validated['phone'] = $phone;
            $validated['service_id'] = $service_id;

            $newRequestSubmission = RequestSubmission::create($validated);
            $submission_id = $newRequestSubmission->id;

            $validated['request_submission_id'] = $submission_id;
            $validated['cpu'] = $cpu;
            $validated['ram'] = $ram;
            $validated['storage'] = $storage;
            $validated['purpose'] = $purpose;
            $validated['add_inform'] = $add_inform;
            if ($request->hasFile('document')) {
                $docPath = $request->file('document')->store('documents/hosting', 'public');
                $validated['document'] = $docPath;
            }

            $newRequestSubmission->reqDetailHostings()->create($validated);
        });
        return redirect()->route('forms.success', $submission_id);
    }

    public function handleFormSubmissionDomain(RequestDomain $request)
    {
        $applicant = $request->applicant;
        $instansi = $request->instansi;
        $email = $request->email;
        $phone = $request->phone;
        $app_name = $request->app_name;
        $desc_name = $request->desc_name;
        $site = $request->site;
        $ip = $request->ip;
        $add_inform = $request->add_inform;
        $service_id = 3;

        $submission_id = null;

        DB::transaction(function () use ($request, $applicant, $instansi, $email, $phone, $app_name, $desc_name, $site, $ip, $add_inform, $service_id, &$submission_id) {
            $validated = $request->validated();

            $validated['applicant'] = $applicant;
            $validated['instansi'] = $instansi;
            $validated['email'] = $email;
            $validated['phone'] = $phone;
            $validated['service_id'] = $service_id;

            $newRequestSubmission = RequestSubmission::create($validated);
            $submission_id = $newRequestSubmission->id;

            $validated['request_submission_id'] = $submission_id;
            $validated['app_name'] = $app_name;
            $validated['desc_name'] = $desc_name;
            $validated['site'] = $site;
            $validated['ip'] = $ip;


            $validated['add_inform'] = $add_inform;
            if ($request->hasFile('document')) {
                $docPath = $request->file('document')->store('documents/domain', 'public');
                $validated['document'] = $docPath;
            }

            $newRequestSubmission->reqDetailDomains()->create($validated);
        });
        return redirect()->route('forms.success', $submission_id);
    }


    public function handleFormSubmissionClearance(RequestClearance $request)
    {
        $submission_id = null;

        DB::transaction(function () use ($request, &$submission_id) {
            $validated = $request->validated();

            $newRequestSubmission = RequestSubmission::create([
                'applicant' => $validated['applicant'],
                'instansi' => $validated['instansi'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'service_id' => 4, // Assuming 4 is the service_id for clearance
            ]);

            $submission_id = $newRequestSubmission->id;

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

            // dd($clearanceData);





            $newRequestSubmission->reqDetailClearances()->create($clearanceData);
        });



        return redirect()->route('forms.success', $submission_id);
    }

    public function success($submission_id)
    {
        $submission = RequestSubmission::findOrFail($submission_id);
        return view('forms.success', compact('submission'));
    }
}
