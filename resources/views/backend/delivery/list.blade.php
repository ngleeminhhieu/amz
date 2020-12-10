@extends('backend.master')
@section('content')
<div class="row text-center">
    <div class="col-lg-12 grid-margin">
        <div class="table-responsive">
            @if (session('msg'))
            <div class="col-12 alert alert-{{session('status')}}">
                {{session('msg')}}
            </div>
            @endif
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Total</th>
                        <th>nameBill</th>
                        <th>telBill</th>
                        <th>deliveryAddress</th>
                        <th>statusOrder</th>
                        <th>delivery_date</th>
                        <th colspan="1">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($list as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{number_format($item->total)}} VND</td>
                        <td>{{$item->nameBill}}</td>
                        <td>{{$item->telBill}}</td>
                        <td>{{$item->deliveryAddress}}</td>
                        <td>{{$item->statusOrder}}</td>
                        <td>{{$item->delivery_date}} </td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a type="button" class="btn btn-outline-secondary text-light"
                                    href="{{route('b.updated_delivery',[$item->id])}}">
                                    <i class="mdi mdi-table-edit text-primary"></i>
                                </a>

                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$list->links()}}

        </div>

    </div>
    @endsection
