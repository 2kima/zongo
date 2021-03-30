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
   <h4> formulaire d'enregistrement</h4>
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
      <form method="post" action="{{ route('poisson.store') }}" enctype="multipart/form-data">
        <div class="form-group">
              @csrf

              <label for="title">title:</label>
              <input type="text" class="form-control" name="title"/>
          </div>
          <div class="form-group">
              <label for="name">prix</label>
              <input type="text" class="form-control" name="prix"/>
          </div>
          <div class="form-group">
              <label for="qte_stock">quantite</label>
              <input type="text" class="form-control" name="qte_stock"/>
          </div>
           <input type="file" name="images"  >
         
          <button type="submit" class="btn btn-block btn-danger">Creer un poisson</button>
      </form>
  </div>
</div>
@endsection
