@extends('front.layout.layout')

@section('content')

	<div class="span9">
    <ul class="breadcrumb">
    <li><a href="index.html">Home</a> <span class="divider">/</span></li>
    <li><a href="products.html">Products</a> <span class="divider">/</span></li>
    <li class="active">product Details</li>
    </ul>	
	<div class="row">	  
			{{-- <div id="gallery" class="span3">
            <a href="themes/images/products/large/f1.jpg" title="Fujifilm FinePix S2950 Digital Camera">
				<img src="{{asset('uploads/'.$product->image)}}" style="width:100%" alt="Fujifilm FinePix S2950 Digital Camera"/>
            </a> --}}
			
			  
			 <div class="btn-toolbar">
			  <div class="btn-group">
				<span class="btn"><i class="icon-envelope"></i></span>
				<span class="btn" ><i class="icon-print"></i></span>
				<span class="btn" ><i class="icon-zoom-in"></i></span>
				<span class="btn" ><i class="icon-star"></i></span>
				<span class="btn" ><i class=" icon-thumbs-up"></i></span>
				<span class="btn" ><i class="icon-thumbs-down"></i></span>
			  </div>
			</div>
			</div>
			<div class="span6">
				<h3>{{$product->ProductDetail->title}}</h3>
				<hr class="soft"/>
				  <div class="control-group">
					<label class="control-label"><span>৳{{$product->price}}</span></label>
					<div class="controls">
						<form method="post" action="{{route('cart.store')}}">
							@csrf
							<input type="number" class="span1" name="qty" placeholder="Qty."/>
							<input type="hidden" value="{{$product->id}}" name="product_id" readonly>
							@if(Auth::user())
						  	<button type="submit" class="btn btn-large btn-primary pull-right"> Add to cart <i class=" icon-shopping-cart"></i></button>
							@else
								<button class="btn btn-large btn-primary pull-right"><a style="color: #fff;text-decoration: none;" href="{{route('user_login')}}"> Add to cart <i class=" icon-shopping-cart"></i></a></button>
							@endif
						</form>
					</div>
				  </div>
				
				<hr class="soft"/>
				<h4>{{$product->ProductDetail->total_items}} items in stock</h4>
				<form class="form-horizontal qtyFrm pull-right">
				  <div class="control-group">
					<label class="control-label"><span>Color</span></label>
					<div class="controls">
					  <select class="span2">
						  <option>Black</option>
						  <option>Red</option>
						  <option>Blue</option>
						  <option>Brown</option>
						</select>
					</div>
				  </div>
				</form>
				<hr class="soft clr"/>
				<p>
				{{$product->ProductDetail->description}}
				
				</p>
				<a class="btn btn-small pull-right" href="#detail">More Details</a>
				<br class="clr"/>
			<a href="#" name="detail"></a>
			<hr class="soft"/>
			</div>
			
			<div class="span9">
            <ul id="productDetail" class="nav nav-tabs">
              <li class="active"><a href="#home" data-toggle="tab">Product Details</a></li>
              <li><a href="#profile" data-toggle="tab">Related Products</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
              <div class="tab-pane fade active in" id="home">
			  <h4>Product Information</h4>
                <table class="table table-bordered">
				<tbody>
				{{-- <tr class="techSpecRow"><th colspan="2">Product Details</th></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Brand: </td><td class="techSpecTD2">Fujifilm</td></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Model:</td><td class="techSpecTD2">FinePix S2950HD</td></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Released on:</td><td class="techSpecTD2"> 2011-01-28</td></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Dimensions:</td><td class="techSpecTD2"> 5.50" h x 5.50" w x 2.00" l, .75 pounds</td></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Display size:</td><td class="techSpecTD2">3</td></tr> --}}
				</tbody>
				</table>
				
				<h5>Features</h5>
	
              </div>
		<div class="tab-pane fade" id="profile">
		<br class="clr"/>
		<hr class="soft"/>
		<div class="tab-content">
			<div class="tab-pane active" id="blockView">
				<ul class="thumbnails">
					@foreach($related_products as $related_product)
					<li class="span3">
					  <div class="thumbnail">
						<a href="product_details.html"><img src="{{asset('uploads/'.$related_product->image)}}" alt=""/></a>
						<div class="caption">
						  <h5>{{$related_product->name}}</h5>
						  <h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">&euro;{{$related_product->price}}</a></h4>
						</div>
					  </div>
					</li>
					@endforeach
				  </ul>
			<hr class="soft"/>
			</div>
		</div>
				<br class="clr">
					 </div>
		</div>
          </div>

	</div>
</div>

@endsection