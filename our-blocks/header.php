<!-- This is the header section of the website. -->
<header class="site-header">

    <!-- This is the container that holds the contents of the header. -->
    <div class="container">

        <!-- This is the logo text of the website. -->
        <h1 class="pc-logo-text float-left"><a href="<?php echo site_url() ?>"><strong>PC CONCEPTS</strong></a></h1>

        <!-- This is the search trigger icon. -->
        <a href="<?php echo esc_url(site_url('/search')); ?>" class="js-search-trigger site-header__search-trigger"><i
                class="fa fa-search" aria-hidden="true"></i></a>

        <!-- This is the menu trigger icon. -->
        <i class="site-header__menu-trigger fa fa-bars" aria-hidden="true"></i>

        <!-- This is the navigation menu section of the header. -->
        <div class="site-header__menu group">

            <!-- This is the main navigation menu of the website. -->
            <nav class="main-navigation">
                <ul>

                    <!-- This is the "Services" link in the menu. -->
                    <li <?php if (get_post_type() == 'services')
                        echo 'class="current-menu-item"'; ?>><a
                            href="<?php echo get_post_type_archive_link('services'); ?>">Services</a></li>

                    <!-- This is the "Programs" link in the menu. -->
                    <li <?php if (get_post_type() == 'program')
                        echo 'class="current-menu-item"' ?>><a
                                href="<?php echo get_post_type_archive_link('program') ?>">Programs</a></li>

                    <!-- This is the "Workshops" link in the menu. -->
                    <li <?php if (get_post_type() == 'workshops' or is_page('past-workshops'))
                        echo 'class="current-menu-item"'; ?>><a
                            href="<?php echo get_post_type_archive_link('workshops'); ?>">Workshops</a></li>

                    <!-- This is the "Blog" link in the menu. -->
                    <li <?php if (get_post_type() == 'post')
                        echo 'class="current-menu-item"' ?>><a
                                href="<?php echo site_url('/blog'); ?>">Blog</a></li>

                    <!-- This is the "Our Work" link in the menu. -->
                    <li <?php if (get_post_type() == 'our-work')
                        echo 'class="current-menu-item"' ?>><a
                                href="<?php echo site_url('/our-work'); ?>">Our Work</a></li>

                    <!-- This is the "About Us" link in the menu. -->
                    <li <?php if (is_page('about-us') or wp_get_post_parent_id(0) == 12)
                        echo 'class="current-menu-item"' ?>><a href="<?php echo site_url('/about-us') ?>">About Us</a></li>

                    <!-- This is the "Contact Us" link in the menu. -->
                    <li <?php if (get_post_type() == 'contacts')
                        echo 'class="current-menu-item"' ?>><a
                                href="<?php echo get_post_type_archive_link('contacts'); ?>">Contact Us</a></li>
                </ul>
            </nav>

            <!-- This is the search trigger icon in the utility section of the header. -->
            <div class="site-header__util">
                <a href="<?php echo esc_url(site_url('/search')); ?>" class="search-trigger js-search-trigger"><i
                        class="fa fa-search" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
</header>