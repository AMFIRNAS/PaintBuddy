@extends('pages.Artist.artMainTemp')

@section('ArtContent')
<<<<<<< HEAD


    {{--Main Required Libraries -- Curtesy :- http://fullcalendar.io/--}}
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
    {{--<div id="calendar">--}}
    {{--{!! $calendar->calendar() !!}--}}
    {{--{!! $calendar->script() !!}--}}
    {{--</div>--}}

    <br/>
    @if(Session::has('success'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Success!</strong> {{ Session::get('message', '') }}
        </div>
    @endif

    {{--<div class="container">--}}
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    {{--</div>--}}

    <div class="container">


        <!-- Modal -->
        {{--{!! Form::open(array('url'=>'aitem/add','method'=>'POST', 'files'=>true)) !!}--}}
        <div class="modal fade modal-info" id="asDateModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Assign Date</h4>
                    </div>
                    <div class="modal-body">
                        {!! Form::open(array( 'url' => '/asDDate','class' => 'form','novalidate' => 'novalidate','files' => true)) !!}
                        <div class="form-group">
                            <label for="ordID">Order ID</label>
                            <input type="text" class="form-control" id="ordID" name="ordID" readonly>
                        </div>

                        <div class="form-group">
                            <label for="ordDate">Ordered Date</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control" id="ordDate" name="ordDate" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="dDate">Due Date</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control" id="dDate" name="dDate" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="ddDate">Deadline</label>
                            {{--<input type="text" class="form-control" id="ddDate" disabled>--}}
                            {{--<input type="text" class="form-control" id="datepicker">--}}

                            {{--<label>Date masks:</label>--}}
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" id="ddMask" name="ddMask">
                            </div><!-- /.input group -->

                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-danger send-btn center-block" style="align-self: center">Assign Date</button>
                        </div>
                        {!! Form::close() !!}
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <div class="row">
        {{--<div class="col-md-12">--}}
        {{--<div class="container">--}}
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Deadline Calendar</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div id="calendar">
                            {!! $calendar->calendar() !!}
                            {!! $calendar->script() !!}
                        </div>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>


            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Deadline table</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div id="table" class="dTab">
                            <table  class="table table-condensed table-hover table-bordered" id="asDateTab">
                                <thead>
                                <tr>
                                    <th class="col-md-2 text-center">
                                        Order ID
                                    </th>
                                    <th class="col-md-2 text-center">
                                        Ordered Date
                                    </th>
                                    <th class="col-md-2 text-center">
                                        Due Date
                                    </th>
                                    <th class="col-md-2 text-center">
                                        Deadline
                                    </th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($order as $ord)
                                    <tr class = "info">
                                        <td class="col-md-2 text-center">
                                            {!! $ord['ordID'] !!}
                                        </td>
                                        <td class="col-md-2 text-center">
                                            {!! $ord['ordDate'] !!}
                                        </td>
                                        <td class="col-md-2 text-center">
                                            {!! $ord['DueDate'] !!}
                                        </td>
                                        <td class="col-md-2 text-center">
                                            {!! $ord['DLineDate'] !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->

                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Colour Definition</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <button type="button" class="btn btn-default col-sm-12" style="background-color: #00a65a; color: #d6d6d6; font-family:'sans-serif';">Completed</button></br>
                        <button type="button" class="btn btn-default col-sm-12" style="background-color: #f39c12; color: #d6d6d6; font-family:'sans-serif';">Passed delivery Date</button></br>
                        <button type="button" class="btn btn-default col-sm-12" style="background-color: #f56954; color: #d6d6d6; font-family:'sans-serif';">Close to due date</button></br>
                        <button type="button" class="btn btn-default col-sm-12" style="background-color: #00c0ef; color: #d6d6d6; font-family:'sans-serif';">Ongoing</button>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>


    {{--</div>--}}


@stop
=======
    <div class="row">
        <div class="col-md-12">
            <br/>
            @if(Session::has('success'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Success!</strong> {{ Session::get('message', '') }}
                </div>
            @endif

            {{--@if (!empty($success))--}}
            {{--{{ $success }}--}}
            {{--@endif--}}
            <div class="container">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            {{--<style>--}}
                {{--.center-table--}}
                {{--{--}}
                    {{--margin: 0 auto !important;--}}
                    {{--float: none !important;--}}
                {{--}--}}
            {{--</style>--}}
            
            {{--<script type='text/javascript'>--}}
                {{--$('tr').on('click',function(){--}}
                    {{--$("#myModal").modal('show');--}}
                    {{--alert("Hello! I am an alert box!");--}}
                {{--});--}}
            {{--</script>--}}
            {{--<a href='#' data-role='button' id="test">start</a>--}}
            {{--@if(Session::has('success'))--}}
                {{--<div class="alert alert-success">--}}
                    {{--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>--}}
                    {{--<strong>Success!</strong> {{ Session::get('message', '') }}--}}
                {{--</div>--}}
            {{--@endif--}}


            {{--<div class="container">--}}
                {{--@if (count($errors) > 0)--}}
                    {{--<div class="alert alert-danger">--}}
                        {{--<ul>--}}
                            {{--@foreach ($errors->all() as $error)--}}
                                {{--<li>{{ $error }}</li>--}}
                            {{--@endforeach--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                {{--@endif--}}
            {{--</div>--}}
            {{--<script>--}}
{{--//                $('table tbody tr  td').on('click',function(){--}}
{{--//                    $("#myModal").modal("show");--}}
{{--//                   //$("#txtfname").val($(this).closest('tr').children()[0].textContent);--}}
{{--//                    $("#txtfname").val($(this).closest('tr').children()[0].textContent);--}}
{{--//                    $("#txtlname").val($(this).closest('tr').children()[1].textContent);--}}
{{--//                });--}}
{{--$('table tbody tr  td').on('click',function(){--}}
    {{--alert('hello');--}}
    {{--$('#myModal').modal({--}}
        {{--keyboard: true,--}}
        {{--backdrop: "static",--}}
        {{--show:false,--}}

    {{--}).on('show', function(){--}}
        {{--var getIdFromRow = $(event.target).closest('tr').data('id');--}}
        {{--//make your ajax call populate items or what even you need--}}

        {{--$(this).find('#orderDetails').html($('<b> Order Id selected: ' + getIdFromRow  + '</b>'))--}}
    {{--});--}}
{{--});--}}
            {{--</script>--}}

            {{--<div class="modal fade" id="dDModal">--}}
                {{--<div class="modal-dialog">--}}
                    {{--<div class="modal-content">--}}
                        {{--<div class="modal-header">--}}
                            {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>--}}
                            {{--<h4 class="modal-title">EDIT</h4>--}}
                        {{--</div>--}}
                        {{--<div class="modal-body">--}}
                            {{--<p class="form-control-static"><input type="text" class="input-sm" id="orderID"/></p>--}}
                            {{--<p class="form-control-static"><input type="text" class="input-sm" id="orDate"/></p>--}}
                            {{--<p class="form-control-static"><input type="text" class="input-sm" id="duDate"/></p>--}}
                        {{--</div>--}}
                        {{--<div class="modal-footer">--}}
                            {{--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
                            {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
                        {{--</div>--}}
                    {{--</div><!-- /.modal-content -->--}}
                {{--</div><!-- /.modal-dialog -->--}}
            {{--</div><!-- /.modal -->--}}

            {{--<div class="container">--}}
                {{--<div id="dDModal" class="modal fade" role="dialog">--}}
                    {{--<div class="modal-header">--}}
                        {{--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>--}}
                        {{--<h3>Order</h3>--}}

                    {{--</div>--}}
                    {{--<div id="orderDetails" class="modal-body">testtt</div>--}}
                    {{--<div id="orderItems" class="modal-body"></div>--}}
                    {{--<div class="modal-footer">--}}
                        {{--<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}

                    {{--<!-- Modal -->--}}
            {{--<div class="modal fade" id="myModal">--}}
                {{--<div class="modal-dialog">--}}
                    {{--<div class="modal-content">--}}
                        {{--<div class="modal-header">--}}
                            {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>--}}
                            {{--<h4 class="modal-title">EDIT</h4>--}}
                        {{--</div>--}}
                        {{--<div class="modal-body">--}}
                            {{--<div id="orderDetails" class="modal-body"></div>--}}
                            {{--<div id="orderItems" class="modal-body"></div>--}}
                        {{--</div>--}}
                        {{--<div class="modal-footer">--}}
                            {{--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
                            {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
                        {{--</div>--}}
                    {{--</div><!-- /.modal-content -->--}}
                {{--</div><!-- /.modal-dialog -->--}}
            {{--</div><!-- /.modal -->--}}



            {{--<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">--}}
                {{--<div class="modal-dialog" role="document">--}}
                    {{--<div class="modal-content">--}}
                        {{--<div class="modal-header">--}}
                            {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>--}}
                            {{--<h4 class="modal-title" id="exampleModalLabel">New message</h4>--}}
                        {{--</div>--}}
                        {{--<div class="modal-body">--}}
                            {{--<form>--}}
                                {{--<div class="form-group">--}}
                                    {{--<label for="recipient-name" class="control-label">Recipient:</label>--}}
                                    {{--<input type="text" class="form-control" id="recipient-name">--}}
                                {{--</div>--}}
                                {{--<div class="form-group">--}}
                                    {{--<label for="message-text" class="control-label">Message:</label>--}}
                                    {{--<textarea class="form-control" id="message-text"></textarea>--}}
                                {{--</div>--}}
                            {{--</form>--}}
                        {{--</div>--}}
                        {{--<div class="modal-footer">--}}
                            {{--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
                            {{--<button type="button" class="btn btn-primary">Send message</button>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}



            <div class="container">


                <!-- Modal -->
                {{--{!! Form::open(array('url'=>'aitem/add','method'=>'POST', 'files'=>true)) !!}--}}
                <div class="modal fade" id="asDateModal" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Assign Date</h4>
                            </div>
                            <div class="modal-body">
                                {!! Form::open(array( 'url' => '/asDDate','class' => 'form','novalidate' => 'novalidate','files' => true)) !!}
                                <div class="form-group">
                                    <label for="ordID">Order ID</label>
                                    <input type="text" class="form-control" id="ordID" name="ordID" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="ordDate">Ordered Date</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                    <input type="text" class="form-control" id="ordDate" name="ordDate" disabled>
                                        </div>
                                </div>

                                <div class="form-group">
                                    <label for="dDate">Due Date</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                    <input type="text" class="form-control" id="dDate" name="dDate" disabled>
                                        </div>
                                </div>

                                <div class="form-group">
                                    <label for="ddDate">Deadline</label>
                                    {{--<input type="text" class="form-control" id="ddDate" disabled>--}}
                                    {{--<input type="text" class="form-control" id="datepicker">--}}

                                        {{--<label>Date masks:</label>--}}
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" id="ddMask" name="ddMask">
                                        </div><!-- /.input group -->

                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-info send-btn center-block" style="align-self: center">Assign Date</button>
                                </div>
                                {!! Form::close() !!}
                            </div>


                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <table  class="table table-condensed table-hover table-bordered" id="asDateTab">
                <thead>
                <tr>
                    <th class="col-md-2 text-center">
                        Order ID
                    </th>
                    <th class="col-md-2 text-center">
                        Ordered Date
                    </th>
                    <th class="col-md-2 text-center">
                        Due Date
                    </th>
                    <th class="col-md-2 text-center">
                        Deadline
                    </th>
                </tr>
                </thead>

                <tbody>
                @foreach($order as $ord)
                    <tr class = "info">
                        <td class="col-md-2 text-center">
                            {!! $ord['ordID'] !!}
                        </td>
                        <td class="col-md-2 text-center">
                            {!! $ord['ordDate'] !!}
                        </td>
                        <td class="col-md-2 text-center">
                            {!! $ord['DueDate'] !!}
                        </td>
                        <td class="col-md-2 text-center">
                            {!! $ord['DLineDate'] !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>



    @stop
>>>>>>> origin/master
