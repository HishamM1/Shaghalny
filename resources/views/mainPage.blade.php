<x-head />

<body onload="randomizeImg();">
    <div class="mainPage">
        <x-navbar />
        <!-- Start landingPage -->
        <div class="landingPage">
            <div class="content">
                <p>Find the Best Jobs</p>
                <h3>
                    Searching for vacancies & career opportunities? Shaghalny helps you
                    in your job search
                </h3>
                <form action="/jobs/" method="GET"class="searchBar">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" name="search" placeholder="Search Jobs(e.g. Senior PHP Developer)" />
                    <button type="submit" class="btn submitBtn">Search Jobs</button>
                </form>
            </div>
        </div>
        <!-- End landingPage -->
    </div>
    <script src="/scripts/main.js"></script>
</body>
