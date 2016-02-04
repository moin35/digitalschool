@extends('layouts.submaster')
@section('title')
 Add a user
@stop
@section('head')
@stop

@section('body')


    <div class="row">
               <div class="col-lg-12">
                       <section class="panel">
                           <header class="panel-heading">
                              User
                           </header>
                           <div class="panel-body">
                               <div class="position-center">

                                   <div role="form">
                                     {!!Form::open(['files'=>'true'])!!}
                                     	<div id="msj-success" class="alert alert-success alert-dismissible" role="alert" style="display:none">
                                         		<strong> successfully Add!!!</strong>
                                     		</div>

<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
                                @include('admin.addusere')
                                {!!link_to('#', $title='Registrar', $attributes = ['id'=>'registro', 'class'=>'btn btn-primary'], $secure = null)!!}

	                             {!!Form::close()!!}

                               </div>
                               </div>

                           </div>
                       </section>

               </div>
             </div>



@stop
