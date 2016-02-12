@extends('header')
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-12">
                <div class="col-md-4">
                    <form method="get" action="{{ URL::route('overview') }}">
                        <input type="text" name="username" class="form-control" placeholder="username">
                        <input type="password"  name="password" class="form-control" placeholder="password">
                        <input type="submit"  name="submit" class="btn btn-success" value="Log IN">
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
