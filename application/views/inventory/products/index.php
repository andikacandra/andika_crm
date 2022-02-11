<div class="col-md-12">
    <a href="<?php echo site_url('products/create'); ?>" class="btn btn-info btn-sm mb-1">Create</a>
</div>

<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example1" class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Sale Price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($products->result_array() as $row) { ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['description']; ?></td>
                                <td><?php echo 'Rp. ' . number_format($row['price'], 2, ',', '.'); ?></td>
                                <td><?php echo ($row['status'] ? 'Active' : 'Non Active'); ?></td>
                                <td>
                                    <a href="<?php echo site_url('products/edit/' . $row['id']); ?>" class="btn btn-info btn-sm">Edit</a>
                                    <a href="<?php echo site_url('products/destroy/' . $row['id']); ?>" class="btn btn-danger btn-sm" onclick="if(!confirm('Delete this data ?')){return false;}">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>