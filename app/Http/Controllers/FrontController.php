<?php

namespace App\Http\Controllers;

use App\Models\Instansi;
use App\Models\RequestSubmission;
use App\Models\Service;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $services = Service::all();

        $questions = [
            "Apa itu Layanan Digital?",
            "Bagaimana cara mengajukan layanan?",
            "Apakah saya bisa mengecek status pengajuan?",
            "Apa saja layanan yang tersedia?"
        ];

        $answers = [
            "Layanan Digital adalah sistem yang memudahkan OPD dalam pengajuan clearance, server, perangkat, serta dukungan untuk optimalisasi kinerja dan efisiensi.",
            "Anda dapat mengajukan layanan melalui portal layanan kami yang tersedia 24 jam secara online.",
            "Ya, Anda dapat mengecek status pengajuan Anda melalui portal layanan kami.",
            "Layanan yang tersedia meliputi VPS, Hosting, Domain, dan Clearance untuk mendukung operasional OPD."
        ];

        return view('front.index', compact('services', 'questions', 'answers'));
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

    public function contributor()
    {

        $interns = [
            [
                'fullname' => 'John Doe',
                'name' => 'John',
                'role' => 'Frontend Developer',
                'major' => 'Informatika',
                'university' => 'Universitas A',
                'email' => 'a@gmail.com',
                'avatar' => 'avatar.png',
                'real' => 'real.jpg',
            ],
            [
                'fullname' => 'Jane Smith',
                'name' => 'Jane',
                'role' => 'Frontend Developer',
                'major' => 'Sistem Informasi',
                'university' => 'Universitas B',
                'email' => 'a@gmail.com',
                'avatar' => 'avatar.png',
                'real' => 'real.jpg',
            ],
            [
                'fullname' => 'Mike Johnson',
                'name' => 'Mike',
                'role' => 'Frontend Developer',
                'major' => 'Teknik Komputer',
                'university' => 'Universitas C',
                'email' => 'a@gmail.com',
                'avatar' => 'avatar.png',
                'real' => 'real.jpg',
            ],
            [
                'fullname' => 'John Doe',
                'name' => 'John',
                'role' => 'Backend Developer',
                'major' => 'Informatika',
                'university' => 'Universitas A',
                'email' => 'a@gmail.com',
                'avatar' => 'avatar.png',
                'real' => 'real.jpg',
            ],
            [
                'fullname' => 'Jane Smith',
                'name' => 'Jane',
                'role' => 'Frontend Developer',
                'major' => 'Sistem Informasi',
                'university' => 'Universitas B',
                'email' => 'a@gmail.com',
                'avatar' => 'avatar.png',
                'real' => 'real.jpg',
            ],
            [
                'fullname' => 'Mike Johnson',
                'name' => 'Mike',
                'role' => 'Frontend Developer',
                'major' => 'Teknik Komputer',
                'university' => 'Universitas C',
                'email' => 'a@gmail.com',
                'avatar' => 'avatar.png',
                'real' => 'real.jpg',
            ],
        ];

        // dd($interns);
        return view('front.contributor', compact('interns'));
    }
}
