<?php
namespace app\model;
Class Calculation {

  public static function paying_sites_together($paid_income,$addwords_income){
    $paying_sites_together = $paid_income+$addwords_income;
    return $paying_sites_together ;
  }

  public static function required_amount ($objective,$average_order){
    $required = round($objective/$average_order,0);
    return $required;
  }

  public static function remaining ($direct_income,$google_income,$addwords_income,$paid_income,$unpaid_income){
    $remaining = 100-$direct_income-$google_income-$addwords_income-$paid_income-$unpaid_income ;
    return $remaining;
  }

  public static function visitors ($conversion_rate,$objective,$averag_eorder){
    $required = self::required_amount($objective,$averag_eorder);
    $visitors = round ($required*100/$conversion_rate,0);
    return $visitors;
  }

  public static function bought_visitors ($conversion_rate,$paid_income,$addwords_income,$objective,$average_order){
    $visitors = self::visitors($conversion_rate,$objective,$average_order);
    $paying_sites_together = self::paying_sites_together($paid_income,$addwords_income);
    $bought_visitors = $visitors*$paying_sites_together/100;
    return $bought_visitors;
  }

  public static function add_words_visitors($addwords_income,$conversion_rate,$objective,$average_order){
    $visitors = self::visitors($conversion_rate,$objective,$average_order);
    $addwords_visitors = round($visitors*$addwords_income/100,0);
    return $addwords_visitors;
  }

  public static function marketing_amount($objective,$marketing_percentage){
    $marketing_amunt = $objective*$marketing_percentage/100;
    return $marketing_amunt;
  }

  public static function marketing_percentage($objective_amount,$budget_amount){
    $budget_percentage = round(100/($objective_amount/$budget_amount),1);
    return $budget_percentage;
  }

  public static function budget_per_visitor($objective,$marketing_percentage,$conversion_rate,$paid_income,$addwords_income,$average_order){
    $bought_visitors = self::bought_visitors($conversion_rate,$paid_income,$addwords_income,$objective,$average_order);
    $marketing_amount = self::marketing_amount($objective,$marketing_percentage);
    $budget_per_visitor = round($marketing_amount/$bought_visitors,2);
    return $budget_per_visitor;
  }

  public static function addwords_possibility_text ($addword_percentage,$addWord_possibility,$conversion_rate,$objective_amount,$average_order){
    $add_word_visitors = self::add_words_visitors($addword_percentage,$conversion_rate,$objective_amount,$average_order);
    $addWord_possibility = intval($addWord_possibility);
    if($add_word_visitors<$addWord_possibility){
      $addWord_possibility_text="It is possible!";
    }else{
      $addWord_possibility_text="It is NOT possible as Addwords will bring only ".$addWord_possibility." visitors";
    }
    return $addWord_possibility_text;
  }

}
 ?>
