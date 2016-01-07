@extends('header')
@section('body')
  <div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-12">
            <div class="div-logo-border">
                <img src="{{ URL::asset('images/euro_drawing.png') }}" class="img-rounded img-responsive center-block image-logo">
            </div>
        </div>
        <div class="col-xs-12 col-sm-8 col-md-6 col-md-offset-3">
            <form class="form-horizontal background-color" method="post" action="{{ URL::route('calculation') }}">
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-5 control-label">Required revenue per month</label>
                    <div class="col-sm-5">
                        <input type="number" name="objective" required class="form-control" id="inputEmail3" placeholder="&#8364;1000" step="100">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-5 control-label">Average Order Value</label>
                    <div class="col-sm-5">
                        <input type="number" required name="order" class="form-control" id="inputEmail3" placeholder="&#8364;10" step="1">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-5 control-label">Conversion rate</label>
                    <div class="col-sm-3">
                        <input type="number" required name="rate" class="form-control" id="conversionRate" placeholder="10%" min="1" max="100">
                    </div>
                    <div class="col-sm-offset-0 col-sm-3">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="option1" id="checkbox1" aria-label="...">I do not know
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-5 control-label">URL</label>
                    <div class="col-sm-5">
                        <input type="url" name="url" required class="form-control" id="inputEmail3" placeholder="URL">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-5 control-label">Email address</label>
                    <div class="col-sm-5">
                        <input type="email" name="email" required class="form-control" id="inputEmail3" placeholder="Email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class=" col-sm-5 control-label">Newsletter</label>
                    <div class="col-sm-offset-0 col-sm-7">
                        <div class="checkbox">
                            <label>
                                <input type="hidden" name="news" value="0" />
                                <input type="checkbox" name="news" id="blankCheckbox" value="1" aria-label="...">Yes, I want to subscribe to the newsletter
                            </label>
                        </div>
                    </div>
                </div>
  @for($counter=0;$counter<5;$counter++)
      @if($counter==0)
          <div class="form-group">
              <label for="inputPassword3" class="col-sm-5 control-label">Search terms</label>
              <div class="col-sm-5">
                  <input type="text" name="searchterms{{$counter}}" class="form-control" id="inputEmail3" placeholder="">
              </div>
          </div>
       @else
          <div class="form-group">
              <label for="inputPassword3" class="col-sm-5 control-label"></label>
              <div class="col-sm-5">
                  <input type="text" name="searchterms{{$counter}}" class="form-control" id="inputEmail3" placeholder="">
              </div>
          </div>
        @endif
      @endfor
      <div class="form-group">
          <div class="col-sm-2 col-lg-offset-5">
              <input class="btn btn-success" type="submit" value="Generate ROI" name="submit">
          </div>
      </div>
  </form>
</div>
<div class="col-xs-12 col-sm-8 col-md-6 col-md-offset-3">
  <div class="row">
      <div class="col-sm-3">
          <h2>Cases</h2>
      </div>
      <div class="col-sm-7 col-sm-offset-2">
          <a href="{{ URL::route('overview') }}" ><h2>Example calculations</h2></a>
      </div>
  </div>
    <form class="form-horizontal background-color background-image-right">
        <div class="form-group">
      @foreach($results as $result)
              <div class="row">
                  <div class="col-sm-5">
                      <input type="text" class="form-control" id="inputEmail3" value="{{$result->url}}" readonly>
                  </div>
                  <div class="col-sm-2">
                      <p>25%</p>
                  </div>
              </div>
      @endforeach
        </div>
    </form>
    </div>
</div>
</div>
@stop
