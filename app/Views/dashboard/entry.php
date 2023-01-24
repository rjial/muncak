<?= $this->extend('layout/layout') ?>
<?= $this->section('head') ?>
<script src="<?= base_url('js/home.js') ?>" defer></script>
<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
        <button :class="tabIndex == 0 ? 'border-b border-blue-500 text-[#4D73F8]' : 'text-black'" @click="tabIndex = 0" class="px-4 py-4 text-black poppins font-medium">Schedule</button>
        <button :class="tabIndex == 1 ? 'border-b border-blue-500 text-[#4D73F8]' : 'text-black'" @click="tabIndex = 1" class="px-4 py-4 text-black poppins font-medium">Leader</button>
        <button :class="tabIndex == 2 ? 'border-b border-blue-500 text-[#4D73F8]' : 'text-black'" @click="tabIndex = 2" class="px-4 py-4 text-black poppins font-medium">Member</button>
    </div>
    <div v-if="tabIndex == 0" class="w-full mt-5 poppins text-black">
        <div class="grid grid-cols-3 gap-x-5 ">
            <div class="flex flex-col gap-2">
                <label for="jalur-pendakian" class="text-sm">Jalur Pendakian</label>
                <div class=" border border-gray-400 rounded-md px-2 py-3.5">
                    <select v-model="model.jalur" class="w-full bg-white " name="jalur-pendakian" id="jalur-pendakian">
                        <option value="">Pilih Jalur</option>
                        <option v-for="jalur in dataJalur" :value="jalur.id_jalur" :key="jalur.id_jalur">{{jalur.nama}}</option>
                    </select>
                </div>
            </div>
            <div class="flex flex-col gap-2">
                <label for="tanggal-naik" class="text-sm">Tanggal Naik</label>
                <div class=" border border-gray-400 rounded-md px-2 py-3.5">
                    <input type="date" v-model="model.tanggal_naik" name="tanggal-naik" id="tanggal-naik" class="w-full bg-white active:border-0">
                </div>
            </div>
            <div class="flex flex-col gap-2">
                <label for="tanggal-turun" class="text-sm">Tanggal Turun</label>
                <div class=" border border-gray-400 rounded-md px-2 py-3.5">
                    <input type="date" v-model="model.tanggal_turun" name="tanggal-turun" id="tanggal-turun" class="w-full bg-white active:border-0">
                </div>
            </div>
        </div>
        <div class="flex flex-col items-center mt-5">
            <button class="btn bg-blue-700 border-0 text-white hover:bg-blue-600 min-h-8 h-8" @click="tabIndex++">Next</button>
        </div>
    </div>
    <div v-if="tabIndex == 1" class="w-full grid grid-cols-2 gap-5 mt-5 poppins text-black">
        <div class="flex flex-col gap-2">
            <label for="nama-leader" class="text-sm">Nama Ketua</label>
            <input type="text" v-model="model.nama_ketua" name="nama-leader" id="nama-leader" class=" border border-gray-400 rounded-md px-2 py-3.5 w-full bg-white">
        </div>
        <div class="flex flex-col gap-2">
            <label for="nomor-identitas" class="text-sm">Nomor Identitas</label>
            <input type="text" v-model="model.no_identitas" placeholder="contoh: NIK" name="nomor-identitas" id="nomor-identitas" class=" border border-gray-400 rounded-md px-2 py-3.5 w-full bg-white">
        </div>
        <div class="flex flex-col gap-2">
            <label for="tempat-lahir" class="text-sm">Tempat Lahir</label>
            <input type="text" v-model="model.tempat_lahir" name="tempat-lahir" id="tempat-lahir" class=" border border-gray-400 rounded-md px-2 py-3.5 w-full bg-white">
        </div>
        <div class="flex flex-col gap-2">
            <label for="tanggal-lahir" class="text-sm">Tanggal Lahir</label>
            <div class=" border border-gray-400 rounded-md px-2 py-3.5">
                <input type="date" name="tanggal-lahir" v-model="model.tanggal_lahir" id="tanggal-lahir" class="w-full bg-white active:border-0">
            </div>
        </div>
        <div class="grid grid-cols-2 gap-x-5">
            <div class="flex flex-col gap-2">
                <label for="provinsi" class="text-sm">Provinsi</label>
                <div class="border border-gray-400 rounded-md px-2 py-3.5">
                    <select name="provinsi" id="provinsi" class="w-full bg-white" @change="changeProvinsi" v-model="model.provinsi">
                        <option value="">Pilih Provinsi</option>
                        <option v-for="provinsi in dataProvinsi" :key="provinsi.id" :selected="provinsi.id == model.provinsi" :value="provinsi.id">{{provinsi.nama}}</option>
                    </select>
                </div>
            </div>
            <div class="flex flex-col gap-2">
                <label for="kota" class="text-sm">Kota</label>
                <div class="border border-gray-400 rounded-md px-2 py-3.5">
                    <select name="kota" id="kota" class="w-full bg-white" v-model="model.kota" @change="changeKota">
                        <option value="">Pilih Kota</option>
                        <option v-for="kota in dataKota" :key="kota.id" :value="kota.id" :selected="kota.id == model.kota">{{kota.nama}}</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-x-5">
            <div class="flex flex-col gap-2">
                <label for="kecamatan" class="text-sm">Kecamatan</label>
                <div class="border border-gray-400 rounded-md px-2 py-3.5">
                    <select name="kecamatan" id="kecamatan" class="w-full bg-white" v-model="model.kecamatan" @change="changeKecamatan">
                        <option value="">Pilih Kecamatan</option>
                        <option v-for="kecamatan in dataKecamatan" :key="kecamatan.id" :value="kecamatan.id">{{kecamatan.nama}}</option>
                    </select>
                </div>
            </div>
            <div class="flex flex-col gap-2">
                <label for="kelurahan" class="text-sm">Kelurahan / Desa</label>
                <div class="border border-gray-400 rounded-md px-2 py-3.5">
                    <select name="kelurahan" id="kelurahan" class="w-full bg-white" v-model="model.kelurahan">
                        <option value="">Pilih Kelurahan</option>
                        <option v-for="kelurahan in dataKelurahan" :key="kelurahan.id" :value="kelurahan.id">{{kelurahan.nama}}</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="flex flex-col gap-2">
            <label for="nomor-handphone" class="text-sm">Nomor Handphone</label>
            <input type="text" v-model="model.no_hp" name="nomor-handphone" id="nomor-handphone" class=" border border-gray-400 rounded-md px-2 py-3.5 w-full bg-white">
        </div>
        <div class="flex flex-col gap-2">
            <label for="jenis-kelamin" class="text-sm">Jenis Kelamin</label>
            <div class=" border border-gray-400 rounded-md px-2 py-3.5">
                <select v-model="model.jenis_kelamin" class="w-full bg-white " name="jenis-kelamin" id="jenis-kelamin">
                    <option value="1">Laki-laki</option>
                    <option value="0">Perempuan</option>
                    <option value="">Tidak diketahui</option>
                </select>
            </div>
        </div>
        <div class="col-span-2">
            <div v-if="tabIndex == 1" class="w-full flex flex-col gap-2 mt-5 poppins text-black">
                <label for="nomor-handphone" class="text-sm font-medium">Alamat lengkap</label>
                <textarea v-model="model.alamat_lengkap" name="alamat-lengkap" id="alamat-lengkap" rows="4" class="border border-gray-400 rounded-md px-2 py-3.5 w-full bg-white"></textarea>
            </div>
            <div class="flex flex-col items-center mt-5">
                <button class="btn bg-blue-700 border-0 text-white hover:bg-blue-600 min-h-8 h-8" @click="tabIndex++">Next</button>
            </div>
        </div>


    </div>
    <div v-if="tabIndex == 2" class=" poppins text-black mt-5">
        <div v-for="anggota in model.anggota">
            <div class="flex w-full justify-between items-center">
                <div class="text-sm">Anggota {{anggota.id}}</div>
                <button v-if="model.anggota.length > 1" @click="removeAnggota(anggota)" class="p-2 rounded text-white bg-red-400">-</button>
            </div>
            <div class="w-full grid grid-cols-2 gap-5 mt-2">
                <div class="flex flex-col gap-2">
                    <label for="nama-leader" class="text-sm">Nama anggota</label>
                    <input type="text" v-model="anggota.nama" name="nama-leader" id="nama-leader" class=" border border-gray-400 rounded-md px-2 py-3.5 w-full bg-white">
                </div>
                <div class="flex flex-col gap-2">
                    <label for="nomor-identitas" class="text-sm">Nomor identitas</label>
                    <input type="text" v-model="anggota.no_identitas" placeholder="contoh: NIK" name="nomor-identitas" id="nomor-identitas" class=" border border-gray-400 rounded-md px-2 py-3.5 w-full bg-white">
                </div>
                <div class="flex flex-col gap-2">
                    <label for="nomor-handphone" class="text-sm">Nomor handphone</label>
                    <input type="text" v-model="anggota.no_hp" name="nomor-handphone" id="nomor-handphone" class=" border border-gray-400 rounded-md px-2 py-3.5 w-full bg-white">
                </div>
                <div class="flex flex-col gap-2">
                    <label for="jenis-kelamin" class="text-sm">Jenis kelamin</label>
                    <div class=" border border-gray-400 rounded-md px-2 py-3.5 mb-8">
                        <select v-model="anggota.jenis_kelamin" class="w-full bg-white" name="jenis-kelamin" id="jenis-kelamin">
                            <option value="1">Laki-laki</option>
                            <option value="0">Perempuan</option>
                            <option value="">Tidak diketahui</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="divider mb-16">
                <button v-if="isLastAnggota(anggota)" @click="addAnggota()" class="primary-color-bg p-2 rounded text-white mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                </button>
            </div>
        </div>
        <button @click="prosesEntry" class="flex justify-center align-center primary-color-bg p-4 mt-4 font-medium rounded text-white poppins w-full">Continue to Payment</button>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('footer') ?>
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
    })
    const {
        createApp
    } = Vue
    createApp({
        data() {
            return {
                first: true,
                tabIndex: 0,
                dataProvinsi: [],
                dataKota: [],
                dataKecamatan: [],
                dataKelurahan: [],
                dataJalur: [],
                formData: new FormData(),
                model: {
                    provinsi: 1,
                    kota: 1,
                    kecamatan: 1,
                    kelurahan: 1,
                    jalur: '',
                    tanggal_naik: new Date().toISOString().substr(0, 10),
                    tanggal_turun: new Date().toISOString().substr(0, 10),
                    nama_ketua: '',
                    no_identitas: '',
                    tempat_lahir: '',
                    tanggal_lahir: '',
                    no_hp: '',
                    jenis_kelamin: '',
                    alamat_lengkap: '',
                    anggota: [{
                        id: 1,
                        nama: '',
                        no_identitas: '',
                        no_hp: '',
                        jenis_kelamin: 1
                    }]

                }
            }
        },
        watch: {
            tabIndex(newTab, oldTab) {
                console.log(newTab, oldTab)
                let formData = this.formData

                if (this.first == false) {
                    switch (oldTab) {
                        case 0:
                            formData = new FormData()
                            formData.append('jalur', this.model.jalur)
                            formData.append('tanggal_naik', this.model.tanggal_naik)
                            formData.append('tanggal_turun', this.model.tanggal_turun)
                            for (var pair of formData.entries()) {
                                console.log(pair[0] + ', ' + pair[1]);
                            }
                            if (this.first == false) {
                                axios.post('<?= url_to('entryschedule', $id) ?>', formData)
                                    .then(data => {
                                        Cookies.set('tabIndex', newTab)
                                        this.tabIndex = newTab
                                        console.log(data)
                                        Toast.fire({
                                            icon: data.data.error ? 'error' : 'success',
                                            title: data.data.messages
                                        })
                                    })
                                    .catch((err) => {
                                        console.error(err)
                                    })
                            }
                            break;
                        case 1:
                            formData = new FormData()
                            formData.append('nama_pemimpin', this.model.nama_ketua)
                            formData.append('no_identitas', this.model.no_identitas)
                            formData.append('tempat_lahir', this.model.tempat_lahir)
                            formData.append('tanggal_lahir', this.model.tanggal_lahir)
                            formData.append('provinsi', this.model.provinsi)
                            formData.append('kota', this.model.kota)
                            formData.append('kecamatan', this.model.kecamatan)
                            formData.append('desa_kelurahan', this.model.kelurahan)
                            formData.append('no_hp_pemimpin', this.model.no_hp)
                            formData.append('jenis_kelamin', this.model.jenis_kelamin)
                            formData.append('alamat_lengkap', this.model.alamat_lengkap)
                            for (var pair of formData.entries()) {
                                console.log(pair[0] + ', ' + pair[1]);
                            }
                            axios.post('<?= url_to('entryleader', $id) ?>', formData)
                                .then(data => {
                                    Cookies.set('tabIndex', newTab)
                                    this.tabIndex = newTab
                                    console.log(data)
                                    Toast.fire({
                                        icon: data.data.error ? 'error' : 'success',
                                        title: data.data.message
                                    })
                                })
                                .catch((err) => {
                                    console.error(err)
                                })
                            break;
                        case 2:
                            formData = new FormData()
                            formData.append('anggota', JSON.stringify(this.model.anggota))
                            for (var pair of formData.entries()) {
                                console.log(pair[0] + ', ' + pair[1]);
                            }
                            axios.post('<?= url_to('entrymember', $id) ?>', formData)
                                .then(data => {
                                    Cookies.set('tabIndex', newTab)
                                    this.tabIndex = newTab
                                    console.log(data)
                                    Toast.fire({
                                        icon: data.data.status ? 'success' : 'error',
                                        title: data.data.message
                                    })
                                })
                                .catch((err) => {
                                    console.error(err)
                                })
                            break;
                    }
                    switch (newTab) {
                        case 1:
                            axios.get('<?= url_to('entryleaderget', $id) ?>')
                                .then(res => {
                                    let {
                                        data
                                    } = res.data
                                    Cookies.set('tabIndex', newTab)
                                    this.tabIndex = newTab
                                    if (data != null) {
                                        this.model.nama_ketua = data.nama_pemimpin_tim
                                        this.model.no_identitas = data.no_identitas
                                        this.model.tempat_lahir = data.tempat_lahir
                                        this.model.tanggal_lahir = (new Date(data.tanggal_lahir)).toISOString().split('T')[0]
                                        this.model.provinsi
                                        axios.get('https://ibnux.github.io/data-indonesia/provinsi.json')
                                            .then((dataProvinsi) => {
                                                // console.log(data.data)
                                                this.dataProvinsi = dataProvinsi.data
                                                return dataProvinsi
                                            })
                                            .then((setData) => {
                                                this.model.provinsi = data.provinsi
                                            })
                                            .then(() => {
                                                axios.get(`https://ibnux.github.io/data-indonesia/kabupaten/${this.model.provinsi}.json`)
                                                    .then((dataKab) => {
                                                        this.dataKota = dataKab.data
                                                    })
                                                    .then(() => {
                                                        this.model.kota = data.kota
                                                    })
                                                    .then(() => {
                                                        axios.get(`https://ibnux.github.io/data-indonesia/kecamatan/${this.model.kota}.json`)
                                                            .then((dataKec) => {
                                                                this.dataKecamatan = dataKec.data
                                                            })
                                                            .then(() => {
                                                                this.model.kecamatan = data.kecamatan
                                                            })
                                                            .then(() => {
                                                                axios.get(`https://ibnux.github.io/data-indonesia/kelurahan/${this.model.kecamatan}.json`)
                                                                    .then((dataKel) => {
                                                                        this.dataKelurahan = dataKel.data
                                                                    })
                                                                    .then(() => {
                                                                        this.model.kelurahan = data.desa_kelurahan
                                                                    })
                                                            })
                                                    })
                                            })
                                        this.model.no_hp = data.no_hp_pemimpin
                                        this.model.jenis_kelamin = data.jk
                                        this.model.alamat_lengkap = data.alamat_lengkap
                                        console.log(data)

                                    }
                                })
                                .catch((err) => {
                                    console.error(err)
                                })
                            break;


                    }
                }
                // this.tabIndex = 0
                if (newTab > 2) {
                    Cookies.set('tabIndex', 0)
                    this.tabIndex = 0
                } else {
                    // this.tabIndex = newTab
                    Cookies.set('tabIndex', parseInt(newTab))
                    this.tabIndex = parseInt(newTab)
                }
            }
        },
        mounted() {
            if (Cookies.get('tabIndex') != undefined) {
                this.tabIndex = parseInt(Cookies.get('tabIndex'))
            }

            this.loadProvinsi()
            this.loadJalur()
            this.loadInitSchedule()
            this.loadInitLeader()
            this.loadInitMember()
            this.first = false
        },
        methods: {
            addAnggota() {
                let lastAnggota = this.model.anggota[this.model.anggota.length - 1]
                console.log(lastAnggota)
                this.model.anggota.push({
                    id: parseInt(lastAnggota.id + 1),
                    nama: '',
                    no_identitas: '',
                    no_hp: '',
                    jenis_kelamin: 1
                })
            },
            isLastAnggota(anggota) {
                return this.model.anggota[this.model.anggota.length - 1] == anggota
            },
            removeAnggota(anggota) {
                let itemAnggota = this.model.anggota.indexOf(anggota)
                this.model.anggota = this.model.anggota.filter((data) => data != anggota)
            },
            switchTab(index) {
                // if (this.tabIndex == 0) {
                //     let formData = new FormData()
                //     formData.append('jalur', this.model.jalur)
                //     formData.append('tanggal_naik', this.model.tanggal_naik)
                //     formData.append('tanggal_turun', this.model.tanggal_turun)
                //     axios.post(window.location.href + '/schedule', formData)
                //         .then(data => {
                //             Cookies.set('tabIndex', parseInt(index))
                //             this.tabIndex = parseInt(index)
                //             console.log(data)
                //         })
                //         .catch((err) => {
                //             console.error(err)
                //         })

                // } else if (this.tabIndex == 1) {
                // axios.get(window.location.href + '/schedule')
                //     .then(data => {
                //         let res = data.data
                //         console.log(res)
                //         Cookies.set('tabIndex', parseInt(index))
                //         this.tabIndex = parseInt(index)
                //         console.log(data)
                //     })
                //     .catch((err) => {
                //         Cookies.set('tabIndex', 0)
                //         this.tabIndex = 0
                //         console.error(err)
                //     })
                //     console.log(this.model)

                // } else if (this.tabIndex == 2) {
                //     console.log(this.model)
                //     Cookies.set('tabIndex', parseInt(index))
                //     this.tabIndex = parseInt(index)
                // }

            },
            nextTab() {
                if (this.tabIndex > 1) {
                    this.switchTab(0)
                } else {
                    schedule
                    this.switchTab(this.tabIndex + 1)
                }
            },
            loadJalur() {
                let idGunung = window.location.pathname.split('/')[3]
                axios.get('<?= url_to('jalurgunung', $id) ?>')
                    .then(data => this.dataJalur = data.data.data)
            },
            loadProvinsi() {
                axios.get('https://ibnux.github.io/data-indonesia/provinsi.json')
                    .then((data) => {
                        console.log(data.data)
                        this.dataProvinsi = data.data
                    })
            },
            changeProvinsi() {
                console.log(this.model.provinsi)
                axios.get(`https://ibnux.github.io/data-indonesia/kabupaten/${this.model.provinsi}.json`)
                    .then((data) => {
                        console.log(data.data)
                        this.dataKota = data.data
                    })
            },
            changeKota() {
                console.log(this.model.kota)
                axios.get(`https://ibnux.github.io/data-indonesia/kecamatan/${this.model.kota}.json`)
                    .then((data) => {
                        console.log(data.data)
                        this.dataKecamatan = data.data
                    })
            },
            changeKecamatan() {
                console.log(this.model.kecamatan)
                axios.get(`https://ibnux.github.io/data-indonesia/kelurahan/${this.model.kecamatan}.json`)
                    .then((data) => {
                        console.log(data.data)
                        this.dataKelurahan = data.data
                    })
            },
            loadInitMember() {
                axios.get('<?= url_to('entrymemberget', $id) ?>')
                    .then(res => {
                        let {
                            anggota
                        } = res.data.data
                        console.log(anggota)
                        if (anggota.length > 0) {
                            this.model.anggota = []
                            let idanggota = 1
                            anggota.map(data => {
                                this.model.anggota.push({
                                    id: idanggota,
                                    nama: data.nama_anggota,
                                    no_identitas: data.no_identitas,
                                    no_hp: data.no_hp,
                                    jenis_kelamin: data.jk == "Laki-laki" ? 1 : 0
                                })
                                idanggota++
                            })
                        }
                    })
            },
            loadInitSchedule() {
                axios.get('<?= url_to('entryscheduleget', $id) ?>')
                    .then(res => {
                        let {
                            data
                        } = res.data
                        console.log(data)
                        if (data != null) {

                            if (data[0].tanggal_naik != null) {
                                let tanggal_naik = (new Date(data[0].tanggal_naik)).toISOString().split('T')[0]
                                this.model.tanggal_naik = tanggal_naik
                            }
                            if (data[0].tanggal_turun != null) {
                                let tanggal_turun = (new Date(data[0].tanggal_turun)).toISOString().split('T')[0]
                                this.model.tanggal_turun = tanggal_turun

                            }
                            if (data[0].id_jalur != null) {
                                this.model.jalur = data[0].id_jalur
                            }
                        }

                        // console.log(tanggal_naik)
                    })
                    .catch(err => {
                        console.error(err)
                    })
            },
            loadInitLeader() {
                axios.get('<?= url_to('entryleaderget', $id) ?>')
                    .then(res => {
                        console.log(res)
                        if (res.data != null) {
                            return res
                        } else {
                            return null
                        }
                        // let tanggal_naik = (new Date(data[0].tanggal_naik)).toISOString().split('T')[0]
                        // let tanggal_turun = (new Date(data[0].tanggal_turun)).toISOString().split('T')[0]
                        // this.model.tanggal_naik = tanggal_naik
                        // this.model.tanggal_turun = tanggal_turun
                        // this.model.jalur = data[0].id_jalur
                        // console.log(tanggal_naik)
                    })
                    .then(res => {
                        if (res != null) {
                            let {
                                data
                            } = res.data
                            console.log(data)
                            if (data != null) {
                                if (this.dataProvinsi == []) {
                                    axios.get(`https://ibnux.github.io/data-indonesia/kabupaten/${data.provinsi}.json`)
                                        .then((data) => {
                                            this.dataProvinsi = data.data
                                        })
                                }
                                // this.model.nama_ketua
                                //     this.model.no_identitas
                                //     this.model.tempat_lahir
                                //     this.model.tanggal_lahir
                                //     this.model.provinsi
                                //     this.model.kota
                                //     this.model.kecamatan
                                //     this.model.kelurahan
                                //     this.model.no_hp
                                //     this.model.jenis_kelamin
                                //     this.model.alamat_lengkap
                                // axios.get(`https://ibnux.github.io/data-indonesia/kabupaten/${data.provinsi}.json`)
                                //     .then((data) => {

                                //         console.log(data.data)
                                //         // this.model.provinsi = data.provinsi
                                //         // this.dataKota = data.data
                                //     })
                                //     .then((data) => {
                                //         // this.model.kota = data.kota
                                //     })


                            }
                        }

                    })
                    .catch(err => {
                        console.error(err)
                    })
            },
            prosesEntry() {
                if (this.tabIndex == 2) {
                    formData = new FormData()
                    formData.append('anggota', JSON.stringify(this.model.anggota))
                    for (var pair of formData.entries()) {
                        console.log(pair[0] + ', ' + pair[1]);
                    }
                    axios.post('<?= url_to('entrymember', $id) ?>', formData)
                        .then(data => {
                            window.location = "<?= url_to('entryproses', $id) ?>"
                        })
                        .catch((err) => {
                            console.error(err)
                        })
                } else {
                    window.location = "<?= url_to('entryproses', $id) ?>"
                }
            }

        }
    }).mount('#app')
</script>
<?= $this->endSection() ?>