@extends('admin_layouts.main')
@section('page_css')
@endsection
@section('main_content')
<div class="col-md-6">
    @include('admin_layouts.message')
        <h5 style="text-align: center" class="lg-title">{{(request()->route()->getName())}}</h5>
        <!-- BASIC WIZARD -->
        <div class="card">
            @foreach($edit_patient as $edit_patients)   
        <form method="get" action ="/change-patient/{{$edit_patients->id}}">
            @csrf
            <div class= "col-sm-4"  >
                <label class="col-sm-4 control-label">First Name:<span class="asterisk">*</span></label>
                <div class="form-group">
                    <input type="text" name="first_name" value="{{$edit_patients->first_name}}"  class="form-control" title="Field is required!" />
                </div>
            </div><!-- form-group -->

            <div class="col-sm-4">
                <label class="col-sm-4 control-label">Last Name:<span class="asterisk">*</span></label>
                <div class="form-group">
                    <input type="text" name="last_name" value="{{$edit_patients->last_name}}"  class="form-control" title="Field is required!"/>
                </div>
            </div><!-- form-group -->

            <div class="col-sm-4">
                <label class="col-sm-4 control-label">Other Names:</label>
                <div class="form-group">
                    <input type="text" name="other_name" value="{{$edit_patients->other_name}}"  class="form-control" />
                </div>
            </div><!-- form-group -->

            <div class="form-group">
                <label class="col-sm-4 control-label">Age:<span class="asterisk">*</span></label>
                <div class="col-sm-8">
                    <input type="text" name="age" value="{{$edit_patients->age}}"  class="form-control" title="Field is required!" required/>
                </div>
            </div><!-- form-group -->

            <div class="form-group">
                <label class="col-sm-4 control-label">Gender:<span class="asterisk">*</span></label>
                
                <div class=" col-sm-4">
                                    <input type="radio" value="{{$edit_patients->gender}}"  name="gender" value="Male" id="radioPrimary" />
                                    <label>Male</label>
                                </div>
                                    
                                <div class=" col-sm-4">
                                    <input type="radio" value="{{$edit_patients->gender}}"  name="gender" value="Female" id="radioPrimary" />
                                    <label>Female</label>
                                </div>
            </div><!-- form-group -->

            <div class="form-group">
                <label class="col-sm-4 control-label">Address:<span class="asterisk">*</span></label>
                <div class="col-sm-8">
                    <input type="text" name="address" value="{{$edit_patients->address}}"  class="form-control" title="Field is required!" required/>
                </div>
            </div><!-- form-group -->

            <div class="form-group">
                <label class="col-sm-4 control-label">Patient Contact:<span class="asterisk">*</span></label>
                <div class="col-sm-8">
                    <input type="text" value="{{$edit_patients->phone_number}}"  name="phone_number" class="form-control" title="Field is required!" required/>
                </div>
            </div><!-- form-group -->

            <div class="form-group">
                <label class="col-sm-4 control-label">Next of kin:<span class="asterisk">*</span></label>
                <div class="col-sm-8">
                    <input type="text" value="{{$edit_patients->kin}}"  name="kin" class="form-control" title="Field is required!" required/>
                </div>
            </div><!-- form-group -->

            <div class="form-group">
                <label class="col-sm-4 control-label">Next of kin Contact:<span class="asterisk">*</span></label>
                <div class="col-sm-8">
                    <input type="text" value="{{$edit_patients->kin_contact}}"  name="kin_contact" class="form-control" title="Field is required!" required/>
                </div>
            </div><!-- form-group -->
        
            <div class="panel-footer">
                <div class="row">
                    <div class="col-sm-9 col-sm-offset-3">
                        <button class="btn btn-primary mr5">Submit</button>
                        <button type="reset" class="btn btn-dark">Reset</button>
                        <a href="/get-patient"><button type="button" class="btn btn-dark">Back</button></a>
                    </div>
                </div>
            </div><!-- panel-footer -->         
        </form> 
        @endforeach
        </div>  
    </div>  
@endsection
@section('page_js')
@endsection