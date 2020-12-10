@extends('backend.master')
@section('content')
<div class="row ">
    <div class="col stretch-card container-scroller">
        <div class="card">
            <div class="card-body">
                <form class="form-sample text-dark" method="POST" action="{{$action}}" novalidate>
                    <h4 class="card-description">{{$title.' '.$pagename}}</h4>
                    <p class="card-description">Product's Information</p>
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
                                <label class="col-sm-12 col-form-label">Name</label>
                                <div class="col-sm-12">
                                    <input type="text" name="nameProduct" id="nameProduct"
                                        onchange="stralias('nameProduct','nameUrl')"
                                        value="{{$item->product_name??old('nameProduct')}}" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">URL</label>
                                <div class="col-sm-12">
                                    <input type="text" name="nameUrl" id="nameUrl"
                                        value="{{$item->nameUrl??old('nameUrl')}}" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">IMG</label>
                                <div class="col-sm-12">
                                    <img width="100" src="{{$item->img??''}}" />
                                    <input type="hidden" name="fimg" id="fimg" value="{{$item->img??old('fimg')}}"
                                        class="form-control">
                                    <button class="btn btn-primary" onclick="openfile('fimg')" type="button">Please
                                        choose IMG</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">TypeProduct
                                </label>
                                <div class="col-lg-10">
                                    <select required name="typeProduct" id="typeProduct" class="form-control text-dark">
                                        @if(isset($item))
                                            @if ($item->typeProduct=='fanlight')
                                            <option value="fanlight" selected>FANLIGHT</option>
                                            <option value="ablum">ABLUM</option>
                                            <option value="accessories">ACCESSORIES</option>
                                            @endif

                                            @if ($item->typeProduct=='ablum')
                                            <option value="fanlight">FANLIGHT</option>
                                            <option value="ablum" selected>ABLUM</option>
                                            <option value="accessories">ACCESSORIES</option>
                                            @endif

                                            @if ($item->typeProduct=='accessories')
                                            <option value="fanlight" selected>FANLIGHT</option>
                                            <option value="ablum">ABLUM</option>
                                            <option value="accessories" selected>ACCESSORIES</option>
                                            @endif
                                        @else
                                        <option>---- Choose typeProduct ----</option>
                                        <option value="fanlight" >FANLIGHT</option>
                                        <option value="ablum">ABLUM</option>
                                        <option value="accessories">ACCESSORIES</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Category</label>
                                <div class="col-sm-10">
                                    <select required name="categoryID"
                                        class=" @error('categoryID') is-invalid @endif form-control text-dark">
                                        <option value="">---- Choose Category ----</option>
                                        @foreach ($category as $idanhmuc)
                                        <option @if(isset($item) && $item->categoryID==$idanhmuc->id) selected @endif
                                            value="{{$idanhmuc->id}}">{{$idanhmuc->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('categoryID')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Supplier</label>
                                <div class="col-sm-10">
                                    <select required name="supplierID"
                                        class=" @error('supplierID') is-invalid @endif form-control text-dark">
                                        <option value="">---- Choose Supplier ----</option>
                                        @foreach ($supplier as $icungcap)
                                        <option @if(isset($item) && $item->supplierID==$icungcap->id) selected @endif
                                            value="{{$icungcap->id}}">{{$icungcap->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('supplierID')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Brand</label>
                                <div class="col-sm-10">
                                    <select required name="brandID"
                                        class=" @error('brandID') is-invalid @endif form-control text-dark">
                                        <option value="">---- Choose Brand ----</option>
                                        @foreach ($brand as $ithuonghieu)
                                        <option @if(isset($item) && $item->brandID==$ithuonghieu->id) selected
                                            @endif
                                            value="{{$ithuonghieu->id}}">{{$ithuonghieu->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('brandID')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Quantity</label>
                                <div class="col-sm-10">
                                    <input type="number" name="soluong" value="{{$item->quantity??old('soluong')}}"
                                        class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Price</label>
                                <div class="col-sm-10">
                                    <input type="number" name="gia" value="{{$item->price??old('gia')}}"
                                        class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Sale</label>
                                <div class="col-sm-10">
                                    <input type="number" name="giagiam" value="{{$item->sale??old('giagiam')}}"
                                        class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Description</label>
                                <div class="col-sm-12">
                                    <textarea rows="5" name="mota" id="mota"
                                        class="form-control">{{$item->product_describe??old('mota')}}</textarea>
                                    <script>
                                        CKEDITOR.replace('mota')
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-12 col-form-label">Details</label>
                                <div class="col-sm-12">
                                    <textarea rows="5" name="chitiet"
                                        class="form-control">{{$item->product_detail??old('chitiet')}}</textarea>
                                    <script>
                                        CKEDITOR.replace('chitiet')
                                    </script>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-4">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="status"
                                                id="membershipRadios1" value="1" checked @if(isset($item) &&
                                                $item->status==1) checked @endif>Display<i
                                                class="input-helper"></i></label>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="status"
                                                id="membershipRadios2" value="0" @if(isset($item) && $item->status!=1)
                                            checked @endif> Hidden <i class="input-helper"></i></label>
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
                                <a href="{{route($route.'.index')}}" class="btn btn-md btn-dark mr-2">Back</a> <button
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
