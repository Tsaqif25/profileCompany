<?php

namespace App\Http\Controllers;

use App\Models\OurTeam;
use App\Models\Product;
use App\Models\Appointment;
use App\Models\Testimonial;
use App\Models\CompanyAbout;
use App\Models\OurPrinciple;
use Illuminate\Http\Request;
use App\Models\CompanyStatistic;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\StoreAppointmentRequest;

class FrontController extends Controller
{
    public function index() {
        $statistics = CompanyStatistic::take(4)->get();
        $principles = OurPrinciple::take(4)->get();
        $product = Product::take(4)->get();
        $team = OurTeam::take(7)->get();
        $testimonial = Testimonial::take(4)->get();
        return view('front.index',compact('statistics','principles','product','team','testimonial'));
    }

    public function team() {
        $teams = OurTeam::take(7)->get();
        $statistics = CompanyStatistic::take(4)->get();
        return view('front.team',compact('teams','statistics')); 
    }

    public function about() {
        $statistics = CompanyStatistic::take(4)->get();
        $about  = CompanyAbout::take(4)->get();
        return view('front.about',compact('statistics','about'));

    }

    public function appointement() {
        $testimonials = Testimonial::take(4)->get();
        $products = Product::take(3)->get();
        return view('front.appointement',compact('testimonials','products'));
    }
    public function appointement_store(StoreAppointmentRequest $request) {
        DB::transaction(function() use($request){
            $validated = $request->validated();
            Log::info('Data yang tervalidasi: ', $validated);
            $newAppointment = Appointment::create($validated);
        });
    
        // Set session flash message
        return redirect()->route('front.index')->with('success', 'Appointment berhasil dibuat.');
    }
    
}
