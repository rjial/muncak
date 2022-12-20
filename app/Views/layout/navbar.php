<div class="navbar fixed top-0 z-30 transition duration-300 ease-in-out" id="navbar">
    <div class="navbar-start">
        <div class="dropdown">
            <label tabindex="0" class="btn btn-ghost lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                </svg>
            </label>
            <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                <li><a href="<?= url_to('Home::index') ?>">Home</a></li>
                <?php if (isLogged()) : ?>
                    <li><a>Dashboard</a></li>
                <?php endif; ?>
                <li><a>Tutorial</a></li>
                <li><a>Check Booking</a></li>
                <li><a href="<?= url_to('sop') ?>">SOP</a></li>
            </ul>
        </div>
        <div class="px-2 mx-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="69" height="22" fill="none" viewBox="0 0 69 22">
                <circle cx="34.681" cy="11.5" r="7" fill="#4D73F8" />
                <path fill="#E75A82" d="m0 10.376 10.672-7.423 7.423 10.672-10.672 7.423z" />
                <path fill="#F5D555" d="m55.285 19.149-3.43-14.317 14.113 4.187-10.683 10.13Z" />
            </svg>
        </div>
    </div>
    <div class="navbar-center hidden lg:flex">
        <ul class="menu menu-horizontal p-0">
            <li><a href="<?= url_to('Home::index') ?>">Home</a></li>
            <?php if (isLogged()) : ?>
                <li><a href="<?= url_to('dashboard') ?>">Dashboard</a></li>
            <?php endif; ?>
            <li><a>Tutorial</a></li>
            <li><a>Check Booking</a></li>
            <li><a href="<?= url_to('sop') ?>">SOP</a></li>
            <li><a href="<?= url_to('history') ?>">History</a></li>
        </ul>
    </div>
    <div class="navbar-end px-2 mx-2">
        <?php if (isLogged()) : ?>
            <!-- <div class="dropdown">
                <div class="btn flex items-center space-x-3">
                    <img class="h-7 rounded-full border border-1 border-black" src="<?= base_url('images/placeholder.jpg') ?>" alt="">
                    <span><?= getAuth()->username ?></span>
                </div>
                <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52">
                    <li><a>Item 1</a></li>
                    <li><a>Item 2</a></li>
                </ul>
            </div> -->
            <div class="dropdown dropdown-end">
                <div tabindex="0" class="flex items-center space-x-3 cursor-pointer">
                    <img class="h-7 rounded-full border border-1 border-black" src="<?= base_url('images/placeholder.jpg') ?>" alt="">
                    <span><?= empty(getAuth()->nama) ? getAuth()->username : getAuth()->nama ?></span>
                </div>
                <ul tabindex="0" class="dropdown-content menu mt-4 p-2 shadow bg-base-100 rounded-box w-52">
                    <li><a>Profile</a></li>
                    <li><a href="<?= url_to('logout') ?>">Logout</a></li>
                </ul>
            </div>
        <?php else : ?>
            <a href="<?= url_to('signin') ?>" class="outline outline-2 outline-blue-700 py-2 px-4 text-blue-700 text-sm">Login</a>
        <?php endif; ?>

    </div>
</div>