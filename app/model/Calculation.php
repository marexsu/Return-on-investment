<?php
namespace app\model;
Class Calculation {

  public static function paying_sites_together($paidincome,$addwordsincome){
    $payingsitestogether = $paidincome+$addwordsincome;
    return $payingsitestogether ;
  }

  public static function required_amount ($objective,$avarageorder){
    $required = round($objective/$avarageorder,0);
    return $required;
  }

  public static function remaining ($directlyincome,$googleincome,$addwordsincome,$paidincome,$unpaidincome){
    $remaining = 100-$directlyincome-$googleincome-$addwordsincome-$paidincome-$unpaidincome ;
    return $remaining;
  }

  public static function visitors ($conversionrate,$objective,$avarageorder){
    $required = self::required_amount($objective,$avarageorder);
    $visitors=$required*100/$conversionrate;
    return $visitors;
  }

  public static function bought_visitors ($conversionrate,$paidincome,$addwordsincome,$objective,$avarageorder){
    $visitors = self::visitors($conversionrate,$objective,$avarageorder);
    $payingsitestogether = self::paying_sites_together($paidincome,$addwordsincome);
    $boughtvisitors = $visitors*$payingsitestogether/100;
    return $boughtvisitors;
  }

  public static function add_words_visitors($addwordsincome,$conversionrate,$objective,$avarageorder){
    $visitors = self::visitors($conversionrate,$objective,$avarageorder);
    $addwordsvisitors = round($visitors*$addwordsincome/100,0);
    return $addwordsvisitors;
  }

  public static function marketing_amount($objective,$marketingpercentage){
    $marketingamunt = $objective*$marketingpercentage/100;
    return $marketingamunt;
  }

  public static function budget_per_visitor($objective,$marketingpercentage,$conversionrate,$paidincome,$addwordsincome,$avarageorder){
    $bought_visitors = self::bought_visitors($conversionrate,$paidincome,$addwordsincome,$objective,$avarageorder);
    $marketing_amount = self::marketing_amount($objective,$marketingpercentage);
    $budget_per_visitor = round($marketing_amount/$bought_visitors,2);
    return $budget_per_visitor;
  }

}
 ?>
