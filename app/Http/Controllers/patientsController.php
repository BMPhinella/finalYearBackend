<?php

namespace App\Http\Controllers;

use App\patients;
use App\visits;
use App\appointments;
use Illuminate\Http\Request;
use App\Http\Resources\patientsResource;

class patientsController extends Controller
{
    public function __construct(){
        $this->middleware('auth'); 
        $this->authenticated_instance = new AuthenticatedController; 
    }

    /**
     * This function gets the patients
     */
    public function getPatients(){
        $allpatients=patients::get();
        return $allpatients;
    }

    /**
     * this function takes to the blade that has the create patients form
     */
    protected function getCreatePatientsForm(){
        return view('admin_forms.patient_reg'); 
    }
    protected function getEditPatientsForm($id){
        $edit_patient = patients::where('id',$id)->get();
        return view('admin_forms.patient_edit_form', compact('edit_patient')); 
    }

    private function createPatients(){
        $patients                    = new patients;
        $patients->first_name        = request()->first_name;
        $patients->last_name         = request()->last_name;
        $patients->other_name        = request()->other_name;
        $patients->gender            = request()->gender;
        $patients->age               = request()->age;
        $patients->phone_number      = request()->phone_number;
        $patients->kin               = request()->kin;
        $patients->kin_contact      = request()->kin_contact;
        $patients->address           = request()->address;
        $patients->created_by        = $this->authenticated_instance->getAuthenticatedUser();
        $patients->save();  

        return redirect()->back()->with('message',"New patient has been created successfuly");
    }

    protected function validatePatient()
    {
        if(empty(request()->first_name)){
                return redirect()->back()->withErrors("Please enter your first name ");
            }elseif(empty(request()->last_name)){
                return redirect()->back()->withErrors("Please enter your last name");
            }elseif(empty(request()->gender)){
                return redirect()->back()->withErrors("Please enter your gender");
            }elseif(empty(request()->age)){
                return redirect()->back()->withErrors("Please enter your age");
            }elseif(empty(request()->address)){
                return redirect()->back()->withErrors("Please enter your address");
            }elseif(empty(request()->kin)){
                return redirect()->back()->withErrors("Please enter your kin");
            }elseif(empty(request()->kin_contact)){
                return redirect()->back()->withErrors("Please enter your kin contact");
            
            }elseif(empty(request()->phone_number)){
                return redirect()->back()->withErrors("Please enter your phone number");
            }else{    
                return $this->createPatients();
        }
    }
    protected function getPatient(){
        $patients= patientsResource::collection($this->getPatients());
        return view('admin_forms.get_patient',compact('patients'));
    }
    protected function changePatient($id){
        if(empty(request()->gender)){
            return redirect()->back()->withErrors("Please enter the gender to proceed")->withInput();
        }
        patients::find($id)->update(array(
            'first_name'     => request()->first_name,
            'last_name'      => request()->last_name,
            'gender'         => request()->gender,
            'age'            => request()->age,
            'phone_number'   => request()->phone_number,
            'kin'            => request()->kin,
            'kin_contact'    => request()->kin_contact,
            'address'        => request()->address,
            
        ));
        return redirect()->back()->with('message', "Your changes were made successfully");
    }
    protected function deletePatients($id){
        patients::find($id)->delete();
        return redirect()->back()->with('message', "Your changes were made successfully");
    }
}
