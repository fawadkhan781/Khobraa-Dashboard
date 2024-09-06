<form action="{{ isset($item->id) ? route('jobs.update', $item->id) : route('jobs.store')}}" id="kt_modal_add_user_form"
    method="POST" enctype="multipart/form-data" class="g-3 needs-validation" novalidate>
    @csrf

    <!-- @if(isset($item->id))
    @method('PUT')
    @endif -->

    <div class="row g-3">
        <div class="col-md-6">
            <label for="customer_id" class="form-label">Customer</label>
            <select name="customer_id" class="form-select" required>
                <option value="">Select</option>
                @foreach ($customers as $customer)
                <option value="{{ $customer->id }}"
                    {{ (isset($item->customer_id) && $item->customer_id == $customer->id) ? 'selected' : '' }}>
                    {{ $customer->name }}
                </option>
                @endforeach
            </select>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="col-md-6">
            <label for="staff_id" class="form-label">Staff</label>
            <select name="staff_id" class="form-select" required>
                <option value="">Select</option>
                @foreach ($staffs as $staff)
                <option value="{{ $staff->id }}"
                    {{ (isset($item->staff_id) && $item->staff_id == $staff->id) ? 'selected' : '' }}>
                    {{ $staff->name }}
                </option>
                @endforeach
            </select>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>

        <div class="col-md-6">
            <label for="job_title" class="form-label">Job Title</label>
            <input type="text" class="form-control" id="job_title" name="job_title"
                value="{{ isset($item->job_title) ? $item->job_title : '' }}" required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>

        <div class="col-md-6">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" id="description" name="description"
                value="{{ isset($item->description) ? $item->description : '' }}" required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>

        <div id="rate_options" class="col-md-12">
            <label for="rate_option" class="form-label">Select Rate Option</label>
            <select name="rate_option" id="rate_option" class="form-select" required>
                <option value="">Select</option>
                <option value="day_wise" {{ old('rate_option') == 'day_wise' ? 'selected' : '' }}>Day Wise Rate</option>
                <option value="one_time" {{ old('rate_option') == 'one_time' ? 'selected' : '' }}>One Time</option>
            </select>
        </div>

        <!-- Day Wise Fields -->
        <div id="day_wise_fields" class="col-md-12" style="display: none;">
            <label for="days" class="form-label">Select Days</label>
            <select name="days[]" id="days" class="form-select" multiple>
                <option value="monday" {{ in_array('monday', old('days', [])) ? 'selected' : '' }}>Monday</option>
                <option value="tuesday" {{ in_array('tuesday', old('days', [])) ? 'selected' : '' }}>Tuesday</option>
                <option value="wednesday" {{ in_array('wednesday', old('days', [])) ? 'selected' : '' }}>Wednesday</option>
                <option value="thursday" {{ in_array('thursday', old('days', [])) ? 'selected' : '' }}>Thursday</option>
                <option value="friday" {{ in_array('friday', old('days', [])) ? 'selected' : '' }}>Friday</option>
                <option value="saturday" {{ in_array('saturday', old('days', [])) ? 'selected' : '' }}>Saturday</option>
                <option value="sunday" {{ in_array('sunday', old('days', [])) ? 'selected' : '' }}>Sunday</option>
            </select>

            <label for="duration" class="form-label mt-3">Duration (in hours)</label>
            <input type="number" name="duration" id="duration" class="form-control" min="1" max="24" value="{{ old('duration') }}">

            <label for="person" class="form-label mt-3">Person</label>
            <input type="text" name="person" id="person" class="form-control" value="{{ old('person') }}">

            <label for="time" class="form-label mt-3">Time</label>
            <input type="time" name="time" id="time" class="form-control" value="{{ old('time') }}">

            <label for="source" class="form-label mt-3">Source</label>
            <select name="source" id="source" class="form-select">
                <option value="staff" {{ old('source') == 'staff' ? 'selected' : '' }}>Staff</option>
                <option value="employee" {{ old('source') == 'employee' ? 'selected' : '' }}>Employee</option>
            </select>
        </div>

        <!-- One Time Fields -->
        <div id="one_time_fields" class="col-md-12" style="display: none;">
            <label for="date" class="form-label">Select Date</label>
            <input type="date" name="date" id="date" class="form-control" value="{{ old('date') }}">
        </div>


        <div class="col-md-6">
            <label for="start_time" class="form-label">Start Time</label>
            <div class="input-group">
                <input type="date" class="form-control" id="start_time_date" name="start_time_date"
                    value="{{ isset($item->start_time) ? \Carbon\Carbon::parse($item->start_time)->format('Y-m-d') : '' }}"
                    required>
                <input type="time" class="form-control" id="start_time_time" name="start_time_time"
                    value="{{ isset($item->start_time) ? \Carbon\Carbon::parse($item->start_time)->format('H:i') : '' }}"
                    required>
            </div>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>

        <div class="col-md-6">
            <label for="end_time" class="form-label">End Time</label>
            <div class="input-group">
                <input type="date" class="form-control" id="end_time_date" name="end_time_date"
                    value="{{ isset($item->end_time) ? \Carbon\Carbon::parse($item->end_time)->format('Y-m-d') : '' }}"
                    required>
                <input type="time" class="form-control" id="end_time_time" name="end_time_time"
                    value="{{ isset($item->end_time) ? \Carbon\Carbon::parse($item->end_time)->format('H:i') : '' }}"
                    required>
            </div>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn-primary btn-sm float-end" type="submit">Save</button>
        </div>


    </div>

</form>



<script>
document.addEventListener('DOMContentLoaded', function() {
    const rateTypeSelect = document.getElementById('rate_type');
    const customRateDiv = document.getElementById('customRateDiv');
    const customRateInput = document.getElementById('custom_rate');

    function toggleCustomRate() {
        if (rateTypeSelect.value === 'custom_rate') {
            customRateDiv.style.display = 'block';
            customRateInput.required = true;
        } else {
            customRateDiv.style.display = 'none';
            customRateInput.required = false;
        }
    }

    rateTypeSelect.addEventListener('change', toggleCustomRate);

    // Call the function initially to set the correct state
    toggleCustomRate();
});



document.addEventListener('DOMContentLoaded', function() {
    // Function to combine date and time inputs
    function getDateTime() {
        var date = document.getElementById('end_time_date').value;
        var time = document.getElementById('end_time_time').value;
        return date && time ? `${date}T${time}` : '';
    }

    // Example of how to use the combined date-time value
    document.getElementById('end_time_date').addEventListener('change', function() {
        console.log(getDateTime());
    });

    document.getElementById('end_time_time').addEventListener('change', function() {
        console.log(getDateTime());
    });
});

document.getElementById('rate_option').addEventListener('change', function() {
    var dayWiseFields = document.getElementById('day_wise_fields');
    var oneTimeFields = document.getElementById('one_time_fields');

    if (this.value === 'day_wise') {
        dayWiseFields.style.display = 'block';
        oneTimeFields.style.display = 'none';
    } else if (this.value === 'one_time') {
        dayWiseFields.style.display = 'none';
        oneTimeFields.style.display = 'block';
    } else {
        dayWiseFields.style.display = 'none';
        oneTimeFields.style.display = 'none';
    }
});

// To handle page reload with validation errors
document.addEventListener("DOMContentLoaded", function() {
    var selectedOption = document.getElementById('rate_option').value;
    if (selectedOption === 'day_wise') {
        document.getElementById('day_wise_fields').style.display = 'block';
    } else if (selectedOption === 'one_time') {
        document.getElementById('one_time_fields').style.display = 'block';
    }
});
</script>
