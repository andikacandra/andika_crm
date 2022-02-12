<div class="col-md-12">
    <div class="col-md-12">
        <a onclick="history.go(-1);" class="btn btn-default btn-sm mb-1">Back</a>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-body row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Customer</label>
                        <input type="text" class="form-control" value="<?php echo $leads['name']; ?>" readonly>
                        </a>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" class="form-control" value="<?php echo $leads['email']; ?>" readonly>
                        </a>
                    </div>
                    <div class="form-group">
                        <label for="">Address</label>
                        <textarea class="form-control" readonly><?php echo $leads['address']; ?></textarea>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Company Size</label>
                        <input type="text" class="form-control" value="<?php echo $leads['csize_name']; ?>" readonly>
                        </a>
                    </div>
                    <div class="form-group">
                        <label for="">Industry</label>
                        <input type="text" class="form-control" value="<?php echo $leads['industry_name']; ?>" readonly>
                        </a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Phone</label>
                        <input type="text" class="form-control" value="<?php echo $leads['phone']; ?>" readonly>
                        </a>
                    </div>
                    <div class="form-group">
                        <label for="">Mobile</label>
                        <input type="text" class="form-control" value="<?php echo $leads['mobile']; ?>" readonly>
                        </a>
                    </div>
                    <div class="form-group">
                        <label for="">Website</label>
                        <input type="text" class="form-control" value="<?php echo $leads['website']; ?>" readonly>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Products</h3>
            </div>
            <div class="card-body row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table id="quotation-line" class="table table-bordered">
                            <thead class="thead-light">
                                <th>#</th>
                                <th>Quotation</th>
                                <th>Product</th>
                                <th>Detail</th>
                                <th>Deal Price</th>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($products->result_array() as $row) { ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['product_name']; ?></td>
                                        <td><?php echo nl2br($row['product_description']); ?></td>
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