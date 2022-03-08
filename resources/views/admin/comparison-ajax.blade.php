<label class="fw-bold mb-2">Comparison*</label>
<select name="comparison" class="form-control">
    <option value="">Select</option>
    @foreach($comparisons_ajax as $comparison_ajax)
        <option value="{{ $comparison_ajax->id }}">{{ $comparison_ajax->name }}</option>
    @endforeach
</select>
