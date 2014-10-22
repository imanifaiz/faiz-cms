@if($comment->comment_parent)
  <div class="media comment-item" data-comment-id="{{ $comment->comment_id }}">
@else
  <li class="media comment-item" data-comment-id="{{ $comment->comment_id }}">
@endif

  <a class="pull-left" href="#">
  <img data-src="holder.js/60x60/auto/#d9534f:#fff/text:{{ $comment->comment_author }}" class="media-object" alt="{{ $comment->comment_author }}">
  </a>

  <div class="media-body">
    <h4 class="media-heading">{{ $comment->comment_id }} - {{ $comment->comment_author }}</h4>
    <p style='text-align:justify;'>{{ $comment->comment_content }}</p>
    <p><a class='comment_reply_to' href='#writecomment' data-replyto='{{ $comment->comment_id }}'>Reply</a></p>
    @if($comment->replies->count())
      {{ dumpComments($comment->replies) }}
    @endif
  </div>

@if($comment->comment_parent)
  </div>
@else
  </li>
@endif