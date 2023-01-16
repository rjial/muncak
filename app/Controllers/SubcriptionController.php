<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class SubcriptionController extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $table = $db->table("subscription");
        $data = $table->get()->getResultObject();

        return view("subscription/index", ['subs' => $data]);
    }
    public function item($id) {
        helper(['auth']);
        $db = \Config\Database::connect();
        $table = $db->table("subscription");
        $subs = $table->where('id_subs', $id);
        if($subs->countAll()) {
            $table_user = $db->table("users");
            $user = $table_user->where("id_users", getAuth()->id);
            $user->update(['id_subs' => $id]);
            // return redirect("dashboard");
            if($user = $table->where('id_subs', $id)->countAll() > 1){
                return view("paymentsubs/snap");
            }
        } else {
            return redirect("dashboard");
        }
    }
    public function payment($id) {
        \Midtrans\Config::$serverKey = "SB-Mid-server-KTnpvcIdaLvQZ5RP15t8KF5j";
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;

        $db = \Config\Database::connect(); 
        $builder = $db->table('mid_subs');
        $builder->select('mid_subs.*');
        $builder->join('subscription', 'midsubs.id_booking = booking.id_booking');

        // $builder->join('jalur', 'booking.id_jalur = jalur.id_jalur');
        // $builder->join('gunung', 'gunung.id_gunung = jalur.id_gunung');
        // $builder->join('tim', 'tim.id_tim = booking.id_tim');
        // $builder->join('pemimpin_tim', 'pemimpin_tim.id_pemimpin = tim.id_pemimpin');
        // $builder->where('no_payment', $id)
        $data = $builder->get()->getResultObject();
        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $data[0]->harga_masuk,
            ),
            'items_details' => array(
                'id' => $data[0]->id_booking,
                'price' => $data[0]->harga_masuk,
                'quantity' => 1,
                'name' => $data[0]->nama
            )
        );
        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return view("paymentsubs/snap", ['snapToken' => $snapToken, 'data' => $data[0]]);
    }
    
}