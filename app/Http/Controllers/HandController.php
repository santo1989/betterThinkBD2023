<?php

namespace App\Http\Controllers;

use App\Models\Hand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HandController extends Controller
{
    protected function level_show(){
        $level_condition = DB::table('roles')
            ->where('id', Auth::user()->role_id)
            ->first();
            // dd($level_condition);
    if($level_condition->id == 1){
            return redirect()->route('home')->withMessage('You are not allowed to access this page');
            }else{

           
        $parent = DB::table('hands')
            ->where('parent_id', Auth::user()->id)
            ->first();
        $parent_details = DB::table('users')
            ->where('id', $parent->parent_id)
            ->first();
        $children = DB::table('hands')
            ->where('parent_id', Auth::user()->id)
            ->get()->toArray();
        $children_count = count($children);
        $child_details = array();

for($i=0; $i<$children_count; $i++){
    
    
    // result pushed to array ,
    // but i want to push the result to the array with the key of the child id
    // so i can use it in the view
    $child_details[$children[$i]->child_id] = DB::table('users')
        ->where('id', $children[$i]->child_id)
        ->first();

    // $child_details = DB::table('users')
    //     ->where('id', $children[$i]->child_id)
    //     ->first();

    // $child_details = array_push($child_details, $child_details);

    // if ($child_details->id == Auth::user()->id) {
    //     $child_details = DB::table('users')
    //         ->where('id', $children[$i]->parent_id)
    //         ->first();

    //  }
    // echo $child_details->name;
    // echo $child_details->point;
}
            // $child_details = DB::table('users')
            //     ->where('id', $children[$i]->child_id)
            //     ->first();
            // if ($child_details->id == Auth::user()->id) {
            //     $child_details = DB::table('users')
            //         ->where('id', $children[$i]->parent_id)
            //         ->first();
            // }
        //     echo $child_details->name;
        //     echo $child_details->point;
        // }

        return view('backend.User_Interface.levels.level_show', compact('parent','parent_details', 'children_count', 'child_details'));
        }
    }

    protected function admin_level_show(){
        $level_condition = DB::table('roles')
            ->where('id', Auth::user()->role_id)
            ->first();
        ;
        if ($level_condition->id == 1) {
            // $parent = Hand::get();
            // $total_parent = count($parent);
            // // dd($total_parent, $parent);
            // $parent_details = array();
            // $children = array();
            // for($i=1; $i<=$total_parent; $i++){
            //     $parent_details[$parent[$i]->parent_id] = DB::table('users')
            //         ->where('id', $parent[$i]->parent_id)
            //         ->first();
            // }
            // for($i=1; $i<count($parent); $i++){
            //     $children[$parent[$i]->parent_id] = DB::table('hands')
            //         ->where('child_id', $parent[$i]->parent_id)
            //         ->get()->toArray();
            // }
            
            $parent = DB::table('hands')
                ->where('parent_id', Auth::user()->id)
                ->first();
            $parent_details = DB::table('users')
                ->where('id', $parent->parent_id)
                ->first();
            $children = DB::table('hands')
                ->where('parent_id', Auth::user()->id)
                ->get()->toArray();
            $children_count = count($children);
            $child_details = array();

    for($i=0; $i<$children_count; $i++){

        $child_details[$children[$i]->child_id] = DB::table('users')
            ->where('id', $children[$i]->child_id)
            ->first();
    }
            return view('backend.Admin.levels.admin_level_show', compact('parent','parent_details', 'children_count', 'child_details'));

           
        } else { return redirect()->route('home')->withMessage('You are not allowed to access this page');}
        
    }
}
