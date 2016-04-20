@extends('layouts.submaster')
@section('title')
    Add Routine
@stop
@section('head')
    <script src="{{URL::to('/')}}/js/angular/angular.min.js"></script>
    <script src="{{URL::to('/')}}/js/angular/angular-animate.min.js"></script>
    <link href="{{URL::to('/')}}/css/angular/animatedbox.css" rel="stylesheet">


@stop

@section('body')
    <div class="row">
        <div class="col-sm-12">
 
                  <!-- page start-->
                      <section class="panel">
                              <header class="panel-heading">
                                  Draggable Calendar
                                  <span class="tools pull-right">
                                      <a href="javascript:;" class="fa fa-chevron-down"></a>
                                      <a href="javascript:;" class="fa fa-cog"></a>
                                      <a href="javascript:;" class="fa fa-times"></a>
                                   </span>
                              </header>
                              <div class="panel-body">
                                  <!-- page start-->
                                  <div class="row">
                                      <aside class="col-lg-9">
                                            <div id="calendar" class="has-toolbar"></div>
                                      </aside>
                                      <aside class="col-lg-3">
                                          <h4 class="drg-event-title"> Draggable Events</h4>
                                          <div id='external-events'>
                                              <div class='external-event label label-primary'>My Event 1</div>
                                              <div class='external-event label label-success'>My Event 2</div>
                                              <div class='external-event label label-info'>My Event 3</div>
                                              <div class='external-event label label-inverse'>My Event 4</div>
                                              <div class='external-event label label-warning'>My Event 5</div>
                                              <div class='external-event label label-danger'>My Event 6</div>
                                              <div class='external-event label label-default'>My Event 7</div>
                                              <div class='external-event label label-primary'>My Event 8</div>
                                              <div class='external-event label label-info'>My Event 9</div>
                                              <div class='external-event label label-success'>My Event 10</div>
                                              <p class="border-top drp-rmv">
                                                  <input type='checkbox' id='drop-remove' />
                                                  remove after drop
                                              </p>
                                          </div>
                                      </aside>
                                  </div>
                                  <!-- page end-->
                              </div>
                          </section>

        </div>

    </div>

    <!-- page end-->




@stop
