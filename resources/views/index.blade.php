@include('layout.header')

<div class="page-wrapper">
    <!-- Preloader -->
    <div id="preloader">
        <div class="loader">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>
    <!-- Preloader end-->
    <!-- Sidebar -->
    <div class="sidebar dz-floting-sidebar">
        <div class="sidebar-header">
            <!-- <div class="app-logo"><img class="logo-dark" src="assets/images/app-logo/logo.png" alt="logo"><img class="logo-white d-none" src="assets/images/app-logo/logo-white.png" alt="logo"></div> -->
            <div class="title-bar mb-0">
                <h4 class="title font-w600">Main Menu</h4>
                <a href="javascript:void(0);" class="floating-close">
                    <i class="feather icon-x"></i>
                </a>
            </div>
        </div>
        <ul class="nav navbar-nav">
            <li>
                <a class="nav-link active" href="{{ route('dashboard') }}">
                    <span class="dz-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M3 8.40002V21C3 21.2652 3.10536 21.5196 3.29289 21.7071C3.48043 21.8947 3.73478 22 4 22H20C20.2652 22 20.5196 21.8947 20.7071 21.7071C20.8946 21.5196 21 21.2652 21 21V8.40002C21.0001 8.23638 20.96 8.07523 20.8833 7.93069C20.8066 7.78616 20.6956 7.66265 20.56 7.57102L12.56 2.17102C12.3946 2.05924 12.1996 1.99951 12 1.99951C11.8004 1.99951 11.6054 2.05924 11.44 2.17102L3.44 7.57102C3.30443 7.66265 3.19342 7.78616 3.11671 7.93069C3.03999 8.07523 2.99992 8.23638 3 8.40002V8.40002ZM14 20H10V14H14V20ZM5 8.93202L12 4.20702L19 8.93202V20H16V13C16 12.7348 15.8946 12.4804 15.7071 12.2929C15.5196 12.1054 15.2652 12 15 12H9C8.73478 12 8.48043 12.1054 8.29289 12.2929C8.10536 12.4804 8 12.7348 8 13V20H5V8.93202Z"
                                fill="#BDBDBD" />
                        </svg>
                    </span>
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a class="nav-link" href="{{ route('favorites.index') }}">
                <span class="dz-icon">
                        <i class="fi fi-rr-heart"></i>
                    </span>
                    <span>Favorites</span>
                </a>
            </li>
            <li>
                <a class="nav-link" href="{{ route('meal-history.index') }}">
                    <span class="dz-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M18 1H6C5.20435 1 4.44129 1.31607 3.87868 1.87868C3.31607 2.44129 3 3.20435 3 4V22C3.00004 22.1978 3.05871 22.391 3.1686 22.5555C3.27848 22.7199 3.43465 22.848 3.61735 22.9237C3.80005 22.9993 4.00108 23.0192 4.19503 22.9806C4.38898 22.942 4.56715 22.8468 4.707 22.707L6.845 20.57L8.168 22.554C8.24932 22.678 8.35719 22.7823 8.48379 22.8594C8.61039 22.9365 8.75256 22.9846 8.9 23C9.04735 23.0156 9.19634 22.9979 9.33588 22.948C9.47542 22.8982 9.60193 22.8175 9.706 22.712L12 20.414L14.293 22.707C14.3977 22.8116 14.5242 22.8916 14.6635 22.9413C14.8029 22.9911 14.9515 23.0093 15.0987 22.9947C15.2459 22.98 15.388 22.9329 15.5149 22.8567C15.6417 22.7805 15.75 22.6771 15.832 22.554L17.155 20.57L19.293 22.707C19.4329 22.8468 19.611 22.942 19.805 22.9806C19.9989 23.0192 20.2 22.9993 20.3827 22.9237C20.5654 22.848 20.7215 22.7199 20.8314 22.5555C20.9413 22.391 21 22.1978 21 22V4C21 3.20435 20.6839 2.44129 20.1213 1.87868C19.5587 1.31607 18.7956 1 18 1V1ZM19 19.586L17.707 18.293C17.603 18.1874 17.4765 18.1066 17.337 18.0568C17.1974 18.0069 17.0484 17.9892 16.901 18.005C16.7539 18.0196 16.6119 18.0666 16.4851 18.1427C16.3584 18.2188 16.2501 18.322 16.168 18.445L14.845 20.43L12.707 18.293C12.5195 18.1055 12.2652 18.0002 12 18.0002C11.7348 18.0002 11.4805 18.1055 11.293 18.293L9.155 20.43L7.832 18.445C7.7499 18.322 7.64151 18.2187 7.51467 18.1425C7.38782 18.0664 7.24567 18.0194 7.09846 18.0049C6.95125 17.9903 6.80265 18.0086 6.66337 18.0585C6.52408 18.1083 6.39759 18.1884 6.293 18.293L5 19.586V4C5 3.73478 5.10536 3.48043 5.29289 3.29289C5.48043 3.10536 5.73478 3 6 3H18C18.2652 3 18.5196 3.10536 18.7071 3.29289C18.8946 3.48043 19 3.73478 19 4V19.586Z"
                                fill="#BDBDBD" />
                            <path
                                d="M12 10H8C7.73478 10 7.48043 10.1054 7.29289 10.2929C7.10536 10.4804 7 10.7348 7 11C7 11.2652 7.10536 11.5196 7.29289 11.7071C7.48043 11.8946 7.73478 12 8 12H12C12.2652 12 12.5196 11.8946 12.7071 11.7071C12.8946 11.5196 13 11.2652 13 11C13 10.7348 12.8946 10.4804 12.7071 10.2929C12.5196 10.1054 12.2652 10 12 10Z"
                                fill="#BDBDBD" />
                            <path
                                d="M12 14H8C7.73478 14 7.48043 14.1054 7.29289 14.2929C7.10536 14.4804 7 14.7348 7 15C7 15.2652 7.10536 15.5196 7.29289 15.7071C7.48043 15.8947 7.73478 16 8 16H12C12.2652 16 12.5196 15.8947 12.7071 15.7071C12.8946 15.5196 13 15.2652 13 15C13 14.7348 12.8946 14.4804 12.7071 14.2929C12.5196 14.1054 12.2652 14 12 14Z"
                                fill="#BDBDBD" />
                            <path
                                d="M16 10H15C14.7348 10 14.4804 10.1054 14.2929 10.2929C14.1054 10.4804 14 10.7348 14 11C14 11.2652 14.1054 11.5196 14.2929 11.7071C14.4804 11.8946 14.7348 12 15 12H16C16.2652 12 16.5196 11.8946 16.7071 11.7071C16.8946 11.5196 17 11.2652 17 11C17 10.7348 16.8946 10.4804 16.7071 10.2929C16.5196 10.1054 16.2652 10 16 10Z"
                                fill="#BDBDBD" />
                            <path
                                d="M16 14H15C14.7348 14 14.4804 14.1054 14.2929 14.2929C14.1054 14.4804 14 14.7348 14 15C14 15.2652 14.1054 15.5196 14.2929 15.7071C14.4804 15.8947 14.7348 16 15 16H16C16.2652 16 16.5196 15.8947 16.7071 15.7071C16.8946 15.5196 17 15.2652 17 15C17 14.7348 16.8946 14.4804 16.7071 14.2929C16.5196 14.1054 16.2652 14 16 14Z"
                                fill="#BDBDBD" />
                            <path
                                d="M16 5H8C7.73478 5 7.48043 5.10536 7.29289 5.29289C7.10536 5.48043 7 5.73478 7 6C7 6.26521 7.10536 6.51957 7.29289 6.7071C7.48043 6.89464 7.73478 7 8 7H16C16.2652 7 16.5196 6.89464 16.7071 6.7071C16.8946 6.51957 17 6.26521 17 6C17 5.73478 16.8946 5.48043 16.7071 5.29289C16.5196 5.10536 16.2652 5 16 5Z"
                                fill="#BDBDBD" />
                        </svg>
                    </span>
                    <span>History</span>
                </a>
            </li>
            <li>
                <a class="nav-link" href="{{ route('spoonchat') }}">
                    <span class="dz-icon">
                    <i class="feather icon-message-circle"></i>
                    </span>
                    <span>Chatbot</span>
                </a>
            </li>
            <li>
                <a class="nav-link" href="{{ route('assistant') }}">
                    <span class="dz-icon">
<svg fill="#B0ACB3" height="200px" width="200px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 511 511" xml:space="preserve" stroke="#B0ACB3" stroke-width="13.286000000000001"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M391.5,0c-4.142,0-7.5,3.358-7.5,7.5v120c0,4.687-3.813,8.5-8.5,8.5s-8.5-3.813-8.5-8.5V7.5c0-4.142-3.358-7.5-7.5-7.5 S352,3.358,352,7.5v120c0,4.687-3.813,8.5-8.5,8.5s-8.5-3.813-8.5-8.5V7.5c0-4.142-3.358-7.5-7.5-7.5S320,3.358,320,7.5v120 c0,4.687-3.813,8.5-8.5,8.5s-8.5-3.813-8.5-8.5V7.5c0-4.142-3.358-7.5-7.5-7.5S288,3.358,288,7.5v160 c0,12.958,10.542,23.5,23.5,23.5c4.687,0,8.5,3.813,8.5,8.5v73.409c-13.759,3.374-24,15.806-24,30.591v160 c0,26.191,21.309,47.5,47.5,47.5s47.5-21.309,47.5-47.5v-160c0-14.785-10.241-27.216-24-30.591V199.5c0-4.687,3.813-8.5,8.5-8.5 c12.958,0,23.5-10.542,23.5-23.5V7.5C399,3.358,395.642,0,391.5,0z M376,303.5v160c0,17.92-14.58,32.5-32.5,32.5 S311,481.42,311,463.5v-160c0-9.098,7.402-16.5,16.5-16.5h32C368.598,287,376,294.402,376,303.5z M375.5,176 c-12.958,0-23.5,10.542-23.5,23.5V272h-17v-72.5c0-12.958-10.542-23.5-23.5-23.5c-4.687,0-8.5-3.813-8.5-8.5v-18.097 c2.638,1.027,5.503,1.597,8.5,1.597c6.177,0,11.801-2.399,16-6.31c4.199,3.911,9.823,6.31,16,6.31s11.801-2.399,16-6.31 c4.199,3.911,9.823,6.31,16,6.31c2.997,0,5.862-0.57,8.5-1.597V167.5C384,172.187,380.187,176,375.5,176z"></path> <path d="M183.5,0c-20.479,0-38.826,11.623-51.663,32.728C118.86,54.064,112,84.07,112,119.5c0,25.652,13.894,49.464,36.26,62.144 c7.242,4.105,11.74,12.106,11.74,20.88v70.385c-13.759,3.374-24,15.806-24,30.591v160c0,26.191,21.309,47.5,47.5,47.5 s47.5-21.309,47.5-47.5v-160c0-14.785-10.241-27.216-24-30.591v-70.385c0-8.774,4.499-16.775,11.74-20.88 C241.106,168.964,255,145.152,255,119.5c0-35.43-6.86-65.436-19.837-86.772C222.326,11.623,203.979,0,183.5,0z M216,303.5v160 c0,17.92-14.58,32.5-32.5,32.5S151,481.42,151,463.5v-160c0-9.098,7.402-16.5,16.5-16.5h32C208.598,287,216,294.402,216,303.5z M211.343,168.595C199.412,175.359,192,188.36,192,202.524V272h-17v-69.476c0-14.164-7.412-27.165-19.342-33.929 C137.981,158.574,127,139.762,127,119.5c0-32.68,6.104-59.99,17.653-78.978C154.809,23.826,168.242,15,183.5,15 s28.691,8.826,38.847,25.522C233.896,59.51,240,86.82,240,119.5C240,139.762,229.019,158.574,211.343,168.595z"></path> <path d="M191.5,304c-4.142,0-7.5,3.358-7.5,7.5v16c0,4.142,3.358,7.5,7.5,7.5s7.5-3.358,7.5-7.5v-16 C199,307.358,195.642,304,191.5,304z"></path> <path d="M191.5,352c-4.142,0-7.5,3.358-7.5,7.5v72c0,4.142,3.358,7.5,7.5,7.5s7.5-3.358,7.5-7.5v-72 C199,355.358,195.642,352,191.5,352z"></path> <path d="M351.5,304c-4.142,0-7.5,3.358-7.5,7.5v16c0,4.142,3.358,7.5,7.5,7.5s7.5-3.358,7.5-7.5v-16 C359,307.358,355.642,304,351.5,304z"></path> <path d="M351.5,352c-4.142,0-7.5,3.358-7.5,7.5v72c0,4.142,3.358,7.5,7.5,7.5s7.5-3.358,7.5-7.5v-72 C359,355.358,355.642,352,351.5,352z"></path> </g> </g></svg>                    </span>
                    <span>Assistant</span>
                </a>
            </li>
            <li>
                <a class="nav-link"href="{{ route('profile') }}">
                    <span class="dz-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_329_300)">
                                <path
                                    d="M15.7 11.7171C16.6839 10.9477 17.4031 9.89048 17.7575 8.69283C18.1118 7.49518 18.0836 6.21681 17.6767 5.03597C17.2698 3.85513 16.5046 2.8307 15.4877 2.10553C14.4708 1.38036 13.253 0.990601 12.004 0.990601C10.755 0.990601 9.53719 1.38036 8.52031 2.10553C7.50342 2.8307 6.73819 3.85513 6.33131 5.03597C5.92443 6.21681 5.89619 7.49518 6.25053 8.69283C6.60487 9.89048 7.32413 10.9477 8.308 11.7171C6.44917 12.4567 4.85467 13.7364 3.73027 15.3911C2.60587 17.0458 2.00318 18.9995 2 21.0001V22.0001C2 22.2653 2.10536 22.5196 2.29289 22.7072C2.48043 22.8947 2.73478 23.0001 3 23.0001H21C21.2652 23.0001 21.5196 22.8947 21.7071 22.7072C21.8946 22.5196 22 22.2653 22 22.0001V21.0001C21.9975 19.0004 21.3959 17.0474 20.273 15.3928C19.1501 13.7382 17.5573 12.4579 15.7 11.7171V11.7171ZM8 7.00007C8 6.20895 8.2346 5.43559 8.67412 4.77779C9.11365 4.12 9.73836 3.60731 10.4693 3.30456C11.2002 3.00181 12.0044 2.92259 12.7804 3.07693C13.5563 3.23128 14.269 3.61224 14.8284 4.17165C15.3878 4.73106 15.7688 5.44379 15.9231 6.21971C16.0775 6.99564 15.9983 7.7999 15.6955 8.53081C15.3928 9.26171 14.8801 9.88642 14.2223 10.3259C13.5645 10.7655 12.7911 11.0001 12 11.0001C10.9391 11.0001 9.92172 10.5786 9.17157 9.8285C8.42143 9.07835 8 8.06094 8 7.00007ZM4 21.0001C4 18.8783 4.84285 16.8435 6.34315 15.3432C7.84344 13.8429 9.87827 13.0001 12 13.0001C14.1217 13.0001 16.1566 13.8429 17.6569 15.3432C19.1571 16.8435 20 18.8783 20 21.0001H4Z"
                                    fill="#B0ACB3" />
                            </g>
                            <defs>
                                <clipPath id="clip0_329_300">
                                    <rect width="24" height="24" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                    </span>
                    <span>Profile</span>
                </a>
            </li>
            <li>
                <form action="{{route('logout')}}" method="POST"> @method('POST') @csrf<button type="submit" class="btn mb-2 me-2 btn-outline-danger" >



                        <a class="nav-link">
                            <span class="dz-icon">
                                <!-- <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16.65 3.10008C16.5318 3.04157 16.4033 3.00692 16.2717 2.9981C16.1401 2.98928 16.0081 3.00646 15.8831 3.04866C15.7582 3.09087 15.6428 3.15727 15.5435 3.24407C15.4442 3.33088 15.363 3.43639 15.3045 3.55458C15.246 3.67277 15.2114 3.80132 15.2025 3.9329C15.1937 4.06448 15.2109 4.19652 15.2531 4.32146C15.2953 4.4464 15.3617 4.5618 15.4485 4.66108C15.5353 4.76036 15.6408 4.84157 15.759 4.90008C17.4682 5.74788 18.8405 7.14857 19.6532 8.87467C20.4659 10.6008 20.6712 12.5509 20.2358 14.4084C19.8004 16.2659 18.7499 17.9217 17.2548 19.1069C15.7597 20.292 13.9079 20.937 12 20.937C10.0922 20.937 8.24035 20.292 6.74526 19.1069C5.25018 17.9217 4.19964 16.2659 3.76424 14.4084C3.32885 12.5509 3.53417 10.6008 4.34687 8.87467C5.15956 7.14857 6.5319 5.74788 8.24102 4.90008C8.47972 4.78192 8.6617 4.57379 8.74694 4.32146C8.83217 4.06913 8.81368 3.79327 8.69553 3.55458C8.57737 3.31588 8.36924 3.1339 8.11691 3.04866C7.86458 2.96343 7.58872 2.98192 7.35002 3.10008C5.23724 4.14875 3.54096 5.88079 2.5366 8.01498C1.53223 10.1492 1.27875 12.5602 1.81731 14.8566C2.35587 17.153 3.65485 19.2 5.50334 20.6651C7.35184 22.1302 9.64131 22.9275 12 22.9275C14.3587 22.9275 16.6482 22.1302 18.4967 20.6651C20.3452 19.2 21.6442 17.153 22.1827 14.8566C22.7213 12.5602 22.4678 10.1492 21.4635 8.01498C20.4591 5.88079 18.7628 4.14875 16.65 3.10008V3.10008Z"
                                        fill="#FF8484" />
                                    <path
                                        d="M12 13.0001C12.2652 13.0001 12.5196 12.8948 12.7071 12.7072C12.8947 12.5197 13 12.2654 13 12.0001V2.00012C13 1.73491 12.8947 1.48055 12.7071 1.29302C12.5196 1.10548 12.2652 1.00012 12 1.00012C11.7348 1.00012 11.4804 1.10548 11.2929 1.29302C11.1054 1.48055 11 1.73491 11 2.00012V12.0001C11 12.2654 11.1054 12.5197 11.2929 12.7072C11.4804 12.8948 11.7348 13.0001 12 13.0001Z"
                                        fill="#FF8484" />
                                </svg> -->
                            </span>
                            <span>Log Out</span>
                        </a>
                    </button>
                </form>
            </li>
        </ul>
        <div class="sidebar-bottom">
            <div class="dz-mode">
                <div class="theme-btn">
                    <i class="feather icon-sun sun"></i>
                    <i class="feather icon-moon moon"></i>
                </div>
            </div>
            <div class="app-info">
                <h6 class="name">Smart Bite</h6>
                <span class="ver-info">App Version 1.1</span>
            </div>
        </div>
    </div>
    <!-- Sidebar End -->
    <!-- Nav Floting Start -->
    <div class="dz-nav-floting">
        <!-- Header -->
        <header class="header py-2 mx-auto">
            <div class="header-content">
                <div class="left-content">
                    <div class="info"> @if(Auth::check()) <p class="text m-b10">Hello</p>
                        <h3 class="title">{{ Auth::user()->first_name }}</h3> @else <p class="text m-b10">YOU ARE NOT
                            LOGGED IN.</p> @endif
                    </div>
                </div>
                <div class="mid-content"></div>
                <div class="right-content d-flex align-items-center gap-4">
                <a href="{{ route('spoonchat') }}" class="notification-badge font-20 badge">

                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" id="Bot"><g fill="none" fill-rule="evenodd"><path stroke="#4a4a4a" stroke-linecap="round" d="M7.707 22.293A1 1 0 0 1 6 21.586V20H5a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h15a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2H10l-2.293 2.293z" class="colorStroke4a4a4a svgStroke"></path><path stroke="#4a4a4a" stroke-linecap="square" d="M12.5 6.5v-1" class="colorStroke4a4a4a svgStroke"></path><circle cx="8.5" cy="13.5" r="1.5" fill="#04764e" class="color4a4a4a svgShape"></circle><circle cx="16.5" cy="13.5" r="1.5" fill="#04764e" class="color4a4a4a svgShape"></circle><circle cx="12.5" cy="3.5" r="1.5" stroke="#4a4a4a" class="colorStroke4a4a4a svgStroke"></circle><rect width="4" height="1" x="10.5" y="17.5" stroke="#4a4a4a" rx=".5" class="colorStroke4a4a4a svgStroke"></rect><path stroke="#4a4a4a" stroke-linecap="round" d="M8 17c-1.657 0-3-1.567-3-3.5S6.343 10 8 10h9c1.657 0 3 1.567 3 3.5S18.657 17 17 17" class="colorStroke4a4a4a svgStroke"></path></g></svg>
                    </a>
                   
</a>


                    <a href="javascript:void(0);" class="icon dz-floating-toggler">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect y="2" width="20" height="3" rx="1.5" fill="#5F5F5F" />
                            <rect y="18" width="20" height="3" rx="1.5" fill="#5F5F5F" />
                            <rect x="4" y="10" width="20" height="3" rx="1.5" fill="#5F5F5F" />
                        </svg>
                    </a>
                </div>
            </div>
        </header>
        <!-- Header -->
        <!-- Main Content Start -->
        <main class="page-content bg-white p-b60">
            <div class="container">
                <!-- Overlay Card -->

                <form id="filterForm" action="{{route('dashboard')}}" method="GET">
                    <!-- Search and Filter Container -->
                    <div class="search-filter-container">
                        <!-- SearchBox -->
                        <div class="search-box input-group input-radius input-rounded input-lg">
                            <input type="text" name="search" placeholder="Search beverages or foods" class="form-control">
                            <span class="input-group-text">
                                {{-- <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.65925 19.3102C11.8044 19.3103 13.8882 18.5946 15.5806 17.2764L21.9653 23.6612C22.4423 24.1218 23.2023 24.1086 23.663 23.6316C24.1123 23.1664 24.1123 22.4288 23.663 21.9635L17.2782 15.5788C20.5491 11.3682 19.7874 5.30333 15.5769 2.03243C11.3663 -1.23848 5.30149 -0.476799 2.03058 3.73374C-1.24033 7.94428 -0.478646 14.0092 3.73189 17.2801C5.42702 18.5969 7.51269 19.3113 9.65925 19.3102ZM4.52915 4.5273C7.36245 1.69394 11.9561 1.69389 14.7895 4.5272C17.6229 7.3605 17.6229 11.9542 14.7896 14.7876C11.9563 17.6209 7.36261 17.621 4.52925 14.7877C4.5292 14.7876 4.5292 14.7876 4.52915 14.7876C1.69584 11.9749 1.67915 7.39794 4.49181 4.56464C4.50424 4.55216 4.51667 4.53973 4.52915 4.5273Z" fill="#C9C9C9"/>
                                </svg> --}}
                                <!-- Filter Button -->
                                <button class="btn btn-filter" type="button" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasTop" aria-controls="offcanvasTop">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" fill="white">
                                        <path d="M3 6h18M3 12h18M3 18h18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </button>
                            </span>
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary" style="height: 50px; margin-bottom: 20px; border-radius: 50px;">Search</button>
                    </div>
                    <!-- Filters -->
                    <div class="row" id="contentArea">
                        <div class="col-12">
                            <div class="card-body">
                                <!-- Offcanvas Top -->

                                <div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasTop"
                                    aria-labelledby="offcanvasTopLabel">
                                    <div class="offcanvas-header">
                                        <h5 class="offcanvas-title" id="offcanvasTopLabel">Filter</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                            aria-label="Cancel">
                                            <i class="icon feather icon-x"></i>
                                        </button>
                                    </div>
                                    <div class="offcanvas-body">
                                        <div class="row" id="contentArea">
                                            <div class="col-12">
                                                <div class="card-header"></div>
                                                <div class="card-body">
                                                    <div class="accordion accordion-primary" id="accordion-one">
                                                        <div class="accordion-item">
                                                            <div class="accordion-header collapsed " id="headingOne"
                                                                data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                                                aria-controls="collapseTwo" aria-expanded="true"
                                                                role="button">
                                                                <span class="accordion-header-icon"></span>
                                                                <span class="accordion-header-text">Cuisine</span>
                                                                <span class="accordion-header-indicator"></span>
                                                            </div>
                                                            <div id="collapseOne" class="collapse"
                                                                aria-labelledby="headingOne">
                                                                <div class="accordion-body-text">
                                                                    <div class="row">
                                                                        <div class="column">
                                                                            <div class="radio square-radio">
                                                                                <label class="radio-label">African<input
                                                                                        type="checkbox" name="cuisine[]"
                                                                                        value="African">
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                                <label class="radio-label">Asian<input
                                                                                        type="checkbox" name="cuisine[]"
                                                                                        value="Asian">
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                                <label
                                                                                    class="radio-label">American<input
                                                                                        type="checkbox" name="cuisine[]"
                                                                                        value="American">
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                                <label class="radio-label">British<input
                                                                                        type="checkbox" name="cuisine[]"
                                                                                        value="British">
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                                <label class="radio-label">Cajun<input
                                                                                        type="checkbox" name="cuisine[]"
                                                                                        value="Cajun">
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                                <label
                                                                                    class="radio-label">Caribbean<input
                                                                                        type="checkbox" name="cuisine[]"
                                                                                        value="Caribbean">
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                                <label class="radio-label">Chinese<input
                                                                                        type="checkbox" name="cuisine[]"
                                                                                        value="Chinese">
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                                <label class="radio-label">Eastern
                                                                                    European<input type="checkbox"
                                                                                        name="cuisine[]"
                                                                                        value="Eastern European">
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                                <label
                                                                                    class="radio-label">European<input
                                                                                        type="checkbox" name="cuisine[]"
                                                                                        value="European">
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="column">
                                                                            <div class="radio square-radio">
                                                                                <label class="radio-label">French<input
                                                                                        type="checkbox" name="cuisine[]"
                                                                                        value="French">
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                                <label class="radio-label">German<input
                                                                                        type="checkbox" name="cuisine[]"
                                                                                        value="German">
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                                <label class="radio-label">Greek<input
                                                                                        type="checkbox" name="cuisine[]"
                                                                                        value="Greek">
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                                <label class="radio-label">Indian<input
                                                                                        type="checkbox" name="cuisine[]"
                                                                                        value="Indian">
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                                <label class="radio-label">Irish<input
                                                                                        type="checkbox" name="cuisine[]"
                                                                                        value="Irish">
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                                <label class="radio-label">Italian<input
                                                                                        type="checkbox" name="cuisine[]"
                                                                                        value="Italian">
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                                <label
                                                                                    class="radio-label">Japanese<input
                                                                                        type="checkbox" name="cuisine[]"
                                                                                        value="Japanese">
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                                <label class="radio-label">Jewish<input
                                                                                        type="checkbox" name="cuisine[]"
                                                                                        value="Jewish">
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                                </label>
                                                                                <label class="radio-label">Korean<input
                                                                                        type="checkbox" name="cuisine[]"
                                                                                        value="Korean">
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="column">
                                                                            <div class="radio square-radio">

                                                                                <label class="radio-label">Latin
                                                                                    American<input type="checkbox"
                                                                                        name="cuisine[]"
                                                                                        value="Latin American">
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                                <label
                                                                                    class="radio-label">Mediterranean<input
                                                                                        type="checkbox" name="cuisine[]"
                                                                                        value="Mediterranean">
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                                <label class="radio-label">Mexican<input
                                                                                        type="checkbox" name="cuisine[]"
                                                                                        value="Mexican">
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                                <label class="radio-label">Middle
                                                                                    Eastern<input type="checkbox"
                                                                                        name="cuisine[]"
                                                                                        value="Middle Eastern">
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                                <label class="radio-label">Nordic<input
                                                                                        type="checkbox" name="cuisine[]"
                                                                                        value="Nordic">
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                                </label>
                                                                                <label
                                                                                    class="radio-label">Southern<input
                                                                                        type="checkbox" name="cuisine[]"
                                                                                        value="Southern">
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                                <label class="radio-label">Spanish<input
                                                                                        type="checkbox" name="cuisine[]"
                                                                                        value="Spanish">
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                                <label class="radio-label">Thai<input
                                                                                        type="checkbox" name="cuisine[]"
                                                                                        value="Thai">
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                                </label>
                                                                                <label
                                                                                    class="radio-label">Vietnamese<input
                                                                                        type="checkbox" name="cuisine[]"
                                                                                        value="Vietnamese">
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion accordion-primary" id="accordion-two">
                                                        <div class="accordion-item">
                                                            <div class="accordion-header collapsed " id="headingTwo"
                                                                data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                                aria-controls="collapseTwo" role="button"
                                                                aria-expanded="true">
                                                                <span class="accordion-header-text">Diet</span>
                                                                <span class="accordion-header-indicator"></span>
                                                            </div>
                                                            <div id="collapseTwo" class="collapse"
                                                                aria-labelledby="headingTwo"
                                                                data-bs-parent="#accordion-one">
                                                                <div class="accordion-body-text">
                                                                    <div class="row">
                                                                        <div class="column">
                                                                            <div class="radio square-radio">
                                                                                <h4>
                                                                                    <br>
                                                                                </h4>
                                                                                <label class="radio-label">Gluten
                                                                                    Free<input type="checkbox"
                                                                                        name="diet[]"
                                                                                        value="Gluten Free">
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                                <label
                                                                                    class="radio-label">Ketogenic<input
                                                                                        type="checkbox" name="diet[]"
                                                                                        value="Ketogenic">
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                                <label
                                                                                    class="radio-label">Vegetarian<input
                                                                                        type="checkbox" name="diet[]"
                                                                                        value="Vegetarian">
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                                <label
                                                                                    class="radio-label">Lacto-Vegetarian<input
                                                                                        type="checkbox" name="diet[]"
                                                                                        value="Lacto-Vegetarian">
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="column">
                                                                            <div class="radio square-radio">
                                                                                <h4>
                                                                                    <br>
                                                                                </h4>
                                                                                <label
                                                                                    class="radio-label">Ovo-Vegetarian<input
                                                                                        type="checkbox" name="diet[]"
                                                                                        value="Ovo-Vegetarian">
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                                <label class="radio-label">Vegan<input
                                                                                        type="checkbox" name="diet[]"
                                                                                        value="Vegan">
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                                <label
                                                                                    class="radio-label">Pescetarian<input
                                                                                        type="checkbox" name="diet[]"
                                                                                        value="Pescetarian">
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                                <label class="radio-label">Paleo<input
                                                                                        type="checkbox" name="diet[]"
                                                                                        value="Paleo">
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="column">
                                                                            <div class="radio square-radio">
                                                                                <h4>
                                                                                    <br>
                                                                                </h4>
                                                                                <label class="radio-label">Primal<input
                                                                                        type="checkbox" name="diet[]"
                                                                                        value="Primal">
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                                <label class="radio-label">Low
                                                                                    FODMAP<input type="checkbox"
                                                                                        name="diet[]"
                                                                                        value="Low FODMAP">
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                                <label class="radio-label">Whole30<input
                                                                                        type="checkbox" name="diet[]"
                                                                                        value="Whole30">
                                                                                    <span class="checkmark"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion accordion-primary" id="accordion-three">
                                                        <div class="accordion-item">
                                                            <div class="accordion-header collapsed " id="headingThree"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#collapseThree"
                                                                aria-controls="collapseThree" role="button"
                                                                aria-expanded="true">
                                                                <span class="accordion-header-text">Type</span>
                                                                <span class="accordion-header-indicator"></span>
                                                            </div>
                                                            <div id="collapseThree" class="collapse"
                                                                aria-labelledby="headingThree"
                                                                data-bs-parent="#accordion-one">
                                                                <div class="accordion-body-text">
                                                                    <div class="row">
                                                                        <div class="column">
                                                                            <div class="radio square-radio">
                                                                                <h4>
                                                                                    <br>
                                                                                </h4>
                                                                                <label class="radio-label">Main
                                                                                    Course<input type="checkbox"
                                                                                        name="radio1[]"
                                                                                        typeue="main course">
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                                <label class="radio-label">Side
                                                                                    Dish<input type="checkbox"
                                                                                        name="radio1[]"
                                                                                        typeue="side dish">
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                                <label class="radio-label">Dessert<input
                                                                                        type="checkbox" name="type[]"
                                                                                        value="dessert">
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                                <label
                                                                                    class="radio-label">Appetizer<input
                                                                                        type="checkbox" name="type[]"
                                                                                        value="appetizer">
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                                <label class="radio-label">Salad<input
                                                                                        type="checkbox" name="type[]"
                                                                                        value="salad">
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="column">
                                                                            <div class="radio square-radio">
                                                                                <h4>
                                                                                    <br>
                                                                                </h4>
                                                                                <label class="radio-label">Bread<input
                                                                                        type="checkbox" name="type[]"
                                                                                        value="bread">
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                                <label
                                                                                    class="radio-label">Breakfast<input
                                                                                        type="checkbox" name="type[]"
                                                                                        value="breakfast">
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                                <label class="radio-label">Soup<input
                                                                                        type="checkbox" name="type[]"
                                                                                        value="soup">
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                                <label
                                                                                    class="radio-label">Beverage<input
                                                                                        type="checkbox" name="type[]"
                                                                                        value="beverage">
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                                <label class="radio-label">Sauce<input
                                                                                        type="checkbox" name="type[]"
                                                                                        value="sauce">
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="column">
                                                                            <div class="radio square-radio">
                                                                                <h4>
                                                                                    <br>
                                                                                </h4>
                                                                                <label
                                                                                    class="radio-label">Marinade<input
                                                                                        type="checkbox" name="type[]"
                                                                                        value="marinade">
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                                <label
                                                                                    class="radio-label">Fingerfood<input
                                                                                        type="checkbox" name="type[]"
                                                                                        value="fingerfood">
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                                <label class="radio-label">Snack<input
                                                                                        type="checkbox" name="type[]"
                                                                                        value="snack">
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                                <label class="radio-label">Drink<input
                                                                                        type="checkbox" name="type[]"
                                                                                        value="drink">
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- Page Content Start -->
                <style>
                    .column {
                        float: left;
                        width: 33.33%;
                    }

                    /* Clear floats after the columns */
                    .row:after {
                        content: "";
                        display: table;
                        clear: both;
                    }
                    .search-filter-container {
                        display: flex;
                        align-items: center;
                        gap: 10px; /* Adjust the gap between the search box and filter button */
                    }

                    .search-box {
                        flex-grow: 1;
                    }

                    .btn-filter {
                        padding: 5px 10px; /* Smaller padding */
                        color: #000;
                        border: none;
                        border-radius: 50%; /* Rounded button */
                        cursor: pointer;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        height: 50px;
                        width: 50px;
                    }

                    .btn-filter svg {
                        width: 16px; /* Smaller icon size */
                        height: 16px;
                    }

                    .offcanvas-top {
                        top: 0;
                        height: auto; /* Adjust height if needed */
                        max-height: 100%; /* Ensure the offcanvas does not exceed the viewport height */
                    }

                    .input-group {
                        border-radius: 50px; /* Rounded corners for the search box */
                        overflow: hidden; /* Ensure the border radius is applied correctly */
                    }

                    .input-group .form-control {
                        border-top-left-radius: 50px;
                        border-bottom-left-radius: 50px;
                    }

                    .input-group .input-group-text {
                        border-top-right-radius: 50px;
                        border-bottom-right-radius: 50px;
                    }
                </style>
                <div class="title-bar">
                    <h5 class="title">Recipes</h5>
                </div>
                <ul class="featured-list">
                    @if($recipes->count() > 0)
                    @foreach ($recipes as $result)
                    <li>
                        <div class="dz-card list">
                            <div class="dz-media">

                                <img src="{{ $result['image'] }}" alt="{{ $result['title'] }}">
                                </a>
                            </div>
                            <div class="dz-content">
                                <div class="dz-head"
                                    style="display: flex; justify-content: space-between; align-items: center;">
                                    <div style="flex: 1;">
                                        <h6 class="title" style="margin: 0;">
                                            <form id="recipeForm{{ $result['id'] }}"
                                                action="{{ route('dashboard.recipe', ['id' => $result['id']]) }}"
                                                method="POST" style="display: none;">
                                                @csrf
                                                <input type="hidden" name="calories"
                                                    value="{{ $result['nutrition']['nutrients'][0]['amount'] }}">
                                            </form>
                                            <a href="#"
                                                onclick="document.getElementById('recipeForm{{ $result['id'] }}').submit(); return false;">{{
                                                $result['title'] }}</a>
                                        </h6>
                                        @if(isset($result['nutrition']['nutrients'][0]['amount']))
                                        {{ $result['nutrition']['nutrients'][0]['amount'] }}
                                        @endif
                                    </div>
                                    <div>
                                    @php
$userFavorites = Auth::user()->favorites->pluck('recipe_id')->toArray();
@endphp


                    <i class="heart-icon fa fa-heart{{ in_array($result['id'], $userFavorites) ? ' active' : '' }}" style="margin-left:20px; color: {{ in_array($result['id'], $userFavorites) ? 'red' : 'black' }};"
                        data-recipe-id="{{ $result['id'] }}"
                        data-calories="{{ $result['nutrition']['nutrients'][0]['amount'] }}"></i>
                </div>
            </div>
        </div>
    </div>
</li>
@endforeach

                    @else
                    <p>No recipes found.</p>
                    @endif
                </ul>

                {{ $recipes->links('pagination::bootstrap-4') }}

                <script>
                    document.querySelectorAll('.heart-icon').forEach(icon => {
                        icon.addEventListener('click', function() {
                            const recipeId = this.getAttribute('data-recipe-id');
                            const token = '{{ csrf_token() }}';

                            if (this.classList.contains('active')) {
                                fetch(`/favorites/${recipeId}`, {
                                    method: 'DELETE',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': token
                                    }
                                })
                                .then(response => {
                                    if (response.ok) {
                                        this.classList.remove('active');
                                        this.style.color = 'black';
                                    }
                                })
                                .catch(error => console.error('Error:', error));
                            } else {
                                const calories = this.getAttribute('data-calories'); // Retrieve calories attribute value
                                fetch(`/favorites`, {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': token
                                    },
                                    body: JSON.stringify({
                                        recipe_id: recipeId,
                                        calories: calories // Pass the retrieved calories value
                                    })
                                })
                                .then(response => {
                                    if (response.ok) {
                                        this.classList.add('active');
                                        this.style.color = 'red';
                                    }
                                })
                                .catch(error => console.error('Error:', error));
                            }
                        });
                    });
                </script>

                <!-- Featured Beverages -->
            </div>
        </main>
        <!-- Main Content End -->

        @include('layout.menu-bar')

    </div>
    <!-- Nav Floting End -->
    <!-- Modal -->
    <div class="modal fade dz-pwa-modal" id="pwaModal" tabindex="-1" aria-labelledby="pwaModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <a href="javascript:void(0);" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="feather icon-x"></i>
                </a>
                <img class="logo dark" src="assets/images/app-logo/logo.png" alt="">
                <img class="logo light" src="assets/images/app-logo/logo-white.png" alt="">
                <h5 class="title">Smart Bite</h5>
                <p class="pwa-text">Install "Smart Bite" to your home screen for easy access,
                    just like any other app</p>
                <button type="button" class="btn pwa-btn">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M12 16.0001V13.0001M12 13.0001V10.0001M12 13.0001H9M12 13.0001H15M4 16.8002V11.4522C4 10.9179 4 10.6506 4.06497 10.4019C4.12255 10.1816 4.2173 9.97307 4.34521 9.78464C4.48955 9.57201 4.69064 9.39569 5.09277 9.04383L9.89436 4.84244C10.6398 4.19014 11.0126 3.86397 11.4324 3.73982C11.8026 3.63035 12.1972 3.63035 12.5674 3.73982C12.9875 3.86406 13.3608 4.19054 14.1074 4.84383L18.9074 9.04383C19.3096 9.39569 19.5102 9.57201 19.6546 9.78464C19.7825 9.97307 19.8775 10.1816 19.9351 10.4019C20 10.6505 20 10.9184 20 11.4522V16.8037C20 17.9216 20 18.4811 19.7822 18.9086C19.5905 19.2849 19.2842 19.5906 18.9079 19.7823C18.4805 20.0001 17.9215 20.0001 16.8036 20.0001H7.19691C6.07899 20.0001 5.5192 20.0001 5.0918 19.7823C4.71547 19.5906 4.40973 19.2849 4.21799 18.9086C4 18.4807 4 17.9203 4 16.8002Z"
                            stroke="#03764D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <span>Add to Home Screen</span>
                </button>
            </div>
        </div>
    </div>
    <!-- PWA End -->
</div>
@include('layout.script')
<!-- Swiper -->
<script src="{{ asset('index.js') }}"></script>


</body>

</html>
