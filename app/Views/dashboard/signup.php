<?= $this->extend('layout/layout') ?>

<?= $this->section('head') ?>
<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue-demi"></script>
<script src="https://cdn.jsdelivr.net/npm/@vuelidate/core"></script>
<script src="https://cdn.jsdelivr.net/npm/@vuelidate/validators"></script>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="fixed top-0 z-30 py-6 px-10 mx-auto flex space-x-3 justify-center">
    <svg xmlns="http://www.w3.org/2000/svg" width="57" height="18" fill="none" viewBox="0 0 70 22">
        <path fill="#E75A82" d="m0 8.942 10.672-7.423 7.423 10.672-10.672 7.423z" />
        <circle cx="33.096" cy="10.567" r="7" fill="#4D73F8" />
        <path fill="#F5D555" d="m56.244 18.715-3.43-14.317 14.114 4.188-10.684 10.13Z" />
    </svg>
    <span class="merriweather text-sm">Mountcak</span>
</div>
<div id="app" class="min-h-screen w-full bg-white grid lg:grid-cols-2 grid-cols-1">
    <form @submit="submit" class="flex justify-center flex-col mx-auto px-10 lg:px-12 sm:px-36 xl:px-40 w-full relative">
        <div class="flex justify-center items-center mb-8">
            <div class="flex-none w-6 h-6">
                <button v-if="pageIndex > 0" type="button" @click="pageIndex--">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd" d="M11.03 3.97a.75.75 0 010 1.06l-6.22 6.22H21a.75.75 0 010 1.5H4.81l6.22 6.22a.75.75 0 11-1.06 1.06l-7.5-7.5a.75.75 0 010-1.06l7.5-7.5a.75.75 0 011.06 0z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
            <span class="grow text-black text-3xl font-semibold text-center">Create Your Account</span>
            <div class="flex-none w-6 h-6">

            </div>
        </div>
        <div class="flex flex-col space-y-6 relative ">
            <!-- <div class="flex border border-1 border-slate-700 rounded rounded-full space-x-3 py-3 px-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path fill="#020C18" fill-opacity=".7" d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2m8-10a4 4 0 1 0 0-8 4 4 0 0 0 0 8Z" />
                </svg>
                <input type="text" name="nama" id="nama" placeholder="Nama" class="text-black w-full outline-0">
            </div> -->
            <div v-if="pageIndex == 0" class="flex flex-col space-y-6">
                <div class="flex border border-1 border-slate-700 rounded rounded-full space-x-3 py-3 px-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path fill="#020C18" fill-opacity=".7" d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2m8-10a4 4 0 1 0 0-8 4 4 0 0 0 0 8Z" />
                    </svg>
                    <input type="text" v-model="model.username" name="username" id="username" placeholder="Username" class="text-black w-full outline-0">
                </div>
                <div class="flex border border-1 border-slate-700 rounded rounded-full space-x-3 py-3 px-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path fill="#4E555E" d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2Z" />
                        <path fill="#4E555E" d="m22 6-10 7L2 6" />
                        <path stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m22 6-10 7L2 6" />
                    </svg>
                    <input type="text" v-model="model.email" name="email" id="email" placeholder="example@example.com" class="text-black w-full outline-0">
                </div>
            </div>
            <div v-if="pageIndex == 1" class="flex flex-col space-y-6">
                <div class="flex border border-1 border-slate-700 rounded rounded-full space-x-3 py-3 px-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24" class="w-6 h-6">
                        <path fill="#4E555E" fill-opacity=".7" d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2m8-10a4 4 0 1 0 0-8 4 4 0 0 0 0 8Z" />
                    </svg>
                    <input type="text" v-model="model.name" name="name" id="name" placeholder="Full Name" class="text-black w-full outline-0">
                </div>
                <div class="flex border border-1 border-slate-700 rounded rounded-full space-x-3 py-3 px-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd" d="M12 1.5a5.25 5.25 0 00-5.25 5.25v3a3 3 0 00-3 3v6.75a3 3 0 003 3h10.5a3 3 0 003-3v-6.75a3 3 0 00-3-3v-3c0-2.9-2.35-5.25-5.25-5.25zm3.75 8.25v-3a3.75 3.75 0 10-7.5 0v3h7.5z" clip-rule="evenodd" />
                    </svg>

                    <input type="password" v-model="model.password" name="password" id="password" placeholder="Password" class="text-black w-full outline-0">
                </div>
                <div class="flex border border-1 border-slate-700 rounded rounded-full space-x-3 py-3 px-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd" d="M12 1.5a5.25 5.25 0 00-5.25 5.25v3a3 3 0 00-3 3v6.75a3 3 0 003 3h10.5a3 3 0 003-3v-6.75a3 3 0 00-3-3v-3c0-2.9-2.35-5.25-5.25-5.25zm3.75 8.25v-3a3.75 3.75 0 10-7.5 0v3h7.5z" clip-rule="evenodd" />
                    </svg>
                    <input type="password" v-model="model.confpassword" name="confpassword" id="confpassword" placeholder="Confirm password" class="text-black w-full outline-0">
                </div>
            </div>
            <div v-if="pageIndex == 2" class="flex flex-col space-y-6">
                <div class="flex border border-1 border-slate-700 rounded rounded-full space-x-3 py-3 px-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd" d="M1.5 4.5a3 3 0 013-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 01-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 006.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 011.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 01-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5z" clip-rule="evenodd" />
                    </svg>

                    <input type="text" v-model="model.hp" hp="hp" id="hp" placeholder="085123123123" class="text-black w-full outline-0">
                </div>
                <div class="flex border border-1 border-slate-700 rounded rounded-full space-x-3 py-3 px-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path fill="#4E555E" d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2Z" />
                        <path fill="#4E555E" d="m22 6-10 7L2 6" />
                        <path stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m22 6-10 7L2 6" />
                    </svg>
                    <input type="text" v-model="model.alamat" name="alamat" id="alamat" placeholder="Jl. Kenangan No. 123" class="text-black w-full outline-0">
                </div>
            </div>
            <!-- <div class="flex border border-1 border-slate-700 rounded rounded-full space-x-3 py-3 px-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path fill="#020C18" fill-opacity=".7" d="M19 11H5a2 2 0 0 0-2 2v7a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7a2 2 0 0 0-2-2Z" />
                    <path stroke="#020C18" stroke-linecap="round" stroke-linejoin="round" stroke-opacity=".7" stroke-width="2" d="M7 11V7a5 5 0 1 1 10 0v4" />
                </svg>
                <input type="password" name="password" id="password" placeholder="Password" class="text-black w-full outline-0">
            </div>
            <div class="flex border border-1 border-slate-700 rounded rounded-full space-x-3 py-3 px-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path fill="#020C18" fill-opacity=".7" d="M19 11H5a2 2 0 0 0-2 2v7a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7a2 2 0 0 0-2-2Z" />
                    <path stroke="#020C18" stroke-linecap="round" stroke-linejoin="round" stroke-opacity=".7" stroke-width="2" d="M7 11V7a5 5 0 1 1 10 0v4" />
                </svg>
                <input type="password" name="confpassword" id="confpassword" placeholder="Password Confirmation" class="text-black w-full outline-0">
            </div> -->

            <!-- <button type="submit" class="border border-blue-600 w-full rounded rounded-full text-blue-600 py-2 font-semibold text-lg">Next</button> -->
            <!-- <button type="submit" :class="loading ? 'border-blue-200 text-blue-200' : 'border-blue-600 text-blue-600'" class="border w-full rounded rounded-full py-2 font-semibold text-lg transition flex justify-center items-center">
                <svg :class="loading ? '' : 'hidden' " class="animate-spin -ml-1 mr-3 h-5 w-5 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" id="spinner">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                {{pageIndex >= 0 ? "Next" : "Register"}}
            </button> -->
            <button :class="[loading ? 'bg-blue-200' : 'bg-blue-500']" class="w-full rounded rounded-full text-white py-2 font-semibold text-lg transition flex justify-center items-center">
                <svg :class="loading ? '' : 'hidden' " class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" id="spinner">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                {{pageIndex >= 0 && pageIndex < 2 ? "Next" : "Register"}}
            </button>
            <div class="flex flex-col w-full">
                <div class="divider">or sign up with</div>
            </div>
            <div class="flex justify-between px-24">
                <img src="<?= base_url('images/google.png') ?>" alt="" class="w-9 h-9">
                <img src="<?= base_url('images/facebook.png') ?>" alt="" class="w-9 h-9">
                <img src="<?= base_url('images/twitter.png') ?>" alt="" class="w-9 h-9">
            </div>
            <div class="text-center">
                <span class="inter text-black">Already become a member? <a href="<?= base_url('/signin') ?>" class="inter text-blue-500 font-bold">Sign in!</a></span>
            </div>
        </div>
    </form>
    <div class="hidden lg:block">
        <img src="<?= base_url('images/bg_login.png') ?>" alt="" srcset="" class="h-screen w-full object-cover">
    </div>
</div>

<?= $this->endSection() ?>
<?= $this->section('footer') ?>
<script>
    let {
        required,
        email,
        requiredIf,
        helpers
    } = VuelidateValidators
    let {
        useVuelidate
    } = Vuelidate
    const {
        createApp
    } = Vue
    createApp({
        data() {
            return {
                model: {
                    username: "",
                    email: "",
                    name: "",
                    password: "",
                    confpassword: "",
                    hp: "",
                    alamat: ""
                },
                pageIndex: 0,
                loading: false
            }
        },
        mounted() {
            this.model = {
                username: "",
                email: ""
            }
        },
        methods: {
            submit(e) {
                this.loading = true
                if (this.pageIndex == 0) {
                    this.pageIndex++
                    this.loading = false
                } else if (this.pageIndex == 1) {
                    this.pageIndex++
                    this.loading = false
                } else if (this.pageIndex == 2) {
                    const formData = new FormData()
                    formData.append('nama', this.model.name)
                    formData.append('username', this.model.username)
                    formData.append('email', this.model.email)
                    formData.append('password', this.model.password)
                    formData.append('confpassword', this.model.confpassword)
                    formData.append('hp', this.model.hp)
                    formData.append('alamat', this.model.alamat)
                    axios.post('/api/signup', formData, {})
                        .then((res) => {
                            console.log(res)
                            window.location.href = '/signin'
                        })
                        .catch((err) => {
                            console.trace(err)
                            e.preventDefault();
                            e.stopPropagation();
                        })
                    e.preventDefault();
                    e.stopPropagation();
                    this.loading = false
                }
                e.preventDefault();
                e.stopPropagation();
            }
        }
    }).mount('#app')
</script>
<?= $this->endSection() ?>