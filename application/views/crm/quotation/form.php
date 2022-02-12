<div class="col-md-12">
    <form method="post" action="<?php echo site_url('crm/quotation/save'); ?>" class="row">
        <div class="col-md-12">
            <button type="submit" class="btn btn-info btn-sm mb-1">Save</button>
            <!-- <a href="<?php echo site_url('crm/quotation'); ?>" class="btn btn-default btn-sm mb-1">Cancel</a> -->
            <a onclick="history.go(-1);" class="btn btn-default btn-sm mb-1">Cancel</a>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Customer</label>
                            <a href="<?php echo site_url('crm/leads/' . $leads['id']); ?>" target="_blank">
                                <input type="hidden" name="lead_id" value="<?php echo $leads['id']; ?>">
                                <input type="text" name="cutomer" class="form-control" value="<?php echo $leads['name']; ?>" style="cursor: pointer;" readonly>
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
                            <button type="button" class="btn btn-primary btn-sm mb-1" data-toggle="modal" data-target="#modal-default">Add Product</button>
                            <table id="quotation-line" class="table table-bordered">
                                <thead class="thead-light">
                                    <th>Product</th>
                                    <th>Detail</th>
                                    <th>Sale Price</th>
                                    <th>Customer Price</th>
                                    <th></th>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="modal fade" id="modal-default">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">List Products</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Saleprice</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($products->result_array() as $row) { ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo nl2br($row['description']); ?></td>
                                    <td><?php echo 'Rp. ' . number_format($row['price'], 2, ',', '.'); ?></td>
                                    <td><button type="button" data-id="<?php echo $row['id']; ?>" class="btn btn-primary btn-sm add-product-to-quotation-line">Add</button></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer float-right">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>