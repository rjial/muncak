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
        <?php for ($a = 0; $a < 4; $a++) : ?>
            <div>
                <span class="text-black font-medium">Berapa kali Anda melakukan olahraga dalam seminggu?</span>
                <div class="mt-4 ml-4 space-y-3">
                    <?php for ($i = 0; $i < 4; $i++) : ?>
                        <div class="flex items-center gap-x-4">
                            <input type="radio" name="soal-<?= $a ?>" id="soal-<?= $a ?>">
                            <label class="text-gray-600 text-sm" for="soal-<?= $a ?>">Saya tidak berolahraga</label>
                        </div>
                    <?php endfor ?>
                </div>
            </div>
        <?php endfor ?>
        <div class="w-full flex justify-center p-4">
            <button type="submit" class="mx-auto bg-blue-500 text-white py-3 px-6 rounded tracking-wider">Submit Jawaban</button>
        </div>
    </form>

</div>
<?= $this->endSection() ?>