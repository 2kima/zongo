@extends('layout')  
@section('content')

<div class="container">
    <div id="demo" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            @foreach($poissons as $key => $poisson)
            @if($key=== 0)
            <div class="carousel-item active">
            @else
            <div class="carousel-item">
            @endif
                <div class="card-fish">
                    <div class="path text-uppercase" style="font-size: 30px;"><a type="button" data-toggle="modal" data-target="#cartModal" class="badge badge-danger totalItem">0</a><span style="font-size:30px" class="fa fa-shopping-cart" ></span></a> </div>
                    <div class="row">
                        <div class="col-md-8 text-center align-self-center">
                         <img class="img-fluid" src="data:image/jpeg;base64,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"> </div>
                        <div class="col-md-4 info">
                            <div class="row title">
                                <div class="col">
                                    <h2>{{$poisson->title}}</h2>
                                </div>
                                <div class="col text-right"><i class="fa fa-store-alt"></i></a></div>

                            </div>
                            <p>{{$poisson->description}}</p> 
                            <!-- <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star-half-full"></span> <span id="reviews">1590 Reviews</span> -->
                            
                               
                            <div class="row price"> <label class="radio"> <input type="radio" name="size1" value="small" checked> 
                                    <span>
                                        <div class="row">{{number_format($poisson->prix)}} CFA</div></a>
                                    </span> </label> <label class="radio"> <input type="radio" name="size1" value="large">  </label> </div>
                        </div>
                    </div>
                    <div class="row lower">
                        <div class="col"> <a class="carousel-control-prev" href="#demo" data-slide="prev"><i class="fa fa-arrow-left"></i></a> <a class="carousel-control-next" href="#demo" data-slide="next"><i class="fa fa-arrow-right"></i></a> </div>
                        <div class="col text-right align-self-center"> <button class="btn-fish " onclick="cartAdded({{$poisson}})">Ajouter au panier</button> </div>
                    </div>
                   
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
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
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" onclick="handleSubmit()" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        </div>
        </div>
@endsection

