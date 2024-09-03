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
                'fullname' => 'Dirchamsyah',
                'name' => 'Dirham',
                'role' => 'Fullstack Developer',
                'major' => 'Teknik Informatika',
                'university' => 'Universitas Dian Nuswantoro',
                'email' => 'dirchamsyah@gmail.com',
                'avatar' => 'dirham.png',
                'real' => 'dirham.jpg',
            ],
            [
                'fullname' => 'M Aldi Amanatullah S',
                'name' => 'Aldi',
                'role' => 'Front-End Developer',
                'major' => 'Teknik Informatika',
                'university' => 'Universitas Muhammadiyah Pekajangan Pekalongan',
                'email' => 'amanatullah1904@gmail.com',
                'avatar' => 'aldi.png',
                'real' => 'aldi.jpg',
            ],
            [
                'fullname' => 'Muhammad Khafid Al Amien',
                'name' => 'Amien',
                'role' => 'Front-End Developer',
                'major' => 'Teknik Informatika',
                'university' => 'Universitas Muhammadiyah Pekajangan Pekalongan',
                'email' => 'khafid.amien@gmail.com',
                'avatar' => 'amin.png',
                'real' => 'amin.jpg',
            ],
            [
                'fullname' => 'Azfi Yudan',
                'name' => 'Yudan',
                'role' => 'Graphic Designer',
                'major' => 'Desain Komunikasi Visual',
                'university' => 'Telkom University Purwokerto',
                'email' => 'judannotjudas@gmail.com',
                'avatar' => 'yudan.png',
                'real' => 'yudan.jpg',
            ],
            [
                'fullname' => 'Irfan Yoga Narotama',
                'name' => 'Irfan',
                'role' => 'Project Manager',
                'major' => 'Informatika',
                'university' => 'Universitas Muhammadiyah Pekajangan Pekalongan',
                'email' => 'irfanyoga189a@gmail.com',
                'avatar' => 'irfan.png',
                'real' => 'irfan.jpg',
            ],
            [
                'fullname' => 'Ahmad Rifqi Maulana',
                'name' => 'Maul',
                'role' => 'Project manager',
                'major' => 'Informatika',
                'university' => 'Universitas Muhammadiyah Pekajangan Pekalongan',
                'email' => 'rifqia393@gmail.com',
                'avatar' => 'maul.png',
                'real' => 'maul.jpg',
            ],
        ];

        // dd($interns);
        return view('front.contributor', compact('interns'));
    }

    public function guide()
    {
        return view('front.guide');
    }
}
