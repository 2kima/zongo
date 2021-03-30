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
      <form method="post" action="{{ route('commande.update', $commande->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="date_cmd">date</label>
              <input type="date" class="form-control" name="date_cmd" value="{{ $commande->date_cmd }}"/>
          </div>
          <div class="form-group">
              <label for="montant_cmd">montant_cmd</label>
              <input type="integer" class="form-control" name="montant_cmd" value="{{ $commande->montant_cmd }}"/>
          </div>
          <div class="form-group">
              <label for="id_clt">id_clt</label>
              <input type="bigintger" class="form-control" name="id_clt" value="{{ $commande->id_clt }}"/>
          </div>
          
          </div>
          <button type="submit" class="btn btn-block btn-danger">Update User</button>
      </form>
  </div>
</div>
@endsection
