<header class="p-3 bg-dark text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
            </a>

            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <span class="fs-4">Test task for FrameworkTeam - ToDo List</span>
            </a>

            <div class="text-end">
                <a href="/{{Auth::check()?'logout':'login'}}" class="btn btn-outline-light me-2">{{Auth::check()?'Logout':'Login'}}</a>
                <a href="/register" class="btn btn-warning">Register</a>
            </div>
        </div>
    </div>
</header>
