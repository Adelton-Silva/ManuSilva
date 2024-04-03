@extends('layouts.inc.front')

@section('title')
Benvindo ao Home-Service
@endsection

@section('content')
@include('layouts.inc.slider')
<div class="py-5">
  <div class="container">
    <div class="row">
      <h2>Serviços em Destaque</h2>
      <div class="owl-carousel featured-carousel owl-theme">
        @foreach($featured_service as $service)
        <div class="item">
          <a href="{{ url('category/'.$service->category->slug.'/'.$service->slug)}}">
          <div class="card">
            <img src="{{asset('assets/uploads/services/'.$service->image)}}" alt="Service image">
            <div class="card-body">
              <h5>{{$service->name}}</h5>
              <span class="float-start">{{$service->selling_price}}$</span>
              <span class="float-end"> <s>{{$service->original_price}}$</s></span>
            </div>
          </div>
          </a>
        </div>
        @endforeach
      </div>

    </div>

  </div>
</div>


<div class="py-5">
  <div class="container">
    <div class="row">
      <h2>Categoria de Tendências</h2>
      <div class="owl-carousel featured-carousel owl-theme">
        @foreach($trending_category as $tcategory)
        <div class="item">
          <a href="{{ url('category/'.$tcategory->slug)}}">
            <div class="card">
              <img src="{{asset('assets/uploads/category/'.$tcategory->image)}}" alt="Service image">
              <div class="card-body">
                <h5>{{$tcategory->name}}</h5>
                <p>
                  {{$tcategory->description}}
                </p>
              </div>
            </div>
          </a>
        </div>
        @endforeach
      </div>

    </div>

  </div>
</div>

@endsection

@section('scripts')
<script>
  $('.featured-carousel').owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    dots: false,
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 3
      },
      1000: {
        items: 4
      }
    }
  })
</script>
@endsection