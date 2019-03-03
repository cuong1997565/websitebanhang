@extends('frontend.master')
@section('title','Danh mục sản phẩm')
@section('content')
<link rel="stylesheet" href="css/category.css">
<div id="wrap-inner">
   <div class="products">
      <h3>{{ $category->cate_name }}</h3>
      <div class="product-list row">
         @foreach ($data as $item)
         <div class="product-item col-md-3 col-sm-6 col-xs-12">
            <a href="#"><img src="../upload/image/{{$item['img']}}" class="img-thumbnail"></a>
            <p><a href="#">{{ $item['name'] }}</a></p>
            <p class="price">{!! number_format($item['price'],0,",",".") !!}  VND</p>
            <div class="marsk">
               <a href="{{asset('detail/'.$item['id'].'/'.$item['slug'].'.html')}}">Xem chi tiết</a>
            </div>
         </div>
         @endforeach
      </div>
   </div>
   <div id="pagination">
      <ul class="pagination pagination-lg justify-content-center">
         {{$data->links()}}
      </ul>
   </div>
</div>
@stop