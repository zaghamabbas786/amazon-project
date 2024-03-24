@extends('welcome')
@section('body')

    <div class="container">

{{--        <form class="my-5" method={{isset($post) ? 'PUT' : 'POST'}} action="{{isset($post) ? route('post.update',$post->id) : route('post.store')}}" enctype="multipart/form-data">--}}
{{--            @csrf--}}
{{--            <div class="mb-3">--}}
{{--                <label for="exampleInputEmail1" class="form-label">Products Name</label>--}}
{{--                <input type="text" class="form-control" value="{{isset($post) ? $post->product_name : "" }}"  name="product_name" id="products-name" placeholder="Products Name">--}}
{{--            </div>--}}
{{--            <div class="mb-3">--}}
{{--                <label for="Price" class="form-label">Price</label>--}}
{{--                <input type="number" class="form-control" value="{{isset($post) ? $post->price : ""}}" id="price" name="price" placeholder="price">--}}
{{--            </div>--}}

{{--            <div class="mb-3">--}}
{{--                <label for="Price" class="form-label">Description</label>--}}
{{--                <input type="text" class="form-control" value="{{isset($post) ? $post->description : ""}}"  id="description" name="description" placeholder="description">--}}
{{--            </div>--}}
{{--            @if(isset($post))--}}
{{--            <input type="file" id="myFile" name="img" class="file-upload html5-upload-input"  accept="image/*" value="123" required >--}}
{{--                <div>--}}
{{--                    <input type="image" class="w-50 shadow-xl my-5" src="{{asset('images/'.$post->img) }}" >--}}
{{--                </div>--}}
{{--            @else--}}
{{--                <input type="file" id="myFile" name="img" class="file-upload html5-upload-input"  accept="image/*"   >--}}


{{--            @endif--}}

{{--            <button type="submit" class="btn btn-primary">{{isset($post) ? 'update': 'Submit' }}</button>--}}
{{--        </form>--}}



   @if(isset($post))
        <form class="my-5" method=POST action="{{ route('admin.post.update',$post->id)}} " enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Products Name</label>
                <input type="text" class="form-control" value="{{$post->product_name  }}"  name="product_name" id="products-name" placeholder="Products Name">
            </div>
            <div class="mb-3">
                <label for="Price" class="form-label">Price</label>
                <input type="number" class="form-control" value="{{ $post->price }}" id="price" name="price" placeholder="price">
            </div>
            <div class="mb-3">
                <label for="Price" class="form-label">Amazon link</label>
                <input type="text" class="form-control" value="{{ $post->amazon_link }}" id="amazon_link" name="amazon_link" placeholder="Amazon link">
            </div>

            <div class="mb-3">
                <label for="Price" class="form-label">Description</label>
                <input type="text" class="form-control" value="{{$post->description}}"  id="description" name="description" placeholder="description">
            </div>

                <input type="file" id="myFile" name="img" class="file-upload html5-upload-input"  accept="image/*"  >
                <div>
                    <input type="image" class="w-50 shadow-xl my-5" src="{{asset('images/'.$post->img) }}" >
                </div>


            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        @else
            <form class="my-5" method=post action="{{route('admin.post.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Products Name</label>
                    <input type="text" class="form-control"   name="product_name" id="products-name" placeholder="Products Name">
                </div>
                <div class="mb-3">
                    <label for="Price" class="form-label">Price</label>
                    <input type="number" class="form-control" id="price" name="price" placeholder="price">
                </div>
                <div class="mb-3">
                    <label for="Price" class="form-label">Amazon link</label>
                    <input type="text" class="form-control" id="amazon_link" name="amazon_link" placeholder="Amazon link">
                </div>

                <div class="mb-3">
                    <label for="Price" class="form-label">Description</label>
                    <input type="text" class="form-control"   id="description" name="description" placeholder="description">
                </div>

                <input type="file" id="myFile" name="img" class="file-upload html5-upload-input"  accept="image/*" required  >



                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        @endif

    </div>
@endsection
