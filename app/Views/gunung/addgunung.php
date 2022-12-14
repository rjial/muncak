<?= $this->extend('layout/layout') ?>

<?= $this->section('head') ?>
<script src="<?= base_url('js/home.js') ?>" defer></script>
<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?= $this->include('layout/navbar') ?>

<!-- container -->
<div id="app" class="px-24 lg:px-72 py-28 mx-auto">
    <!-- title -->
    <div class="flex flex-col items-center gap-y-4 mb-14">
        <div class="poppins font-bold text-2xl text-slate-700">Tambah gunung</div>
        <div class="w-20 h-0 border-2 border-solid border-blue-400 rounded-full"></div>
    </div>
    <!-- content -->
    <div class="poppins text-black mt-5">
        <div v-for="gunung in 1">
            <form @submit="uploadForm" class="flex flex-col gap-4">
                <div class="flex flex-col gap-2">
                    <label for="nama-gunung" class="text-sm">Nama gunung</label>
                    <input type="text" name="nama-gunung" v-model="model.nama" id="nama-gunung" class=" border border-gray-400 rounded-md px-2 py-3.5 w-full bg-white">
                </div>
                <div class="grid grid-cols-4 gap-5">
                    <div class="flex flex-col gap-2 col-span-2">
                        <label for="tanggal-awal" class="text-sm">Tanggal awal</label>
                        <div class=" border border-gray-400 rounded-md px-2 py-3.5">
                            <input type="date" name="tanggal-awal" v-model="model.tgl_awal" id="tanggal-awal" class="w-full bg-white active:border-0">
                        </div>
                    </div>
                    <div class="flex flex-col gap-2 col-span-2">
                        <label for="tanggal-akhir" class="text-sm">Tanggal akhir</label>
                        <div class=" border border-gray-400 rounded-md px-2 py-3.5">
                            <input type="date" name="tanggal-akhir" v-model="model.tgl_akhir" id="tanggal-akhir" class="w-full bg-white active:border-0">
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-4 gap-5">
                    <div class="flex flex-col gap-2 col-span-1">
                        <label for="kuota" class="text-sm">Kuota</label>
                        <input type="number" name="kuota" id="kuota" v-model="model.kuota" min="1" class=" border border-gray-400 rounded-md px-2 py-3.5 w-full bg-white">
                    </div>
                    <div class="flex flex-col gap-2 col-span-3">
                        <label for="gambar-gunung" class="text-sm">Gambar gunung</label>
                        <input type="file" ref="gambar_gunung" @change="changeFileUpload" accept="image/png, image/gif, image/jpeg" name="gambar-gunung" id="gambar-gunung" class=" border border-gray-400 rounded-md h-full block file:px-4 file:border-0 file:mr-2 file:cursor-pointer file:h-full w-full bg-white cursor-pointer">
                    </div>
                </div>
                <div class="w-full">
                    <div class="flex flex-col gap-2 col-span-1">
                        <label for="harga_masuk" class="text-sm">Harga Masuk</label>
                        <input type="number" name="model.harga_masuk" id="harga_masuk" v-model="model.harga_masuk" min="1" class=" border border-gray-400 rounded-md px-2 py-3.5 w-full bg-white">
                    </div>
                </div>
                <div class="flex flex-col gap-2">
                    <label for="deskripsi-gunung" class="text-sm font-medium">Deskripsi gunung</label>
                    <textarea name="deskripsi-gunung" v-model="model.deskripsi" id="deskripsi-gunung" rows="4" class="border border-gray-400 rounded-md px-2 py-3.5 w-full bg-white"></textarea>
                </div>
                <button type="submit" class="flex justify-center align-center bg-[#4D73F8] p-4 mt-4 font-medium rounded text-white poppins">Tambah gunung</button>
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
        data() {
            return {
                model: {
                    nama: "",
                    tgl_awal: new Date(),
                    tgl_akhir: new Date(),
                    kuota: 1,
                    gambar_gunung: null,
                    deskripsi: "",
                    harga_masuk: 10000
                }
            }
        },
        // mounted() {
        //     if (Cookies.get('tabIndex') != undefined) {
        //         this.tabIndex = Cookies.get('tabIndex')
        //     }
        //     this.loadProvinsi()
        // },
        methods: {
            uploadForm(e) {
                const formData = new FormData()
                console.log(this.$refs.gambar_gunung)
                formData.append('gambar-gunung', this.$refs.gambar_gunung[0].files[0], this.$refs.gambar_gunung[0].files[0].name)
                formData.append('nama', this.model.nama)
                formData.append('deskripsi', this.model.deskripsi)
                formData.append('book_available', this.model.kuota)
                formData.append('harga_masuk', this.model.harga_masuk)
                console.log(formData)
                const jwt = Cookies.get('jwt')
                axios.post('/api/gunung/add', formData, {
                        headers: {
                            Authorization: `Bearer ${jwt}`
                        }
                    })
                    .then((res) => {
                        console.log(res)
                        window.location.href = '/dashboard'
                    })
                e.preventDefault();
                // e.stopPropagation();
            },
            changeFileUpload(event) {
                this.model.gambar_gunung = event.target.files[0]

            }
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