{{ '<?xml version="1.0"?>' }}
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
	<channel>
		<title>blog feed</title>
		<link>{{ URL::to('/') }}</link>
		<atom:link href="{{ URL::to('rss') }}" rel="self" type="application/rss+xml" />
		<description></description>
		<copyright>{{ URL::to('/') }}</copyright>
		<ttl>30</ttl>

		@foreach ($posts as $post)
			<item>
				<title>{{ $post->post_title }}</title>
				<description>
					{{ htmlspecialchars($post->post_content) }}
				</description>
				<link>{{ URL::to('blog/', $post->slug) }}</link>
				<guid isPermaLink="true">{{ URL::to('blog/', $post->post_slug) }}</guid>
				<pubDate>{{ $post->created_at }}</pubDate>
			</item>
		@endforeach
	</channel>
</rss>
