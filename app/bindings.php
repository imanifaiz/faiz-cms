<?php

// The Posts Bindings
App::bind('Faiz\Cms\Posts\PostsInterface', function() {
	return new Faiz\Cms\Posts\PostsRepository(new Faiz\Cms\Posts\Posts);
});

// The Pages Bindings
App::bind('Faiz\Cms\Pages\PagesInterface', function() {
	return new Faiz\Cms\Pages\PagesRepository(new Faiz\Cms\Pages\Pages);
});

// The Tags Bindings
// App::bind('Faiz\Cms\Tags\TagsInterface', function() {
// 	return new Faiz\Cms\Tags\TagsRepository(new Faiz\Cms\Tags\Tags);
// });
