<?= $this->extend('layout/layout') ?>

<?= $this->section('head') ?>

<!-- <script src="<?= base_url('js/login.js') ?>" defer></script> -->
<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div id="app">

    <div class="fixed top-0 z-30 py-6 px-10 mx-auto flex space-x-3 justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="57" height="18" fill="none" viewBox="0 0 70 22">
            <path fill="#E75A82" d="m0 8.942 10.672-7.423 7.423 10.672-10.672 7.423z" />
            <circle cx="33.096" cy="10.567" r="7" fill="#4D73F8" />
            <path fill="#F5D555" d="m56.244 18.715-3.43-14.317 14.114 4.188-10.684 10.13Z" />
        </svg>
        <span class="merriweather text-sm">Mountcak</span>
    </div>
    <!-- <div class="fixed top-10 right-10 z-40">
        <div id="toast-success" class="flex items-center p-4 mb-4 w-full max-w-xs text-gray-500 bg-white rounded-lg shadow space-x-3">
            <div class="inline-flex flex-shrink-0 justify-center items-center w-8 h-8 text-green-500 bg-green-100 rounded-lg ">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="ml-3 text-sm font-normal">Item moved successfully.</div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 " data-dismiss-target="#toast-success" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
    </div> -->
    <div class="h-screen w-full bg-white grid lg:grid-cols-2 grid-cols-1">
        <div class="flex justify-center flex-col mx-auto px-10 lg:px-16 sm:px-40 xl:px-44 w-full">
            <span class="text-black text-3xl font-semibold mb-8 text-center">Sign In</span>
            <form @submit="login" id="form-login" class="flex flex-col space-y-6">
                <div class="flex border border-1 border-slate-700 rounded rounded-full space-x-3 py-3 px-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path fill="#4E555E" d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2Z" />
                        <path fill="#4E555E" d="m22 6-10 7L2 6" />
                        <path stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m22 6-10 7L2 6" />
                    </svg>
                    <input v-model="email" type="text" name="email" id="email" placeholder="example@gmail.com" class="text-black w-full outline-0">
                </div>
                <div class="flex border border-1 border-slate-700 rounded rounded-full space-x-3 py-3 px-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path fill="#020C18" fill-opacity=".7" d="M19 11H5a2 2 0 0 0-2 2v7a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7a2 2 0 0 0-2-2Z" />
                        <path stroke="#020C18" stroke-linecap="round" stroke-linejoin="round" stroke-opacity=".7" stroke-width="2" d="M7 11V7a5 5 0 1 1 10 0v4" />
                    </svg>
                    <input v-model="password" type="password" name="password" id="password" placeholder="Password" class="text-black w-full outline-0">
                </div>
                <button :class="loading ? 'bg-blue-200' : 'bg-blue-500'" class="w-full rounded rounded-full text-white py-2 font-semibold text-lg transition flex justify-center items-center">
                    <svg :class="loading ? '' : 'hidden' " class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" id="spinner">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Sign In
                </button>
                <div class="flex items-center justify-center">
                    <hr class="bg-gray-600 flex-1" />
                    <span class="shrink-0 text-gray-600 text-center bg-white px-3">or sign in with</span>
                    <hr class="bg-gray-600 flex-1" />
                </div>
                <div class="flex justify-between px-24">
                    <img src="<?= base_url('images/google.png') ?>" alt="" class="w-9 h-9">
                    <img src="<?= base_url('images/facebook.png') ?>" alt="" class="w-9 h-9">
                    <img src="<?= base_url('images/twitter.png') ?>" alt="" class="w-9 h-9">
                </div>
                <div class="text-center">
                    <span class="inter text-black">Not a member? <a href="<?= base_url('/signup') ?>" class="inter text-blue-500 font-bold">Sign up!</a></span>
                </div>
            </form>
        </div>
        <div class="hidden lg:block">
            <img src="<?= base_url('images/bg_login.png') ?>" alt="" srcset="" class="h-screen w-full object-cover">
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
                email: "",
                password: "",
                loading: false
            }
        },
        methods: {
            login(e) {
                this.switchLoading()
                console.log(this.email + " " + this.password)
                const payload = {
                    email: this.email,
                    password: this.password
                }
                axios.post('/api/signin', payload)
                    .then((data) => {
                        this.switchLoading()
                        Cookies.set('jwt', data.data.Token, {expires: 365})
                        window.location.href = '/dashboard'
                    })
                    .catch((error) => {
                        this.switchLoading()
                    })
                e.preventDefault();
            },
            switchLoading() {
                this.loading = !this.loading
            }
        }
    }).mount('#app')
</script>
<?= $this->endSection() ?>