<div class="leftpanel">
                    <div class="media profile-left">
                        <a class="pull-left profile-thumb" href="profile.html">
                            <img class="img-circle" src="{{asset('index/images/medical-logo.jpg')}}"  alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">Welcome To <small>DR.JEBT</h4>
                            
                        </div>
                    </div><!-- media -->
                    
                    <h5 class="leftpanel-title">Navigation</h5>
                    <ul class="nav nav-pills nav-stacked">
                        <li class="" ><a href="/dashboard"><i class="fa fa-home"></i> <span>Dashboard</span></a>
                       
                        </li>
                        <li class="parent"><a href="#"><i class="fa fa-suitcase"></i> <span>Patients</span></a>
                            <ul class="children">
                                <li @if(request()->route()->getName()== 'Register Patient') class="active" @endif ><a href="/get-patients-create-form">New Patient</a></li>
                                <li @if(request()->route()->getName()== 'Patients Details') class="active" @endif><a href="/get-patient">Patients Records </a></li>
                            </ul>
                        </li>
                        <li class="parent"><a href="#"><i class="fa fa-edit"></i> <span>Visits</span></a>
                            <ul class="children">
                                <li @if(request()->route()->getName()== 'Register Visit') class="active" @endif ><a href="/get-create-visits-form">New Visit</a></li>
                                <li @if(request()->route()->getName()== 'Register Patient') class="active" @endif ><a href="/get-visits">Visits Records</a></li>
                            </ul>
                        </li>
                        <li class="parent"><a href="#"><i class="fa fa-bars"></i> <span>Appointments</span></a>
                            <ul class="children">
                                <li @if(request()->route()->getName()== 'Make Appointment') class="active" @endif><a href="/get-create-appointments-form">Make Appointment</a></li>
                                <li @if(request()->route()->getName()== 'Appointment Details') class="active" @endif><a href="/get-appointments">Appointment Records</a></li>
                            </ul>
                        </li>
                       
                        <li ><a href="/get-create-clinic-findings-form"><i class="fa fa-file-text"></i> <span>Clinical Findings</span></a>
                            
                        </li>
                       
                       
                        
                    </ul>
                    
                </div><!-- leftpanel -->