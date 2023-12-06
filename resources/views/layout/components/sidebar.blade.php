<aside id="sidebar" class="sidebar close">
    <div class="logoBox">
        <img src="../assets/images/logo.svg" class="logo longLogo animate__animated animate__zoomIn" alt="logo" />
        <img src="../assets/images/square-logo.svg" class="logo squareLogo animate__animated animate__zoomIn none" alt="logo" />
    </div>
    <nav>
        <ul class="mainMenu" id="mainMenu">
            <li class="menu">
                <a class="nav-link" href="{{url('/dashboard')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="menuIcon" width="24px" height="24px" viewBox="0 0 24 24"  stroke-linecap="round" stroke-linejoin="round" id="home">
                        <path d="M8.98,20.77v-3.06c0-0.78,0.67-1.41,1.5-1.41h3.03c0.4,0,0.78,0.15,1.06,0.41c0.28,0.27,0.44,0.62,0.44,1v3.06
                            c0,0.32,0.13,0.64,0.37,0.87S15.95,22,16.3,22h2.06c0.96,0,1.89-0.36,2.57-1c0.68-0.64,1.07-1.51,1.07-2.42V9.87
                            c0-0.73-0.35-1.43-0.94-1.9l-7.02-5.29c-1.22-0.93-2.97-0.9-4.16,0.07L3.02,7.96c-0.63,0.46-1,1.16-1.02,1.9v8.7
                            C2,20.46,3.63,22,5.64,22h2.02c0.1,0,0.54-0.02,0.92-0.36C8.95,21.3,8.98,20.86,8.98,20.77z"/>
                    </svg>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="menu">
                <a class="nav-link collapsed" data-bs-target="#actoinsMenu" data-bs-toggle="collapse">
                        <svg xmlns="http://www.w3.org/2000/svg" class="menuIcon" width="24px" height="24px" viewBox="0 0 24 24"  stroke-linecap="round" stroke-linejoin="round" id="home">
                        <path d="M8.98,20.77v-3.06c0-0.78,0.67-1.41,1.5-1.41h3.03c0.4,0,0.78,0.15,1.06,0.41c0.28,0.27,0.44,0.62,0.44,1v3.06
                            c0,0.32,0.13,0.64,0.37,0.87S15.95,22,16.3,22h2.06c0.96,0,1.89-0.36,2.57-1c0.68-0.64,1.07-1.51,1.07-2.42V9.87
                            c0-0.73-0.35-1.43-0.94-1.9l-7.02-5.29c-1.22-0.93-2.97-0.9-4.16,0.07L3.02,7.96c-0.63,0.46-1,1.16-1.02,1.9v8.7
                            C2,20.46,3.63,22,5.64,22h2.02c0.1,0,0.54-0.02,0.92-0.36C8.95,21.3,8.98,20.86,8.98,20.77z"/>
                    </svg>
                    <span>Actions</span>
                    <svg class="dropdownArrow" xmlns="http://www.w3.org/2000/svg" height="1em"
                        viewBox="0 0 320 512">
                        <path
                            d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z" />
                    </svg>
                </a>
                <ul id="actoinsMenu" class="nav-content collapse" data-bs-parent="#mainMenu">
                @canany(['pfu-list'])
                    <li class="menu">
                        <a class="nav-link" href="/pfu-list/">
                            <svg xmlns="http://www.w3.org/2000/svg" class="menuIcon" width="24px" height="24px" viewBox="0 0 24 24"  stroke-linecap="round" stroke-linejoin="round" id="home">
                                <path d="M8.98,20.77v-3.06c0-0.78,0.67-1.41,1.5-1.41h3.03c0.4,0,0.78,0.15,1.06,0.41c0.28,0.27,0.44,0.62,0.44,1v3.06
                                    c0,0.32,0.13,0.64,0.37,0.87S15.95,22,16.3,22h2.06c0.96,0,1.89-0.36,2.57-1c0.68-0.64,1.07-1.51,1.07-2.42V9.87
                                    c0-0.73-0.35-1.43-0.94-1.9l-7.02-5.29c-1.22-0.93-2.97-0.9-4.16,0.07L3.02,7.96c-0.63,0.46-1,1.16-1.02,1.9v8.7
                                    C2,20.46,3.63,22,5.64,22h2.02c0.1,0,0.54-0.02,0.92-0.36C8.95,21.3,8.98,20.86,8.98,20.77z"/>
                            </svg>
                            <span>PFU</span>
                        </a>
                    </li>
                    @endcanany
                    @canany(['create-user', 'edit-user', 'delete-user'])
                    <li class="menu">
                        <a class="nav-link" href="/users/">
                            <svg xmlns="http://www.w3.org/2000/svg" class="menuIcon" width="24px" height="24px" viewBox="0 0 24 24"  stroke-linecap="round" stroke-linejoin="round" id="users">
                                <circle class="st0" cx="11.81" cy="6.73" r="3.65"/>
                                <path class="st1" d="M20.94,20.49c-0.3,0.72-1.42,0.53-8.37,0.48c-7.9-0.06-9.19,0.17-9.52-0.64c-0.71-1.76,3.66-7.01,8.76-7.07
                                    C17.12,13.19,21.66,18.75,20.94,20.49z"/>
                            </svg> 
                            <span>Users</span>
                        </a>
                    </li>
                    @endcanany
                    @canany(['create-role', 'edit-role', 'delete-role'])
                    <li class="menu">
                        <a class="nav-link" href="/roles/">
                            <svg xmlns="http://www.w3.org/2000/svg" class="menuIcon" width="24px" height="24px" viewBox="0 0 24 24"  stroke-linecap="round" stroke-linejoin="round" id="users">
                                <circle class="st0" cx="11.81" cy="6.73" r="3.65"/>
                                <path class="st1" d="M20.94,20.49c-0.3,0.72-1.42,0.53-8.37,0.48c-7.9-0.06-9.19,0.17-9.52-0.64c-0.71-1.76,3.66-7.01,8.76-7.07
                                    C17.12,13.19,21.66,18.75,20.94,20.49z"/>
                            </svg> 
                            <span>Roles</span>
                        </a>
                    </li>
                    @endcanany
                    <li class="menu">
                        <a class="nav-link" href="/all-payments/">
                            <svg xmlns="http://www.w3.org/2000/svg" class="menuIcon" width="24px" height="24px" viewBox="0 0 24 24"  stroke-linecap="round" stroke-linejoin="round" id="home">
                                <path d="M8.98,20.77v-3.06c0-0.78,0.67-1.41,1.5-1.41h3.03c0.4,0,0.78,0.15,1.06,0.41c0.28,0.27,0.44,0.62,0.44,1v3.06
                                    c0,0.32,0.13,0.64,0.37,0.87S15.95,22,16.3,22h2.06c0.96,0,1.89-0.36,2.57-1c0.68-0.64,1.07-1.51,1.07-2.42V9.87
                                    c0-0.73-0.35-1.43-0.94-1.9l-7.02-5.29c-1.22-0.93-2.97-0.9-4.16,0.07L3.02,7.96c-0.63,0.46-1,1.16-1.02,1.9v8.7
                                    C2,20.46,3.63,22,5.64,22h2.02c0.1,0,0.54-0.02,0.92-0.36C8.95,21.3,8.98,20.86,8.98,20.77z"/>
                            </svg>
                            <span>Payments</span>
                        </a>
                    </li>
                    <li class="menu">
                        <a class="nav-link" href="/vendors/">
                            <svg xmlns="http://www.w3.org/2000/svg" class="menuIcon" width="24px" height="24px" viewBox="0 0 24 24"  stroke-linecap="round" stroke-linejoin="round" id="home">
                                <path d="M8.98,20.77v-3.06c0-0.78,0.67-1.41,1.5-1.41h3.03c0.4,0,0.78,0.15,1.06,0.41c0.28,0.27,0.44,0.62,0.44,1v3.06
                                    c0,0.32,0.13,0.64,0.37,0.87S15.95,22,16.3,22h2.06c0.96,0,1.89-0.36,2.57-1c0.68-0.64,1.07-1.51,1.07-2.42V9.87
                                    c0-0.73-0.35-1.43-0.94-1.9l-7.02-5.29c-1.22-0.93-2.97-0.9-4.16,0.07L3.02,7.96c-0.63,0.46-1,1.16-1.02,1.9v8.7
                                    C2,20.46,3.63,22,5.64,22h2.02c0.1,0,0.54-0.02,0.92-0.36C8.95,21.3,8.98,20.86,8.98,20.77z"/>
                            </svg>
                            <span>Vendors</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu">
                <a class="nav-link collapsed" data-bs-target="#dailyBasis" data-bs-toggle="collapse">
                    <svg xmlns="http://www.w3.org/2000/svg" class="menuIcon" width="24px" height="24px" viewBox="0 0 24 24"  stroke-linecap="round" stroke-linejoin="round" id="home">
                        <path d="M8.98,20.77v-3.06c0-0.78,0.67-1.41,1.5-1.41h3.03c0.4,0,0.78,0.15,1.06,0.41c0.28,0.27,0.44,0.62,0.44,1v3.06
                            c0,0.32,0.13,0.64,0.37,0.87S15.95,22,16.3,22h2.06c0.96,0,1.89-0.36,2.57-1c0.68-0.64,1.07-1.51,1.07-2.42V9.87
                            c0-0.73-0.35-1.43-0.94-1.9l-7.02-5.29c-1.22-0.93-2.97-0.9-4.16,0.07L3.02,7.96c-0.63,0.46-1,1.16-1.02,1.9v8.7
                            C2,20.46,3.63,22,5.64,22h2.02c0.1,0,0.54-0.02,0.92-0.36C8.95,21.3,8.98,20.86,8.98,20.77z"/>
                    </svg>
                    <span>Daily Basis</span>
                    <svg class="dropdownArrow" xmlns="http://www.w3.org/2000/svg" height="1em"
                        viewBox="0 0 320 512">
                        <path
                            d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z" />
                    </svg>
                </a>
                <ul id="dailyBasis" class="nav-content collapse" data-bs-parent="#mainMenu">
                    <li class="menu">
                        <a class="nav-link" href="/my-bank-balance/">
                            <svg xmlns="http://www.w3.org/2000/svg" class="menuIcon" width="24px" height="24px" viewBox="0 0 24 24"  stroke-linecap="round" stroke-linejoin="round" id="home">
                                <path d="M8.98,20.77v-3.06c0-0.78,0.67-1.41,1.5-1.41h3.03c0.4,0,0.78,0.15,1.06,0.41c0.28,0.27,0.44,0.62,0.44,1v3.06
                                    c0,0.32,0.13,0.64,0.37,0.87S15.95,22,16.3,22h2.06c0.96,0,1.89-0.36,2.57-1c0.68-0.64,1.07-1.51,1.07-2.42V9.87
                                    c0-0.73-0.35-1.43-0.94-1.9l-7.02-5.29c-1.22-0.93-2.97-0.9-4.16,0.07L3.02,7.96c-0.63,0.46-1,1.16-1.02,1.9v8.7
                                    C2,20.46,3.63,22,5.64,22h2.02c0.1,0,0.54-0.02,0.92-0.36C8.95,21.3,8.98,20.86,8.98,20.77z"/>
                            </svg>
                            <span>My Bank Balance</span>
                        </a>
                    </li>
                    <li class="menu">
                        <a class="nav-link" href="/my-ledger-sheet/">
                            <svg xmlns="http://www.w3.org/2000/svg" class="menuIcon" width="24px" height="24px" viewBox="0 0 24 24"  stroke-linecap="round" stroke-linejoin="round" id="home">
                                <path d="M8.98,20.77v-3.06c0-0.78,0.67-1.41,1.5-1.41h3.03c0.4,0,0.78,0.15,1.06,0.41c0.28,0.27,0.44,0.62,0.44,1v3.06
                                    c0,0.32,0.13,0.64,0.37,0.87S15.95,22,16.3,22h2.06c0.96,0,1.89-0.36,2.57-1c0.68-0.64,1.07-1.51,1.07-2.42V9.87
                                    c0-0.73-0.35-1.43-0.94-1.9l-7.02-5.29c-1.22-0.93-2.97-0.9-4.16,0.07L3.02,7.96c-0.63,0.46-1,1.16-1.02,1.9v8.7
                                    C2,20.46,3.63,22,5.64,22h2.02c0.1,0,0.54-0.02,0.92-0.36C8.95,21.3,8.98,20.86,8.98,20.77z"/>
                            </svg>
                            <span>My Ledger Sheet</span>
                        </a>
                    </li>
                    <li class="menu">
                        <a class="nav-link" href="/emp-ledger-sheet/">
                            <svg xmlns="http://www.w3.org/2000/svg" class="menuIcon" width="24px" height="24px" viewBox="0 0 24 24"  stroke-linecap="round" stroke-linejoin="round" id="home">
                                <path d="M8.98,20.77v-3.06c0-0.78,0.67-1.41,1.5-1.41h3.03c0.4,0,0.78,0.15,1.06,0.41c0.28,0.27,0.44,0.62,0.44,1v3.06
                                    c0,0.32,0.13,0.64,0.37,0.87S15.95,22,16.3,22h2.06c0.96,0,1.89-0.36,2.57-1c0.68-0.64,1.07-1.51,1.07-2.42V9.87
                                    c0-0.73-0.35-1.43-0.94-1.9l-7.02-5.29c-1.22-0.93-2.97-0.9-4.16,0.07L3.02,7.96c-0.63,0.46-1,1.16-1.02,1.9v8.7
                                    C2,20.46,3.63,22,5.64,22h2.02c0.1,0,0.54-0.02,0.92-0.36C8.95,21.3,8.98,20.86,8.98,20.77z"/>
                                </svg>
                            <span>EMP Ledger Sheet</span>
                        </a>
                    </li>
                    <li class="menu">
                        <a class="nav-link" href="/invoice-dues/">
                            <svg xmlns="http://www.w3.org/2000/svg" class="menuIcon" width="24px" height="24px" viewBox="0 0 24 24"  stroke-linecap="round" stroke-linejoin="round" id="home">
                                <path d="M8.98,20.77v-3.06c0-0.78,0.67-1.41,1.5-1.41h3.03c0.4,0,0.78,0.15,1.06,0.41c0.28,0.27,0.44,0.62,0.44,1v3.06
                                    c0,0.32,0.13,0.64,0.37,0.87S15.95,22,16.3,22h2.06c0.96,0,1.89-0.36,2.57-1c0.68-0.64,1.07-1.51,1.07-2.42V9.87
                                    c0-0.73-0.35-1.43-0.94-1.9l-7.02-5.29c-1.22-0.93-2.97-0.9-4.16,0.07L3.02,7.96c-0.63,0.46-1,1.16-1.02,1.9v8.7
                                    C2,20.46,3.63,22,5.64,22h2.02c0.1,0,0.54-0.02,0.92-0.36C8.95,21.3,8.98,20.86,8.98,20.77z"/>
                            </svg>
                            <span>My Invoice Dues</span>
                        </a>
                    </li>
                    <li class="menu">
                        <a class="nav-link" href="/vendor/">
                            <svg xmlns="http://www.w3.org/2000/svg" class="menuIcon" width="24px" height="24px" viewBox="0 0 24 24"  stroke-linecap="round" stroke-linejoin="round" id="home">
                                <path d="M8.98,20.77v-3.06c0-0.78,0.67-1.41,1.5-1.41h3.03c0.4,0,0.78,0.15,1.06,0.41c0.28,0.27,0.44,0.62,0.44,1v3.06
                                    c0,0.32,0.13,0.64,0.37,0.87S15.95,22,16.3,22h2.06c0.96,0,1.89-0.36,2.57-1c0.68-0.64,1.07-1.51,1.07-2.42V9.87
                                    c0-0.73-0.35-1.43-0.94-1.9l-7.02-5.29c-1.22-0.93-2.97-0.9-4.16,0.07L3.02,7.96c-0.63,0.46-1,1.16-1.02,1.9v8.7
                                    C2,20.46,3.63,22,5.64,22h2.02c0.1,0,0.54-0.02,0.92-0.36C8.95,21.3,8.98,20.86,8.98,20.77z"/>
                            </svg>
                            <span>Vendor</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu">
                <a class="nav-link collapsed" data-bs-target="#transactionsMenu" data-bs-toggle="collapse"
                    href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" class="menuIcon" width="24px" height="24px" viewBox="0 0 24 24"  stroke-linecap="round" stroke-linejoin="round" id="home">
                        <path d="M8.98,20.77v-3.06c0-0.78,0.67-1.41,1.5-1.41h3.03c0.4,0,0.78,0.15,1.06,0.41c0.28,0.27,0.44,0.62,0.44,1v3.06
                            c0,0.32,0.13,0.64,0.37,0.87S15.95,22,16.3,22h2.06c0.96,0,1.89-0.36,2.57-1c0.68-0.64,1.07-1.51,1.07-2.42V9.87
                            c0-0.73-0.35-1.43-0.94-1.9l-7.02-5.29c-1.22-0.93-2.97-0.9-4.16,0.07L3.02,7.96c-0.63,0.46-1,1.16-1.02,1.9v8.7
                            C2,20.46,3.63,22,5.64,22h2.02c0.1,0,0.54-0.02,0.92-0.36C8.95,21.3,8.98,20.86,8.98,20.77z"/>
                    </svg>
                    <span>Transactions</span>
                    <svg class="dropdownArrow" xmlns="http://www.w3.org/2000/svg" height="1em"
                        viewBox="0 0 320 512">
                        <path
                            d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z" />
                    </svg>
                </a>
                <ul id="transactionsMenu" class="nav-content collapse" data-bs-parent="#mainMenu">
                    <li class="menu">
                        <a class="nav-link" href="/transaction-sheet/">
                            <svg xmlns="http://www.w3.org/2000/svg" class="menuIcon" width="24px" height="24px" viewBox="0 0 24 24"  stroke-linecap="round" stroke-linejoin="round" id="home">
                                <path d="M8.98,20.77v-3.06c0-0.78,0.67-1.41,1.5-1.41h3.03c0.4,0,0.78,0.15,1.06,0.41c0.28,0.27,0.44,0.62,0.44,1v3.06
                                    c0,0.32,0.13,0.64,0.37,0.87S15.95,22,16.3,22h2.06c0.96,0,1.89-0.36,2.57-1c0.68-0.64,1.07-1.51,1.07-2.42V9.87
                                    c0-0.73-0.35-1.43-0.94-1.9l-7.02-5.29c-1.22-0.93-2.97-0.9-4.16,0.07L3.02,7.96c-0.63,0.46-1,1.16-1.02,1.9v8.7
                                    C2,20.46,3.63,22,5.64,22h2.02c0.1,0,0.54-0.02,0.92-0.36C8.95,21.3,8.98,20.86,8.98,20.77z"/>
                            </svg>
                            <span>Transaction Sheet</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>

        <div class="stickyBottom">
            <div class="profileLink">
                <img src="https://img.freepik.com/free-psd/3d-illustration-person-with-sunglasses_23-2149436188.jpg?w=740&t=st=1700133185~exp=1700133785~hmac=2d3641e46cfa7ec7b083745eee090cf7f1c236bd84282c06e33d3117e69d43c8"
                    alt="avatar" />
                <div>
                    <p class="name">{{ Auth::user()->name }}</p>
                    @php
                    $role = optional(Auth::user()->roles->first())->name;
                    @endphp
                    <p class="designation"><span>MA4</span>{{$role}}</p>
                </div>
            </div>

            <ul class="mainMenu">
                <li class="menu">
                    <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <svg xmlns="http://www.w3.org/2000/svg" class="menuIcon" width="24px" height="24px" viewBox="0 0 24 24"  stroke-linecap="round" stroke-linejoin="round" id="home">
                            <polyline class="st0" points="16.53,7.85 20.52,11.84 16.62,15.74 "/>
                            <line class="st0" x1="10.27" y1="11.84" x2="20.52" y2="11.84"/>
                            <path class="st0" d="M10.96,3.32h-3.4c-2.3,0-4.17,1.87-4.17,4.17v9.1c0,2.3,1.87,4.17,4.17,4.17h3.4"/>
                        </svg>
                        <span>Logout</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                </li>
            </ul>
        </div>
    </nav>

    <div class="toggleSidebar forMobile">
        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 320 512">
            <path
                d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z" />
        </svg>
    </div>
</aside>