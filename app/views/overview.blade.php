@extends('header')
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped text-center">
                    <tr>
                        <td>#</td>
                        <td>ROI</td>
                        <td>Avarage order</td>
                        <td>Conversion rate</td>
                        <td>URL</td>
                        <td>Email address</td>
                        <td>Newsletter</td>
                        <td>Search term</td>
                        <td>Search term</td>
                        <td>Search term</td>
                        <td>Search term</td>
                        <td>Search term</td>
                    </tr>
                    @foreach($results as $result)
                        <tr>
                            <td>{{$result->id}}</td>
                            <td>{{$result->revenue_per_month}}</td>
                            <td>{{$result->average_order}}</td>
                            <td>{{$result->conversion_rate}}</td>
                            <td>{{$result->url}}</td>
                            <td>{{$result->email}}</td>
                            <td>{{$result->newsletter}}</td>
                            <td>{{$result->search_term_1}}</td>
                            <td>{{$result->search_term_2}}</td>
                            <td>{{$result->search_term_3}}</td>
                            <td>{{$result->search_term_4}}</td>
                            <td>{{$result->search_term_5}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-2"><a class="btn btn-default btn btn-primary" href="{{ URL::route('home') }}" role="button">Home</a></div>
    </div>
@stop