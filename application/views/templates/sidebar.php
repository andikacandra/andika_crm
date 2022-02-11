<?php
$sidebar_menu = [
    [
        'name' => 'Home',
        'icon' => 'nav-icon far fa-image',
        'link' => site_url('home'),
    ], [
        'name' => 'Products',
        'icon' => 'nav-icon far fa-image',
        'link' => site_url('products'),
    ]
];
?>

<div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <?php
            $sidebar_active = '';
            $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            foreach ($sidebar_menu as $row) {
                $sidebar_active = site_url($this->session->userdata('sidebar_active')) == $row['link'] ? 'active' : '';
            ?>

                <li class="nav-item">
                    <a href="<?php echo $row['link']; ?>" class="nav-link <?php echo $sidebar_active; ?>">
                        <i class="<?php echo $row['icon']; ?>"></i>
                        <p>
                            <?php echo $row['name']; ?>
                        </p>
                    </a>
                </li>

            <?php $sidebar_active = '';
            } ?>
        </ul>
    </nav>
</div>