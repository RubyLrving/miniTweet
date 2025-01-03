<?php

namespace Tests\Unit\Services;

use PHPUnit\Framework\TestCase;
use App\Services\TweetService;
use Mockery;

class TweetServiceTest extends TestCase
{
    /**
     * @runInSeparateProcess
     * @return void
     */
    public function test_check_own_tweet() : void
    {
        
        $mock = Mockery::mock('alias:App\Models\Tweet');
        $mock->shouldReceive('where')->andReturnSelf();
        $mock->shouldReceive('first')->andReturn((object)[
            'id' => 1, 
            'user_id' => 1
        ]);

        $tweetService = new TweetService();
        $result = $tweetService->checkOwnTweet(1, 1);
        $this->assertTrue($result);
    
        $result = $tweetService->checkOwnTweet(2, 1);
        $this->assertFalse($result);
    }
}
