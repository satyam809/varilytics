<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Http\Controllers\Controller;
use App\Models\Commodity;
use App\Models\Category;
use App\Models\MandiPrice;
use Illuminate\Support\Facades\DB;
use DateTime;

class DashboardsController extends Controller
{

    function staticDashboard()
    {
        //return 'test';
        return view('user.header') . view('user.static_dashboard') . view('user.footer');
    }
    public function getCategory($id)
    {
        $data = Commodity::join('categories', 'categories.id', 'commodities.category_id')
            ->select("categories.*", "commodities.*")
            ->where('categories.id', $id)
            ->get();
        return $data;
    }
    public function allCategory(Request $r)
    {
        $data = Category::all();
        return $data;
    }
    public function checkCustomerDetails($email)
    {
        return Customer::select('plan')->where('email', $email)->first();
    }
    function checkCustomerLogin()
    {
        return session()->get('login_email');
    }
    public function ownDashboard()
    {
        if ($this->checkCustomerLogin() != null) {
            $customerEmail = $this->checkCustomerLogin();
            $plan = $this->checkCustomerDetails($customerEmail);
            if ($plan['plan'] == 2 || $plan['plan'] == 3 || $plan['plan'] == 4) {
                return view('user.header') . view('user.own_dashboard') . view('user.footer');
            }
            return  redirect('subscription');
        } else {
            return redirect('login');
        }
    }
    public function createOwnDashboard(Request $r)
    {
        $commodity_id = $r->input('commodity_id');
        $startDate = (new DateTime())->modify('-5 years')->format('Y-m-d');
        $endDate = date('Y-m-d');

        $query = DB::table('mandiPrices')
            ->select(
                'commodities.name as commodity_name',
                DB::raw('YEAR(price_date) as year'),
                DB::raw('CAST(AVG(modal_price) AS UNSIGNED) as avg_price')
            )
            ->join('commodities', 'mandiPrices.commodity_id', '=', 'commodities.id')
            ->whereIn('mandiPrices.commodity_id', $commodity_id)
            ->whereBetween('price_date', [$startDate, $endDate])
            ->groupBy('commodities.name', 'year')
            ->orderBy('year', 'asc')
            ->get();

        $result = [];
        foreach ($query as $item) {
            $found = false;
            foreach ($result as &$entry) {
                if ($entry['commodity_name'] === $item->commodity_name) {
                    $entry['yearPrice'][] = [
                        'year' => $item->year,
                        'avg_price' => $item->avg_price
                    ];
                    $found = true;
                    break;
                }
            }
            if (!$found) {
                $result[] = [
                    'commodity_name' => $item->commodity_name,
                    'yearPrice' => [
                        [
                            'year' => $item->year,
                            'avg_price' => $item->avg_price
                        ]
                    ]
                ];
            }
        }

        $response = ['data' => $result];
        return $response;
    }
}
