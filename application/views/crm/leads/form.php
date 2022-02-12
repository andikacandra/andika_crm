<div class="col-md-12">
    <form method="post" action="<?php echo site_url('crm/leads/save/' . (isset($leads) ? $leads['id'] : '')); ?>" class="row">
        <div class="col-md-12">
            <?php if ($read) { ?>
                <a href="<?php echo site_url('crm/leads/edit/' . (isset($leads) ? $leads['id'] : '')); ?>" class="btn btn-info btn-sm mb-1">Edit</a>
            <?php } else { ?>
                <button type="submit" class="btn btn-info btn-sm mb-1">Save</button>
            <?php }

            if (isset($leads) ? ($leads['lead_status_id'] == 7 ? true : false) : false) {
            ?>
                <a href="<?php echo site_url('crm/quotation/create/' . (isset($leads) ? $leads['id'] : '')); ?>" class="btn btn-primary btn-sm mb-1">Quotation letter</a>
            <?php } ?>

            <!-- <a href="<?php echo site_url('crm/leads'); ?>" class="btn btn-default btn-sm mb-1">Cancel</a> -->
            <a onclick="history.go(-1);" class="btn btn-default btn-sm mb-1">Cancel</a>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Lead Owner</label>
                            <input type="text" class="form-control" value="<?php echo (isset($leads) ? $leads['lead_owner'] : $this->session->userdata('name')); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Lead Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo (isset($leads) ? $leads['name'] : ''); ?>" <?php echo ($read ? 'readonly' : ''); ?> required>
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" name="email" class="form-control" value="<?php echo (isset($leads) ? $leads['email'] : ''); ?>" <?php echo ($read ? 'readonly' : ''); ?>>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Phone</label>
                            <input type="text" name="phone" class="form-control" value="<?php echo (isset($leads) ? $leads['phone'] : ''); ?>" <?php echo ($read ? 'readonly' : ''); ?>>
                        </div>
                        <div class="form-group">
                            <label for="">Mobile</label>
                            <input type="text" name="mobile" class="form-control" value="<?php echo (isset($leads) ? $leads['mobile'] : ''); ?>" <?php echo ($read ? 'readonly' : ''); ?>>
                        </div>
                        <div class="form-group">
                            <label for="">Lead Status</label>
                            <select name="status" class="form-control" <?php echo ($read ? 'disabled' : ''); ?>>
                                <?php foreach ($lead_status->result_array() as $row) { ?>
                                    <option value="<?php echo $row['id']; ?>" <?php echo (isset($leads) ? ($leads['lead_status_id'] == $row['id'] ? 'selected' : '') : ''); ?>><?php echo $row['name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <!-- other information -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Other Information</h3>
                </div>
                <div class="card-body row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Company</label>
                            <input type="text" name="company" class="form-control" value="<?php echo (isset($leads) ? $leads['company'] : ''); ?>" <?php echo ($read ? 'readonly' : ''); ?>>
                        </div>
                        <div class="form-group">
                            <label for="">Company Size</label>
                            <select name="company_size" class="form-control" <?php echo ($read ? 'disabled' : ''); ?>>
                                <?php foreach ($company_size->result_array() as $row) { ?>
                                    <option value="<?php echo $row['id']; ?>" <?php echo (isset($leads) ? ($leads['company_size_id'] == $row['id'] ? 'selected' : '') : ''); ?>><?php echo $row['name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Industry</label>
                            <select name="company_type" class="form-control" <?php echo ($read ? 'disabled' : ''); ?>>
                                <?php foreach ($company_type->result_array() as $row) { ?>
                                    <option value="<?php echo $row['id']; ?>" <?php echo (isset($leads) ? ($leads['company_type_id'] == $row['id'] ? 'selected' : '') : ''); ?>><?php echo $row['name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Address</label>
                            <textarea name="address" class="form-control" <?php echo ($read ? 'readonly' : ''); ?>><?php echo (isset($leads) ? $leads['address'] : ''); ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="">Website</label>
                            <input type="text" name="website" class="form-control" value="<?php echo (isset($leads) ? $leads['website'] : ''); ?>" <?php echo ($read ? 'readonly' : ''); ?>>
                        </div>
                        <div class="form-group">
                            <label for="">Lead Source</label>
                            <input type="text" name="source" class="form-control" value="<?php echo (isset($leads) ? $leads['source'] : ''); ?>" <?php echo ($read ? 'readonly' : ''); ?>>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>