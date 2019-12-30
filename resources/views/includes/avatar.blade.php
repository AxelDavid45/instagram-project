@if(\Auth::user()->image)
    <img class="profile-thumb" src="{{ route('user.avatar', ['filename'
                                        =>\Auth::user()->image ]) }}" alt="">
@endif
