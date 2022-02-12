<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="table1" class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Customer</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($quotation->result_array() as $row) { ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['company']; ?></td>
                                <td><?php echo date('d-m-Y', strtotime($row['date'])); ?></td>
                                <td><?php switch ($row['status']) {
                                        case '1':
                                            echo 'Approved';
                                            break;

                                        case '2':
                                            echo 'Rejected';
                                            break;

                                        default:
                                            echo 'Waiting for manager approval';
                                            break;
                                    } ?></td>
                                <td>
                                    <a href="<?php echo site_url('crm/quotation/' . $row['id']); ?>" class="btn btn-primary btn-sm">Detail</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>