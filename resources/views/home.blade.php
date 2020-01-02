@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('includes.message')

                @foreach($images as $image)

                    <div class="card mt-3">
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
                            <a href="{{ route('image.detail', ['id' => $image->id]) }}">
                                <img class="card-img" src="{{ route('user.avatar', ['filename'
                                        =>$image->image_path]) }}" alt="">
                            </a>


                            <p class="card-text"><strong>{{$image->user->nick}} </strong> {{
                        \FormatTimeInstagram::LongTimeFilter($image->created_at)}}
                                </p>
                            <p>{{$image->description
                            }}</p>
                            @include('includes.like-comment')
                        </div>
                    </div>
                @endforeach
                <div class="mt-5">
                    {{ $images->links() }}
                </div>
            </div>

        </div>
    </div>
@endsection
