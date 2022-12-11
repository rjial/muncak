<?= $this->extend('layout/layout') ?>

<?= $this->section('head') ?>
<script src="<?= base_url('js/home.js') ?>" defer></script>
<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?= $this->include('layout/navbar') ?>

<!-- container -->
<div id="app" class="px-96 py-28 mx-auto">
    <!-- title -->
    <div class="flex flex-col items-center gap-y-4 mb-14">
        <div class="poppins font-bold text-2xl text-slate-700">Tambah gunung</div>
        <div class="w-20 h-0 border-2 border-solid border-blue-400 rounded-full"></div>
    </div>
    <!-- content -->
    <div class="poppins text-black mt-5">
        <div v-for="gunung in 1">
            <div class="text-sm mb-2">Gunung {{gunung}}</div>
            <div class="flex flex-col gap-4">
                <div class="flex flex-col gap-2">
                    <label for="nama-gunung" class="text-sm">Nama gunung</label>
                    <input type="text" name="nama-gunung" id="nama-gunung" class=" border border-gray-400 rounded-md px-2 py-3.5 w-full bg-white">
                </div>
                <div class="grid grid-cols-4 gap-5">
                    <div class="flex flex-col gap-2 col-span-1">
                        <label for="kuota" class="text-sm">Kuota</label>
                        <input type="text" name="kuota" id="kuota" class=" border border-gray-400 rounded-md px-2 py-3.5 w-full bg-white">
                    </div>
                    <div class="flex flex-col gap-2 col-span-3">
                        <label for="gambar-gunung" class="text-sm">Gambar gunung</label>
                        <input type="file" accept="image/png, image/gif, image/jpeg" name="gambar-gunung" id="gambar-gunung" class=" border border-gray-400 rounded-md h-full block file:px-4 file:border-0 file:mr-2 file:cursor-pointer file:h-full w-full bg-white cursor-pointer">
                    </div>
                </div>
                <div class="flex flex-col gap-2">
                    <label for="deskripsi-gunung" class="text-sm font-medium">Deskripsi gunung</label>
                    <textarea name="deskripsi-gunung" id="deskripsi-gunung" rows="4" class="border border-gray-400 rounded-md px-2 py-3.5 w-full bg-white"></textarea>
                </div>
                <a href="" class="flex justify-center align-center primary-color-bg p-4 mt-4 font-medium rounded text-white poppins">Tambah gunung</a>
            </div>
        </div>

    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('footer') ?>
<script>
    const {
        createApp
    } = Vue
    createApp({
        // data() {
        //     return {
        //         tabIndex: 0,
        //         dataProvinsi: []
        //     }
        // },
        // mounted() {
        //     if (Cookies.get('tabIndex') != undefined) {
        //         this.tabIndex = Cookies.get('tabIndex')
        //     }
        //     this.loadProvinsi()
        // },
        methods: {
            // switchTab(index) {
            //     Cookies.set('tabIndex', index)
            //     this.tabIndex = index
            // },
            // loadProvinsi() {
            //     axios.get('https://ibnux.github.io/data-indonesia/provinsi.json')
            //         .then((data) => {
            //             console.log(data.data)
            //             this.dataProvinsi = data.data
            //         })
            // }
        }
    }).mount('#app')
</script>
<?= $this->endSection() ?>