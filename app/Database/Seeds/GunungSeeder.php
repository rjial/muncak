<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class GunungSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama' => 'Gunung Arjuna',
                'deskripsi' => 'Mount Arjuno (sometimes spelledMount Arjuna) is acone volcano (rest) inEast Java, Indonesiawith an altitude of 3,339 m above sea level. Mount Arjuno is administratively located on the border ofBatu City, Malang Regency, andPasuruan Regencyand is under the management ofRaden Soerjo Forest Park. Mount Arjuno is the second highest mountain in East Java afterMount Semeru, and is the fourth highest in Java.',
                
                'url_gunung' => 'gunung_1.png',
                'book_available' => '1',
                'harga_masuk' => 75000,
                'tanggal_awal' => '2022-12-12',
                'tanggal_akhir' => '2022-12-29',
                'id_users'      => 2
            ],
            [
                'nama' => 'Gunung Semeru',
                'deskripsi' => 'The Semeru (Javanese: ꦱꦼꦩꦺꦫꦸ), or Mount Semeru (Javanese: ꦒꦸꦤꦸꦁ​ꦱꦼꦩꦺꦫꦸ (Pegon:ڮنڠ سمَيرو, romanized: Gunung Semeru), is an active volcano located in East Java, Indonesia. It is located in a subduction zone, where the Indo-Australian plate subducts under the Eurasia plate.[3] It is the highest mountain on the island of Java. The name "Semeru" is derived from Meru, the central world mountain in Hinduism, or Sumeru, the abode of gods. This stratovolcano is also known as Mahameru, meaning "The Great Mountain" in Sanskrit.[4][1] It is one of the more popular hiking destinations in Indonesia.',
                'url_gunung' => 'gunungbromo4.png',
                'book_available' => '1',
                'harga_masuk' => 75000,
                'tanggal_awal' => '2022-12-12',
                'tanggal_akhir' => '2022-12-29',
                'id_users'      => 3
            ],
            [
                'nama' => 'Gunung Bromo',
                'deskripsi' => 'The Bromo (Javanese: ꦧꦿꦩ), or Mount Bromo (Javanese: ꦒꦸꦤꦸꦁ​ꦧꦿꦩ (Pegon: ڮنڠ برومو, romanized: Gunung Bromo) is an active somma volcano and part of the Tengger mountains, in East Java, Indonesia. At 2,329 meters (7,641 ft) it is not the highest peak of the massif, but the most famous. The area is one of the most visited tourist destinations in East Java, and the volcano is included in the Bromo Tengger Semeru National Park. The name Bromo comes from the Javanese pronunciation of Brahma, the Hindu god of creation. Mount Bromo is located in the middle of a plain called "Sea of Sand" (Javanese: Segara Wedi or Indonesian: Lautan Pasir), a nature reserve that has been protected since 1919.',
                'url_gunung' => 'gunungbromo1.png',
                'book_available' => '1',
                'harga_masuk' => 75000,
                'tanggal_awal' => '2022-12-12',
                'tanggal_akhir' => '2022-12-29',
                'id_users'      => 4
            ]
            ];
            $this->db->table('gunung')->insertBatch($data);
    }
}
