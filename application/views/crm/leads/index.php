<div class="col-md-12">
    <a href="<?php echo site_url('crm/leads/create'); ?>" class="btn btn-info btn-sm mb-1">Create</a>
</div>

<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="table1" class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Lead Name</th>
                            <th>Company</th>
                            <th>Contacts</th>
                            <th>Lead Source</th>
                            <th>Lead Owner</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($leads->result_array() as $row) { ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['company']; ?></td>
                                <td><?php echo 'Email : ' . $row['email'] . '<br> Phone : ' . $row['phone'] . '<br> Mobile : ' . $row['mobile']; ?></td>
                                <td><?php echo $row['source']; ?></td>
                                <td><?php echo $row['lead_owner']; ?></td>
                                <td>
                                    <a href="<?php echo site_url('crm/leads/' . $row['id']); ?>" class="btn btn-primary btn-sm">Detail</a>
                                    <a href="<?php echo site_url('crm/leads/edit/' . $row['id']); ?>" class="btn btn-info btn-sm">Edit</a>
                                    <?php if ($this->session->userdata('role_id') == 1) { ?>
                                        <a href="<?php echo site_url('crm/leads/destroy/' . $row['id']); ?>" class="btn btn-danger btn-sm" onclick="if(!confirm('Delete this data ?')){return false;}">Delete</a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>