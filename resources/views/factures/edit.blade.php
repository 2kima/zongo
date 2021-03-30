@extends('layout')

@section('content')

<style>
    .container {
      max-width: 450px;
    }
    .push-top {
      margin-top: 50px;
    }
</style>

<div class="card push-top">
  <div class="card-header">
    Edit & Update
  </div>

  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('facture.update', $facture->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="prix">prix</label>
              <input type="text" class="form-control" name="prix" value="{{ $facture->prix }}"/>
          </div>
          <div class="form-group">
              <label for="qte_prod">qte_prod</label>
              <input type="text" class="form-control" name="qte_prod" value="{{ $facture->qte_prod }}"/>
              <div class="form-group">
              <label for="montant">montant</label>
              <input type="text" class="form-control" name="montant" value="{{ $facture->montant }}"/>
          </div>
          </div>
          <div class="form-group">
              <label for="date">date</label>
              <input type="date" class="form-control" name="date" value="{{ $facture->date }}"/>
          </div>
          
          </div>
          <button type="submit" class="btn btn-block btn-danger">Update User</button>
      </form>
  </div>
</div>
@endsection
