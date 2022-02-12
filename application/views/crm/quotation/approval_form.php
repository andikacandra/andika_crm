<div class="col-md-12">
    <div class="col-md-12">
        <a href="<?php echo site_url('crm/qapproval/approve/' . $leads['id']); ?>" class="btn btn-success btn-sm mb-1" onclick="if(!confirm('Confirm this data ?')){return false;}">Approve</a>
        <a href="<?php echo site_url('crm/qapproval/reject/' . $leads['id']); ?>" class="btn btn-warning btn-sm mb-1" onclick="if(!confirm('Reject this data ?')){return false;}">Reject</a>
        <a onclick="history.go(-1);" class="btn btn-default btn-sm mb-1">Back</a>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-body row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Customer</label>
                        <a href="<?php echo site_url('crm/leads/' . $leads['id']); ?>" target="_blank">
                            <input type="text" class="form-control" value="<?php echo $leads['company']; ?>" style="cursor: pointer;" readonly>
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Date</label>
                        <input type="text" class="form-control" value="<?php echo date('d-m-Y'); ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Lead Owner</label>
                        <input type="text" class="form-control" value="<?php echo $leads['lead_owner']; ?>" readonly>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Line</h3>
            </div>
            <div class="card-body row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table id="quotation-line" class="table table-bordered">
                            <thead class="thead-light">
                                <th>Product</th>
                                <th>Detail</th>
                                <th>Sale Price</th>
                                <th>Customer Price</th>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($products->result_array() as $row) { ?>
                                    <tr>
                                        <td><?php echo $row['product_name']; ?></td>
                                        <td><?php echo nl2br($row['product_description']); ?></td>
                                        <td><?php echo 'Rp. ' . number_format($row['product_price'], 2, ',', '.'); ?></td>
                                        <td><?php echo 'Rp. ' . number_format($row['customer_price'], 2, ',', '.'); ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>