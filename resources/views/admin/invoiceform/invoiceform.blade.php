<div class="form-group ">
    <label for="class" class="col-sm-2 col-sm-offset-2 control-label-right">Class</label>
    <div class="col-lg-6">
        <select class="form-control input-sm m-bot15 invoiceclass"  id="classid" name="class" type="text">
            <option selected="selected">Select Class</option>
            @foreach($classview as $r=>$t)
                <option value="{{$t}}">{{$r}}</option>
            @endforeach
        </select>

    </div>
</div>
<div class="form-group">
    <label for="classesID" class="col-sm-2 col-sm-offset-2 control-label-right">
        Section </label><br>
    <div class="col-sm-6">
        <select  id="sectionid"  name="section" class="form-control invoicesection" >
            <option  selected="">First Choose Class</option>
        </select>
    </div>
</div>
<div class="form-group">
    <label for="classesID" class="col-sm-2 col-sm-offset-2 control-label-right">
        Student </label><br>
    <div class="col-sm-6">
        <select  id="studentid"  name="student" class="form-control invoicestudent" >
            <option  selected="">First Choose Class</option>
        </select>
    </div>
</div>
<div class="form-group">
    <label for="feetype" class="col-sm-2 col-sm-offset-2 control-label-right">
        Fee Type </label><br>
    <div class="col-sm-6">
        <select  id="feeid"  name="feetype" class="form-control fee" >
            <option selected="selected">Select Fee Type</option>
            @foreach($feetype as $r=>$t)
                <option value="{{$t}}">{{$r}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group ">
    <label for="amountid" class="col-sm-2 col-sm-offset-2 control-label-right">Total Amount</label>
    <div class="col-lg-6">
        <input class="form-control sub" id="amountid" name="amount" type="number" />
    </div>
</div>
<div class="form-group ">
    <label for="amountid" class="col-sm-2 col-sm-offset-2 control-label-right">Paid Amount</label>
    <div class="col-lg-6">
        <input class="form-control sub" id="paidamountid" name="paid" type="number" />
    </div>
</div>
<p id="answer">ok</p>
<div class="form-group ">
    <label for="date" class="col-sm-2 col-sm-offset-2 control-label-right">Date</label>
    <div class="col-lg-6">
        <input class="form-control form-control-inline input-medium default-date-picker" id="dateid" name="date" type="text" />
    </div>
</div>
<script>
    $(".sub").focusout(function() {
        $("#answer").html('');

        var num1 = $('input[name="amount"]').val();
        var num2 = $('input[name="paid"]').val();

        var answer =num1 - num2;
        //console.log(answer);
        $("#answer").html(answer);
    });
</script>