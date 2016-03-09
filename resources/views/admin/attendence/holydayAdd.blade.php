@extends('layouts.submaster')
@section('title')
Academic Calendar
@stop
@section('head')
<style>
/*
    Text fields
*/
div.input-group-option:last-child span.input-group-addon-remove{
    display: none;
}

div.input-group-option:last-child input.form-control{
    border-bottom-right-radius: 3px;
	border-top-right-radius: 3px;
}

div.input-group-option span.input-group-addon-remove{
	cursor: pointer;
}

div.input-group-option{
    margin-bottom: 3px;
}

/*
    Selects
*/

div.input-group-multiple-select:last-child span.input-group-addon-remove{
	display: none;
}

div.input-group-multiple-select:last-child input.form-control{
	border-bottom-right-radius: 3px;
	border-top-right-radius: 3px;
}

div.input-group-multiple-select span.input-group-addon-remove{
	cursor: pointer;
    background: none;
    border: none;
}

div.input-group-multiple-select{
    margin-bottom: 5px;
}
</style>

@stop

@section('body')
<div class="row">
<div class="col-sm-12">
<section class="panel">
<header class="panel-heading">
Add Academic Calendar
<span class="tools pull-right">
<a href="javascript:;" class="fa fa-chevron-down"></a>
<a href="javascript:;" class="fa fa-cog"></a>
<a href="javascript:;" class="fa fa-times"></a>
</span>
</header>
<div class="panel-body">




  <form id="taskForm" method="post" class="form-horizontal">
      <div class="form-group">
          <label class="col-xs-1 control-label">Task(s)</label>
          <div class="col-xs-6">
              <input type="text" class="form-control" name="task[]" placeholder="Task" />
          </div>
          <div class="col-xs-4 dateContainer">
              <div class="input-group input-append date" id="dueDatePicker">
                  <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                  <input type="text" class="form-control" name="dueDate[]" placeholder="Due date" />
              </div>
          </div>
          <div class="col-xs-1">
              <button type="button" class="btn btn-default addButton"><i class="fa fa-plus"></i></button>
          </div>
      </div>

      <!-- The template for adding new field -->
      <div class="form-group hide" id="taskTemplate">
          <div class="col-xs-6 col-xs-offset-1">
              <input type="text" class="form-control" name="task[]" placeholder="Task" />
          </div>
          <div class="col-xs-4 dateContainer">
              <div class="input-group input-append date">
                  <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                  <input type="text" class="form-control" name="dueDate[]" placeholder="Due date" />
              </div>
          </div>
          <div class="col-xs-1">
              <button type="button" class="btn btn-default removeButton"><i class="fa fa-minus"></i></button>
          </div>
      </div>

      <div class="form-group">
          <div class="col-xs-5 col-xs-offset-1">
              <button type="submit" class="btn btn-default">Submit</button>
          </div>
      </div>
  </form>

  <h3>Selects</h3>

      <div class="form-group form-group-multiple-selects col-xs-11 col-sm-8 col-md-4">
      <div class="input-group input-group-multiple-select col-xs-12">
              <select class="form-control" name="values[]">
                  <option value="">Select one</option>
                  <option value="1">Option 1</option>
                  <option value="2">Option 2</option>
                  <option value="3">Option 3</option>
                  <option value="4">Option 4</option>
              </select>
        <span class="input-group-addon input-group-addon-remove">
          <span class="glyphicon glyphicon-remove"></span>
        </span>
      </div>
    </div>
</div>


</section>

</div>
</div>
<!-- page end-->




 <!-- jQuery v1.9.1 or higher -->

@stop
