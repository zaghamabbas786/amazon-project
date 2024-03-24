@extends('layouts.public.publicNavbar')
@section('body')

    <div class="container">
        <div class="row 4 my-5">
            @if(isset($post['post']) && count($post['post']) >0)
                @foreach($post['post']  as $p)

            <div class="col-4 my-3" onclick="redirect({{json_encode($p->amazon_link)}})">
                <div class="card card-header my-0 d-flex">
                    <p class="fw-bold fs-6" >{{$p->product_name}}</p>
                    <input type="image" class="w-10 my-1 " src="{{asset('images/'.$p->img) }}" href="{{$p->amazon_link}}" >
                    <a class="fw-bold text-danger ">price</a>
                    <a class="text-bg-light text-success " >${{$p->price}}</a>

                </div>

            </div>
                @endforeach
            @endif

        </div>

    </div>
    <script>
        function redirect(e){
            window.location.href=e;
        }
    </script>


@endsection
