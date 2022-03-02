<?php

namespace App\Http\Livewire\Admin\Redeem;

use Livewire\Component;
use App\Models\User\Couponcode;

class ListView extends Component
{
    public $search;
    public $showmodal;
    public $all_coupon;
    public $user_det;
    public function mount()
    {

        $this->all_coupon=Couponcode::select('users.name','users.email','user_couponcodes.name as coupon','user_couponcodes.offer_usage','user_couponcodes.offer_used','user_couponcodes.offer')->leftJoin('users','users.id','=','user_couponcodes.user_id')->where('user_id',"!=",1)->get();
    }
    public function render()
    {
        return view('livewire.admin.redeem.list-view');
    }
    public function searchcoupon()
    {
        $this->all_coupon=Couponcode::select('users.name','users.email','user_couponcodes.name as coupon',
        'user_couponcodes.offer_usage','user_couponcodes.offer_used','user_couponcodes.offer','user_couponcodes.status')->leftJoin('users','users.id','=','user_couponcodes.user_id')
        ->where('user_id',"!=",1)->where('user_couponcodes.name','LIKE', "%$this->search%")->get();
    }
    public function showuserdet($coupon)
    {

        $this->showmodal=true;
        $this->user_det=Couponcode::select('users.name','users.email','user_couponcodes.name as coupon',
        'user_couponcodes.offer_usage','user_couponcodes.offer_used','user_couponcodes.offer',
        'user_couponcodes.offer_used_details','user_couponcodes.offer_expiry_date','user_couponcodes.status','user_couponcodes.id')
        ->leftJoin('users','users.id','=','user_couponcodes.user_id')
        ->where('user_couponcodes.name',$coupon)->first();


    }
    public function updateCoupon($arr_coup,$id)
    {
        $detail=Couponcode::findOrFail($id);
        $update_coup=json_decode($detail->offer_used_details,true);
        $update_coup[$arr_coup]=true;

        $update_coup=json_encode($update_coup);
        $update_data=[];
        $update_data['offer_used_details']=$update_coup;
        if($arr_coup=="coupon3"){
            $update_data['status']="inactive";
        }
        $detail=$detail->update($update_data);
        $this->showmodal=false;
        $this->search=" ";
    }
}
