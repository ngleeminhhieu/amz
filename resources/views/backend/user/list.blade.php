@extends('backend.master')
@section('content')
<div class="row text-center">
    <div class="col-lg-12 grid-margin">
        <div class="table-responsive">
            <a href="{{route($route.'.create')}}" class="btn btn-sm btn-success float-right"><i
                    class="mdi mdi-plus-box"></i> ADD {{$pagename}}</a>
            <table class="table text-center">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>UserName</th>
                        <th>IMG</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Date of update</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($list as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->username}}</td>
                        <td><img src="{{$item->hinh}}" width="200px" height="200px"></td>
                        <td>{{$item->ten}}</td>
                        <td><span class="badge badge-primary">{{$item->trangthai == 1 ? 'Display' : 'Hidden'}}</span></td>
                        <td>{{$item->updated_at}}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a type="button" class="btn btn-outline-secondary text-light"
                                    href="{{ route($route.'.edit', [$item->id])}}">
                                    <i class="mdi mdi-table-edit text-primary"></i>
                                </a>

                            </div>
                        </td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button data-id="{{$item->id}}"
                                    onclick="return confirm('Do you want to delete it?')"
                                    data-href="{{ route($route.'.destroy', [$item->id])}}"
                                    class="buttonDelete btn btn-outline-secondary text-light">
                                    <i class="mdi mdi-delete-forever text-danger"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    <script>
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        $(function() {
                            $('.buttonDelete').click(function() {
                                var url = $(this).data('href');
                                var id = $(this).data('id');
                                alert(url);
                                $.ajax({
                                    url: url,
                                    type: 'DELETE',
                                    dataType: "JSON",
                                    data: {
                                        "id": id // method and token not needed in data
                                    },
                                    success: function(data) {
                                        if (data.result == "Redirect")
                                            //toastr.success(data.msg);
                                            window.location.href = data.url;
                                    }
                                });
                            });
                        })
                    </script>
                </tbody>
            </table>
            {{$list->links()}}

        </div>

    </div>
    @endsection
