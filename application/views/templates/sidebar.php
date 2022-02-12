<?php
$sidebar_menu = [
    [
        'sidebar_id' => 1,
        'name' => 'Home',
        'icon' => 'nav-icon fas fa-home',
        'link' => site_url('home'),
    ], [
        'sidebar_id' => 2,
        'name' => 'Leads',
        'icon' => 'nav-icon fas fa-list',
        'link' => site_url('crm/leads'),
    ], [
        'sidebar_id' => 3,
        'name' => 'Quotation Letter',
        'icon' => 'nav-icon far fa-envelope',
        'link' => site_url('crm/quotation'),
    ], [
        'sidebar_id' => 4,
        'name' => 'Manger Approval',
        'icon' => 'nav-icon fas fa-check-circle',
        'link' => site_url('crm/qapproval'),
    ], [
        'sidebar_id' => 5,
        'name' => 'Customer',
        'icon' => 'nav-icon fas fa-users',
        'link' => site_url('crm/customers'),
    ], [
        'sidebar_id' => 6,
        'name' => 'Products',
        'icon' => 'nav-icon fas fa-columns',
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
                if (!in_array($row['sidebar_id'], explode(',', $this->session->userdata('role')[0]))) {
                    continue;
                }
                $sidebar_active = $this->session->userdata('sidebar_id') == $row['sidebar_id'] ? 'active' : '';
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