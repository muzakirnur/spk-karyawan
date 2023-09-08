<?php

    namespace App\Http\Controllers;

use App\Models\Criteria;
use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Http;
    use App\Models\DataFeed;
use App\Models\Pelamar;
use App\Models\Pertanyaan;
use Carbon\Carbon;

    class DashboardController extends Controller
    {

        /**
         * Displays the dashboard screen
         *
         * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
         */
        public function index()
        {
            $dataFeed = new DataFeed();
            $pelamars = Pelamar::query()->count();
            $kriterias = Criteria::query()->count();
            $pertanyaans = Pertanyaan::query()->count();
            return view('pages/dashboard/dashboard', compact('dataFeed', 'pelamars', 'kriterias', 'pertanyaans'));
        }
    }
