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
      <form method="post" action="{{ route('client.update', $client->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="nom">Nom</label>
              <input type="text" class="form-control" name="nom" value="{{ $client->nom }}"/>
          </div>
          <div class="form-group">
              <label for="prenom">prenom</label>
              <input type="text" class="form-control" name="prenom" value="{{ $client->prenom }}"/>
          </div>
          <div class="form-group">
              <label for="contact">contact</label>
              <input type="tel" class="form-control" name="contact" value="{{ $client->contact }}"/>
          </div>
          
          </div>
          <button type="submit" class="btn btn-block btn-danger">Update User</button>
      </form>
  </div>
</div>
@endsection
