@php
    $likeUser = false;
@endphp
@foreach($image->likes as $like)
    @if($like->user_id == \Auth::user()->id)
        @php
          $likeUser = true;
        @endphp
    @endif
@endforeach


    <a style="font-size: 1.6rem; color:#ccc " class="btn
    like"><i
            class="fas {{ $likeUser == true ? 'like': ''}}
                            fa-heart" id="heart" data-id="{{ $image->id }}"></i><span
            class="like-counter"
            style="font-size:
                            1rem">{{
                             count
                            ($image->likes)
                            }}</span></a>
