<?= $this->extend('layout/layout') ?>

<?= $this->section('head') ?>
<script src="<?= base_url('js/home.js') ?>" defer></script>
<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?= $this->include('layout/navbar') ?>

<!-- container -->
<div id="app" class="px-32 py-28 mx-auto">
    <!-- title -->
    <div class="flex flex-col items-center gap-y-4 mb-20">
        <div class="poppins font-bold text-3xl text-slate-700">Data Entry</div>
        <div class="w-24 h-0 border-2 border-solid border-blue-400 rounded-full"></div>
    </div>
    <!-- content -->
    <div class="w-full border-b border-gray-300 px-4">
        <button :class="tabIndex == 0 ? 'border-b border-blue-500 text-[#4D73F8]' : 'text-black'" @click="switchTab(0)" class="px-4 py-4 text-black poppins font-medium">Schedule</button>
        <button :class="tabIndex == 1 ? 'border-b border-blue-500 text-[#4D73F8]' : 'text-black'" @click="switchTab(1)" class="px-4 py-4 text-black poppins font-medium">Leader</button>
        <button :class="tabIndex == 2 ? 'border-b border-blue-500 text-[#4D73F8]' : 'text-black'" @click="switchTab(2)" class="px-4 py-4 text-black poppins font-medium">Member</button>
    </div>
    <div v-if="tabIndex == 0" class="w-full mt-5 poppins text-black">
        <div class="grid grid-cols-3 gap-x-5 ">
            <div class="flex flex-col gap-2">
                <label for="jalur-pendakian" class="text-sm">Jalur Pendakian</label>
                <div class=" border border-gray-400 rounded-md px-2 py-3.5">
                    <select class="w-full bg-white " name="jalur-pendakian" id="jalur-pendakian">
                        <option value="">Sembalun</option>
                    </select>
                </div>
            </div>
            <div class="flex flex-col gap-2">
                <label for="tanggal-naik" class="text-sm">Tanggal Naik</label>
                <div class=" border border-gray-400 rounded-md px-2 py-3.5">
                    <input type="date" name="tanggal-naik" id="tanggal-naik" class="w-full bg-white active:border-0">
                </div>
            </div>
            <div class="flex flex-col gap-2">
                <label for="tanggal-turun" class="text-sm">Tanggal Turun</label>
                <div class=" border border-gray-400 rounded-md px-2 py-3.5">
                    <input type="date" name="tanggal-turun" id="tanggal-turun" class="w-full bg-white active:border-0">
                </div>
            </div>
        </div>
        <div class="flex flex-col items-center mt-5">
            <button class="btn bg-blue-700 border-0 text-white hover:bg-blue-600 min-h-8 h-8">Next</button>
        </div>
    </div>
    <div v-if="tabIndex == 1" class="w-full grid grid-cols-2 gap-5 mt-5 poppins text-black">
        <div class="flex flex-col gap-2">
            <label for="nama-leader" class="text-sm">Nama Ketua</label>
            <input type="text" name="nama-leader" id="nama-leader" class=" border border-gray-400 rounded-md px-2 py-3.5 w-full bg-white">
        </div>
        <div class="flex flex-col gap-2">
            <label for="nomor-identitas" class="text-sm">Nomor Identitas</label>
            <input type="text" placeholder="contoh: NIK" name="nomor-identitas" id="nomor-identitas" class=" border border-gray-400 rounded-md px-2 py-3.5 w-full bg-white">
        </div>
        <div class="flex flex-col gap-2">
            <label for="tempat-lahir" class="text-sm">Tempat Lahir</label>
            <input type="text" name="tempat-lahir" id="tempat-lahir" class=" border border-gray-400 rounded-md px-2 py-3.5 w-full bg-white">
        </div>
        <div class="flex flex-col gap-2">
            <label for="tanggal-lahir" class="text-sm">Tanggal Lahir</label>
            <div class=" border border-gray-400 rounded-md px-2 py-3.5">
                <input type="date" name="tanggal-lahir" id="tanggal-lahir" class="w-full bg-white active:border-0">
            </div>
        </div>
        <div class="grid grid-cols-2 gap-x-5">
            <div class="flex flex-col gap-2">
                <label for="provinsi" class="text-sm">Provinsi</label>
                <div class="border border-gray-400 rounded-md px-2 py-3.5">
                    <select name="provinsi" id="provinsi" class="w-full bg-white">
                        <option value="">Pilih Provinsi</option>
                        <option v-for="provinsi in dataProvinsi" :key="provinsi.id" :value="provinsi.id">{{provinsi.nama}}</option>
                    </select>
                </div>
            </div>
            <div class="flex flex-col gap-2">
                <label for="kota" class="text-sm">Kota</label>
                <div class="border border-gray-400 rounded-md px-2 py-3.5">
                    <select name="kota" id="kota" class="w-full bg-white">
                        <option value="">Pilih Kota</option>
                        <option v-for="provinsi in dataProvinsi" :key="provinsi.id" :value="provinsi.id">{{provinsi.nama}}</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-x-5">
            <div class="flex flex-col gap-2">
                <label for="kecamatan" class="text-sm">Kecamatan</label>
                <div class="border border-gray-400 rounded-md px-2 py-3.5">
                    <select name="kecamatan" id="kecamatan" class="w-full bg-white">
                        <option value="">Pilih Kecamatan</option>
                        <option v-for="provinsi in dataProvinsi" :key="provinsi.id" :value="provinsi.id">{{provinsi.nama}}</option>
                    </select>
                </div>
            </div>
            <div class="flex flex-col gap-2">
                <label for="kelurahan" class="text-sm">Kelurahan / Desa</label>
                <div class="border border-gray-400 rounded-md px-2 py-3.5">
                    <select name="kelurahan" id="kelurahan" class="w-full bg-white">
                        <option value="">Pilih Kelurahan</option>
                        <option v-for="provinsi in dataProvinsi" :key="provinsi.id" :value="provinsi.id">{{provinsi.nama}}</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="flex flex-col gap-2">
            <label for="nomor-handphone" class="text-sm">Nomor Handphone</label>
            <input type="text" name="nomor-handphone" id="nomor-handphone" class=" border border-gray-400 rounded-md px-2 py-3.5 w-full bg-white">
        </div>
        <div class="flex flex-col gap-2">
            <label for="jenis-kelamin" class="text-sm">Jenis Kelamin</label>
            <div class=" border border-gray-400 rounded-md px-2 py-3.5">
                <select class="w-full bg-white " name="jenis-kelamin" id="jenis-kelamin">
                    <option value="">Laki-laki</option>
                    <option value="">Perempuan</option>
                    <option value="">Tidak diketahui</option>
                </select>
            </div>
        </div>
    </div>
    <div v-if="tabIndex == 1" class="w-full flex flex-col gap-2 mt-5 poppins text-black">
        <label for="nomor-handphone" class="text-sm font-medium">Alamat lengkap</label>
        <textarea name="alamat-lengkap" id="alamat-lengkap" rows="4" class="border border-gray-400 rounded-md px-2 py-3.5 w-full bg-white"></textarea>
    </div>
    <div v-if="tabIndex == 2" class=" poppins text-black mt-5">
        <div v-for="anggota in 2">
            <div class="text-sm">Anggota {{anggota}}</div>
            <div class="w-full grid grid-cols-2 gap-5 mt-2">
                <div class="flex flex-col gap-2">
                    <label for="nama-leader" class="text-sm">Nama anggota</label>
                    <input type="text" name="nama-leader" id="nama-leader" class=" border border-gray-400 rounded-md px-2 py-3.5 w-full bg-white">
                </div>
                <div class="flex flex-col gap-2">
                    <label for="nomor-identitas" class="text-sm">Nomor identitas</label>
                    <input type="text" placeholder="contoh: NIK" name="nomor-identitas" id="nomor-identitas" class=" border border-gray-400 rounded-md px-2 py-3.5 w-full bg-white">
                </div>
                <div class="flex flex-col gap-2">
                    <label for="nomor-handphone" class="text-sm">Nomor handphone</label>
                    <input type="text" name="nomor-handphone" id="nomor-handphone" class=" border border-gray-400 rounded-md px-2 py-3.5 w-full bg-white">
                </div>
                <div class="flex flex-col gap-2">
                    <label for="jenis-kelamin" class="text-sm">Jenis kelamin</label>
                    <div class=" border border-gray-400 rounded-md px-2 py-3.5 mb-8">
                        <select class="w-full bg-white" name="jenis-kelamin" id="jenis-kelamin">
                            <option value="">Laki-laki</option>
                            <option value="">Perempuan</option>
                            <option value="">Tidak diketahui</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <a href="" class="flex justify-center align-center primary-color-bg p-4 mt-4 font-medium rounded text-white poppins">Continue to Payment</a>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('footer') ?>
<script>
    const {
        createApp
    } = Vue
    createApp({
        data() {
            return {
                tabIndex: 0,
                dataProvinsi: []
            }
        },
        mounted() {
            if (Cookies.get('tabIndex') != undefined) {
                this.tabIndex = Cookies.get('tabIndex')
            }
            this.loadProvinsi()
        },
        methods: {
            switchTab(index) {
                Cookies.set('tabIndex', index)
                this.tabIndex = index
            },
            loadProvinsi() {
                axios.get('https://ibnux.github.io/data-indonesia/provinsi.json')
                    .then((data) => {
                        console.log(data.data)
                        this.dataProvinsi = data.data
                    })
            }
        }
    }).mount('#app')
</script>
<?= $this->endSection() ?>