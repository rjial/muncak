<?= $this->extend('layout/layout') ?>

<?= $this->section('head') ?>

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
<div class="h-screen w-full bg-white grid lg:grid-cols-2 grid-cols-1">
    <div class="flex justify-center flex-col mx-auto px-10 lg:px-16 sm:px-40 xl:px-44 w-full">
        <span class="text-black text-3xl font-semibold mb-8 text-center">Create Your Account</span>
        <div class="flex flex-col space-y-6">
            <div class="flex border border-1 border-slate-700 rounded rounded-full space-x-3 py-3 px-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path fill="#020C18" fill-opacity=".7" d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2m8-10a4 4 0 1 0 0-8 4 4 0 0 0 0 8Z" />
                </svg>
                <input type="text" name="nama" id="nama" placeholder="Nama" class="text-black w-full outline-0">
            </div>
            <div class="flex border border-1 border-slate-700 rounded rounded-full space-x-3 py-3 px-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path fill="#020C18" fill-opacity=".7" d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2m8-10a4 4 0 1 0 0-8 4 4 0 0 0 0 8Z" />
                </svg>
                <input type="text" name="username" id="username" placeholder="Username" class="text-black w-full outline-0">
            </div>
            <div class="flex border border-1 border-slate-700 rounded rounded-full space-x-3 py-3 px-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path fill="#4E555E" d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2Z" />
                    <path fill="#4E555E" d="m22 6-10 7L2 6" />
                    <path stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m22 6-10 7L2 6" />
                </svg>
                <input type="text" name="email" id="email" placeholder="example@example.com" class="text-black w-full outline-0">
            </div>
            <div class="flex border border-1 border-slate-700 rounded rounded-full space-x-3 py-3 px-4">
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
            </div>
            <button class="bg-blue-600 w-full rounded rounded-full text-white py-2 font-semibold text-lg">Sign Up</button>
            <div class="relative">
                <hr class="bg-gray-600" />
                <span class="absolute -top-3 text-gray-600 inset-x-1/2 w-fit text-center -translate-x-1/2 bg-white px-1.5">or sign up with</span>
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
    </div>
    <div class="hidden lg:block">
        <img src="<?= base_url('images/bg_login.png') ?>" alt="" srcset="" class="h-screen w-full object-cover">
    </div>
</div>

<?= $this->endSection() ?>