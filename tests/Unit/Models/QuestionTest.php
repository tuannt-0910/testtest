<?php

namespace Tests\Unit\Models;

use App\Models\Answer;
use App\Models\Comment;
use App\Models\Question;
use App\Models\Test;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\File;

class QuestionTest extends TestCase
{
    protected $question;

    public function setUp(): void
    {
        $this->question = new Question();
        parent::setUp();
    }

    public function tearDown(): void
    {
        unset($this->question);
        parent::tearDown();
    }

    public function test_fillable()
    {
        $this->assertEquals([
            'id',
            'file_id',
            'question_type',
            'content_suggest',
            'content',
            'code',
            'created_at',
            'updated_at',
            'deleted_at',
        ], $this->question->getFillable());
    }

    public function test_name_table()
    {
        $this->assertEquals('questions', $this->question->getTable());
    }

    public function test_hasOne_file()
    {
        $relation = $this->question->file();
        $relation_model = $relation->getRelated();
        $this->assertInstanceOf(HasOne::class, $relation);
        $this->assertInstanceOf(File::class, $relation_model);
        $this->assertEquals('id', $relation->getForeignKeyName());
        $this->assertEquals('file_id', $relation->getLocalKeyName());
    }

    public function test_hasMany_answers()
    {
        $relation = $this->question->answers();
        $relation_model = $relation->getRelated();
        $this->assertInstanceOf(HasMany::class, $relation);
        $this->assertInstanceOf(Answer::class, $relation_model);
        $this->assertEquals('question_id', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getLocalKeyName());
    }

    public function test_hasMany_comments()
    {
        $relation = $this->question->comments();
        $relation_model = $relation->getRelated();
        $this->assertInstanceOf(HasMany::class, $relation);
        $this->assertInstanceOf(Comment::class, $relation_model);
        $this->assertEquals('question_id', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getLocalKeyName());
    }

    public function test_belongsToMany_tests()
    {
        $relation = $this->question->tests();
        $relation_model = $relation->getRelated();
        $this->assertInstanceOf(BelongsToMany::class, $relation);
        $this->assertInstanceOf(Test::class, $relation_model);
        $this->assertEquals('test_question', $relation->getTable());
        $this->assertEquals('question_id', $relation->getForeignPivotKeyName());
        $this->assertEquals('test_id', $relation->getRelatedPivotKeyName());
        $this->assertEquals('id', $relation->getParentKeyName());
        $this->assertEquals('id', $relation->getRelatedKeyName());
        $this->assertEquals('tests', $relation->getRelationName());
    }
}
