<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header d-flex align-items-center">
            <a class="navbar-brand" href="#">
                <img src="../assets/img/brand/plogo.png" class="navbar-brand-img" alt="...">
            </a>
            <div class="ml-auto">
                <!-- Sidenav toggler -->
                <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
                    <div class="sidenav-toggler-inner">
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <!-- ส่วนของแดชบอร์ด -->
                    <li class="nav-item">
                        <a class="nav-link active" href="#navbar-dashboards" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-dashboards">
                            <i class="ni ni-shop text-primary"></i>
                            <span class="nav-link-text">ภาพรวมข้อมูล</span>
                        </a>
                        <div class="collapse show" id="navbar-dashboards">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="./?content=dashboard" class="nav-link">รายงานสถิติ</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    
                    <!-- ส่วนการจัดการผู้ใช้งาน -->
                    <li class="nav-item">
                        <a class="nav-link" href="#navbar-user" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                            <i class="ni ni-ungroup text-orange"></i>
                            <span class="nav-link-text">จัดการผู้ใช้งาน</span>
                        </a>
                        <div class="collapse" id="navbar-user">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="./?content=list-user" class="nav-link">บัญชีผู้ใช้งาน</a>
                                </li>
                                <li class="nav-item">
                                    <a href="./?content=list-user-role" class="nav-link">ประเภทผู้ใช้งาน</a>
                                </li>
                                <li class="nav-item">
                                    <a href="./?content=list-government" class="nav-link">องค์กรปกครองส่วนท้องถิ่น</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <!-- ส่วนเมนูร้านอาหาร -->
                    <li class="nav-item">
                        <a class="nav-link" href="#navbar-location" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                            <i class="ni ni-ungroup text-orange"></i>
                            <span class="nav-link-text">จัดการร้านอาหาร</span>
                        </a>
                        <div class="collapse" id="navbar-location">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="./?content=list-restaurant" class="nav-link">แสดงรายการร้านอาหาร</a>
                                </li>
                                <li class="nav-item">
                                    <a href="./?content=list-zone" class="nav-link">แสดงรายการโซน</a>
                                </li>
                                <li class="nav-item">
                                    <a href="./?content=list-block" class="nav-link">แสดงรายการล็อก</a>
                                </li>
                                <li class="nav-item">
                                    <a href="./?content=disp-block-map" class="nav-link">ตำแหน่งร้านอาหาร</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>