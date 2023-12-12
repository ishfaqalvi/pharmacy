<div class="row">
    <div class="form-group col-md-4 mb-3">
        {{ Form::label('brand') }}
        <select name="brand_id" class="form-control select">
            <option value="">--Select--</option>
            @foreach($filters['brand_id'] as $row)
                <option 
                    value="{{$row->brand_id}}" 
                    {{ !is_null($userRequest) ? ($userRequest->brand_id == $row->brand_id? 'selected' : '') : ''}}
                    >
                    {{$row->brand->name}}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-4 mb-3">
        {{ Form::label('category') }}
        <select name="category_id" class="form-control select">
            <option value="">--Select--</option>
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
    <div class="form-group col-md-4 mb-3">
        {{ Form::label('sub_category') }}
        <select name="sub_category_id" class="form-control select">
            <option value="">--Select--</option>
            @foreach($filters['sub_category_id'] as $row)
                <option 
                    value="{{$row->sub_category_id}}" 
                    {{ !is_null($userRequest) ? ($userRequest->sub_category_id == $row->sub_category_id? 'selected' : '') : ''}}
                    >
                    {{$row->subCategory->name}}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-8">
        <input type="text" class="form-control" name="search_like" value="{{ !is_null($userRequest) ? $userRequest->search_like : ''}}" placeholder="Search (Name, Formula, Description)">
    </div>
    <div class="form-group col-md-4">
        <button type="submit" class="btn btn-primary w-100">
            Submit <i class="ph-paper-plane-tilt ms-2"></i>
        </button>
    </div>
</div>