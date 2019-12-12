<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Userinfos;
use App\Carinfos;
use App\Rentalhistorys;
use App\Blogs;
use Validator;
use \DateTime;

class customerController extends Controller
{
    public function index(){
        return view('customer.index');
    }

    public function customerProfile(Request $req){

        $userinfo=Userinfos::where('usermail',$req->session()->get('usermail'))->first();
        
        return view('customer.customerProfile')->with('users',$userinfo);

    }

    public function customerProfilePost(Request $req){

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

        return redirect('/customer/customerProfile');    

    }

    public function customerPrivateCar(Request $req){
        $carinfo=Carinfos::where('type','Private car')
                        ->where('status','available')
                        ->get();
        return view('customer.customerPrivateCar')->with('car',$carinfo);
    }

    public function customerPrivateCarPost(Request $req){
        $cartitle=$req->cartitle;
        $carcost=$req->carcost;

        $req->session()->put('selectedcar',$cartitle);
        return redirect('/customer/customerSelectCar');
    }

    public function customerMicro(Request $req){
        $carinfo=Carinfos::where('type','Microbus')
                        ->where('status','available')
                        ->get();
        return view('customer.customerMicro')->with('car',$carinfo);
    }

    public function customerMicroPost(Request $req){
        $cartitle=$req->cartitle;
        $carcost=$req->carcost;

        $req->session()->put('selectedcar',$cartitle);
        return redirect('/customer/customerSelectCar');
    }

    public function customerPickup(Request $req){
        $carinfo=Carinfos::where('type','Pick-up')
                        ->where('status','available')
                        ->get();
        return view('customer.customerPickup')->with('car',$carinfo);
    }

    public function customerPickupPost(Request $req){
        $cartitle=$req->cartitle;
        $carcost=$req->carcost;

        $req->session()->put('selectedcar',$cartitle);
        return redirect('/customer/customerSelectCar');
    }

    
    

    public function customerSelectCar(Request $req){
            $carinfo=Carinfos::where('cartitle',$req->session()->get('selectedcar'))
                                ->first();
            return view('customer.customerSelectCar')->with('result',$carinfo);

    }

    public function customerSelectCarPost(Request $req){
        $req->session()->put('rentday',$req->rentday);
        return redirect('/customer/customerRent');
    }


    public function customerRent(Request $req){
        $carinfo=Carinfos::where('cartitle',$req->session()->get('selectedcar'))
                            ->first();
        $cost=$carinfo->cost;
        $totalcost=$cost*$req->session()->get('rentday');

        $rentinfo=array($req->session()->get('rentday'),$totalcost,$carinfo);
        

        return view('customer.customerRent')->with('rentinfo',$rentinfo);
    }


    public function customerRentPost(Request $req){
        if($req->submit=="cancel"){
            return redirect('/customer');
        }
        else{
            $datefrom = new DateTime($req->datefrom);
            $dateto = new DateTime($req->dateto);

            $email=$req->session()->get('usermail');
            $cartitle=$req->cartitle;
            $rentday=$req->totaldays;
            $totalrent=$req->totalcost;
            $payment=$req->paymentoption;

            if($datefrom>$dateto){
                return redirect('/customer/customerRent');
            }
            else{
                $totaldays=$datefrom->diff($dateto);
                if($totaldays->d!=$rentday){
                    
                    return redirect('/customer');
                }
                else{
                    $userinfo=Userinfos::where('usermail',$email)
                                    ->where('password',$req->password)
                                    ->first();
                    if(!empty($userinfo)){

                        $rentalhistory=new Rentalhistorys();
                        $rentalhistory->usermail=$email;
                        $rentalhistory->cartitle=$cartitle;
                        $rentalhistory->datefrom=$datefrom;
                        $rentalhistory->dateto=$dateto;
                        $rentalhistory->rentday=$rentday;
                        $rentalhistory->totalrent=$totalrent;
                        $rentalhistory->payment=$payment;
                        $rentalhistory->status="pending";
                        if($rentalhistory->save()){
                            return redirect('/customer');
                        }
                        else{
                            
                            return redirect('/customer');
                        }
                        
                        
                        
                    }
                    else{
                        
                        return redirect('/customer');
                    }
                }

            }



        }
    }


    public function customerRentHistory(Request $req){
        $rentalhistory=RentalHistorys::where('usermail',$req->session()->get('usermail'))
                                    ->get();

        return view('customer.customerRentHistory')->with('result',$rentalhistory);
    }

    public function customerBlog(Request $req){
        $blog=Blogs::all();
        return view('customer.customerBlog')->with('result',$blog);
    }

    public function customerBlogDelete(Request $req,$v){
        Blogs::where('id',$v)
                ->where('usermail',$req->session()->get('usermail'))
                ->delete();
        return redirect('/customer/customerBlog');
    }


    public function customerAddBlog(Request $req){
        $blog=Blogs::where('usermail',$req->session()->get('usermail'))
                    ->get();
        return view('customer.customerAddBlog')->with('result',$blog);
    }

    public function customerAddBlogPost(Request $req){

        $email=$req->session()->get('usermail');
        $blog=$req->blog;

        $blogs=new Blogs();
        $blogs->usermail=$email;
        $blogs->blog=$blog;
        $blogs->save();
        return redirect('/customer/customerBlog');
        
    }



    



}
