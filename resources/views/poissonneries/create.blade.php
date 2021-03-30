
@extends('layout')
@section('title', 'Products')
@section('content')
<div class="container products">
	
	<div class="path text-uppercase" style="font-size: 30px;"><a type="button" data-toggle="modal" data-target="#cartModal" class="badge badge-danger totalItem">0</a><span style="font-size:30px" class="fa fa-shopping-cart" ></span></a> </div>

<div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
         
            </div>
           </p><span class="totalAmount"></span>
            <div class="modal-footer">
            <button type="button" onclick="confirmer"class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" onclick="handleSubmit()" class="btn btn-primary">Save changes</ button>
            </div>
        </div>
        </div>
        </div>


<div class="row">
	@foreach($poisson as $p)
	<div class="card col-md-4" >
  <img class="card-img-top" src="../images/{{ $p->images }}" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">poisson ton</h5>
    <p class="card-text">prix:1000f</p>
    <a href="#" class="btn btn-primary" onclick="cartAdded({{ $p }})">ajouter au panier</a>
  </div>
</div>


@endforeach
</div>
</div>


 

@endsection
