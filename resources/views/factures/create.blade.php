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
    Add User
  </div>

  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br/>
    @endif
      <form method="post" action="{{ route('facture.store') }}">
          <div class="form-group">
              @csrf
              <label for="prix">prix</label>
              <input type="text" class="form-control" name="prix"/>
          </div>
          <div class="form-group">
              <label for="qte_prod">qte_prod</label>
              <input type="text" class="form-control" name="qte_prod"/>
          </div>
          <div class="form-group">
              <label for="montant">montant</label>
              <input type="text" class="form-control" name="montant"/>
          </div>
          <div class="form-group">
              <label for="date">date</label>
              <input type="date" class="form-control" name="date"/>
          </div>
         
          <button type="submit" class="btn btn-block btn-danger">Create facture</button>
      </form>
  </div>
</div>
@endsection
