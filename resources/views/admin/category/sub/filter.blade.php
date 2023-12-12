<div class="row">
    <div class="form-group col-md-3">
        <select name="category_id" class="form-control select">
            <option value="">--Select Category--</option>
            @foreach($filters['category_id'] as $row)
                <option 
                    value="{{$row->category_id}}" 
                    {{ !is_null($userRequest) ? ($userRequest->category_id == $row->category_id? 'selected' : '') : ''}}
                    >
                    {{$row->category->name}}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-6">
        <input type="text" class="form-control" name="search_like" value="{{ !is_null($userRequest) ? $userRequest->search_like : ''}}" placeholder="Search (Name, Formula, Description)">
    </div>
    <div class="form-group col-md-3">
        <button type="submit" class="btn btn-primary w-100">
            Submit <i class="ph-paper-plane-tilt ms-2"></i>
        </button>
    </div>
</div>