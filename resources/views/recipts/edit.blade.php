<form action="{{ isset($item->id) ? route('recipt.update', $item->id) : route('recipt.store')}}" method="POST"
    enctype="multipart/form-data">
    @csrf
    @if(isset($item->id))
    @method('PUT')
    @endif

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="customer" class="form-label">Customer</label>
            <select name="customer_id" class="form-control" required>
                @foreach($customer as $customers)
                <option value="{{ $customers->id }}"
                    {{ (isset($item->customer_id) && $item->customer_id == $customers->id) ? 'selected' : '' }}>
                    {{ $customers->name }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <label for="total_amount" class="form-label">Total Amount</label>
            <input type="number" name="total_amount" class="form-control" value="{{ $item->total_amount ?? '' }}"
                required>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="payment_method" class="form-label">Payment Method</label>
            <select name="payment_method" class="form-control" required>
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
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>