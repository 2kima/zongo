 
@extends('layout')

@section('content')
<table id="cart" class="table table-hover table-condensed">
<thead>
<tr>
<th style="width:50%">Produit</th>
<th style="width:10%">Prix</th>
<th style="width:8%">Quantite</th>
<th style="width:22%" class="text-center">Somme total</th>
<th style="width:10%"></th>
</tr>
</thead>
<tbody>
<tr>
<td data-th="Product">
<div class="row">
<div class="col-sm-3 hidden-xs"><img src="..." alt="..." class="img-responsive"/></div>
<div class="col-sm-9">
<h4 class="nomargin">machoiron</h4>
<p></p>
</div>
</div>
</td>
<td data-th="Price"></td>
<td data-th="Quantity">
<input type="number" class="form-control text-center" value="1">
</td>
<td data-th="Subtotal" class="text-center"></td>
<td class="actions" data-th="">
<button class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>
<button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
</td>
</tr>
</tbody>
<tfoot>
<tr class="visible-xs">
<td class="text-center"><strong>Total:1000</strong></td>
</tr>
<tr>
<td><a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continuer la commande</a></td>
<td colspan="2" class="hidden-xs"></td>
<td class="hidden-xs text-center"><strong>Total:1000</strong></td>
</tr>
</tfoot>
</table>

@endsection
