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
                <div class="poppins font-semibold text-slate-700 mb-2">Payment History</div>
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
                        <?php foreach ($payments as $payment) : ?>
                            <tr class="text-sm td-color">
                                <td class="px-4 pb-3 pt-6">1</td>
                                <td class="px-4 pb-3 pt-6"><?= $payment->date ?></td>
                                <td class="px-4 pb-3 pt-6"><?= $payment->id_booking ?></td>
                                <td class="px-4 pb-3 pt-6"><?= $payment->nama ?></td>
                                <td id="status-booking" class="px-4 pb-3 pt-6"><?= $payment->status ?></td>
                                <td class="px-4 pb-3 pt-6 text-blue-600">
                                    <?php if ($payment->status == "In Progress") : ?>
                                        <a href="<?= url_to('entry', $payment->id_gunung) ?>">Update Entry Data</a>
                                    <?php elseif ($payment->status == "Menunggu Pembayaran") : ?>
                                        <a href="<?= url_to('entry', $payment->id_gunung) ?>">Pembayaran</a>
                                    <?php endif ?>
                                </td>
                            </tr>
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
        // mounted() {
        //     if (Cookies.get('tabIndex') != undefined) {
        //         this.tabIndex = Cookies.get('tabIndex')
        //     }
        //     this.loadProvinsi()
        // },
        methods: {


        }
    }).mount('#app');
</script>
<?= $this->endSection() ?>