<?php
use app\model\Calculation;
class AjaxController extends BaseController{

    public function budget ()
    {
        $objective_amount = Input::get('objective_amount');
        $budget_percentage = Input::get('budget_percentage');
        $conversion_rate = Input::get('conversion_rate');
        $paid_income = Input::get('paid_income');
        $add_words_income = Input::get('addword_percentage');
        $avarage_order = Input::get('average_order');

        $budget_amount = Calculation::marketing_amount($objective_amount,$budget_percentage);
        $budget_cpc = Calculation::budget_per_visitor($objective_amount,$budget_percentage,$conversion_rate,$paid_income,$add_words_income,$avarage_order);

        $return = array("budget_cpc" => $budget_cpc, "budget_amount" => $budget_amount);

        return json_encode($return);
    }

    public function budget_amount (){
        $objective_amount = Input::get('objective_amount');
        $budget_amount = Input::get('budget_amount');
        $conversion_rate = Input::get('conversion_rate');
        $paid_percentage = Input::get('paid_income');
        $addword_percentage = Input::get('addword_percentage');
        $average_order = Input::get('average_order');

        $budget_percentage = Calculation::marketing_percentage($objective_amount,$budget_amount);
        $budget_cpc = Calculation::budget_per_visitor($objective_amount,$budget_percentage,$conversion_rate,$paid_percentage,$addword_percentage,$average_order);

        $return = array("budget_cpc" => $budget_cpc , "budget_percentage" => $budget_percentage);

        echo json_encode($return);
    }

    public function visitors_cloud (){
        $addWord_possibility = Input::get('addWord_possibility');
        $average_order = Input::get('average_order');
        $objective_amount = Input::get('objective_amount');
        $conversion_rate = Input::get('conversion_rate');
        $paid_percentage = Input::get('paid_percentage');
        $addword_percentage = Input::get('addword_percentage');

        $visitors = Calculation::visitors($conversion_rate,$objective_amount,$average_order);
        $bought_visitors = Calculation::bought_visitors($conversion_rate,$paid_percentage,$addword_percentage,$objective_amount,$average_order);
        $requested_order = Calculation::required_amount($objective_amount,$average_order);
        $add_word_visitors = Calculation::add_words_visitors($addword_percentage,$conversion_rate,$objective_amount,$average_order);
        $addWord_possibility_text = Calculation::addwords_possibility_text($addword_percentage,$addWord_possibility,$conversion_rate,$objective_amount,$average_order);

        $return = array("addWord_possibility_text" => $addWord_possibility_text ,"add_word_visitors" => $add_word_visitors ,"requested_order" => $requested_order , "bought_visitors" => $bought_visitors , "visitors" => $visitors);

        echo json_encode($return);
    }

    public function percentage(){

        $addWord_possibility = Input::get('addWord_possibility');
        $addword_percentage = Input::get('addword_percentage');
        $conversion_rate = Input::get('conversion_rate');
        $objective_amount = Input::get('objective_amount');
        $average_order = Input::get('average_order');
        $budget_percentage = Input::get('budget_percentage');
        $paid_percentage = Input::get('paid_percentage');
        $direct_percentage = Input::get('direct_percentage');
        $google_percentage = Input::get('google_percentage');
        $unpaid_percentage = Input::get('unpaid_percentage');

        $addWord_possibility_text = Calculation::addwords_possibility_text($addword_percentage,$addWord_possibility,$conversion_rate,$objective_amount,$average_order);
        $add_word_visitors = Calculation::add_words_visitors($addword_percentage,$conversion_rate,$objective_amount,$average_order);
        $budget_cpc = Calculation::budget_per_visitor($objective_amount,$budget_percentage,$conversion_rate,$paid_percentage,$addword_percentage,$average_order);
        $bought_visitors = Calculation::bought_visitors($conversion_rate,$paid_percentage,$addword_percentage,$objective_amount,$average_order);
        $remaining_percentage = Calculation::remaining($direct_percentage,$google_percentage,$addword_percentage,$paid_percentage,$unpaid_percentage);
        $together_paid_percentage = Calculation::paying_sites_together($paid_percentage,$addword_percentage);

        $return = array("addWord_possibility_text" => $addWord_possibility_text ,"add_word_visitors" => $add_word_visitors ,"budget_cpc" => $budget_cpc ,"bought_visitors" => $bought_visitors , "remaining_percentage" => $remaining_percentage , "together_text_percentage" => $together_paid_percentage);

        echo json_encode($return);
    }

}