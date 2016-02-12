<?php
use app\model\Calculation;

class HomeController extends BaseController
{

    public function home()
    {
        //dd('test');
        $results = DB::select('SELECT * FROM `overview` ORDER BY `id` DESC LIMIT 5');
        return View::make('home')->with(array(
            'results' => $results
        ));
    }

    public function overview()
    {
        $submit = Input::get('submit');
        $user_id = Session::get('user_id');
        if ($submit == "Log IN") {
            $username = Input::get('username');
            $password = md5(Input::get('password'));
            $result_db = DB::table('users')->select('password', 'id')->where('username', $username)->first();
            $password_db = $result_db->password;
            $user_id_db = $result_db->id;
            if ($password == $password_db) {
                Session::put('user_id', $user_id_db);
                $results = DB::select('SELECT * FROM `overview`');
                return View::make('overview')->with(array(
                    'results' => $results
                ));
            } else {
                return View::make('login')->with(array());
            }
        } elseif ($user_id == 1) {
            $results = DB::select('SELECT * FROM `overview`');
            return View::make('overview')->with(array(
                'results' => $results
            ));
        } else {
            return View::make('login')->with(array());
        }
    }

    public function log_in()
    {
        $user_id = Session::get('user_id');
        if ($user_id != "") {
            $results = DB::select('SELECT * FROM `overview`');
            return View::make('overview')->with(array(
                'results' => $results
            ));
        } else {
            return View::make('login')->with(array());
        }
    }

    public function log_out()
    {
        Session::flush();
        $results = DB::select('SELECT * FROM `overview` ORDER BY `id` DESC LIMIT 5');
        return View::make('home')->with(array(
            'results' => $results
        ));
    }

    public function calculation()
    { //dd("test");
        if (Request::isMethod('post')) {
            $submit = Input::get('submit');
            if ($submit != "Generate ROI") {
                return URL::route('home');
            }
        }
        $objective = Input::get('objective');
        $order = Input::get('order');
        $rate = Input::get('rate');
        $url = Input::get('url');
        $email = Input::get('email');
        $news = Input::get('news');
        $marketing_percentage = 7.5;
        $direct_income = 20;
        $google_income = 25;
        $paid_income = 15;
        $add_words_income = 35;
        $unpaid_income = 5;
        $google_searches_amount = 0;
        $average_cpc = 1.1;
        $searchterms = array();
        for ($counter = 0; $counter < 5; $counter++) {
            $searchterms[$counter] = Input::get("searchterms_$counter");
        }

        DB::table('overview')->insert(
            array(
                'revenue_per_month' => $objective,
                'average_order' => $order,
                'conversion_rate' => $rate,
                'url' => $url,
                'email' => $email,
                'newsletter' => $news,
                'search_term_1' => $searchterms[0],
                'search_term_2' => $searchterms[1],
                'search_term_3' => $searchterms[2],
                'search_term_4' => $searchterms[3],
                'search_term_5' => $searchterms[4],
            )
        );
        foreach ($searchterms as $value) {
            if ($value != "") {
                $google_searches_amount = $google_searches_amount + 100;
            }
        }
        $marketing_amount = Calculation::marketing_amount($objective, $marketing_percentage);
        $required_amount = Calculation::required_amount($objective, $order);
        $n_visitors = Calculation::visitors($rate, $objective, $order);
        $paying_sites_together = Calculation::paying_sites_together($paid_income, $add_words_income);
        $add_words_visitors = Calculation::add_words_visitors($add_words_income, $rate, $objective, $order);
        $remaining_percentage = Calculation::remaining($direct_income, $google_income, $add_words_income, $paid_income, $unpaid_income);
        $bought_visitors = Calculation::bought_visitors($rate, $paid_income, $add_words_income, $objective, $order);
        $budget_per_visitor = Calculation::budget_per_visitor($objective, $marketing_percentage, $rate, $paid_income, $add_words_income, $order);
        return View::make('calculation')->with(array(
            'marketing_amount' => $marketing_amount,
            'objective' => $objective,
            'marketing_percentage' => $marketing_percentage,
            'avarage_order' => $order,
            'direct_income' => $direct_income,
            'required_amount' => $required_amount,
            'google_income' => $google_income,
            'conversion_rate' => $rate,
            'n_visitors' => $n_visitors,
            'paying_sites_together' => $paying_sites_together,
            'paid_income' => $paid_income,
            'unpaid_income' => $unpaid_income,
            'add_words_income' => $add_words_income,
            'add_words_visitors' => $add_words_visitors,
            'google_search_amount' => $google_searches_amount,
            'remaining_percentage' => $remaining_percentage,
            'bought_visitors' => $bought_visitors,
            'average_cpc' => $average_cpc,
            'budget_per_visitor' => $budget_per_visitor
        ));
    }
}
