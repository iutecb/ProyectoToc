<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        return view('home', ['user' => $user->load('roles')]);
    }

    public function upload(Request $request)
    {
        $manager = new ImageManager();
        $user = Auth::user();
        $image = $request->image;  // your base64 mb_encode_mimeheader(str)
        $save_path = 'images/users/' . $user->name . '.png';
        if (!file_exists('images/users/')) {
            mkdir('images/users/', 666, true);
        }
        $manager->make($image)->save($save_path);
        $user->img = $save_path;
        $user->save();
        return json_encode($user);
    }

    public function changePassword(Request $request){
        $user = Auth::user();
        $condition = Hash::check($request->password, $user->password);
        if($condition){ 
            if($request->new_password == $request->confirm_password){
                $user->password = Hash::make($request->new_password);
                $user->save();
                return response()->json([
                    'status' => 'success',
                    'message' => 'Contraseña cambiada correctamente.',
                ]);
            }
        }else{
            return response()->json([
                'status' => 'error',
                'message' => 'Contraseña incorrecta',
            ]);
        }
    }

    public function admin(){
        $role = Auth::user()->roles[0]->slug;
        $users = User::paginate(3);
        if($role == 'admin'){
            return view('admin', ['users' => $users]);
        }else{
            $this->index();
        }
    }

    public function getUsers(){
        $users = User::paginate(3);
        return response()->json($users);
    }

    public function changeUserStatus(Request $request){
        $user = User::find($request->user);
        $user->status = !$user->status;
        $user->save();
        return response()->json(['status' => 'success']);
    }
}
