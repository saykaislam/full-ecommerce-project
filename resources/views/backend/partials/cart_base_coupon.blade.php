<div class="panel-heading">
    <h3 class="panel-title">Add Your Cart Base Coupon</h3>
</div>
<div class="form-group">
    <label class="col-lg-3 control-label" for="coupon_code">Coupon code</label>
    <div class="col-lg-9">
        <input type="text" placeholder="Coupon code" id="coupon_code" name="coupon_code" class="form-control" required>
    </div>
</div>
<div class="form-group">
    <label class="col-lg-3 control-label">Minimum Shopping</label>
    <div class="col-lg-9">
        <input type="number" min="0" step="0.01" placeholder="Minimum Shopping" name="min_buy" class="form-control" required>
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-8">
        <label class=" control-label">Discount</label>
        <input type="number" min="0" step="0.01" placeholder="Discount" name="discount" class="form-control" required>
    </div>
    <div class="col-lg-4">
        <label class="control-label">Discount Type</label>
        <select class="form-control" name="discount_type">
            <option value="amount">৳</option>
            <option value="percent">%</option>
        </select>
    </div>
</div>
<div class="form-group">
    <label class="col-lg-12 control-label">Maximum Discount Amount</label>
    <div class="col-lg-9">
        <input type="number" min="0" step="0.01" placeholder="Maximum Discount Amount" name="max_discount" class="form-control" required>
    </div>
</div>
<div class="form-group">
    <label class="col-lg-3 control-label" for="start_date">Date</label>
    <div class="col-lg-9">
        <div id="demo-dp-range">
            <div class="input-daterange input-group" id="datepicker">
                <input type="text" class="form-control" name="start_date">
                <span class="input-group-addon">to</span>
                <input type="text" class="form-control" name="end_date">
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    $(document).ready(function(){
        $('.demo-select2').select2();
    });

</script>
