<?php

class CommentsTableSeeder extends Seeder {

    protected $content1 = 'Lorem ipsum dolor sit amet, mutat utinam nonumy ea mel.';
    protected $content2 = 'Lorem ipsum dolor sit amet, sale ceteros liberavisse duo ex, nam mazim maiestatis dissentiunt no. Iusto nominavi cu sed, has.';
    protected $content3 = 'Et consul eirmod feugait mel! Te vix iuvaret feugiat repudiandae. Solet dolore lobortis mei te, saepe habemus imperdiet ex vim. Consequat signiferumque per no, ne pri erant vocibus invidunt te.';


    public function run()
    {
        DB::table('comments')->delete();

        $data = array(
                    array(
                          'user_id'    => 1,
                        'comment_author' => 'faiz afzal',
                        'comment_author_email' => 'email@example.com',
                        'comment_post_id'    => 1,
                        'comment_content'    => $this->content1,
                        'comment_date' => new DateTime,
                        'created_at' => new DateTime,
                        'comment_parent' => null
                    ),
                    array(
                        'user_id'    => 2,
                        'comment_author' => 'faqiihah imani',
                        'comment_author_email' => 'email@example.com',
                        'comment_post_id'    => 1,
                        'comment_content'    => $this->content2,
                        'comment_date' => new DateTime,
                        'created_at' => new DateTime,
                        'comment_parent' => 1
                    ),
                    array(
                          'user_id'    => 1,
                        'comment_author' => 'ayunee effendi',
                        'comment_author_email' => 'email@example.com',
                        'comment_post_id'    => 2,
                        'comment_content'    => $this->content3,
                        'comment_date' => new DateTime,
                        'created_at' => new DateTime,
                        'comment_parent' => null
                    ),
                    array(
						'user_id'              => 2,
						'comment_author'       => 'ali mamat',
						'comment_author_email' => 'email@example.com',
						'comment_post_id'      => 1,
						'comment_content'      => $this->content1,
						'comment_date'         => new DateTime,
						'created_at'           => new DateTime,
						'comment_parent' => 3
                    )
                );

        DB::table('comments')->insert($data);
    }

}
