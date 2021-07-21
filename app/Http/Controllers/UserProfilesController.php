<?php

namespace App\Http\Controllers;

use App\Models\UserProfiles;
use Illuminate\Http\Request;

class UserProfilesController extends Controller
{
    public function index(){
        $data = UserProfiles::all();

        return view('userProfiles.index',compact('data'));
    }

    public function store(Request $request){

        $name = $request->inlineFormInput;
        $contains = array('Tahun','Thn','Th');
        $name = trim($name);
        $name_split = (strpos($name, ' ') === false) ? '' : preg_split('/(\D+)(\d+)/', $name, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);

        $input = array();
        $input['name'] = trim($name_split[0]);
        $input['age'] = (isset($name_split[2])) ? $name_split[1] : '';
        $input['city'] = trim(str_ireplace($contains, '', (isset($name_split[2])) ? $name_split[2] : ( isset($name_split[1]) ? $name_split[1] : '')));

        $profile = new UserProfiles();

        $profile->nama = $input['name'];
        $profile->usia = $input['age'];
        $profile->kota = $input['city'];

        $profile->save();

        return redirect('/user-profiles');
    }
}
