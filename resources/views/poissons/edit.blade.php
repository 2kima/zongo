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
      <form method="post" action="{{ route('poisson.update', $poisson->id) }}">

        <div class="form-group">
          @csrf
              @method('PATCH')
              <label for="title">title</label>
              <input type="text" class="form-control" name="title" value="{{ $poisson->title }}"/>
          </div>
          <div class="form-group">
              
              <label for="prix">prix</label>
              <input type="text" class="form-control" name="prix" value="{{ $poisson->prix }}"/>
          </div>
          <div class="form-group">
              <label for="qte_stock">qte_stock</label>
              <input type="text" class="form-control" name="qte_stock" value="{{ $poisson->qte_stock }}"/>
          </div>

          <div class="form-group">
              <label for="images">image</label>
              <input type="file" class="form-control" name="image" value="{{ $poisson->images }}"/>
          </div>


          
          <button type="submit" class="btn btn-block btn-danger">Update User</button>
      </form>
  </div>
</div>
@endsection
