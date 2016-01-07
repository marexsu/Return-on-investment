<?php
use app\model\Calculation;
class AjaxController extends BaseController{

public function budget ($budget_percentage,$objective_amount,$conversion_rate,$paid_income,$add_words_income,$avarage_order)
{
    /*$objective_amount = Input::get('objective_amount');
    $budget_percentage = Input::get('budget_percentage');
    $conversion_rate = Input::get('conversion_rate');
    $paid_income = Input::get('paid_income');
    $add_words_income = Input::get('addword_percentage');
    $avarage_order = Input::get('average_order');*/
    $budget_amount = Calculation::marketing_amount($objective_amount,$budget_percentage);
    $budget_cpc = Calculation::budget_per_visitor($objective_amount,$budget_percentage,$conversion_rate,$paid_income,$add_words_income,$avarage_order);
    $return = array("budget_cpc" => $budget_cpc, "budget_amount" => $budget_amount);

    return json_encode($return);
}

}