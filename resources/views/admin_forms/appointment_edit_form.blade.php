@extends('admin_layouts.main')
@section('page_css')
@endsection
@section('main_content')
@include('admin_layouts.message')
<div class="panel-heading">
    <h5 style="text-align: center" class="panel-title">{{request()->route()->getName()}}</h5>
</div><!-- panel-heading --> 
<div class="row">
    <div class="col-md-12 panel">
    @foreach($edit_appointments as $edit_appointments) 
        <form method="get" action ="/change-appointments/{{$edit_appointments->id}}">
            <div class= "form-group">
                <label class="col-sm-4 control-label">Medical Practitioner ID:<span class="asterisk">*</span></label>
                <div class="form-group">
                    <input type="text" value="{{$edit_appointments->medical_practitioner_id}}" name="medical_practitioner_id" class="form-control" title="Field is required!" />
                </div>
            </div><!-- form-group -->
            <div class="form-group">
                <label>Appointment Date:<span class="asterisk">*</span> </label>
                <div class="input-group">
                    <input type="text" name="appointment_date" value="{{$edit_appointments->appointment_date}}" class="form-control" placeholder="mm/dd/yyyy" id="datepicker">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                </div><!-- input-group -->
            </div><!-- form-group -->
            <div class="form-group">
                <label>Appointment Time:<span class="asterisk">*</span></label>
                <div class="input-group mb15">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                    <div class="bootstrap-timepicker"><input name="appointment_time" value="{{$edit_appointments->appointment_time}}" id="timepicker" type="text" class="form-control"/></div>
                </div><!-- input-group -->
            </div><!-- form-group -->
            <div class="form-group">
                <label class="col-sm-4 control-label">status:<span class="asterisk">*</span></label>
                <div class=" col-sm-4">
                    <input type="radio" value="{{$edit_appointments->status}}" name="status" value="Confirmed" id="radioPrimary" />
                    <label>Confirmed</label>
                </div>
                <div class=" col-sm-4">
                    <input type="radio" value="{{$edit_appointments->status}}" name="status" value="Not Confirmed" id="radioPrimary" />
                    <label>Not Confirmed</label>
                </div>
            </div><!-- form-group -->
            <div class="panel-footer">
                <div class="row">
                    <div class="col-sm-9 col-sm-offset-3">
                        <button class="btn btn-primary mr5">Submit</button>
                        <button type="reset" class="btn btn-dark">Reset</button>
                    </div>
                </div>
            </div><!-- panel-footer -->         
        </form> 
    @endforeach
    </div> 
</div>
@endsection
@section('page_js')
<script src="{{asset('js/custom.js')}}"></script>
<script src="{{asset('js/jquery.autogrow-textarea.js')}}"></script>
        <script src="{{asset('js/jquery.mousewheel.js')}}"></script>
        <script src="{{asset('js/jquery.tagsinput.min.js')}}"></script>
        <script src="{{asset('js/toggles.min.js')}}"></script>
        <script src="{{asset('js/bootstrap-timepicker.min.js')}}"></script>
        <script src="{{asset('js/jquery.maskedinput.min.js')}}"></script>
        <script src="{{asset('js/select2.min.js')}}"></script>
        <script src="{{asset('js/colorpicker.js')}}"></script>
        <script src="{{asset('js/dropzone.min.js')}}"></script>

        <script src="js/custom.js"></script>

<script>
    jQuery(document).ready(function() {
        
        // Tags Input
        jQuery('#tags').tagsInput({width:'auto'});
            
        // Textarea Autogrow
        jQuery('#autoResizeTA').autogrow();
        
        
        // Time Picker
        jQuery('#timepicker').timepicker({defaultTIme: false});
        jQuery('#timepicker2').timepicker({showMeridian: false});
        jQuery('#timepicker3').timepicker({minuteStep: 15});
        
        // Date Picker
        jQuery('#datepicker').datepicker();
        jQuery('#datepicker-inline').datepicker();
        jQuery('#datepicker-multiple').datepicker({
            numberOfMonths: 3,
            showButtonPanel: true
        });
        
    });
</script>
@endsection