<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\patientsDiseases;

class patientsDiseasesTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function createPatientsDiseases()
    {
        $this->withoutExceptionHandling();
        $response = $this->post('/create-patientsDiseases',[
            'patient_id'=>'P01',
            'disease_id'=>'D01',
            'updated_by'=>'Dr.Martha'
        ]);
        $this->assertDatabaseHas('patientsDiseases',['disease_id'=>'D01']);
       
    }
    /** @test */
    public function getPatientsDiseases(){
        $this->withoutExceptionHandling();
        $this->createPatientsDiseases();
        $response = $this->get('api/get-patientsDiseases');
        $response->assertStatus(200);
    }
    /** @test */
    public function changePatientsDiseases(){
        $this->withoutExceptionHandling();
        $this->createPatientsDiseases();
        $to_edit = patientsDiseases::first();
        $response = $this->patch('/change-patientsDiseases/'.$to_edit->id);
        $this->assertEquals('D01', patientsDiseases::first()->disease_id);
    }
    /** @test */
    public function removePatientsDiseases(){
        $this->withoutExceptionHandling();
        $this->createPatientsDiseases();
        $to_delete = patientsDiseases::first();
        $response=$this->delete('/delete-patientsDiseases/'.$to_delete->id);
        $this->assertCount(0,patientsDiseases::all());
    } 
}
