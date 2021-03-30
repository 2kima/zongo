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
      </div><br />
    @endif
      <form method="post" action="{{ route('commande.store') }}">
          <div class="form-group">
              @csrf
              <label for="date_cmd">Date commande</label>
              <input type="date" class="form-control" name="date_cmd"/>
          </div>
          <div class="form-group">
              <label for="montant_cmd">Montant commande</label>
              <input type="integer" class="form-control" name="montant_cmd"/>
          </div>
          
          <select class="selectpicker" name="id_clt" type="bigint">
  <option value="id_clt">grossisse</option>
  <option  value="id_clt">detaillant</option>
  
</select>

          
          
          <button type="submit" class="btn btn-block btn-danger">Create User</button>
      </form>
  </div>
</div>
@endsection
