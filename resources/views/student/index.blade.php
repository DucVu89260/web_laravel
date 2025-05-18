@extends('layout.master')
@push('css')
    <link href="{{ asset('/css/bootstrap-table.css')}}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@section('content')
    <a class="btn btn-primary" href="{{ route('students.create')}}">
        Add more student
    </a><br>
    
    <div class="form-group">
        <form method="get">
            <select class="form-control" name="status" value="{{ $selectedStatus }}" onchange="this.form.submit()">
                <option value="0" {{ $selectedStatus == 0 ? 'selected' : '' }}>All</option>
                @foreach ($arrStudentStatus as $option => $value )
                    <option value="{{ $value }}">
                        {{ $option }}
                    </option>
                @endforeach
            </select>
        </form>
    </div>

    <table id="bootstrap-table" class="table table-hover">
        <caption>
            <form class="navbar-form navbar-left navbar-search-form" role="search" method="get">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    <input type="search" name="q" value="{{ $search }}" class="form-control" placeholder="">
                </div>
            </form>
        </caption>
{{-- 
        <div class="form-group">
            <form class="navbar-form navbar-left navbar-search-form" role="search" method="get">
                <div class="col-sm-12">
                    <select class="form-control" id="select_name" name="q" value="{{ $search }}">
                        <option>All</option>
                        <option>Active</option>
                        <option>Inactive</option>
                    </select>
                </div>
            </form>
        </div> --}}

        <thead>
            <tr>
                <th class="bs-checkbox " style="width: 36px; " data-field="state">
                    <div class="th-inner "><input name="btSelectAll" type="checkbox"></div>
                    <div class="fht-cell"></div>
                </th>
                <th class="text-center" style="" data-field="id">
                    <div class="th-inner ">ID</div>
                    <div class="fht-cell"></div>
                </th>
                <th style="" data-field="name">
                    <div class="th-inner sortable both">Name</div>
                    <div class="fht-cell"></div>
                </th>
                <th style="" data-field="name">
                    <div class="th-inner sortable both">Gender</div>
                    <div class="fht-cell"></div>
                </th>
                <th style="" data-field="name">
                    <div class="th-inner sortable both">Birth date</div>
                    <div class="fht-cell"></div>
                </th>
                <th style="" data-field="name">
                    <div class="th-inner sortable both">Status</div>
                    <div class="fht-cell"></div>
                </th>
                <th style="" data-field="name">
                    <div class="th-inner sortable both">Course Id</div>
                    <div class="fht-cell"></div>
                </th>
                <th style="" data-field="created_at">
                    <div class="th-inner sortable both">Created at</div>
                    <div class="fht-cell"></div>
                </th>
                <th style="" data-field="edit">
                    <div class="th-inner ">Edit</div>
                    <div class="fht-cell"></div>
                </th>
                <th style="" data-field="delete">
                    <div class="th-inner sortable both">Delete</div>
                    <div class="fht-cell"></div>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>
                    <input data-index="0" name="btSelectItem" type="checkbox">
                </th>
                <th>#</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Age</th>
                <th>Status</th>
                <th>Avatar</th>
                <th>Course name</th>
                <th>Created At</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach ($data as $student)
            <tr>
                <td>
                    <input data-index="0" name="btSelectItem" type="checkbox">
                </td>
                <td>{{ $student ->id}}</td>
                <td>{{ $student ->name}}</td>
                <td>{{ $student ->getGenderNameAttribute() }}</td>
                <td>{{ $student ->getAgeAttribute() }}</td>
                <td>{{ $student ->getStatusNameAttribute() }}</td>
                <td>
                    <img src="{{ public_path($student->avatar)}}/{{Str::afterLast($student->avatar, '/') }}" alt="">
                </td>
                <td>{{ $student ->course->name }}</td>
                <td>{{ $student -> getYearCreatedAtAttribute() }}</td>
                <td>
                    <a href="{{route('students.edit',$student)}}">
                        <button class="btn btn-primary">Edit</button>
                    </a>
                </td>
                <td>
                    <form action="{{route('students.destroy',$student)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>   
            </tr>
            @endforeach
        </tbody>
    </table>


    <div class="pull-right pagination-container">
        <ul class="pagination">
            {{$data->links()}}
        </ul>
    </div>
@endsection
@push('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(function(){
        $('#select_name').select2({
        ajax: {
            url: "{{ route('courses.api.name' )}}",
            dataType: 'json',
            data: function (params) {
            return {
                q: params.term, // search term
            };
            },
            processResults: function (data, params) {
                console.log(data);
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.name,
                            id: item.id
                        }
                    })
                };
            },
        },
        placeholder: 'Search for a name',
        });

        $('#select_name').change('keyup', function () {
            table.column(0).search(this.value).draw();
        });
    })
</script>    
@endpush