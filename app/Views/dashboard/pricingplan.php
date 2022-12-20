<?= $this->extend('layout/layout') ?>

<?= $this->section('head') ?>
<script src="<?= base_url('js/home.js') ?>" defer></script>
<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?= $this->include('layout/navbar') ?>

<!-- container -->
<div id="app" class="px-16 py-28 flex flex-col items-center">
    <!-- title -->
    <div class="flex flex-col items-center gap-y-4 mb-20 ">
        <div class="poppins font-bold text-3xl text-slate-700">Pricing Plan</div>
        <div class="self-stretch mx-10 h-0 border-2 border-solid border-blue-400 rounded-full"></div>
    </div>
    <!-- content -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 w-full poppins mx-auto">
        <div class=" border border-gray-400 text-black rounded-md" v-for="card in 3">
            <div class="p-5 flex flex-col gap-y-6 border-b border-gray-400">
                <span class="block font-medium text-blue-600">Free</span>
                <span class="block text-xl"><b class="text-4xl font-bold">Rp0</b>/hiking</span>
                <button class="bg-blue-500 text-white block px-6 py-3 rounded-md">Buy Now</button>
            </div>
            <div class="p-5 flex flex-col gap-y-4">
                <span class="font-medium">What's included :</span>
                <div class="flex gap-x-3 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="16" fill="none" viewBox="0 0 23 16">
                        <path stroke="#5CDB5C" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.4" d="M21.003 1.201 7.802 14.403 1.8 8.402" />
                    </svg>
                    <span class="text-gray-600">Lorem ipsum</span>
                </div>
                <div class="flex gap-x-3 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="16" fill="none" viewBox="0 0 23 16">
                        <path stroke="#5CDB5C" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.4" d="M21.003 1.201 7.802 14.403 1.8 8.402" />
                    </svg>
                    <span class="text-gray-600">Lorem ipsum</span>
                </div>
                <div class="flex gap-x-3 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="16" fill="none" viewBox="0 0 23 16">
                        <path stroke="#5CDB5C" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.4" d="M21.003 1.201 7.802 14.403 1.8 8.402" />
                    </svg>
                    <span class="text-gray-600">Lorem ipsum</span>
                </div>
            </div>
        </div>
        
    </div>
    <div class="mx-auto mt-10">
        <a href="#" class="btnt btn-ghost px-6 py-3 rounded-md uppercase text-blue-500 font-bold">Skip Continue To Payment</a>
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

            }
        },
        methods: {}
    }).mount('#app')
</script>
<?= $this->endSection() ?>