<div class="drawer">
    <input id="my-drawer-3" type="checkbox" class="drawer-toggle" />
    <div class="sticky top-0">
        
        <div class="drawer-content flex flex-col">
            <!-- Navbar -->
            <div class="navbar bg-base-100">
                <div class="navbar-start">
                    <div class="flex-none lg:hidden">
                        <label for="my-drawer-3" class="btn btn-square btn-ghost">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-6 h-6 stroke-current">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </label>
                    </div>
                    <div class="flex-none lg:block hidden px-2 mx-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="69" height="22" fill="none" viewBox="0 0 69 22">
                            <circle cx="34.681" cy="11.5" r="7" fill="#4D73F8" />
                            <path fill="#E75A82" d="m0 10.376 10.672-7.423 7.423 10.672-10.672 7.423z" />
                            <path fill="#F5D555" d="m55.285 19.149-3.43-14.317 14.113 4.187-10.683 10.13Z" />
                        </svg>
                    </div>
                </div>
                <div class="navbar-center">
                    <ul class="menu menu-horizontal lg:flex hidden">
                        <!-- Navbar menu content here -->
                        <li><a>Home</a></li>
                        <li><a>Tutorial</a></li>
                        <li><a>History</a></li>
                    </ul>
                    <div class="lg:hidden block">
                        <svg xmlns="http://www.w3.org/2000/svg" width="69" height="22" fill="none" viewBox="0 0 69 22">
                            <circle cx="34.681" cy="11.5" r="7" fill="#4D73F8" />
                            <path fill="#E75A82" d="m0 10.376 10.672-7.423 7.423 10.672-10.672 7.423z" />
                            <path fill="#F5D555" d="m55.285 19.149-3.43-14.317 14.113 4.187-10.683 10.13Z" />
                        </svg>
                    </div>
                </div>
                <div class="navbar-end px-2 mx-2">
                    <button class="btn btn-outline btn-primary">Login</button>
                </div>
            </div>
            <!-- Page content here -->
            <?= $this->renderSection('content') ?>
    
        </div>
        <div class="drawer-side">
            <label for="my-drawer-3" class="drawer-overlay"></label>
            <ul class="menu p-4 overflow-y-auto w-80 bg-base-100">
                <!-- Sidebar content here -->
                <li><a>Home</a></li>
                <li><a>Tutorial</a></li>
                <li><a>History</a></li>
    
            </ul>
        </div>
    </div>
</div>