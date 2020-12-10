@extends('backend.master')
@section('content')
<div class="row text-center">
    <div class="col-lg-12 grid-margin">
        <div class="table-responsive">
            <a href="{{route($route.'.create')}}" class="btn btn-sm btn-success float-right"><i
                    class="mdi mdi-plus-box"></i> ADD {{$pagename}}</a>
            @if (session('msg'))
            <div class="col-12 alert alert-{{session('status')}}">
                {{session('msg')}}
            </div>
            @endif
            <table class="table">
                <thead>
                    <tr>
                        <th>Product ID</th>
                        <th>TypeProduct</th>
                        <th>Product Name</th>
                        <th>IMG</th>
                        <th>Category ID</th>
                        <th>Supplier ID</th>
                        <th>Brand ID</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Sale</th>
                        <th>Status</th>
                        <th>Date of update</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($list as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->typeProduct}}</td>
                        <td>{{$item->product_name}}</td>
                        <td><img src="{{$item->img}}" width="200px" height="200px"></td>
                        <td>{{$item->category->name}}</td>
                        <td>{{$item->supplier->name}}</td>
                        <td>{{$item->brand->name}}</td>
                        <td>{{$item->quantity}} </td>
                        <td>{{$item->price}}</td>
                        <td>{{$item->sale}}</td>
                        <td>
                            @if ($item->status == 1)
                            <span class="badge badge-success">Display</span>
                            @else
                            <span class="badge badge-primary">Display</span>
                            @endif
                        </td>
                        <td>{{$item->updated_at}}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a type="button" class="btn btn-outline-secondary text-light"
                                    href="{{route($route.'.edit',[$item->id])}}">
                                    <i class="mdi mdi-table-edit text-primary"></i>
                                </a>

                            </div>
                        </td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button data-id="{{ $item->id }}"
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
