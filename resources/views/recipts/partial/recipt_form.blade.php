<form action="{{ isset($item->id) ? route('recipts.update', $item->id) : route('recipts.store' ) }}" id="receipt_form"
    method="POST" enctype="multipart/form-data" class="g-3 needs-validation" novalidate>
    @csrf

    @if(isset($item->id))
    @method('PUT')
    @endif

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="customer" class="form-label">Customer</label>
            <select name="customer_id" class="form-control" required>
                @foreach($customers as $customer)
                <option value="{{ $customer->id }}"
                    {{ (isset($item->customer_id) && $item->customer_id == $customer->id) ? 'selected' : '' }}>
                    {{ $customer->name }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <label for="total_amount" class="form-label">Total Amount</label>
            <input type="text" name="total_amount" class="form-control" value="{{ $item->total_amount ?? '' }}"
                required>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="payment_method" class="form-label">Payment Method</label>
            <select name="payment_method" class="form-select" required>
                <option value="credit_card"
                    {{ (isset($item->payment_method) && $item->payment_method == 'credit_card') ? 'selected' : '' }}>
                    Credit Card</option>
                <option value="bank_deposit"
                    {{ (isset($item->payment_method) && $item->payment_method == 'bank_deposit') ? 'selected' : '' }}>
                    Bank Deposit</option>
                <option value="cash"
                    {{ (isset($item->payment_method) && $item->payment_method == 'cash') ? 'selected' : '' }}>Cash
                </option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="date" class="form-label">Date</label>
            <input type="date" name="date" class="form-control"
                value="{{ isset($item) ? \Carbon\Carbon::parse($item->selected_date)->format('Y-m-d') : \Carbon\Carbon::today()->format('Y-m-d') }}"
                required>
        </div>
    </div>

    <div class="text-end">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>