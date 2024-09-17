<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{ url('admin/index') }}">

                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->



        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Catagory</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a data-bs-toggle="modal" data-bs-target="#AddNewCatagoryModal">
                        <span>Add New Catagory</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('admin/viewallcatagaries/') }}">
                        <span>View All Catagories</span>
                    </a>
                </li>

            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                <span>Sales</span>
            </a>
            <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ url('admin/viewallorders/') }}">
                        <span>All Orders</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('admin/viewactiveorders/') }}">
                        </i><span>Completed Order</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('admin/viewcanceledorders/') }}">
                        </i><span>Canceled Order</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                <span>Customers</span>
            </a>
            <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ url('admin/viewallcustomer/') }}">
                        <span>All Customers</span>
                    </a>
                </li>


            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tables-nav-seller" data-bs-toggle="collapse" href="#">
                <span>Sellers</span>
            </a>
            <ul id="tables-nav-seller" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ url('admin/viewallseller/') }}">
                        <span>All Seller</span>
                    </a>
                </li>


            </ul>
        </li>






    </ul>

</aside><!-- End Sidebar-->
{{-- modals here --}}
@include('admin.modals.addnewcatagory')
