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
        <div class="soft-shadow-3 flex flex-col rounded-lg">
            <div class="m-5">
                <div class="flex justify-between items-center">
                    <div class="poppins font-semibold text-slate-700">Payment Details</div>
                    <!-- tombol print pdf -->
                    <a href="#" class="poppins text-[#4D73F8] text-sm border border-[#4D73F8] px-4 py-3 rounded font-medium gap-2.5 flex items-center w-fit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 20 20">
                            <g clip-path="url(#a)">
                                <path stroke="#4D73F8" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7.5V1.667h10V7.5M5 15H3.334a1.667 1.667 0 0 1-1.667-1.667V9.167A1.667 1.667 0 0 1 3.334 7.5h13.333a1.667 1.667 0 0 1 1.667 1.667v4.166A1.666 1.666 0 0 1 16.667 15H15" />
                                <path stroke="#4D73F8" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11.667H5v6.666h10v-6.666Z" />
                            </g>
                            <defs>
                                <clipPath id="a">
                                    <path fill="#fff" d="M0 0h20v20H0z" />
                                </clipPath>
                            </defs>
                        </svg><span>Print to Pdf</span></a>
                </div>

                <div class="grid grid-cols-2 mt-5 text-sm text-gray-500 mb-5">
                    <div class="flex">
                        <div class="w-40">Payment date</div>
                        <div class="w-8">:</div>
                        <div class="text-gray-900">24/11/2022</div>
                    </div>
                    <div class="flex">
                        <div class="w-40">Mountain name</div>
                        <div class="w-8">:</div>
                        <div class="text-gray-900">Mount Bromo</div>
                    </div>
                </div>

                <div class="grid grid-cols-2 mt-5 text-sm text-gray-500">
                    <div class="flex">
                        <div class="w-40">Booking date</div>
                        <div class="w-8">:</div>
                        <div class="text-gray-900">BR-0385191102</div>
                    </div>
                    <div class="flex">
                        <div class="w-40">BR-0385191102</div>
                        <div class="w-8">:</div>
                        <div id="status-booking" class="text-gray-900 font-medium">Completed</div>
                    </div>
                </div>

                <div class="divider mt-5 mb-5"></div>

                <div class="space-y-4 text-sm text-gray-500 mb-8">
                    <div class="poppins font-semibold text-slate-700">Schedule</div>
                    <div class="flex">
                        <div class="w-40">Jalur pendakian</div>
                        <div class="w-8">:</div>
                        <div class="text-gray-900">Jalur sutra</div>
                    </div>
                    <div class="flex">
                        <div class="w-40">Tanggal naik</div>
                        <div class="w-8">:</div>
                        <div class="text-gray-900">24/11/2022</div>
                    </div>
                    <div class="flex">
                        <div class="w-40">Tanggal turun</div>
                        <div class="w-8">:</div>
                        <div class="text-gray-900">26/11/2022</div>
                    </div>
                </div>

                <div class="space-y-4 text-sm text-gray-500 mb-8">
                    <div class="poppins font-semibold text-slate-700">Leader</div>
                    <div class="flex">
                        <div class="w-40">Nama ketua</div>
                        <div class="w-8">:</div>
                        <div class="text-gray-900">Kim Ronaldo Kun</div>
                    </div>
                    <div class="flex">
                        <div class="w-40">Nomor identitas</div>
                        <div class="w-8">:</div>
                        <div class="text-gray-900">1236310976992156</div>
                    </div>
                    <div class="flex">
                        <div class="w-40">Tempat, tanggal lahir</div>
                        <div class="w-8">:</div>
                        <div class="text-gray-900">Pulau pucung, 17/08/46</div>
                    </div>
                    <div class="flex">
                        <div class="w-40">Alamat</div>
                        <div class="w-8">:</div>
                        <div class="text-gray-900">Jl. Raya Tidar No.100, Karangbesuki, Kec. Sukun, Kota Malang, Jawa Timur 65146</div>
                    </div>
                    <div class="flex">
                        <div class="w-40">Jenis kelamin</div>
                        <div class="w-8">:</div>
                        <div class="text-gray-900">Laki-laki</div>
                    </div>
                    <div class="flex">
                        <div class="w-40">Nomor handphone</div>
                        <div class="w-8">:</div>
                        <div class="text-gray-900">+6283189033557</div>
                    </div>
                </div>

                <div class="poppins text-sm font-semibold text-slate-700 mb-1 mt-8">Anggota</div>
                <table class="table-auto w-full">
                    <thead class="">
                        <tr class="text-left text-sm border-b-2 border-b-color">
                            <th class="px-4 py-3 font-normal th-color">No</th>
                            <th class="px-4 py-3 font-normal th-color">Nama</th>
                            <th class="px-4 py-3 font-normal th-color">Nomor identitas</th>
                            <th class="px-4 py-3 font-normal th-color">Jenis kelamin</th>
                            <th class="px-4 py-3 font-normal th-color">Nomor handphone</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-sm td-color">
                            <td class="px-4 pb-3 pt-6">1</td>
                            <td class="px-4 pb-3 pt-6">Chi Cayson</td>
                            <td class="px-4 pb-3 pt-6">1001928455601957</td>
                            <td class="px-4 pb-3 pt-6">Perempuan</td>
                            <td id="status-booking" class="px-4 pb-3 pt-6">+6281209777822</td>
                        </tr>
                        <tr class="text-sm td-color">
                            <td class="px-4 py-3">2</td>
                            <td class="px-4 py-3">Bjorn Ironside</td>
                            <td class="px-4 py-3">200198720492010</td>
                            <td class="px-4 py-3">Laki-laki</td>
                            <td id="status-booking" class="px-4 py-3">+6285158619000</td>
                        </tr>
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