<?= $this->extend('layout/layout') ?>

<?= $this->section('head') ?>
<script src="<?= base_url('js/home.js') ?>" defer></script>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?= $this->include('layout/navbar') ?>
<div id="app" class="bg-white pt-16 mx-auto w-full px-32">
    <div class="flex flex-col items-center">
        <div class="flex flex-col items-center gap-y-4 mb-10 mt-16">
            <div class="poppins font-bold text-3xl text-slate-700">FITNESS AND CONDITION SURVEY</div>
            <div class="self-stretch mx-8 h-0 border-2 border-solid border-blue-400 rounded-full"></div>
        </div>
    </div>
    <form method="POST" action="<?= route_to('survey_hasil') ?>" class="bg-white p-4 my-10 rounded-lg poppins space-y-8 shadow-[0_0_4px_rgba(0,0,0,20%)]">
    
            <div>
                <span class="text-black font-medium">Berapa kali anda melakukan olahraga dalam seminggu?</span>
                <div class="mt-4 ml-4 space-y-3">
                        <div class="flex items-center gap-x-4">
                            <input type="radio" name="soal-1" id="soal-1a" value = '1'>
                            <label class="text-gray-600 text-sm" for="soal-1">Tidak pernah sama sekali</label>
                        </div>
                        <div class="flex items-center gap-x-4">
                            <input type="radio" name="soal-1" id="soal-1b" value = '2'>
                            <label class="text-gray-600 text-sm" for="soal-1">Jarang (1 - 2 kali)</label>
                        </div>
                        <div class="flex items-center gap-x-4">
                            <input type="radio" name="soal-1" id="soal-1c" value = '3'>
                            <label class="text-gray-600 text-sm" for="soal-1">Sering (3- 5 kali)</label>
                        </div>
                    
                </div>
            </div>
        <div>
                <span class="text-black font-medium">Berapa gelas yang anda minum setiap hari</span>
                <div class="mt-4 ml-4 space-y-3">
                        <div class="flex items-center gap-x-4">
                            <input type="radio" name="soal-2" id="soal-2a" value = '1'>
                            <label class="text-gray-600 text-sm" for="soal-2">1-4 gelas (kurang)</label>
                        </div>
                        <div class="flex items-center gap-x-4">
                            <input type="radio" name="soal-2" id="soal-2b" value = '2'>
                            <label class="text-gray-600 text-sm" for="soal-2">5-8 gelas (cukup)</label>
                        </div>
                        <div class="flex items-center gap-x-4">
                            <input type="radio" name="soal-2" id="soal-2c" value = '3'>
                            <label class="text-gray-600 text-sm" for="soal-2">lebih dari 8 gelas (oke)</label>
                        </div>
                </div>
            </div>
            <div>
                <span class="text-black font-medium">Apakah anda merasa mempunyai kebiasaan makan makanan yang bernutrisi</span>
                <div class="mt-4 ml-4 space-y-3">
                        <div class="flex items-center gap-x-4">
                            <input type="radio" name="soal-3" id="soal-3a" value = '1'>
                            <label class="text-gray-600 text-sm" for="soal-3">Iya, seperti sayur-sayuran dan buah-buahan</label>
                        </div>
                        <div class="flex items-center gap-x-4">
                            <input type="radio" name="soal-3" id="soal-3b" value = '2'>
                            <label class="text-gray-600 text-sm" for="soal-3">Tidak, saya sering mengkonsumsi makananan cepat saji dan gorengan</label>
                        </div>
                </div>
            </div>
        <div class="w-full flex justify-center p-4">
            <button type="submit" class="mx-auto bg-blue-500 text-white py-3 px-6 rounded tracking-wider">Submit Jawaban</button>
        </div>
    </form>

</div>
<?= $this->endSection() ?>