<?php

namespace App\Http\Controllers;

use App\Models\Hand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HandController extends Controller
{
    protected function level_show()
    {
        $level_condition = DB::table('roles')
            ->where('id', Auth::user()->role_id)
            ->first();
        // dd($level_condition);
        if ($level_condition->id == 1) {
            return redirect()->route('home')->withMessage('You are not allowed to access this page');
        } else {


            $parent = DB::table('hands')
                ->where('parent_id', Auth::user()->id)
                ->first();
            if ($parent == null) {
                return redirect()->route('home')->withMessage('You dont have any child');
            }
            $parent_details = DB::table('users')
                ->where('id', $parent->parent_id)
                ->first();
            $children = DB::table('hands')
                ->where('parent_id', Auth::user()->id)
                ->get()->toArray();
            $children_count = count($children);
            $child_details = array();

            for ($i = 0; $i < $children_count; $i++) {

                $child_details[$children[$i]->child_id] = DB::table('users')
                    ->where('id', $children[$i]->child_id)
                    ->first();
            }


            return view('backend.User_Interface.levels.level_show', compact('parent', 'parent_details', 'children_count', 'child_details'));
        }
    }



    protected function user_child($id, Request $request)
    {
        $level_count = $request->level_count;
        $level_condition = DB::table('roles')
            ->where('id', Auth::user()->role_id)
            ->first();
        if ($level_condition->id == 2) {
            $parent = DB::table('hands')
                ->where('parent_id', $id)
                ->first();
            if ($parent == null) {
                return redirect()->route('home')->withMessage('You dont have any Refferal');
            } else {
                $parent_details = DB::table('users')
                    ->where('id', $parent->parent_id)
                    ->first();
                $children = DB::table('hands')
                    ->where('parent_id', $id)
                    ->get()->toArray();
                $children_count = count($children);
                $child_details = array();

                for ($i = 0; $i < $children_count; $i++) {

                    $child_details[$children[$i]->child_id] = DB::table('users')
                        ->where('id', $children[$i]->child_id)
                        ->first();
                }
            }
            $level_count = $level_count + 1;
            return view('backend.User_Interface.levels.level_show_child', [
                'parent' => $parent,
                'parent_details' => $parent_details,
                'children_count' => $children_count,
                'child_details' => $child_details,
                'level_count' => $level_count
            ]);
        } else {
            return redirect()->route('home')->withMessage('You are not allowed to access this page');
        }
    }

    protected function admin_level_show()
    {
        $level_condition = DB::table('roles')
            ->where('id', Auth::user()->role_id)
            ->first();;
        if ($level_condition->id == 1) {

            $parent = DB::table('hands')
                ->where('parent_id', Auth::user()->id)
                ->first();
            if ($parent == null) {
                return redirect()->route('home')->withMessage('You dont have any Refferal');
            } else {
                $parent_details = DB::table('users')
                    ->where('id', $parent->parent_id)
                    ->first();
                $children = DB::table('hands')
                    ->where('parent_id', Auth::user()->id)
                    ->get()->toArray();
                $children_count = count($children);
                $child_details = array();

                for ($i = 0; $i < $children_count; $i++) {

                    $child_details[$children[$i]->child_id] = DB::table('users')
                        ->where('id', $children[$i]->child_id)
                        ->first();
                }
            }
            return view('backend.Admin.levels.admin_level_show', compact('parent', 'parent_details', 'children_count', 'child_details'));
        } else {
            return redirect()->route('home')->withMessage('You are not allowed to access this page');
        }
    }

    protected function admin_user_child($id, Request $request)
    {
        // dd($request->level_count);
        $level_count = $request->level_count;
        $level_condition = DB::table('roles')
            ->where('id', Auth::user()->role_id)
            ->first();
        if ($level_condition->id == 1) {
            $parent = DB::table('hands')
                ->where('parent_id', $id)
                ->first();
            if ($parent == null) {
                return redirect()->route('home')->withMessage('You dont have any Refferal');
            } else {
                $parent_details = DB::table('users')
                    ->where('id', $parent->parent_id)
                    ->first();
                $children = DB::table('hands')
                    ->where('parent_id', $id)
                    ->get()->toArray();
                $children_count = count($children);
                $child_details = array();

                for ($i = 0; $i < $children_count; $i++) {

                    $child_details[$children[$i]->child_id] = DB::table('users')
                        ->where('id', $children[$i]->child_id)
                        ->first();
                }
            }
            $level_count = $level_count + 1;
            // dd($level_count);
            return view('backend.Admin.levels.admin_level_show_child', [
                'parent' => $parent,
                'parent_details' => $parent_details,
                'children_count' => $children_count,
                'child_details' => $child_details,
                'level_count' => $level_count

            ]);
        } else {
            return redirect()->route('home')->withMessage('You are not allowed to access this page');
        }
    }
}
