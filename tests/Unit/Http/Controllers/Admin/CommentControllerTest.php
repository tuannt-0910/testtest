<?php

namespace Tests\Unit\Http\Controllers\Admin;

use App\Models\Comment;
use Tests\TestCase;
use Mockery;
use Symfony\Component\HttpFoundation\ParameterBag;
use App\Http\Controllers\Admin\CommentController;
use App\Repositories\Contracts\CommentRepositoryInterface as CommentRepository;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class CommentControllerTest extends TestCase
{
    protected $commentRepoMock;

    public function setUp(): void
    {
        $this->commentRepoMock = Mockery::mock(CommentRepository::class . '[getAllComments]');
        parent::setUp();
    }

    public function tearDown(): void
    {
        unset($this->commentRepoMock);
        parent::tearDown();
    }

    public function test_store_if_slug_incorrect()
    {
        $user = new User([
            'id' => 1,
            'name' => 'yish',
            'role_id' => 4,
        ]);
        $this->be($user);

        $controller = new CommentController($this->commentRepoMock);

        $request = new Request();
        $request->headers->set('content-type', 'application/json');

        $response = $controller->store($request);
        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertEquals('false', $response->content());
    }

    public function test_store_if_slug_correct()
    {
        $user = new User([
            'id' => 1,
            'name' => 'yish',
            'role_id' => 1,
        ]);
        $this->be($user);

        $this->commentRepoMock->shouldReceive('create')
            ->once()
            ->andReturn(new Comment);

        $controller = new CommentController($this->commentRepoMock);

        $request = new Request();
        $request->headers->set('content-type', 'application/json');
        $data = [
            'content' => 'New City',
            'question_id' => 1
        ];
        $request->setJson(new ParameterBag($data));

        $response = $controller->store($request);
        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertJson('{"comment":{"user":null},"urlDestroy":"http:\/\/localhost\/admin\/comments"}', $response);
    }

    public function test_destroy_if_slug_incorrect()
    {
        $user = new User([
            'role_id' => 4,
        ]);
        $this->be($user);

        $controller = new CommentController($this->commentRepoMock);
        $response = $controller->destroy(1);

        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertEquals('false', $response->content());
    }

    public function test_destroy_if_slug_correct()
    {
        $user = new User([
            'role_id' => 1,
        ]);
        $this->be($user);

        $this->commentRepoMock->shouldReceive('delete')
            ->once()
            ->andReturn(true);
        $controller = new CommentController($this->commentRepoMock);
        $response = $controller->destroy(1);

        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertEquals('true', $response->content());
    }
}
