<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class GunungSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_gunung' => '1',
                'nama' => 'Gunung Arjuna',
                'deskripsi' => 'Mount Arjuno (sometimes spelledMount Arjuna) is acone volcano (rest) inEast Java, Indonesiawith an altitude of 3,339 m above sea level. Mount Arjuno is administratively located on the border ofBatu City, Malang Regency, andPasuruan Regencyand is under the management ofRaden Soerjo Forest Park. Mount Arjuno is the second highest mountain in East Java afterMount Semeru, and is the fourth highest in Java. Usually this mountain is reached from three well-known climbing points, namely fromLawang, TretesandBatu. The nameArjunocomes from one of the mahabharata puppetry figures, Arjuna.

                Mount Arjuno is adjacent to MountWelirang, Mount Kembar I, andMount Kembar II. The peak of Mount Arjuno is located on the same ridge as the topofMount Welirang, so this complex is often referred to asArjuno-Welirang. The Arjuno-Welirang complex itself is on two older volcanoes, Mount Ringgit in the east andMount Lincingin the south. Fumaroleswithsulfurreserves are found in a number of these mountainous locations, such as on the summit of Mount Welirang, the summit of Mount Kembar II, and on a number of hiking trails.
                
                Mount Arjuno is one of the climbing destinations. In addition to its height that has reached more than 3000 meters, on this mountain there are several tourist attractions. One of them is the grandfather bodowaterfall attraction which is also one of the hiking trails to the top of Mount Arjuno. Although in addition to the tourist attractions of Grandpa Bodo waterfall there are also other waterfalls, but tourists rarely visit other waterfalls, perhaps because the location and tourist facilities are not supportive. In the slope area, there is also a spring of theBrantas Riverwhich comes from the water deposits of Mount Arjuno. Brantas River spring is located inSumber Brantas Village, Bumiaji, Batu Citywhich is the second longest river in Java Island afterBengawan Solo. Several famous tourist destinations throughout Indonesia and abroad are also located on the slopes of Mount Arjuno, includingTretes, Batu Tourism City, andTaman Safari Indonesia 2.
                
                Mount Arjuno has an area ofHill Dipterokarp forest, Upper Dipterokarp forest, Montane forest, andEricaceous Forestor mountain forest.
                
                Mount Arjuno can be climbed and in various directions, north (Tretes) throughMount Welirang, and east (Lawang) and from west (Batu-Selecta), and south direction (Karangploso), also from Sumberawan, Singosari. Sumberawan Village is a handicraft center village inSingosari district, Malang Regencyand is the last village to prepare before starting the climb. You can also passPurwosariwhich is easier to pass, because it is only half an hour from the highway and directly arrives at Tambakwatu.',
                
                'url_gunung' => '-',
                'book_available' => '1'
            ],
            [
                'id_gunung' => '2',
                'nama' => 'Gunung Semeru',
                'deskripsi' => 'The Semeru (Javanese: ꦱꦼꦩꦺꦫꦸ), or Mount Semeru (Javanese: ꦒꦸꦤꦸꦁ​ꦱꦼꦩꦺꦫꦸ (Pegon:ڮنڠ سمَيرو, romanized: Gunung Semeru), is an active volcano located in East Java, Indonesia. It is located in a subduction zone, where the Indo-Australian plate subducts under the Eurasia plate.[3] It is the highest mountain on the island of Java. The name "Semeru" is derived from Meru, the central world mountain in Hinduism, or Sumeru, the abode of gods. This stratovolcano is also known as Mahameru, meaning "The Great Mountain" in Sanskrit.[4][1] It is one of the more popular hiking destinations in Indonesia.',
                'url_gunung' => '-',
                'book_available' => '1'
            ],
            [
                'id_gunung' => '3',
                'nama' => 'Gunung Bromo',
                'deskripsi' => 'The Bromo (Javanese: ꦧꦿꦩ), or Mount Bromo (Javanese: ꦒꦸꦤꦸꦁ​ꦧꦿꦩ (Pegon: ڮنڠ برومو, romanized: Gunung Bromo) is an active somma volcano and part of the Tengger mountains, in East Java, Indonesia. At 2,329 meters (7,641 ft) it is not the highest peak of the massif, but the most famous. The area is one of the most visited tourist destinations in East Java, and the volcano is included in the Bromo Tengger Semeru National Park. The name Bromo comes from the Javanese pronunciation of Brahma, the Hindu god of creation. Mount Bromo is located in the middle of a plain called "Sea of Sand" (Javanese: Segara Wedi or Indonesian: Lautan Pasir), a nature reserve that has been protected since 1919.

                A typical way to visit Mount Bromo is from the nearby mountain village of Cemoro Lawang. From there it is possible to walk to the volcano in about 45 minutes, but it is also possible to take an organized jeep tour, including stops at the viewpoint of Mount Penanjakan (2,770 m (9,090 ft)) (Indonesian: Gunung Penanjakan). The sights on Mount Penanjakan can also be reached on foot in about two hours. Depending on the level of volcanic activity, the Indonesian Center for Volcanology and Disaster Mitigation sometimes issues a warning not to visit Mount Bromo.',
                'url_gunung' => '-',
                'book_available' => '1'
            ]
            ];
            $this->db->table('gunung')->insertBatch($data);
    }
}
