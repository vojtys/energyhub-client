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
			json_encode([
				'data' => [
					'id' => 1,
					'title' => 'foo title',
				],
			])
		);

		$this->client->shouldReceive('get')
			->once()
			->withArgs(function($endpoint, $params) {
				$this->assertEquals('https://apiUrl.test/articles/1', $endpoint);
				$this->assertEquals([
					'query' => [
						'page' => [
							'number' => '1',
							'size' => '1',
						],
					],
				], $params);

				return true;
			})
			->andReturn($httpResponse);

		$article = $this->apiClient->articles(1)->first();

		$this->assertEquals('foo title', $article['data']['title']);
	}
}
