<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{ url('seller/index') }}">

                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <span>Products</span>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                <li>
                    <a href="{{ url('seller/viewallproduct/') }}">
                        <span>View All Products</span>
                    </a>
                </li>









            </ul>
        </li><!-- End Components Nav -->



        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                <span>Customers</span>
            </a>
            <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ url('seller/viewallcustomer/') }}">
                        <span>All Customers</span>
                    </a>
                </li>


            </ul>
        </li><!-- End Tables Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                <span>Sales</span>
            </a>
            <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ url('seller/viewallorders/') }}">
                        <span>All Orders</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('seller/viewactiveorders/') }}">
                        </i><span>Completed Order</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('seller/viewcanceledorders/') }}">
                        </i><span>Canceled Order</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
                <span>Auction</span>
            </a>
            <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ url('seller/octionpageload/') }}">
                        <span>Auction</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('seller/activbids/') }}">
                        <span>Active Bids</span>
                    </a>
                </li>


            </ul>
        </li>




    </ul>

</aside><!-- End Sidebar-->
{{-- modals here --}}
