<div class="col-md-12">
    <form method="post" action="<?php echo site_url('products/save/' . (isset($products) ? $products['id'] : '')); ?>" class="row">
        <div class="col-md-12">
            <button type="submit" class="btn btn-info btn-sm mb-1">Save</button>
            <a href="<?php echo site_url('products'); ?>" class="btn btn-default btn-sm mb-1">Cancel</a>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Product Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo (isset($products) ? $products['name'] : ''); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="description" class="form-control" rows="5"><?php echo (isset($products) ? $products['description'] : ''); ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Sale Price</label>
                            <input type="number" name="price" class="form-control" value="<?php echo (isset($products) ? $products['price'] : '0.00'); ?>" step="0.01" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Status</label>
                            <select name="status" class="form-control">
                                <option value="1" <?php echo (isset($products) ? ($products['status'] == 1 ? 'selected' : '') : ''); ?>>Active</option>
                                <option value="0" <?php echo (isset($products) ? ($products['status'] == 0 ? 'selected' : '') : ''); ?>>Non Active</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>