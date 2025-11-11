<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\GeneratePromptRequest;
use Illuminate\Support\Str;
use App\Services\OpenAiService;
use OpenAI\Exceptions\RateLimitException;
use OpenAI\Exceptions\ErrorException;
use OpenAI\Exceptions\TransporterException;
use Exception;

class ImageGenerationController extends Controller
{

    public function __construct(private OpenAiService $openAiService){

    }

    public function index()
    {

    }

    public function store(Request $request)
    {
        try {
            $user = $request->user();

            $image = $request->file('image');

            $originalFileName = $image->getClientOriginalName();
            // Remove any special characters from the file name for eg: "Hello World.png" to "Hello_World.png"
            $sanitizedName = preg_replace('/[^a-zA-Z0-9]/', '_', pathinfo($originalFileName, PATHINFO_FILENAME));

            $extension = $image->getClientOriginalExtension();
            $safeFileName = $sanitizedName . '_' . Str::random(10) . '.' . $extension;

            $imagePath = $image->storeAs('uploads/images', $safeFileName, 'public');

            $generatedPrompt = $this->openAiService->generatePromptFromImage($image);

            $imageGeneration = $user->imageGenerations()->create([
                'image_path' => $imagePath,
                'generated_prompt' => $generatedPrompt,
                'original_file_name' => $originalFileName,
                'file_size' => $image->getSize(),
                'mime_type' => $image->getClientMimeType(),
            ]);

            return response()->json($imageGeneration, 201);
            
        } catch (RateLimitException $e) {
            return response()->json([
                'error' => 'Rate limit exceeded',
                'message' => 'OpenAI API rate limit has been exceeded. Please try again later.',
                'details' => $e->getMessage(),
            ], 429);
            
        } catch (ErrorException $e) {
            return response()->json([
                'error' => 'OpenAI API error',
                'message' => 'An error occurred while processing your request with OpenAI.',
                'details' => $e->getMessage(),
            ], 500);
            
        } catch (TransporterException $e) {
            return response()->json([
                'error' => 'Connection error',
                'message' => 'Failed to connect to OpenAI API. Please check your internet connection and try again.',
                'details' => $e->getMessage(),
            ], 503);
            
        } catch (Exception $e) {
            return response()->json([
                'error' => 'Unexpected error',
                'message' => 'An unexpected error occurred while processing your request.',
                'details' => config('app.debug') ? $e->getMessage() : 'Internal server error',
            ], 500);
        }
    }
}
