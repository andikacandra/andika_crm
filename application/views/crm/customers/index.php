<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="table1" class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Customer</th>
                            <th>Contacts</th>
                            <th>Number of Products</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($customers->result_array() as $row) { ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo 'Email : ' . $row['email'] . '<br> Phone : ' . $row['phone'] . '<br> Mobile : ' . $row['mobile']; ?></td>
                                <td><?php echo $row['count_product'] . ' products'; ?></td>
                                <td>
                                    <a href="<?php echo site_url('crm/customers/' . $row['id']); ?>" class="btn btn-primary btn-sm">Detail</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>