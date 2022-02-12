<div class="col-md-12">
    <div class="col-md-12">
        <a onclick="history.go(-1);" class="btn btn-default btn-sm mb-1">Back</a>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-body row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Customer</label>
                        <a href="<?php echo site_url('crm/leads/' . $leads['id']); ?>" target="_blank">
                            <input type="text" name="cutomer" class="form-control" value="<?php echo $leads['company']; ?>" style="cursor: pointer;" readonly>
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Date</label>
                        <input type="text" name="date" class="form-control" value="<?php echo date('d-m-Y'); ?>" readonly>
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
                                <th>Deal Price</th>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($products->result_array() as $row) { ?>
                                    <tr>
                                        <td><?php echo $row['product_name']; ?></td>
                                        <td><?php echo nl2br($row['product_description']); ?></td>
                                        <td><?php echo 'Rp. ' . number_format($row['product_price'], 2, ',', '.'); ?></td>
                                        <td><?php echo 'Rp. ' . number_format($row['customer_price'], 2, ',', '.'); ?></td>
                                        <td><?php echo 'Rp. ' . number_format($row['deal_price'], 2, ',', '.'); ?></td>
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