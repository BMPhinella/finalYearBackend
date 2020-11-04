<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from themetrace.com/demo/chain/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 28 Mar 2020 04:30:31 GMT -->
@include('admin_layouts.styling')

    <body>
        
    @include('admin_layouts.top_navbar')
        
        <section>
            <div class="mainwrapper">
            @include('admin_layouts.sidebar')
                
                <div class="mainpanel">
                @include('admin_layouts.message')
                        <div class="panel-heading">
                            <h5 style="text-align: center" class="panel-title">{{request()->route()->getName()}}</h5>
                        </div><!-- panel-heading -->    
                    
                    <div class="contentpanel">
                        
                    <div class="row">
                        <div class="col-md-8 panel">

                            <!-- BASIC WIZARD -->
                           
                            <form method="get" action ="/create-visits"  >
                            
                                <div class= "form-group">
                                    <label class="col-sm-4 control-label">Patient ID:<span class="asterisk">*</span></label>
                                    <div class="form-group">
                                        <input type="text" name="patient_id" class="form-control" title="Field is required!" />
                                    </div>
                                </div><!-- form-group -->

                                <div class="form-group">
                                    <label>Visit Date:<span class="asterisk">*</span> </label>
                                        <div class="input-group">
                                            <input type="text" name="visit_date" class="form-control" placeholder="mm/dd/yyyy" id="datepicker">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                        </div><!-- input-group -->
                                </div><!-- form-group -->

                                <div class="form-group">
                                    <label>Visit Category:<span class="asterisk">*</span> </label>
                                    <div class="form-group">
                                        <select id="select-search-hide" name="visit_category" data-placeholder="Choose One" class="width300">
                                            <option value="Self Request">Self Request</option>
                                            <option value="Consultation">Consultation</option>
                                            <option value="Follow Up">Follow Up</option>
                                            <option value="Referral">Referral</option>
                                            <option value="Refill">Refill</option>
                                        </select>
                                    </div>
                                </div><!-- form-group -->

                                <div class="form-group">
                                    <label>Next Visit Date:<span class="asterisk">*</span> </label>
                                        <div class="input-group">
                                            <input type="text" name="next_visit" class="form-control" placeholder="mm/dd/yyyy" id="datepicker">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                        </div><!-- input-group -->
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

                        </div> 

                        </div><!-- tab-pane -->

                </div>
            </div>
                         
        

        </section>


        @include('admin_layouts.javascript')

        <script src="{{asset('js/custom.js')}}"></script>
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
    </body>


<!-- Mirrored from themetrace.com/demo/chain/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 28 Mar 2020 04:30:31 GMT -->
</html>













