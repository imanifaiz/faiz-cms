<?php

// The Posts Bindings
App::bind('Faiz\Cms\Posts\PostsInterface', function() {
	return new Faiz\Cms\Posts\PostsRepository(new Faiz\Cms\Posts\Posts);
});

// The Comments Bindings
App::bind('Faiz\Cms\Comments\CommentsInterface', function() {
	return new Faiz\Cms\Comments\CommentsRepository(new Faiz\Cms\Comments\Comments);
});

// The Tags Bindings
// App::bind('Faiz\Cms\Tags\TagsInterface', function() {
// 	return new Faiz\Cms\Tags\TagsRepository(new Faiz\Cms\Tags\Tags);
// });
