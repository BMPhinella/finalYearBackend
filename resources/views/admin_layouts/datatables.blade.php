
@if(request()->route()->getName() == 'Patients Details')
<div class="panel ">

@include('admin_layouts.message')
    <div class="panel-heading">
        <h4 style="text-align: center" class="panel-title">{{request()->route()->getName()}}</h4>
    </div><!-- panel-heading -->
    </br>
    <div class="info-box">
        <div class="table-responsive">
            <table id="example2" class="table table-bordered table-hover" data-name="cool-table">
                 
                <thead >
                    <tr>
                        <th>No</th>
                        <th>Name (s)</th>
                        <th>Age </th>
                        <th>Gender</th>
                        <th>Contact</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                </thead>
               
                <tbody>
                @foreach($patients as $id=>$patient) 
                    <tr>
                        <td>{{ $id +1}}</td>
                        <td>{{$patient->first_name}} {{$patient->last_name}} {{$patient->other_name}}</td>   
                        <td>{{$patient->age}}</td> 
                        <td>{{$patient->gender}}</td>
                        <td>{{$patient->phone_number}}</td>
                        <td>{{$patient->address}}</td>
                        <td>
                        <a href="/delete-patient/{{$patient->id}}">Delete </a>
                        <a href="/get-edit-patients-form/{{$patient->id}}">Edit</a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            </div> 
            </div> 
           
    </div> 
    @endif 





@if(request()->route()->getName() == 'Appointments Details')
<div class="panel panel-primary-head">
    <div class="panel-heading">
        <h4 style="text-align: center" class="panel-title">{{request()->route()->getName()}}</h4>
    </div><!-- panel-heading -->
            
            <table  class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Patient Number</th>
                        <th>Doctor Number</th>
                        <th>Appointment Date</th>
                        <th>Appointment Time</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                
                <tbody>
                @foreach($appointments as $id=>$appointments)
                    <tr>
                        <td>{{ $id +1}}</td>
                        <td>{{$appointments->patient_id}}</td>   
                        <td>{{$appointments->medical_practitioner_id}}</td>  
                        <td>{{$appointments->appointment_date}}</td>  
                        <td>{{$appointments->appointment_time}}<td>   
                        <td>{{$appointments->status}}</td> 
                        <td><a href="/delete-appointments/{{$appointments->id}}">Delete</a>
                        <a href="/get-edit-appointments-form/{{$appointments->id}}">Edit</a> </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
       
</div> 

@endif 




@if(request()->route()->getName() == 'Visits Details')
<div class="panel panel-primary-head">
    <div class="panel-heading">
        <h4 style="text-align: center" class="panel-title">{{request()->route()->getName()}}</h4>
    </div><!-- panel-heading -->

            
            <table id="shTable" class="table table-striped table-bordered">
                <thead class="">
                    <tr>
                        <th>No</th>    
                        <th>Patient Number</th>
                        <th>Visit Date</th>
                        <th>Visit Category</th>
                        <th>Next visit </th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                @foreach($visits as $id=>$visits)
                    <tr>
                        <td>{{ $id +1}}</td>
                        <td>{{$visits->patient_id}}</td>   
                        <td>{{$visits->visit_date}}</td>  
                        <td>{{$visits->visit_category}}<td>   
                        <td>{{$visits->next_visit}}</td> 
                        <td>
                        <a href="/delete-visits/{{$visits->id}}">Delete </a>
                        <a href="/get-edit-visits-form/{{$visits->id}}">Edit</a>
                        </td>
                    </tr>
                    @endforeach 
                </tbody>
            </table>
        
</div> 
    @endif 

    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('cdn.datatables.net/plug-ins/725b2a2115b/integration/bootstrap/3/dataTables.bootstrap.js')}}"></script>
        <script src="{{asset('cdn.datatables.net/responsive/1.0.1/js/dataTables.responsive.js')}}"></script>
        <script src="{{asset('js/select2.min.js')}}"></script>

        <script src="{{asset('js/custom.js')}}"></script>
        <script>
            jQuery(document).ready(function(){
                
                jQuery('#basicTable').DataTable({
                    responsive: true
                });
                
                var shTable = jQuery('#shTable').DataTable({
                    "fnDrawCallback": function(oSettings) {
                        jQuery('#shTable_paginate ul').addClass('pagination-active-dark');
                    },
                    responsive: true
                });
                
                // Show/Hide Columns Dropdown
                jQuery('#shCol').click(function(event){
                    event.stopPropagation();
                });
                
                jQuery('#shCol input').on('click', function() {

                    // Get the column API object
                    var column = shTable.column($(this).val());
 
                    // Toggle the visibility
                    if ($(this).is(':checked'))
                        column.visible(true);
                    else
                        column.visible(false);
                });
                
                var exRowTable = jQuery('#exRowTable').DataTable({
                    responsive: true,
                    "fnDrawCallback": function(oSettings) {
                        jQuery('#exRowTable_paginate ul').addClass('pagination-active-success');
                    },
                    "ajax": "ajax/objects.txt",
                    "columns": [
                        {
                            "class":          'details-control',
                            "orderable":      false,
                            "data":           null,
                            "defaultContent": ''
                        },
                        { "data": "name" },
                        { "data": "position" },
                        { "data": "office" },
                        { "data": "salary" }
                    ],
                    "order": [[1, 'asc']] 
                });
                
                // Add event listener for opening and closing details
                jQuery('#exRowTable tbody').on('click', 'td.details-control', function () {
                    var tr = $(this).closest('tr');
                    var row = exRowTable.row( tr );
             
                    if ( row.child.isShown() ) {
                        // This row is already open - close it
                        row.child.hide();
                        tr.removeClass('shown');
                    }
                    else {
                        // Open this row
                        row.child( format(row.data()) ).show();
                        tr.addClass('shown');
                    }
                });
               
                
                // DataTables Length to Select2
                jQuery('div.dataTables_length select').removeClass('form-control input-sm');
                jQuery('div.dataTables_length select').css({width: '60px'});
                jQuery('div.dataTables_length select').select2({
                    minimumResultsForSearch: -1
                });
    
            });
            
            function format (d) {
                // `d` is the original data object for the row
                return '<table class="table table-bordered nomargin">'+
                    '<tr>'+
                        '<td>Full name:</td>'+
                        '<td>'+d.name+'</td>'+
                    '</tr>'+
                    '<tr>'+
                        '<td>Extension number:</td>'+
                        '<td>'+d.extn+'</td>'+
                    '</tr>'+
                    '<tr>'+
                        '<td>Extra info:</td>'+
                        '<td>And any further details here (images etc)...</td>'+
                    '</tr>'+
                '</table>';
            }
        </script>


