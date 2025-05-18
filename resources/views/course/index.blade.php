@extends('layout.master')
@push('css')
    <link href="{{ asset('/css/bootstrap-table.css')}}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@section('content')
    <a class="btn btn-primary" href="{{ route('courses.create')}}">
        Add more course
    </a><br>
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
                <th style="" data-field="created_at">
                    <div class="th-inner sortable both">Created at</div>
                    <div class="fht-cell"></div>
                </th>
                <th style="" data-field="delete">
                    <div class="th-inner sortable both">Delete</div>
                    <div class="fht-cell"></div>
                </th>
                <th style="" data-field="edit">
                    <div class="th-inner ">Edit</div>
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
                <th>Total of Std</th>
                <th>Created At</th>
                <th>Edit</th>
                @if(session()->get('level') === 1)
                    <th>Delete</th>
                @endif
            </tr>
            @foreach ($data as $course)
            <tr>
                <td>
                    <input data-index="0" name="btSelectItem" type="checkbox">
                </td>
                <td>{{ $course ->id}}</td>
                <td>{{ $course ->name}}</td>
                <td>{{ $course ->students->count()}}</td>
                <td>{{ $course -> getYearCreatedAtAttribute()}}</td>
                <td>
                    <a href="{{route('courses.edit',$course)}}">
                        <button class="btn btn-primary">Edit</button>
                    </a>
                </td>
                @if(session()->get('level') === 1)
                    <td>
                        <form action="{{route('courses.destroy',$course)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>   
                @endif
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