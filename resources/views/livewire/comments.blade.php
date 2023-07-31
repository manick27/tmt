<div>
<div class="comments">

<h4 class="comments-count">{{ $comments->count() }} {{ __('Commentaires') }}</h4>
@foreach ($comments as $comment)

<div id="comment-1" class="comment">
  <div class="d-flex">
    <div class="comment-img">
      @if ($comment->user->image)
      <img src="/images/{{ $comment->user->image }}" alt="">
      @else
      <img src="/assets/img/john.png" alt="">
      @endif
  </div>
    <div>
      <h5><a href="">{{ $comment->user->first_name }} {{ $comment->user->last_name }}</a></h5>
      <time datetime="2020-01-01">{{ $comment->created_at }}</time>
      <p>{{$comment->comment}}</p>
    </div>
  </div>
</div><!-- End comment #1 -->

@endforeach

<div class="reply-form">

  <h4>{{ __('Laissez un commentaire') }}</h4>
  <p>{{ __('Si vous êtes connecté, vous pouvez laisser un commentaire') }} </p>
  @if(session('message'))
      <div class="alert alert-success"><b>Well done ! </b> {{ session('message') }}.</div>
  @endif

  @if(session('error'))
      <div class="alert alert-danger"><b>Danger ! </b> {{ session('error') }}.</div>
  @endif
  <form wire:submit.prevent="comment" action="#" method="POST">
      @csrf
    <div class="row">
      <div class="col form-group">
        <textarea wire:model="comment" class="form-control" placeholder="{{ __('Votre Commentaire') }}"></textarea>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">{{ __('Poster commentaire') }}</button>

  </form>

</div>

</div>
</div>
