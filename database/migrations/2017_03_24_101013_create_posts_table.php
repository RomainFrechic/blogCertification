<?php
use App\Post;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->string('file');
            $table->text('content');
            $table->integer('count_comment')->default(0);
            $table->integer('categories_id');
            $table->integer('user_id');
            $table->timestamps();
        });

        for($i=1; $i<10; $i++){
            Post::create([
                'name'=>'Post'.$i,
                'slug'=>'post-'.$i,
                'content'=>'Lorem Ipsum',
                'count_comment'=>0,
                'categories_id'=>1,
                'user_id'=>1,
                ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
