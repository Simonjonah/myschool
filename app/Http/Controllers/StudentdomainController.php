<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Studentdomain;
class StudentdomainController extends Controller
{
    public function createpsychomotorobyteacher(Request $request){
        // dd($request->all());
         $data = [];
         $cognames = $request->input('cogname');
         $psycomotos = $request->input('psycomoto');
         $teacher_ids = $request->input('teacher_id');
         $student_ids = $request->input('student_id');
         $ref_no1s = $request->input('ref_no1');
         $terms = $request->input('term');
         $punt1s = $request->input('punt1');
         $punt2s = $request->input('punt2');
         $punt3s = $request->input('punt3');
         $punt4s = $request->input('punt4');
         $punt5s = $request->input('punt5');
         
         
         
       
         for ($i = 0; $i < count($cognames); $i++) {
             $data[] = [
 
                 'cogname' => $cognames[$i],
                 'psycomoto' => $psycomotos[$i],
                 'teacher_id' => $teacher_ids[$i],
                 'student_id' => $student_ids[$i],
                 'term' => $terms[$i],
                 'ref_no1' => $ref_no1s[$i],
                 'punt1' => $punt1s[$i],
                 'punt2' => $punt2s[$i],
                 'punt3' => $punt3s[$i],
                 'punt4' => $punt4s[$i],
                 'punt5' => $punt5s[$i],
                 'ref_no' => substr(rand(0,time()),0, 9),
                 'connect' => substr(rand(0,time()),0, 9),
                 
             ];
         }
         Studentdomain::insert($data);
 
 
         return redirect()->back()->with('success', 'you have added successfully');
 
 
     }
}
