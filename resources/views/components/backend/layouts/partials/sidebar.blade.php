<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark text-white" id="sidenavAccordion"
        style="background-image: linear-gradient(#1358a7,
 #191839, #0680c6, #273871, #0473bc, #2b4388, #2c2c64, #23345b, #2c3c94); text-color:white;">
        <div class="sb-sidenav-menu">
            @can('Admin')
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Admin Home</div>

                    @php
                        $categoriesCount = App\Models\Category::count();
                        $productsCount = App\Models\Product::count();
                        $blogCount = App\Models\Blog::count();
                    @endphp
                    <a class="nav-link text-white" href="{{ route('home') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Home
                    </a>

 <a class="nav-link collapsed text-white" href="#" data-bs-toggle="collapse"
                        data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Website Controller
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>

                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                        data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">

                            <a class="nav-link text-white" href="{{ route('categories.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Categories List &nbsp; <span
                            class="badge bg-primary text-white">{{ $categoriesCount ?? '0' }}</span>
                    </a>

                    <a class="nav-link text-white" href="{{ route('products.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Products List &nbsp; <span class="badge bg-primary text-white">{{ $productsCount ?? '0' }}</span>
                    </a>

                    <a class="nav-link text-white" href="{{ route('blogs.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Blogs List &nbsp; <span class="badge bg-primary text-white">{{ $blogCount ?? '0' }}</span>
                    </a>
                    <a class="nav-link text-white" href="{{ route('utility_dynamic.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Web Page Dynamic tools</span>
                    </a>

                            {{-- <a class="nav-link text-white" href="{{ route('roles.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Role
                            </a>
                            <a class="nav-link text-white" href="{{ route('users.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Users
                            </a> --}}
                        </nav>
                    </div>
{{-- website controller end --}}

{{-- Admin controller start --}}
<a class="nav-link collapsed text-white" href="#" data-bs-toggle="collapse"
                        data-bs-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Admin Controller
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>

                    <div class="collapse" id="collapseLayouts1" aria-labelledby="headingOne"
                        data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">

                             <a class="nav-link text-white" href="{{ route('types.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        type List
                    </a>

                    <a class="nav-link text-white" href="{{ route('admin_level_show') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        All level
                    </a>

                        </nav>
                    </div>
{{-- Admin controller end  --}}


                        <a class="nav-link text-white" href="{{ route('reward') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Admin Reward
                        </a>

                    <a class="nav-link text-white" href="{{ route('withdraw.request') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Withdraw Request
                    </a>

                        <a class="nav-link text-white" href="{{ route('generate_point') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Generate Point
                        </a>









                    {{-- @can('user-management') --}}

                    <a class="nav-link collapsed text-white" href="#" data-bs-toggle="collapse"
                        data-bs-target="#collapseLayouts3" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        User Management
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>

                    <div class="collapse" id="collapseLayouts3" aria-labelledby="headingOne"
                        data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link text-white" href="{{ route('roles.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Role
                            </a>
                            <a class="nav-link text-white" href="{{ route('users.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Users
                            </a>
                        </nav>
                    </div>


                </div>
            @endcan


            @can('User')
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">List</div>
                    <a class="nav-link text-white" href="{{ route('home') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Home
                    </a>
                    <a class="nav-link text-white" href="{{ route('profiles') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Profile
                    </a>
                    @php
                        $hands = App\Models\Hand::where('parent_id', auth()->user()->id)->first();
                        $is_approve = App\Models\User::where('is_approve', 1)->first();
                    @endphp
                    @isset($is_approve)
                        @isset($hands)
                            <a class="nav-link text-white" href="{{ route('level_show') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                level
                            </a>
                        @endisset

                        <a class="nav-link text-white" href="{{ route('Withdraw') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Withdraw point
                        </a>
                    @endisset
                    {{-- <a class="nav-link text-white" href="{{ route('level_show') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        level
                    </a> --}}

                </div>
            @endcan
            @can('Guest')
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">List</div>
                    <a class="nav-link text-white" href="#">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Waiting for Conformation
                    </a>
                </div>
            @endcan

        </div>
        <div class="sb-sidenav-footer text-white"
            style="background-image: linear-gradient(#1358a7, #0680c6, #273871); text-color:white;">
            <div class="small">Logged in as:</div>
            {{-- {{ auth()->user()->role->name ?? '' }} --}}
            {{ auth()->user()->uuid ?? '' }}

        </div>
    </nav>
</div>
