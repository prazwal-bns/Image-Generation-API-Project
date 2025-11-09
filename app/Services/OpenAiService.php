<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use OpenAI\Factory;

class OpenAiService
{
    /**
     * Create a new class instance.
     */
    public function generatePromptFromImage(UploadedFile $image): string
    {
        $imageData = base64_encode(file_get_contents($image->getRealPath()));
        $mimeType = $image->getClientMimeType();

        $client = (new Factory())->withApiKey(config('services.openai.api_key'))->make();

        $response = $client->chat()->create([
            'model' => 'gpt-4o',
            'messages' => [
                [
                    'role' => 'user',
                    'content' => [
                        [
                            'type' => 'text',
                            'text' => 'Analyze this image and generate a detailed, descriptive prompt that could be used to recreate a similar image with AI image generation tools. The prompt should be comprehensive, describing the visual elements, style, composition, lighting, and any other details that are present in the image. Make it detailed enough that someone could recreate the image exactly as it appears. You MUST preserve aspect ratio exactly as the original image or close enough to the original image',
                        ],
                        [
                            'type' => 'image_url',
                            'image_url' => [
                                'url' => 'data:'.$mimeType.';base64,'.$imageData,
                            ],
                        ]
                    ]
                ]
            ]
        ]);

        return $response->choices[0]->message->content;
    }
}
