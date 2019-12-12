<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Userinfos;
use App\Carinfos;
use App\Rentalhistorys;
use App\Blogs;
use Validator;

class adminController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function adminProfile(Request $req){
        $userinfo=Userinfos::where('usermail',$req->session()->get('usermail'))
                    ->first();
        return view('admin.adminProfile')->with('users',$userinfo);
    }

    public function adminProfilePost(Request $req){

        
       $firstname=$req->firstname;
       $lastname=$req->lastname;
       $email=$req->email;
       $phoneno=$req->phoneno;
       $address=$req->address;
       $currentpassword=$req->password;
       $newpassword=$req->createpassword;
       $confirmpassword=$req->confirmpassword;


       $validation=Validator::make($req->all(),[
        'firstname'=>'required',
        'lastname'=>'required',
        'email'=>'required',
        'phoneno'=>'required',
        'address'=>'required',
        'password'=>'required'
        
        ]);
        if($validation->fails()){
            return back()
                    ->with('errors',$validation->errors())
                    ->withInput();
        }

        if(strlen($newpassword)>4){
            if($newpassword==$confirmpassword){

                $userinfo=Userinfos::where('usermail',$req->session()->get('usermail'))->first();
            $userinfo->firstname=$firstname;
            $userinfo->lastname=$lastname;
            $userinfo->phoneno=$phoneno;
            $userinfo->address=$address;
            $userinfo->password=$newpassword;
            $userinfo->save();

            }
        }
        else{

            $userinfo=Userinfos::where('usermail',$req->session()->get('usermail'))->first();
            $userinfo->firstname=$firstname;
            $userinfo->lastname=$lastname;
            $userinfo->phoneno=$phoneno;
            $userinfo->address=$address;
            $userinfo->save();
        }

        return redirect('/admin/adminProfile');    

    }

    public function adminCustInfo(Request $req){
        $userinfo=Userinfos::where('usertype','customer')
                        ->get();
        return view('admin.adminCustInfo')->with('users',$userinfo);
    }

    public function adminCustInfoPost(Request $req){
        $email=$req->email;
        if($req->submit=="permitted"){
            $userinfo=Userinfos::where('usermail',$email)
                        ->first();
                $userinfo->status="restricted";
                $userinfo->save();
                
            }
            else if($req->submit=="restricted"){
                $userinfo=Userinfos::where('usermail',$email)
                ->first();
                $userinfo->status="permitted";
                $userinfo->save();
        }
        else{
            Userinfos::where('usermail',$email)
                        ->first()
                        ->delete();
                
        }

        return redirect('/admin/adminCustInfo');
    }
    public function adminAddVehicle(Request $req){

        return view('admin.adminAddVehicle');

    }
    public function adminAddVehiclePost(Request $req){
        if($req->hasFile('file')){
            $file=$req->file('file');
            // $title=str_replace(".jpg", "",$file->getClientOriginalName());
            if($file->move('images/vehicles',$req->cartitle.'.jpg')) {
                echo "success";

                $validation=Validator::make($req->all(),[
                    'cartitle'=>'required',
                    'carcost'=>'required',
                    'vehicletype'=>'required',
                   
                    
                    ]);
                    if($validation->fails()){
                        return back()
                                ->with('errors',$validation->errors())
                                ->withInput();
                    }
                
                
                $carinfo=new Carinfos();
               
                $carinfo->cartitle=$req->cartitle;
                $carinfo->cost=$req->carcost;
                $carinfo->type=$req->vehicletype;
                $carinfo->picture=$req->cartitle;
                $carinfo->status="available";

                if($carinfo->save()){
                    
                   
                    return redirect()->route('admin.index');
                
                    
                }
                else{
                    
                    return redirect('/admin');
                }

            }
            else{
                echo "upload fail";
            }
        }
    }

    public function adminRentHistory(Request $req){
            $rentalhistory=Rentalhistorys::all();
            return view('admin.adminRentHistory')->with('result',$rentalhistory);
    }

    public function adminRentHistoryPost(Request $req){

        if($req->submit=="pending"){
            $rentalhistory=Rentalhistorys::where('usermail',$req->email)
                                        ->where('cartitle',$req->cartitle)
                                        ->first();
            $rentalhistory->status="successful";
            $rentalhistory->save();
        }
        else{
            $rentalhistory=Rentalhistorys::where('usermail',$req->email)
                                        ->where('cartitle',$req->cartitle)
                                        ->first();
            $rentalhistory->status="pending";
            $rentalhistory->save();
        }
        return redirect('/admin/adminRentHistory');
       
    }

    public function adminBlog(Request $req){
            $blog=Blogs::all();
            return view('admin.adminBlog')->with('result',$blog);
    }

    public function adminBlogPost(Request $req){
        $id=$req->id;
        Blogs::where('id',$id)
                ->first()
                ->delete();
        return redirect('/admin/adminBlog');
    }



}
