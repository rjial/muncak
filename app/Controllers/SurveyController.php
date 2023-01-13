<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class SurveyController extends BaseController
{
    
    public function index()
    {
        if (getAuth()->subs[0]->id_subs != 2) {
            return redirect()->to('/');
        }
        return view("survey/index");
    
    }  
    public function hasil() {
     return view("survey/hasil");
     $soal1 = $this->request->getPost('soal-1');
     $soal2 = $this->request->getPost('soal-2');
     $soal3 = $this->request->getPost('soal-3');

         if($soal1 == "1") {
             echo "Tidak pernah sama sekali";
         } elseif ($soal1 == "2") {
             echo "Jarang (1 - 2 kali)";
         } elseif ($soal1 == "3") {
             echo "Sering (3- 5 kali)";
         }
         
         if($soal2 == "1") {
             echo "1-4 gelas (kurang)";
         } elseif ($soal2 == "2") {
             echo "Jarang (1 - 2 kali)";
         } elseif ($soal2 == "3") {
             echo "Sering (3- 5 kali)";
         }

         if($soal3 == "1") {
             echo "Iya, seperti sayur-sayuran dan buah-buahan";
         } elseif ($soal3 == "2") {
             echo "Tidak, saya sering mengkonsumsi makananan cepat saji dan gorengan";
         }
    }
}
