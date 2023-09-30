<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Studentdomain;
class StudentdomainController extends Controller
{
    public function createpsychomotorobyteacher(Request $request){
        dd($request->all());
         $data = [];
         $cognames = $request->input('cogname');
         $psycomotos = $request->input('psycomoto');
         $teacher_ids = $request->input('teacher_id');
         $student_ids = $request->input('student_id');
         $ref_no1s = $request->input('ref_no1');
         
         
       
         for ($i = 0; $i < count($cognames); $i++) {
             $data[] = [
 
                 'cogname' => $cognames[$i],
                 'psycomoto' => $psycomotos[$i],
                 'teacher_id' => $teacher_ids[$i],
                 'ref_no1' => $ref_no1s[$i],
                 'ref_no' => substr(rand(0,time()),0, 9),
                 'connect' => substr(rand(0,time()),0, 9),
                 
             ];
         }
         Studentdomain::insert($data);
 
 
         return redirect()->back()->with('success', 'you have added successfully');
 
 
     }
}
