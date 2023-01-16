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
    
     $soal1 = $this->request->getPost('soal-1');
     $soal2 = $this->request->getPost('soal-2');
     $soal3 = $this->request->getPost('soal-3');
     $hasil;
     $rekom;
        // olahraga
         if($soal1 == "1") {
             //echo "Tidak pernah sama sekali";
         } elseif ($soal1 == "2") {
             //echo "Jarang (1 - 2 kali)";
         } elseif ($soal1 == "3") {
             //echo "Sering (3- 5 kali)";
         }
         // minuman
         if($soal2 == "1") {
             //echo "1-4 gelas (kurang)";
         } elseif ($soal2 == "2") {
             //echo "Jarang (1 - 2 kali)";
         } elseif ($soal2 == "3") {
             //echo "Sering (3- 5 kali)";
         }
        // makanan
         if($soal3 == "1") {
             //echo "Iya, seperti sayur-sayuran dan buah-buahan";
         } elseif ($soal3 == "2") {
             //echo "Tidak, saya sering mengkonsumsi makananan cepat saji dan gorengan";
         }

         if ($soal1 == "1" && $soal2 == "1" && $soal3 == "2"){
            $hasil = "Anda tidak direkomendasikan untuk naik gunung";
            $rekom = "Rubah pola makan dan minum anda, serta tambahkan intensitas olahraga untuk mempersiapkan pendakian, Tetap Semangat !!!.";
         } 
         // intensitas olahraga sering
         elseif ($soal1 == "3" && $soal2 == "3" && $soal3 == "1"){
            $hasil = "Anda dapat melakukan pendakian gunung";
            $rekom = "Anda dalam kondisi fit dan sehat,Tetap jaga kondisi tubuh anda. Tetap Semangat !!!.";
         }elseif ($soal1 == "3" && $soal2 == "3" && $soal3 == "2"){
            $hasil = "Anda dapat melakukan pendakian gunung";
            $rekom = "Intensitas olahraga dan pola sudah baik, Perbanyak makanan yang berserat dan sehat agar tetap fit saat pendakian. Tetap Semangat !!!.";
         } elseif ($soal1 == "3" && $soal2 == "2" && $soal3 == "1"){
            $hasil = "Anda dapat melakukan pendakian gunung";
            $rekom = "Kondisi segi makanan dan olahraga sudah baik. Tambah porsi minum anda agar tidak kekurangan cairan. Tetap Semangat !!!";
         }elseif ($soal1 == "3" && $soal2 == "2" && $soal3 == "2"){
            $hasil = "Anda dapat melakukan pendakian gunung";
            $rekom = "Intensitas olahraga sudah baik. Tambah porsi minum dan rubah pola makan anda agar tidak kekurangan cairan dan tetap fit saat pendakian. Tetap Semangat !!!";
         }elseif ($soal1 == "3" && $soal2 == "1" && $soal3 == "1"){
            $hasil = "Anda dapat melakukan pendakian gunung";
            $rekom = "Kondisi segi makanan dan olahraga sudah baik. Tambah porsi minum anda agar tidak sampai dehidrasi dalam perjalanan pendakian. Tetap Semangat !!!";
         }elseif ($soal1 == "3" && $soal2 == "1" && $soal3 == "2"){
            $hasil = "Anda dapat melakukan pendakian gunung";
            $rekom = "Intensitas olahraga sudah baik. Tambah porsi minum dan rubah pola makan anda agar tidak kekurangan cairan dan tetap fit saat pendakian. Tetap Semangat !!!";
         }

         //intensitas olahraga jarang
         elseif ($soal1 == "2" && $soal2 == "3" && $soal3 == "1"){
            $hasil = "Anda dapat melakukan pendakian gunung";
            $rekom = "Pola makanan dan minum sudah cukup baik dan tambah intensitas olahraga untuk meningkatkan stamina agar kuat untuk melakukan pendakian. Tetap Semangat !!!";
         } elseif ($soal1 == "2" && $soal2 == "3" && $soal3 == "2"){
            $hasil = "Anda dapat melakukan pendakian gunung";
            $rekom = "Pola minum sudah cukup baik dan tambah intensitas olahraga, serta rubah pola makan untuk meningkatkan stamina agar kuat tetap fit saat melakukan pendakian. Tetap Semangat !!!";
         } elseif ($soal1 == "2" && $soal2 == "2" && $soal3 == "1"){
            $hasil = "Anda dapat melakukan pendakian gunung";
            $rekom = "Pola minum sudah cukup baik dan tambah intensitas olahraga, serta rubah pola makan untuk meningkatkan stamina agar kuat tetap fit saat melakukan pendakian. Tetap Semangat !!!"; 
        } elseif ($soal1 == "2" && $soal2 == "2" && $soal3 == "2"){
            $hasil = "Anda dapat melakukan pendakian gunung";
            $rekom = "Tambah intensitas olahraga, serta rubah pola makan dan minum agar kondisi tubuh anda kuat untuk melakukan pendakian. Tetap Semangat !!!";
         } elseif ($soal1 == "2" && $soal2 == "1" && $soal3 == "1"){
            $hasil = "Anda tidak disarankan melakukan pendakian gunung";
            $rekom = "Tetap jaga pola makan anda, serta tambah intensitas olahraga, serta tambah porsi minum agar kondisi tubuh anda kuat untuk melakukan pendakian. Tetap Semangat !!!";
         } elseif ($soal1 == "2" && $soal2 == "1" && $soal3 == "2"){
            $hasil = "Anda tidak disarankan melakukan pendakian gunung";
            $rekom = "Tambah intensitas olahraga, serta rubah pola makan dan minum agar kondisi tubuh anda kuat untuk melakukan pendakian. Tetap Semangat !!!";
         } 

         // intensitas olahraga tidak pernah 
         elseif ($soal1 == "1" && $soal2 == "3" && $soal3 == "1"){
            $hasil = "Anda tidak disarankan melakukan pendakian gunung";
            $rekom = "Pola makanan dan minum sudah cukup baik, tetapi tambah intensitas olahraga untuk meningkatkan stamina agar kuat untuk melakukan pendakian. Tetap Semangat !!!";
         } elseif ($soal1 == "1" && $soal2 == "3" && $soal3 == "2"){
            $hasil = "Anda tidak disarankan melakukan pendakian gunung";
            $rekom = "Pola minum sudah cukup baik, tetapi tambah intensitas olahraga dan rubah pola makan untuk meningkatkan stamina agar kuat tetap fit saat melakukan pendakian. Tetap Semangat !!!";
         } elseif ($soal1 == "1" && $soal2 == "2" && $soal3 == "1"){
            $hasil = "Anda tidak disarankan melakukan pendakian gunung";
            $rekom = "Tetap jaga pola makan anda, serta tambah intensitas olahraga, serta tambah porsi minum agar kondisi tubuh anda kuat untuk melakukan pendakian. Tetap Semangat !!!";
         } elseif ($soal1 == "1" && $soal2 == "2" && $soal3 == "2"){
            $hasil = "Anda tidak disarankan melakukan pendakian gunung";
            $rekom = "Tambah intensitas olahraga, serta rubah pola makan dan minum agar kondisi tubuh anda kuat untuk melakukan pendakian. Tetap Semangat !!!";
        } elseif ($soal1 == "1" && $soal2 == "2" && $soal3 == "1"){
            $hasil = "Anda tidak disarankan melakukan pendakian gunung";
            $rekom = "Tetap jaga pola makan anda, serta tambah intensitas olahraga, serta tambah porsi minum agar kondisi tubuh anda kuat untuk melakukan pendakian. Tetap Semangat !!!";
        }

         return view("survey/hasil",["hasil" => $hasil, "rekom" => $rekom]);
    }
}
