
@php
    $coupon_det = json_decode($coupon->details);
@endphp
<div class="panel-heading">
    <h3 class="panel-title">Update Your Cart Base Coupon</h3>
</div>
<div class="form-group">
    <label class="col-lg-3 control-label" for="coupon_code">Coupon code</label>
    <div class="col-lg-9">
        <input type="text" placeholder="Coupon code" id="coupon_code" name="coupon_code" value="{{ $coupon->code }}" class="form-control" required>
    </div>
</div>
<div class="form-group">
    <label class="col-lg-3 control-label">Minimum Shopping</label>
    <div class="col-lg-9">
        <input type="number" min="0" step="0.01" placeholder="Minimum Shopping" name="min_buy" value="{{ $coupon_det->min_buy }}" class="form-control" required>
    </div>
</div>
<div class="form-group row">
    <div class="col-lg-8">
        <label class=" control-label">Discount</label>
        <input type="number" min="0" step="0.01" placeholder="Discount" name="discount" value="{{ $coupon->discount }}" class="form-control" required>
    </div>
    <div class="col-lg-4">
        <label class="control-label">Discount Type</label>
        <select class="form-control" name="discount_type">
            <option value="amount" @if ($coupon->discount_type == 'amount') selected  @endif >৳</option>
            <option value="percent" @if ($coupon->discount_type == 'percent') selected  @endif>%</option>
        </select>
    </div>
</div>
<div class="form-group">
    <label class="col-lg-12 control-label">Maximum Discount Amount</label>
    <div class="col-lg-9">
        <input type="number" min="0" step="0.01" placeholder="Maximum Discount Amount" name="max_discount" class="form-control" value="{{ $coupon_det->max_discount }}" required>
    </div>
</div>
<div class="form-group">
    <label class="col-lg-3 control-label" for="start_date">Date</label>
    <div class="col-lg-9">
        <div id="demo-dp-range">
            <div class="input-daterange input-group" id="datepicker">
                <input type="text" class="form-control" name="start_date" value="{{ date('m/d/Y', $coupon->start_date) }}">
                <span class="input-group-addon">to</span>
                <input type="text" class="form-control" name="end_date" value="{{ date('m/d/Y', $coupon->end_date) }}">
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    $(document).ready(function(){
        $('.demo-select2').select2();
    });

</script>
