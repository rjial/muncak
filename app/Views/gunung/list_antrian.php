<?php

use \Carbon\Carbon;
?>
<?= $this->extend('layout/layout') ?>
<?= $this->section('head') ?>
<script src="<?= base_url('js/home.js') ?>" defer></script>
<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?= $this->include('layout/navbar') ?>

<!-- container -->
<div id="app" class="px-24 lg:px-20 pt-28 pb-20 mx-auto">

    <!-- content -->
    <div class="flex flex-col gap-y-4 w-full poppins">
        <div class="soft-shadow-2 flex flex-col rounded-lg">
            <div class="m-5">
                <div class="poppins font-semibold text-slate-700 mb-2">List Antrian</div>
                <table class="table-auto w-full">
                    <thead class="">
                        <tr class="text-left text-sm border-b border-b-color">
                            <th class="px-4 py-3 font-normal th-color">No</th>
                            <th class="px-4 py-3 font-normal th-color">Date</th>
                            <th class="px-4 py-3 font-normal th-color">Booking code</th>
                            <th class="px-4 py-3 font-normal th-color">Mountain</th>
                            <th class="px-4 py-3 font-normal th-color">Status</th>
                            <th class="px-4 py-3 font-normal th-color"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $id = 1; ?>
                        <?php foreach ($antrians as $antrian) : ?>
                            <tr class="text-sm td-color">
                                <td class="px-4 pb-3 pt-6"><?= $id ?></td>
                                <td class="px-4 pb-3 pt-6"><?= Carbon::parse($antrian->date, "Asia/Jakarta")->locale("id")->isoFormat("dddd, D MMMM gggg") ?></td>
                                <td class="px-4 pb-3 pt-6"><?= $antrian->id_booking ?></td>
                                <td class="px-4 pb-3 pt-6"><?= $antrian->nama_gunung ?></td>
                                <td id="status-booking" class="px-4 pb-3 pt-6"><?= $antrian->status ?></td>
                                <td class="px-4 pb-3 pt-6 text-blue-600 flex flex-row space-x-2">
                                    <?php if ($antrian->status == "Menunggu Pembayaran") : ?>
                                    <?php elseif ($antrian->status == "Menunggu Entry") : ?>
                                    <?php elseif ($antrian->status == "Menunggu Administrator") : ?>
                                        <a href="<?= url_to('gunung.approve_antrian', $antrian->id_gunung, $antrian->id_booking) ?>">Konfirmasi</a>
                                    <?php elseif ($antrian->status == "In Progress") : ?>
                                        <a href="<?= url_to('gunung.selesai_antrian', $antrian->id_gunung, $antrian->id_booking) ?>">Selesai</a>

                                    <?php endif ?>
                                    <a href="<?= url_to('detail_history', $antrian->id_booking) ?>">Details</a>
                                </td>
                            </tr>
                            <?php $id++; ?>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>


</div>
</div>

<?= $this->endSection() ?>

<?= $this->section('footer') ?>
<script>
    const statusBooking = document.querySelectorAll("#status-booking");
    statusBooking.forEach((status) => {
        if (status.innerHTML == "Completed") { // mengubah warna text menunggu..., selesai, dan batal
            status.style.color = "green";
        } else if (status.innerHTML == "In process") {
            status.style.color = "#eed202";
        }
    });

    const {
        createApp
    } = Vue
    createApp({
        data() {
            return {

            }
        },
        mounted() {
            // if (Cookies.get('tabIndex') != undefined) {
            //     this.tabIndex = Cookies.get('tabIndex')
            // }
            // this.loadProvinsi()
            <?= isset($_SESSION['messages']) ?>
        },
        methods: {


        }
    }).mount('#app');
</script>
<?= $this->endSection() ?>