<?php @session_start(); ?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PodWarts - Hogwarts Music Player</title>
        <link rel="stylesheet" href="main.css">
    </head>

    <body>
        <header class="nav-header">
            <div class="header-items">
                <div class="header-logo">
                    <a href="index.html" aria-label="Return to homepage">
                        <!-- <span class="sr-only">HomePage</span> -->
                        <img src="logo.png" alt="Return to Homepage">
                    </a>
                </div>
                <nav class="header-nav">
                    <?php if (isset($_SESSION["idnumber"])) : ?>
                    <a><span><strong>Logged in as <?php echo $_SESSION["username"]; ?></strong></span></a>
                    <?php endif; ?>
                    <a href="#profile">Profile</a>
                    <a href="#profile">Account</a>
                </nav>
                <form action="" class="header-search">
                    <input type="text" id="header-search-music-item" aria-label="Search for Album, Artist or Song"
                        placeholder="Artist, Album, or Song">
                    <button type="submit" aria-label="search" id="execute-search">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path
                                d="M21.71,20.29,18,16.61A9,9,0,1,0,16.61,18l3.68,3.68a1,1,0,0,0,1.42,0A1,1,0,0,0,21.71,20.29ZM11,18a7,7,0,1,1,7-7A7,7,0,0,1,11,18Z">
                            </path>
                        </svg>
                    </button>
                    <button type="button" id="close-search" aria-label="close search input">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path
                                d="M13.41,12l6.3-6.29a1,1,0,1,0-1.42-1.42L12,10.59,5.71,4.29A1,1,0,0,0,4.29,5.71L10.59,12l-6.3,6.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0L12,13.41l6.29,6.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42Z">
                            </path>
                        </svg>
                    </button>
                </form>
                <div class="header-authentication">
                    <div class="show-search-form">
                        <a id="toggle-search" class="header-link">
                            <span>Search</span>
                            <button id="toggle-search" type="button" class="header-link">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path
                                        d="M21.71,20.29,18,16.61A9,9,0,1,0,16.61,18l3.68,3.68a1,1,0,0,0,1.42,0A1,1,0,0,0,21.71,20.29ZM11,18a7,7,0,1,1,7-7A7,7,0,0,1,11,18Z">
                                    </path>
                                </svg>
                            </button>
                        </a>
                    </div>
                    <?php if (!isset($_SESSION["idnumber"]) || $_SESSION["idnumber"] == False) : ?>
                    <div class="not-logged-in">
                        <a href="#log-in" class="header-link">
                            <span>Log In</span>
                            <svg fill="#000000" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path
                                        d="M16.642 20.669c-0.391 0.39-0.391 1.023-0 1.414 0.195 0.195 0.451 0.293 0.707 0.293s0.512-0.098 0.707-0.293l5.907-6.063-5.907-6.063c-0.39-0.39-1.023-0.39-1.414 0s-0.391 1.024 0 1.414l3.617 3.617h-19.264c-0.552 0-1 0.448-1 1s0.448 1 1 1h19.326zM30.005 0h-18c-1.105 0-2.001 0.895-2.001 2v9h2.014v-7.78c0-0.668 0.542-1.21 1.21-1.21h15.522c0.669 0 1.21 0.542 1.21 1.21l0.032 25.572c0 0.668-0.541 1.21-1.21 1.21h-15.553c-0.668 0-1.21-0.542-1.21-1.21v-7.824l-2.014 0.003v9.030c0 1.105 0.896 2 2.001 2h18c1.105 0 2-0.895 2-2v-28c-0.001-1.105-0.896-2-2-2z">
                                    </path>
                                </g>
                            </svg>
                        </a>
                    </div>
                    <?php else : ?>

                    <div class="logged-in">
                        <a href="#logout" class="header-link">
                            <span>Logout</span>
                            <svg fill="currentColor" viewBox="0 0 32 32" version="1.1"
                                xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path
                                        d="M3.651 16.989h17.326c0.553 0 1-0.448 1-1s-0.447-1-1-1h-17.264l3.617-3.617c0.391-0.39 0.391-1.024 0-1.414s-1.024-0.39-1.414 0l-5.907 6.062 5.907 6.063c0.196 0.195 0.451 0.293 0.707 0.293s0.511-0.098 0.707-0.293c0.391-0.39 0.391-1.023 0-1.414zM29.989 0h-17c-1.105 0-2 0.895-2 2v9h2.013v-7.78c0-0.668 0.542-1.21 1.21-1.21h14.523c0.669 0 1.21 0.542 1.21 1.21l0.032 25.572c0 0.668-0.541 1.21-1.21 1.21h-14.553c-0.668 0-1.21-0.542-1.21-1.21v-7.824l-2.013 0.003v9.030c0 1.105 0.895 2 2 2h16.999c1.105 0 2.001-0.895 2.001-2v-28c-0-1.105-0.896-2-2-2z">
                                    </path>
                                </g>
                            </svg>
                        </a>
                    </div>
                    <?php endif; ?>
                </div>
                <button role="button" aria-label="Menu Toggle" class="menu-toggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                </button>
            </div>
        </header>

        <div class="sidebar">
            <div class="sidebar-header">
                <img src="logo.png" alt="Hogwarts Logo">
            </div>

            <ul class="sidebar-nav">
                <li class="sidebar-nav-item">
                    <a href="#" class="sidebar-nav-link active">
                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512.002 512.002"
                            xml:space="preserve">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <g>
                                    <g>
                                        <path
                                            d="M489.26,0.861L183.289,102.696c-6.784,2.258-11.362,8.605-11.362,15.756c0,14.236,0,259.223,0,271.915 c-18.038-11.145-42.116-17.853-68.911-17.853c-57.266,0-102.124,30.635-102.124,69.744s44.859,69.744,102.124,69.744 c57.265,0,102.124-30.635,102.124-69.744V218.993l272.758-90.781v160.319c-18.038-11.145-42.116-17.853-68.911-17.853 c-57.266,0-102.124,30.635-102.124,69.744c0,39.109,44.859,69.744,102.124,69.744s102.124-30.635,102.124-69.744 c0-13.24,0-310.194,0-323.805C511.111,5.3,500.008-2.715,489.26,0.861z">
                                        </path>
                                    </g>
                                </g>
                            </g>
                        </svg>
                        <span>Songs</span>
                    </a>
                </li>
                <li class="sidebar-nav-item">
                    <a href="#" class="sidebar-nav-link">
                        <svg viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M9.772 4.28c.56-.144 1.097.246 1.206.814.1.517-.263 1.004-.771 1.14A7 7 0 1 0 19 12.9c.009-.5.4-.945.895-1 .603-.067 1.112.371 1.106.977L21 13c0 .107-.002.213-.006.32a.898.898 0 0 1 0 .164l-.008.122a9 9 0 0 1-9.172 8.392A9 9 0 0 1 9.772 4.28z">
                                </path>
                                <path
                                    d="M15.93 13.753a4.001 4.001 0 1 1-6.758-3.581A4 4 0 0 1 12 9c.75 0 1.3.16 2 .53 0 0 .15.09.25.17-.1-.35-.228-1.296-.25-1.7a58.75 58.75 0 0 1-.025-2.035V2.96c0-.52.432-.94.965-.94.103 0 .206.016.305.048l4.572 1.689c.446.145.597.23.745.353.148.122.258.27.33.446.073.176.108.342.108.801v1.16c0 .518-.443.94-.975.94a.987.987 0 0 1-.305-.049l-1.379-.447-.151-.05c-.437-.14-.618-.2-.788-.26a5.697 5.697 0 0 1-.514-.207 3.53 3.53 0 0 1-.213-.107c-.098-.05-.237-.124-.521-.263L16 6l.011 7c0 .255-.028.507-.082.753h.001z">
                                </path>
                            </g>
                        </svg>
                        <span>Albums</span>
                    </a>
                </li>
                <li class="sidebar-nav-item">
                    <a href="#" class="sidebar-nav-link">
                        <svg viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M15 5.4v-.9a.5.5 0 0 0-.5-.5H11c-4.112 0-7 2.063-7 6 0 2.672 1.531 5.833 3.34 7.466l.33.298a1 1 0 0 1 .33.742V20h7v-1.271a1 1 0 0 1 .565-.9l.564-.273c.464-.225 1-.442 1.595-.654l.421-.145a.506.506 0 0 0 .332-.601l-.507-2.03a1 1 0 0 1 .076-.69l1.13-2.26a.5.5 0 0 0-.19-.652L16.99 9.326a.5.5 0 0 1-.216-.267l-.178-.519a7.34 7.34 0 0 0-.711-1.502L13 8v2a1 1 0 0 1-1 1 1 1 0 0 0 0 2 1 1 0 0 1 0 2 3 3 0 0 1-1-5.83V7.678a1 1 0 0 1 .629-.928L15 5.4zM7 22a1 1 0 0 1-1-1v-2.05C4.087 17.225 2 13.613 2 10c0-6 5-8 9-8h4a2 2 0 0 1 2 2v1.15a9.296 9.296 0 0 1 1.489 2.743l2.717 1.63a1 1 0 0 1 .38 1.305l-1.503 3.007a.5.5 0 0 0-.038.344l.712 2.85a1.033 1.033 0 0 1-.723 1.234c-.77.223-1.865.569-2.75.961a.484.484 0 0 0-.284.446V21a1 1 0 0 1-1 1H7z">
                                </path>
                            </g>
                        </svg>
                        <span>Artists</span>
                    </a>
                </li>
                <li class="sidebar-nav-item">
                    <a href="#" class="sidebar-nav-link">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M21 7V19C21 20.1046 20.1046 21 19 21H7M9 8.5V11.5L12 10L9 8.5ZM17 15V5C17 3.89543 16.1046 3 15 3H5C3.89543 3 3 3.89543 3 5V15C3 16.1046 3.89543 17 5 17H15C16.1046 17 17 16.1046 17 15Z"
                                    stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                            </g>
                        </svg>
                        <span>Playlists</span>
                    </a>
                </li>
            </ul>
        </div>


        <main>
            <div class="container">
                <section class="grid" name="albums">
                    <div class="main-title">
                        <h2>
                            <a href="http://">Albums</a>
                        </h2>
                        <span>View More</span>
                    </div>
                    <div class="album">
                        <div class="album-picture">
                            <img src="" alt=""><a href="">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path
                                        d="M18.54,9,8.88,3.46a3.42,3.42,0,0,0-5.13,3V17.58A3.42,3.42,0,0,0,7.17,21a3.43,3.43,0,0,0,1.71-.46L18.54,15a3.42,3.42,0,0,0,0-5.92Zm-1,4.19L7.88,18.81a1.44,1.44,0,0,1-1.42,0,1.42,1.42,0,0,1-.71-1.23V6.42a1.42,1.42,0,0,1,.71-1.23A1.51,1.51,0,0,1,7.17,5a1.54,1.54,0,0,1,.71.19l9.66,5.58a1.42,1.42,0,0,1,0,2.46Z">
                                    </path>
                                </svg>
                            </a></img>
                            <span class="album-info">
                                <span><svg></svg> 22 Tracks</span>
                            </span>
                            <span class="album-info">
                                <span><svg></svg> Genre:</span>
                            </span>
                        </div>
                        <div class="album-title">
                            <h3 class="album-name"><a href=""></a></h3>
                            <span class="artist-name"><a href=""></a></span>
                        </div>
                    </div>
                </section>
            </div>
        </main>



        <script src="main.js"></script>
        <script>
            toggle_search_bar();
            toggle_side_bar();
        </script>

    </body>

</html>