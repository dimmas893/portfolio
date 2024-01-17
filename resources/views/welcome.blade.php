<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Primary Meta Tags -->
    <title>Ananda Dimmas Budiarto</title>
    <meta name="title" content="Portfolio Template - Open source" />
    <meta name="description"
        content="Build or customize your portfolio website using this super easy template. Free to use if you are a member of the community or a contributor to this project" />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://github.com/CommunityPro/portfolio-html" />
    <meta property="og:title" content="Portfolio Template - Open source" />
    <meta property="og:description"
        content="Build or customize your portfolio website using this super easy template. Free to use if you are a member of the community or a contributor to this project" />
    <meta property="og:image"
        content="https://user-images.githubusercontent.com/62628408/150613011-b78a7f5a-0af1-4312-aab0-0022e7258693.png" />

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:url" content="https://github.com/CommunityPro/portfolio-html" />
    <meta property="twitter:title" content="Portfolio Template - Open source" />
    <meta property="twitter:description"
        content="Build or customize your portfolio website using this super easy template. Free to use if you are a member of the community or a contributor to this project" />
    <meta property="twitter:image"
        content="https://user-images.githubusercontent.com/62628408/150613011-b78a7f5a-0af1-4312-aab0-0022e7258693.png" />

    <!-- Link -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('fe/assets/favicon/apple-touch-icon.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('fe/assets/favicon/favicon-16x16.png') }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('fe/assets/favicon/favicon-32x32.png') }}" />
    <link rel="icon" type="image/png" sizes="192x192"
        href="{{ asset('fe/assets/favicon/android-chrome-192x192.png') }}" />
    <link rel="icon" type="image/png" sizes="512x512"
        href="{{ asset('fe/assets/favicon/android-chrome-512x512.png') }}" />
    <link rel="icon" type="image/x-icon" href="{{ asset('fe/assets/favicon/favicon.ico') }}" />
    <link rel="manifest" href="{{ asset('fe/assets/favicon/site.webmanifest') }}" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('fe/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('fe/css/utilities.css') }}" />
    <style>
        .pagination {
            display: flex;
            list-style: none;
            padding: 0;
        }

        .page-item {
            margin: 0 5px;
        }

        .page-link {
            color: #373e45;
            text-decoration: none;
            padding: 8px 16px;
            border: 1px solid #46515c;
            border-radius: 4px;
            cursor: pointer;
        }

        .page-link:hover {
            background-color: #000000;
            color: #fff;
        }

        .page-item.active .page-link {
            background-color: #000000;
            color: #fff;
            border: 1px solid #000000;
        }

        .page-item.disabled .page-link {
            color: #6c757d;
            pointer-events: none;
            cursor: not-allowed;
        }

        /* Dark Mode Styles */
        [data-theme="dark"] .pagination .page-link {
            color: #17a2b8;
            /* Adjust color for dark mode */
            border-color: #17a2b8;
            /* Adjust border color for dark mode */
        }

        [data-theme="dark"] .pagination .page-link:hover {
            background-color: #17a2b8;
            color: #fff;
        }

        [data-theme="dark"] .pagination .page-item.active .page-link {
            background-color: #17a2b8;
            color: #fff;
            border: 1px solid #17a2b8;
        }

        .hidden {
            display: none;
        }

        /* CSS */
        .search-icon {
            cursor: pointer;
        }

        .search-icon:hover {
            background-color: #e9ecef;
            /* Warna latar belakang saat dihover */
        }
    </style>
</head>

<body>
    <div id="welcome">

        <header id="hero">
            <!-- Navbar -->
            <nav class="navbar">
                <div class="container">
                    <!-- Logo -->
                    <h1 id="logo">
                        <a :href="datas.github"><img src="{{ asset('fe/assets/logo.png') }}" alt="Your Logo" /></a>
                    </h1>
                    <!-- Navbar links -->
                    <ul class="nav-menu">
                        <li><a class="nav-link" href="#projects">PROJECTS</a></li>
                        <li><a class="nav-link" href="#">CONTACT</a></li>
                        <li><a class="nav-link" href="#">BlOG</a></li>
                        <li>
                            <a class="nav-link btn btn-primary" :href="datas.github">RESUME
                                <i class="fas fa-arrow-right"></i></a>
                        </li>

                        <!-- Toggle switch -->
                        <div class="theme-switch">
                            <input type="checkbox" id="switch" />
                            <label class="toggle-icons" for="switch" @click="toggleDarkMode">
                                <img class="moon" src="{{ asset('fe/assets/moon.svg') }}" />
                                <img class="sun" src="{{ asset('fe/assets/sun.svg') }}" />
                            </label>

                        </div>
                        <!-- Hamburger menu -->
                    </ul>
                    <!-- Hamburger menu -->
                    <div class="hamburger" @click="toggleMobileMenu">
                        <span class="bar"></span>
                        <span class="bar"></span>
                        <span class="bar"></span>
                    </div>

                </div>
            </nav>

            <section class="header-container">
                <img class="profile-image" :src="datas.foto" alt="" />
                <h1>@{{ datas.nama }}</h1>

                <div class="content-text">
                    <h2>@{{ datas.profesi }}</h2>
                    {{-- <h2>products, brands, and experience.</h2> --}}

                    <p>
                        @{{ datas.profesi_detail }}
                    </p>
                </div>
                <a :href="datas.github" class="btn btn-secondary" target="_blank">Connect
                    With Me</a>
            </section>
        </header>

        <!-- Projects -->
        <section id="projects" class="project-container container">
            <div class="division"></div>
            <div class="content-text">
                <h2>Projects</h2>
                <p>Check out some of my personal and paid projects</p>
            </div>

            <article class="project">
                <div class="card" v-for="data in projects" :key="data.id"
                    :style="{ 'background': 'url(' + data.foto + ') center center/cover' }">
                    <div class="project-info">
                        <div class="project-bio">
                            <h3>@{{ data.nama }}</h3>
                            <p>@{{ data.stack }}</p>
                        </div>
                        <div class="project-link">
                            <a :href="data.link" target="_blank"><i class="fas fa-globe"></i></a>
                        </div>
                    </div>
                </div>
            </article>


            <div class="container">
                <div v-if="projects.length > 0" class="row mx-2">
                    <!-- Elemen di pojok kanan -->
                    <div class="col-12 col-md-12 d-flex justify-content-end">
                        <nav aria-label="Page navigation" class="mobile-pagination">
                            <ul class="pagination">
                                {{-- <li v-if="currentPage > 1" :class="{ disabled: currentPage === 1 }">
                                    <a class="page-link" @click="filter(currentPage - 1)" href="#">
                                        Sebelumnya
                                    </a>
                                </li> --}}
                                <li class="page-item" v-for="i in displayLink" :key="i"
                                    :class="{ active: currentPage === i, hidden: i === totalPages }">
                                    <a class="page-link" @click="filter(i)" href="#">
                                        @{{ i }}
                                    </a>
                                </li>
                                <li class="page-item" :class="{ active: currentPage === totalPages }">
                                    <a class="page-link" @click="filter(totalPages)" href="#">
                                        @{{ totalPages }}
                                    </a>
                                </li>
                                {{-- <li v-if="currentPage < totalPages" :class="{ disabled: currentPage === totalPages }">
                                    <a class="page-link" @click="filter(currentPage + 1)" href="#">
                                        Selanjutnya
                                    </a>
                                </li> --}}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </section>

    </div>
    <footer id="footer">
        <div class="container">
            <a href="mailto:communitypro47@gmail.com">communitypro47@gmail.com</a>
            <!-- Social links -->
            <div class="social">
                <a href="#" target="_blank"><img src="{{ asset('fe/assets/facebook-icon.svg') }}"
                        alt="Facebook" /></a>
                <a href="#" target="_blank"><img src="{{ asset('fe/assets/twitter-icon.svg') }}"
                        alt="Twitter" /></a>
                <a href="#" target="_blank"><img src="{{ asset('fe/assets/linkedin-icon.svg') }}"
                        alt="Linkedin" /></a>
                <a href="#" target="_blank"><img src="{{ asset('fe/assets/github-icon.svg') }}"
                        alt="GitHub" /></a>
                <a href="#" target="_blank"><img src="{{ asset('fe/assets/hashnode-icon.svg') }}"
                        alt="Hashnode" /></a>
            </div>
            <!-- Attribution -->
            <div class="attribution">
                <a href="https://github.com/CommunityPro/portfolio-html" target="_blank" rel="noopener noreferrer">
                    <img src="https://user-images.githubusercontent.com/62628408/157202263-9174da24-b19a-4017-9b7c-a1d26ae8f014.svg"
                        alt="attribution" width="150px" />
                </a>
            </div>
            <p>Copyright &copy; Communitypro <span id="datee"></span>, All rights reserved</p>
        </div>
    </footer>
    {{-- <script src="{{ asset('fe/js/script.js') }}"></script> --}}
    <script src="{{ asset('vue.js') }}"></script>
    <script src="{{ asset('axios.js') }}"></script>
    <script src="{{ asset('alert.js') }}"></script>
    <script src="{{ asset('overlay.js') }}"></script>
    <link href="{{ asset('overlay.css') }}" rel="stylesheet">
    <script>
        const app = Vue.createApp({
            data() {
                return {
                    projects: [],
                    datas: {},
                    darkMode: false,
                    currentPage: 1,
                    totalPages: 1,
                    link: [],
                    perPage: 6,
                    search: '',
                };
            },
            mounted() {
                this.loadData();
                this.loadDarkMode();
                this.loadDataProject();
            },
            methods: {
                filter(page) {
                    this.currentPage = page; // Set halaman saat ini
                    this.loadData(); // Memuat data sesuai dengan halaman yang dipilih
                },
                setData(data) {
                    this.datas = data;
                },
                setDataProject(data) {

                    this.projects = data.data;
                    this.totalPages = data.last_page;
                    this.link = data.last_page;
                    console.log(this.projects)
                },
                loadData() {
                    axios.get("{{ url('profil/getData') }}")
                        .then((response) => {
                            this.setData(response.data);
                        })
                        .finally(() => {
                            this.loading = false;
                        });
                },
                loadDataProject() {
                    axios.get("{{ url('project/getData') }}?page=" +
                            this.currentPage +
                            "&perPage=" +
                            this.perPage +
                            "&search=" +
                            this.search
                        )
                        .then((response) => {
                            this.setDataProject(response.data);
                        })
                        .finally(() => {
                            this.loading = false;
                        });
                },
                toggleMobileMenu() {
                    const hamburger = document.querySelector(".hamburger");
                    const navMenu = document.querySelector(".nav-menu");

                    hamburger.classList.toggle("active");
                    navMenu.classList.toggle("active");
                },
                toggleDarkMode() {
                    this.darkMode = !this.darkMode;
                    this.saveDarkMode();
                },
                saveDarkMode() {
                    localStorage.setItem("darkMode", this.darkMode.toString());
                    document.documentElement.setAttribute("data-theme", this.darkMode ? "dark" : "light");
                },
                loadDarkMode() {
                    const darkMode = localStorage.getItem("darkMode");
                    if (darkMode) {
                        this.darkMode = darkMode === "true";
                        this.saveDarkMode();
                    }
                },
            },
            computed: {
                displayLink() {
                    const displayCount = 5;
                    const middleIndex = Math.ceil(displayCount / 2);
                    let startPage = this.currentPage - middleIndex + 1;
                    startPage = Math.max(1, startPage);

                    let endPage = Math.min(this.totalPages, startPage + displayCount - 1);
                    if (this.totalPages - startPage < middleIndex) {
                        startPage = Math.max(1, startPage - (middleIndex - (this.totalPages - startPage)));
                        endPage = Math.min(this.totalPages, startPage + displayCount - 1);
                    }

                    const links = [];
                    for (let i = startPage; i <= endPage; i++) {
                        links.push(i);
                    }

                    return links;
                }
            },
        });

        const vm = app.mount('#welcome');
    </script>


</body>

</html>
