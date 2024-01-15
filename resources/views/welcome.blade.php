<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Primary Meta Tags -->
    <title>Portfolio Template - Open source</title>
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
</head>

<body>
    <header id="hero">
        <!-- Navbar -->
        <nav class="navbar">
            <div class="container">
                <!-- Logo -->
                <h1 id="logo">
                    <a href="https://github.com/CommunityPro/portfolio-html"><img
                            src="{{ asset('fe/assets/logo.png') }}" alt="Your Logo" /></a>
                </h1>
                <!-- Navbar links -->
                <ul class="nav-menu">
                    <li><a class="nav-link" href="#projects">PROJECTS</a></li>
                    <li><a class="nav-link" href="#">CONTACT</a></li>
                    <li><a class="nav-link" href="#">BlOG</a></li>
                    <li>
                        <a class="nav-link btn btn-primary" href="https://github.com/CommunityPro/portfolio-html">RESUME
                            <i class="fas fa-arrow-right"></i></a>
                    </li>

                    <!-- Toggle switch -->
                    <div class="theme-switch">
                        <input type="checkbox" id="switch" />
                        <label class="toggle-icons" for="switch">
                            <img class="moon" src="{{ asset('fe/assets/moon.svg') }}" />
                            <img class="sun" src="{{ asset('fe/assets/sun.svg') }}" />
                        </label>
                    </div>
                    <!-- Hamburger menu -->
                </ul>
                <div class="hamburger">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </div>
            </div>
        </nav>

        <section class="header-container">
            <img class="profile-image" src="{{ asset('fe/assets/profile-image.svg') }}" alt="" />
            <h1>Hi I'm Franklin</h1>

            <div class="content-text">
                <h2>Building digital</h2>
                <h2>products, brands, and experience.</h2>

                <p>
                    A Frontend Developer and Visual Designer with experience in web
                    design, brand identity and product design.
                </p>
            </div>
            <a href="https://github.com/CommunityPro/portfolio-html" class="btn btn-secondary" target="_blank">Connect
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
            <!-- Project 1 -->
            <div href="" class="card">
                <div class="project-info">
                    <div class="project-bio">
                        <h3>Project One</h3>
                        <p>React, Redux, SASS</p>
                    </div>

                    <div class="project-link">
                        <a href="#" target="_blank"><i class="fab fa-github"></i></a>
                        <a href="#" target="_blank"><i class="fas fa-globe"></i></a>
                    </div>
                </div>
            </div>

            <!-- Project 2 -->
            <div href="" class="card">
                <div class="project-info">
                    <div class="project-bio">
                        <h3>Project Two</h3>
                        <p>React, Redux, SASS</p>
                    </div>

                    <div class="project-link">
                        <a href="#" target="_blank"><i class="fab fa-github"></i></a>
                        <a href="#" target="_blank"><i class="fas fa-globe"></i></a>
                    </div>
                </div>
            </div>

            <!-- Porject 3 -->
            <div href="" class="card">
                <div class="project-info">
                    <div class="project-bio">
                        <h3>Project Three</h3>
                        <p>React, Redux, SASS</p>
                    </div>

                    <div class="project-link">
                        <a href="#" target="_blank"><i class="fab fa-github"></i></a>
                        <a href="#" target="_blank"><i class="fas fa-globe"></i></a>
                    </div>
                </div>
            </div>

            <!-- Project 4 -->
            <div href="" class="card">
                <div class="project-info">
                    <div class="project-bio">
                        <h3>Project Four</h3>
                        <p>React, Redux, SASS</p>
                    </div>

                    <div class="project-link">
                        <a href="#" target="_blank"><i class="fab fa-github"></i></a>
                        <a href="#" target="_blank"><i class="fas fa-globe"></i></a>
                    </div>
                </div>
            </div>

            <!-- Project 5 -->
            <div href="" class="card">
                <div class="project-info">
                    <div class="project-bio">
                        <h3>Project Five</h3>
                        <p>React, Redux, SASS</p>
                    </div>

                    <div class="project-link">
                        <a href="#" target="_blank"><i class="fab fa-github"></i></a>
                        <a href="#" target="_blank"><i class="fas fa-globe"></i></a>
                    </div>
                </div>
            </div>

            <!-- Project 6 -->
            <div href="" class="card">
                <div class="project-info">
                    <div class="project-bio">
                        <h3>Project Six</h3>
                        <p>React, Redux, SASS</p>
                    </div>

                    <div class="project-link">
                        <a href="#" target="_blank"><i class="fab fa-github"></i></a>
                        <a href="#" target="_blank"><i class="fas fa-globe"></i></a>
                    </div>
                </div>
            </div>
        </article>

        <a href="#" class="btn btn-secondary" target="_blank">See More <i class="fas fa-arrow-right"></i></a>
    </section>

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
    <script src="{{ asset('fe/js/script.js') }}"></script>
</body>

</html>
