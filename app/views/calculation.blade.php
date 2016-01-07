@extends('header')
@section('body')
<div class="container background-color background-image-center">
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-12">
            <div class="div-logo-border">
                <img src="{{ URL::asset('images/euro_drawing.png') }}" class="img-rounded img-responsive center-block image-logo">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleInputEmail1">Objective</label>
                    <div class="input-group">
                        <div class="input-group-addon">&#8364;</div>
                        <input type="number" class="form-control" id="objectiveAmount" value="{{$objective}}" placeholder="">
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-lg-offset-3">
                <div class="form-group">
                    <label for="exampleInputEmail1">Marketing</label>
                    <div class="input-group">
                        <div class="input-group-addon">%</div>
                        <input type="text" class="form-control" id="budgetPercentage" value="{{$marketing_percentage}}" placeholder="">
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-lg-offset-0">
                <div class="form-group">
                    <label for="exampleInputEmail1">budget</label>
                    <div class="input-group">
                        <div class="input-group-addon">=</div>
                        <input type="text" class="form-control" id="budgetAmount1" value="{{$marketing_amount}}" placeholder="Amount">
                        <div class="input-group-addon">&#8364;</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="exampleInputEmail1">Avarage order</label>
                    <div class="input-group">
                        <div class="input-group-addon">&#8364;</div>
                        <input type="number" class="form-control" value="{{$avarage_order}}" id="averageOrder" placeholder="&#8364;">
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-lg-offset-4">
                <div class="form-group">
                    <label for="exampleInputEmail1">Directly</label>
                    <div class="input-group">
                        <div class="input-group-addon">%</div>
                        <input type="text" class="form-control" value="{{$direct_income}}" id="directlyPercentage" placeholder="%   ">
                    </div>
                </div>
            </div>
            <div class="row col-md-12">
                <label for="exampleInputEmail1">Required orders</label>
                <div class="row col-md-12">
                    <div class="col-md-2">
                        <div class="form-group">
                            <h2 id="requestedOrder">{{$required_amount}}</h2>
                        </div>
                    </div>
                    <div class="col-md-2 col-lg-offset-6">
                        <label for="exampleInputEmail1">Google</label>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">%</div>
                                <input type="text" class="form-control" value="{{$google_income}}" id="googlePercentage" placeholder="Remaining">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row col-md-12">
                <div class="row col-md-11 col-lg-offset-1">
                    <div class="form-group col-md-2">
                        <label for="exampleInputEmail1">Conversion rate</label>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">%</div>
                                <input type="text" value="{{$conversion_rate}}" class="form-control" id="conversionRate">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-offset-2">
                        <div class="form-group">
                            <h1 class="text-center"><span id="nOfVisitors" class="nOfVisitors">{{$n_visitors}}</span> Visitors</h1>
                        </div>
                    </div>
                    <div class="col-md-2 col-lg-offset-0">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Paid sites</label>
                            <div class="input-group">
                                <div class="input-group-addon">%</div>
                                <input type="text" value="{{$paid_income}}" class="form-control" id="paidPercentage" placeholder="%   ">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Unpaid</label>
                            <div class="input-group">
                                <div class="input-group-addon">%</div>
                                <input type="text" value="{{$unpaid_income}}" class="form-control" id="unpaidPercentage" placeholder="%   ">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 border-green">
                        <p class="lead">Addwords <span class="addwordTextPercentage">{{$add_words_income}}</span>% of <span class="nOfVisitors">{{$n_visitors}}</span> visitors is <span class="addWordVisitors">{{$add_words_visitors}}</span>. Addwords will bring <span id="addWordPossibility" >{{$google_search_amount}}</span> visitors.</p>
                        @if($add_words_visitors<=$google_search_amount)
                            <p class="lead color-green" id='addWordPossibilityText'>It is possible!</p>
                        @else
                            <p class="lead color-red" id='addWordPossibilityText'>It is NOT possible as Addwords will bring only {{$google_search_amount}} visitors</p>
                        @endif
                    </div>
                    <div class="col-md-2 col-lg-offset-5">
                        <label for="exampleInputEmail1">Addword</label>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">%</div>
                                <input type="text" value="{{$add_words_income}}" class="form-control addwordPercentage" id="addwordPercentage" placeholder="%   ">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-lg-offset-4">
                        <label for="exampleInputEmail1">Remaining</label>
                        <div class="form-group">
                            <div class="input-group border-green-1px" id="remainingPercentageDiv">
                                <div class="input-group-addon">%</div>
                                <input type="text" value="{{$remaining_percentage}}" class="form-control" disabled id="remainingPercentage" placeholder="%   ">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-offset-1 border-blue">
                        <p class="lead">Required CPC for <span class="boughtTextVisitors">{{$n_visitors}}</span> visitors is <br /> &#8364;<span id="budgetAmount2">{{$marketing_amount}}</span> / <span class="boughtTextVisitors">{{$bought_visitors}}</span> visitors</p>
                        <h2>&#8364;<span id="budgetCPC">{{$budget_per_visitor}}</span> budget per visitor</h2>
                        <p class="lead">Following words have average CPC of &#8364;<span id="avarageCPC">{{$average_cpc}}</span></p>
                        @if($budget_per_visitor>=$average_cpc)
                            <p class="lead color-green" id='sufficientBudget'>Your budget is sufficient!</p>
                        @else
                            <p class="lead color-red" id='sufficientBudget'>Your budget is insufficient!</p>
                        @endif
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <small>Adword <span class="addwordTextPercentage">{{$add_words_income}}</span>% + Paid sites <span id="paidTextPercentage">{{$paid_income}}</span>%</small>
                            <p class="lead"> Together <span id="togetherTextPercentage1">{{$paying_sites_together}}</span>%</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <small><span id="togetherTextPercentage2">{{$paying_sites_together}}</span>% of <span id="visitorsText">{{$n_visitors}}</span> vistors are</small>
                            <p class="lead"><span class="boughtTextVisitors" id="boughtTextVisitors">{{$bought_visitors}}</span> bought visitors</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
