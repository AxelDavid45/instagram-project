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


    <a style="font-size: 1.6rem; color: {{ $likeUser == true ? 'red' : '#ccc' }}" class="btn"
       href=""><i
            class="fas
                            fa-heart"></i><span style="font-size: 1rem">{{ count($image->likes)
                            }}</span></a>

<a href="" class="btn btn-info p-2">({{ count
                            ($image->comments)
                            }})Comentarios<i
        class="fas
                            fa-comments"></i></a>
