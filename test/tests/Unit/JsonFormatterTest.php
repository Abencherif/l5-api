<?php

namespace Abencherif\L5Api\Tests\Unit;

use Mockery;
use Abencherif\L5Api\APIBoilerplate;
use Abencherif\L5Api\Tests\AppTestCase;
use Abencherif\L5Api\Http\Response\Format\Json;

class JsonFormatterTest extends AppTestCase
{
    /**
     * Check that the JSON Formatter, formats the meta key case correctly
     *
     * @test
     */
    public function formatMetaArrayKeysAccordingToFormat()
    {
        $jsonFormatter = new Json;

        // Camel
        $this->setAPIKeyCase(APIBoilerplate::CAMEL_CASE);

        $content = [
            'do_not_change' => 'Unchanged',
            'meta' => [
                'needs_to_change' => true,
            ]
        ];

        $json = $jsonFormatter->formatArray($content);
        $formatted = json_decode($json, true);

        $this->assertArrayHasKey('do_not_change', $formatted);
        $this->assertArrayHasKey('needsToChange', $formatted['meta']);

        //
        // End to end
        //

        // Camel
        $this->setAPIKeyCase(APIBoilerplate::CAMEL_CASE);

        $response = $this->actingAsAdmin()->get('/forums');
        $responseData = $response->decodeResponseJson();

        $this->assertArrayHasKey('perPage', $responseData['meta']['pagination']);

        // Snake
        $this->setAPIKeyCase(APIBoilerplate::SNAKE_CASE);

        $response = $this->actingAsAdmin()->get('/forums');
        $responseData = $response->decodeResponseJson();

        $this->assertArrayHasKey('per_page', $responseData['meta']['pagination']);
    }
}
