
@extends('frontend.master')
@section('title','Detail sản phẩm')
@section('content')
<base href="{{ asset('public/frontend') }} /">
<link rel="stylesheet" href="css/details.css">
<div id="wrap-inner">
<div id="product-info">
	<div class="clearfix"></div>
	<h3>{{$data->name}}</h3>
	<div class="row">
		<div id="product-img" class="col-xs-12 col-sm-12 col-md-3 text-center">
		<img width="180px" src="../upload/image/{{$data->img}}">
		</div>
		<div id="product-details" class="col-xs-12 col-sm-12 col-md-9">
			<p>Giá: <span class="price">{!! number_format($data->price,0,",",".") !!} VND</span></p>
			<p>Bảo hành: {{ $data->warranty }}</p> 
			<p>Phụ kiện: {{ $data->accessories }}</p>
			<p>Tình trạng:{{ $data->condition }}</p>
			<p>Khuyến mại: {{ $data->promotion }} </p>
			<p>Còn hàng: @if($data->status == 1) Còn hàng @else Hết hàng @endif </p>
			<p class="add-cart text-center"><a href="{{URL::route('cart_add',$data->id)}}">Đặt hàng online</a></p>
		</div>
	</div>							
</div>
<div id="product-detail">
	<h3>Chi tiết sản phẩm</h3>
	<p class="text-justify">
		{!!$data->description!!}
	</p>
</div>
<div id="comment">
	<h3>Bình luận</h3>
	<div class="col-md-9 comment">
		<form method="POST" action="{!! URL::route('postcomment', $data->id) !!}">
				{{ csrf_field() }}
			<div class="form-group">
				<label for="email">Email:</label>
				<input required type="email" class="form-control" id="email" name="email">
			</div>
			<div class="form-group">
				<label for="name">Tên:</label>
				<input required type="text" class="form-control" id="name" name="name">
			</div>
			<div class="form-group">
				<label for="cm">Bình luận:</label>
				<textarea required rows="10" id="cm" class="form-control" name="content"></textarea>
			</div>
			<div class="form-group text-right">
				<button type="submit" name="submit" class="btn btn-default">Gửi</button>
			</div>
		</form>
	</div>
</div>
<div id="comment-list">
	@foreach ($comments as $item)
	<ul>
		<li class="com-title">
			{{$item->name}}
			<br>
			<span>{{date('d/m/Y H:i', strtotime($item->created_at))}}</span>	
		</li>
		<li class="com-details">
			{{$item->content}}
		</li>
	</ul>
	@endforeach
</div>
</div>	
@stop				
				