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
    public function item($id)
    {
        helper(['auth']);
        $db = \Config\Database::connect();
        $table = $db->table("subscription");
        $subs = $table->where('id_subs', $id);
        if ($subs->countAll()) {
            // dd($subs->where('id_subs', $id)->get()->getFirstRow());
            if ($subs->where('id_subs', $id)->get()->getFirstRow()->harga_subs > 0) {
                return redirect()->to(url_to("bayarsu", $id));
            } else {
                $table_user = $db->table("users");
                $user = $table_user->where("id_users", getAuth()->id);
                $user->update(['id_subs' => $id]);
                return redirect("dashboard");
            }

            // return redirect("dashboard");

        } else {
            return redirect("dashboard");
        }
    }
    public function payment($id)
    {
        \Midtrans\Config::$serverKey = "SB-Mid-server-KTnpvcIdaLvQZ5RP15t8KF5j";
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;

        $db = \Config\Database::connect();

        $builder = $db->table('subscription');
        $builder->select('subscription.*')->where('id_subs', $id);

        $data = $builder->get()->getResultObject();

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $data[0]->harga_subs,
            ),
            'items_details' => array(
                'id' => $data[0]->id_subs,
                'price' => $data[0]->harga_subs,
                'quantity' => 1,
            )
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return view("mid_subs/snap", ['snapToken' => $snapToken, 'data' => $data[0], 'id' => $id]);
    }
    public function retrieve_payment($id)
    {
        // return $this->request->getJSON();
        $json = $this->request->getJSON();
        $db = \Config\Database::connect();
        if ($json != null) {
            $data = [
                "orderid_subs" => $json->order_id,
                "gross_amount_subs" => $json->gross_amount,
                "transaction_id_subs" => $json->transaction_id,
                "id_users" => getAuth()->id,
            ];
        }
        if ($db->table("mid_subs")->insert($data)) {
            $db->table("users")->where("id_users", getAuth()->id)->update([
                "id_subs" => $id
            ]);
            return url_to("dashboard");
        } else {
            return url_to("dashboard");
        }
    }
}
