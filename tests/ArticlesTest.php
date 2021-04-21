<?php
namespace EnergyHub\ApiClient\Tests;

use GuzzleHttp\Psr7\Response;

class ArticlesTest extends TestCase
{
	public function testGetArticle(): void
	{
		$httpResponse = new Response(
			200,
			[],
			json_encode([])
		);

		$this->client->shouldReceive('get')
			->once()
			->withArgs(function($args) {
				$this->assertEquals('https://apiUrl.test/articles/1', $args);

				return true;
			})
			->andReturn($httpResponse);

		$article = $this->apiClient->articles(1)->first();

		$this->assertEmpty($article);;
	}
}