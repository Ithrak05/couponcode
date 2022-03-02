<?php

namespace App\Http\Livewire\Users\Couponcode;

use Livewire\Component;
use App\Models\User\Couponcode;
class ListView extends Component
{
    public $user_id;
    public $coupon_details;
    public function mount()
    {
        $this->user_id=\Auth::user()->id;
        $this->coupon_details=Couponcode::where('user_id',$this->user_id)->get();
    }
    public function render()
    {
        return view('livewire.users.couponcode.list-view');
    }
    public function genrate_code()
    {
        $couponcode_check=Couponcode::where('user_id',$this->user_id)->where('status','active')->first();
        if(collect($couponcode_check)->isEmpty()){
            $cou=[];
            for ($i=1; $i <=3 ; $i++) {
                # code...
                $cou['coupon'.$i]=false;
            }
            $cou=json_encode($cou);
            $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
            $off_code=substr(str_shuffle($str_result),0,10);
            $data=[];
            $data['user_id']=$this->user_id;
            $data['name']=$off_code;
            $data['offer']=50;
            $data['offer_usage']=3;
            $data['offer_usage_details']=$cou;
            $data['offer_used']=0;
            $coupon_create=Couponcode::create($data);
            if($coupon_create){

                $this->mount();
            }

        }else{
            dd('test1');
        }


    }
}
