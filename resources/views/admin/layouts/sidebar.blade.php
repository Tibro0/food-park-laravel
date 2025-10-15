<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin.dashboard') }}">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="{{ setSidebarActive(['admin.dashboard']) }}"><a class="nav-link"
                    href="{{ route('admin.dashboard') }}"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Starter</li>
            <li class="{{ setSidebarActive(['admin.slider.*']) }}"><a class="nav-link"
                    href="{{ route('admin.slider.index') }}"><i class="fas fa-images"></i>
                    <span>Slider</span></a></li>
            <li class="{{ setSidebarActive(['admin.daily-offer.*']) }}"><a class="nav-link"
                    href="{{ route('admin.daily-offer.index') }}"><i class="far fa-clock"></i>
                    <span>Daily Offer</span></a></li>
            <li
                class="dropdown {{ setSidebarActive(['admin.orders.*', 'admin.pending-orders', 'admin.inprocess-orders', 'admin.delivered-orders', 'admin.declined-orders']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-box"></i>
                    <span>Orders</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['admin.orders.*']) }}"><a class="nav-link"
                            href="{{ route('admin.orders.index') }}">All Orders</a></li>
                    <li class="{{ setSidebarActive(['admin.pending-orders']) }}"><a class="nav-link"
                            href="{{ route('admin.pending-orders') }}">All Pending Orders</a></li>
                    <li class="{{ setSidebarActive(['admin.inprocess-orders']) }}"><a class="nav-link"
                            href="{{ route('admin.inprocess-orders') }}">All In Process Orders</a></li>
                    <li class="{{ setSidebarActive(['admin.delivered-orders']) }}"><a class="nav-link"
                            href="{{ route('admin.delivered-orders') }}">All Delivered Orders</a></li>
                    <li class="{{ setSidebarActive(['admin.declined-orders']) }}"><a class="nav-link"
                            href="{{ route('admin.declined-orders') }}">All Declined Orders</a></li>
                </ul>
            </li>
            <li
                class="dropdown {{ setSidebarActive(['admin.category.*', 'admin.product.*', 'admin.product-reviews.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="fas fa-shopping-cart"></i>
                    <span>Manage Products</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['admin.category.*']) }}"><a class="nav-link"
                            href="{{ route('admin.category.index') }}">Product Categories</a></li>
                    <li class="{{ setSidebarActive(['admin.product.*']) }}"><a class="nav-link"
                            href="{{ route('admin.product.index') }}">Products</a></li>
                    <li class="{{ setSidebarActive(['admin.product-reviews.*']) }}"><a class="nav-link"
                            href="{{ route('admin.product-reviews.index') }}">Product review</a></li>
                </ul>
            </li>

            <li
                class="dropdown {{ setSidebarActive(['admin.coupon.*', 'admin.delivery-area.*', 'admin.payment-setting.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-store"></i>
                    <span>Manage E-commerce</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['admin.coupon.*']) }}"><a class="nav-link"
                            href="{{ route('admin.coupon.index') }}">Coupon</a></li>
                    <li class="{{ setSidebarActive(['admin.delivery-area.*']) }}"><a class="nav-link"
                            href="{{ route('admin.delivery-area.index') }}">Delivery Areas</a></li>
                    <li class="{{ setSidebarActive(['admin.payment-setting.*']) }}"><a class="nav-link"
                            href="{{ route('admin.payment-setting.index') }}">Payment Gateways</a></li>
                </ul>
            </li>

            <li class="dropdown {{ setSidebarActive(['admin.reservation-time.*', 'admin.reservation.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-chair"></i>
                    <span>Manage Reservations</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['admin.reservation-time.*']) }}"><a class="nav-link"
                            href="{{ route('admin.reservation-time.index') }}">Reservation Times</a>
                    </li>
                    <li class="{{ setSidebarActive(['admin.reservation.*']) }}"><a class="nav-link"
                            href="{{ route('admin.reservation.index') }}">Reservation</a>
                    </li>
                </ul>
            </li>
            <li
                class="dropdown {{ setSidebarActive(['admin.blog-category.*', 'admin.blogs.index', 'admin.blogs.edit', 'admin.blogs.create', 'admin.blogs.comments.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fab fa-blogger-b"></i>
                    <span>Blog</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['admin.blog-category.*']) }}"><a class="nav-link"
                            href="{{ route('admin.blog-category.index') }}">Categories</a></li>
                    <li
                        class="{{ setSidebarActive(['admin.blogs.index', 'admin.blogs.edit', 'admin.blogs.create']) }}">
                        <a class="nav-link" href="{{ route('admin.blogs.index') }}">Blogs</a></li>
                    <li class="{{ setSidebarActive(['admin.blogs.comments.*']) }}"><a class="nav-link"
                            href="{{ route('admin.blogs.comments.index') }}">Comments</a></li>
                </ul>
            </li>
            <li
                class="dropdown {{ setSidebarActive(['admin.why-choose-us.*', 'admin.banner-slider.*', 'admin.chefs.*', 'admin.app-download.*', 'admin.testimonial.*', 'admin.counter.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-stream"></i>
                    <span>Sections</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['admin.why-choose-us.*']) }}"><a class="nav-link"
                            href="{{ route('admin.why-choose-us.index') }}">Why Choose Us</a></li>
                    <li class="{{ setSidebarActive(['admin.banner-slider.*']) }}"><a class="nav-link"
                            href="{{ route('admin.banner-slider.index') }}">Banner Slider</a></li>
                    <li class="{{ setSidebarActive(['admin.chefs.*']) }}"><a class="nav-link"
                            href="{{ route('admin.chefs.index') }}">Chefs</a></li>
                    <li class="{{ setSidebarActive(['admin.app-download.*']) }}"><a class="nav-link"
                            href="{{ route('admin.app-download.index') }}">App Download Section</a>
                    </li>
                    <li class="{{ setSidebarActive(['admin.testimonial.*']) }}"><a class="nav-link"
                            href="{{ route('admin.testimonial.index') }}">Testimonial</a>
                    </li>
                    <li class="{{ setSidebarActive(['admin.counter.*']) }}"><a class="nav-link"
                            href="{{ route('admin.counter.index') }}">Counter</a>
                    </li>
                </ul>
            </li>
            <li
                class="dropdown {{ setSidebarActive(['admin.custom-page-builder.*', 'admin.about.*', 'admin.privacy-policy.*', 'admin.trams-and-conditions.*', 'admin.contact.*']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="fas fa-file-alt"></i>
                    <span>Pages</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['admin.custom-page-builder.*']) }}"><a class="nav-link"
                            href="{{ route('admin.custom-page-builder.index') }}">Custom Page</a>
                    </li>
                    <li class="{{ setSidebarActive(['admin.about.*']) }}"><a class="nav-link"
                            href="{{ route('admin.about.index') }}">About</a></li>
                    <li class="{{ setSidebarActive(['admin.privacy-policy.*']) }}"><a class="nav-link"
                            href="{{ route('admin.privacy-policy.index') }}">Privacy Policy</a></li>
                    <li class="{{ setSidebarActive(['admin.trams-and-conditions.*']) }}"><a class="nav-link"
                            href="{{ route('admin.trams-and-conditions.index') }}">Trams and
                            Conditions</a></li>
                    <li class="{{ setSidebarActive(['admin.contact.*']) }}"><a class="nav-link"
                            href="{{ route('admin.contact.index') }}">Contact</a></li>
                </ul>
            </li>
            <li class="{{ setSidebarActive(['admin.news-letter.*']) }}"><a class="nav-link"
                    href="{{ route('admin.news-letter.index') }}"><i class="fas fa-newspaper"></i>
                    <span>News Letter</span></a></li>

            <li class="{{ setSidebarActive(['admin.social-link.*']) }}"><a class="nav-link"
                    href="{{ route('admin.social-link.index') }}"><i class="fas fa-link"></i>
                    <span>Social Links</span></a></li>
            <li class="{{ setSidebarActive(['admin.footer-info.*']) }}"><a class="nav-link"
                    href="{{ route('admin.footer-info.index') }}"><i class="fas fa-info-circle"></i>
                    <span>Footer Info</span></a></li>

            <li class="{{ setSidebarActive(['admin.admin-management.*']) }}"><a class="nav-link"
                    href="{{ route('admin.admin-management.index') }}"><i class="fas fa-user-shield"></i>
                    <span>Admin Management</span></a></li>
            <li class="{{ setSidebarActive(['admin.setting.*']) }}"><a class="nav-link"
                    href="{{ route('admin.setting.index') }}"><i class="fas fa-cogs"></i>
                    <span>Settings</span></a></li>
        </ul>
    </aside>
</div>
