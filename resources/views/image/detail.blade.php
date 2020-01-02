@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @include('includes.message')

                <div class="card">
                    <div class="card-header">
                        <div class="userdata-container-post">
                            <div class="container-thumb-post">
                                @if($image->user->image)
                                    <img class="profile-thumb-post" src="{{ route('user.avatar', ['filename'
                                        =>$image->user->image]) }}" alt="">

                                @else
                                    <img class="profile-thumb-post" src="{{ route('user.avatar', ['filename'
                                        =>'generic_avatar.png']) }}" alt="">
                                @endif

                            </div>

                            <p>{{ $image->user->nick }}</p>
                        </div>
                    </div>
                    <div class="card-body body-post ">
                        <img class="card-img" src="{{ route('user.avatar', ['filename'
                                        =>$image->image_path]) }}" alt="">


                        <p class="card-text"><strong>{{$image->user->nick}} </strong>{{
                        \FormatTimeInstagram::LongTimeFilter($image->created_at)}}</p>
                        <p>{{ $image->description }}</p>
                        <a style="font-size: 1.6rem; color: #202326" class="btn" href=""><i
                                class="fas
                            fa-heart"></i></a>

                        <h4>Comments:</h4>
                        <form action="{{ route('comment.save') }}" method="POST">
                            @csrf
                            <input type="hidden" name="image_id" value="{{ $image->id }}">
                            <textarea name="content" class="form-control"></textarea>
                            @if($errors->has('content'))
                                <span>
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                            <button type="submit" class="mt-1 btn btn-info">Submit</button>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
