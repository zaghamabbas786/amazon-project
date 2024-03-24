@extends('welcome')
@section('body')


    <div class="container my-5">
        <a class="btn btn-success" href="{{route('admin.add.post')}}">Add products</a>
    </div>
    <div class="container">
           <table class="table table-dark table-striped my-5 mx-auto table-responsive table-bordered ">
               <thead>
               <tr>
                   <th >#</th>
                   <th >Prodcuts Name</th>
                   <th >Actions</th>
               </tr>
               </thead>
               <tbody>

               @if(isset($post['post']) && count($post['post']) > 0)
               @foreach($post['post'] as  $p)
                   <tr>
                       <th>{{$p->id}}</th>
                       <td>{{$p->product_name}}</td>
                       <td>
                           <a class="btn btn-info" href="{{route('admin.post.edit',$p->id)}}">show</a>
                           <a class="btn btn-danger" href="{{route('admin.destroy',$p->id)}}">delete</a>
                       </td>
                   </tr>
               @endforeach
               <div> {{isset($post['link']) ? $post['post']->links():'' }}</div>
               @endif
               </tbody>


   {{--            <div class="tgLuar">--}}
   {{--                <div class="tgDalam">--}}
   {{--                    @if($post->currentPage() != 1)--}}
   {{--                        <a href="{{ $post->url(1) }}">«&nbsp;</a>--}}
   {{--                        <a href="{{ $post->previousPageUrl() }}"><&nbsp;</a>--}}
   {{--                        @for($i=1; $i<=$post->lastPage(); $i++)--}}
   {{--                            @if($i== $post->currentPage()) {--}}
   {{--                            <a class="pranala" ><b>{{ $i }}</b>&nbsp;</a>--}}
   {{--                            @else--}}
   {{--                                <a href="{{ $post->url($i) }}">{{ $i }}&nbsp;</a>--}}
   {{--                            @endif--}}
   {{--                        @endfor--}}
   {{--                        @if($post->currentPage() != $post->lastPage())--}}
   {{--                            <a href="{{ $post->nextPageUrl() }}">>&nbsp;</a>--}}
   {{--                            <a href="{{ $post->url($post->lastPage()) }}">»</a>--}}
   {{--                        @endif--}}
   {{--                    @endif--}}

   {{--                </div>--}}
   {{--            </div>--}}




           </table>





       </div>


   @endsection
