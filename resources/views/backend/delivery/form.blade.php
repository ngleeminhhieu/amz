@extends('backend.master')
@section('content')
<div class="row ">
    <div class="col stretch-card container-scroller">
        <div class="card">
            <div class="card-body">
                <form class="form-sample text-dark" method="POST" action="{{$action}}" novalidate>
                    <h4 class="card-description">{{$title.' '.$pagename}}</h4>
                    <p class="card-description">Order's Information</p>
                    @if (session('msg'))
                    <div class="col-12 alert alert-{{session('status')}}">
                        {{session('msg')}}
                    </div>
                    @endif
                    @if($errors->any())
                    <div class="col-12 alert alert-danger">
                        @foreach ($errors->all() as $er)
                        {{$er}}<br>
                        @endforeach
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">nameBill</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly name="nameBill"
                                        value="{{$item->nameBill??old('nameBill')}}" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">telBill</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly name="telBill"
                                        value="{{$item->telBill??old('telBill')}}" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">deliveryAddress</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly name="deliveryAddress"
                                        value="{{$item->deliveryAddress??old('deliveryAddress')}}" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-2">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="statusOrder"
                                                id="membershipRadios1"
                                            @if (isset($item) && $item->statusOrder == "Packing") checked
                                            @endif value="Packing">Packing<i class="input-helper"></i></label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="statusOrder"
                                                id="membershipRadios2"@if (isset($item) && $item->statusOrder == "Being delivered") checked
                                                @endif value="Being delivered"> Being delivered <i
                                                class="input-helper"></i></label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="statusOrder"
                                                id="membershipRadios2" value="Completed"> Completed <i
                                                class="input-helper"></i></label>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="statusOrder"
                                                id="membershipRadios2" value="Cancel"> Cancel <i
                                                class="input-helper"></i></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row float-right">
                                @csrf
                                @method($method)
                                <a href="{{route('b.delivery')}}" class="btn btn-md btn-dark mr-2">Back</a> <button
                                    type="submit" class="btn btn-md btn-primary">{{$title}}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
