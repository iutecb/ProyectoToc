<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;
use Storage;
use Auth;

class FileController extends Controller
{
    public function index (Request $request){
    	if($request->user == 'all'){
    		$files = File::whereHas('user', function (Builder $query){
    			$query->where('status', 1);
    		})->get();
    	}else{
    		$files = File::where('user_id', Auth::id())->get();
    	}
    	return response()->json($files);
    }
    public function store (Request $request){
    	$rules = [
    		'name' => 'required|max:255',
    		'file' => 'required|file|mimes:pdf'
    	];
    	$request->validate($rules);
    	$file = new File;
    	$file->name = $request->name;
    	if($request->hasFile('file') and $request->file('file')->isValid())
        {
            $path = Storage::disk('public')->putFileAs(
                'files',
                $request->file('file'),
                str_replace(' ', '_', $request->name) . '.pdf',
                'public'
            );
            $file->file = $path;
        }
        $file->user_id = Auth::id();
    	$file->save();
    	return response()->json(['status' => 'success'], 200);
    }
    public function update ($id, Request $request){
    	dd($request->all(), $id);
    	$file = File::find($id);
    	$file->name = $request->name;
    	if($request->hasFile('file') and $request->file('file')->isValid())
        {
        	Storage::delete($file->file);
            $path = Storage::disk('public')->putFileAs(
                'files',
                $request->file('file'),
                str_replace(' ', '_', $request->name) . '.pdf',
                'public'
            );
            $file->file = $path;
        }
    	$file->save();

    	return response()->json(['status' => 'success'], 200);
    }
    public function destroy ($id){
    	$file = File::find($id);
    	Storage::delete($file->file);
    	$file->delete();
    }
}
