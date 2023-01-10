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
            return redirect("dashboard");
        } else {
            return redirect("dashboard");
        }
    }
}
