<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;

class ChatController extends Controller
{
    public function chat(Request $request)
    {
        $inputText = $request->food;

        if ($inputText != null) {
            // Check if $inputText is appropriate
            $response = OpenAI::moderations()->create([
                'model' => 'text-moderation-latest',
                'input' => $inputText,
            ]);
            foreach ($response->results as $result) {
                $flag = $result->flagged;
                if ($flag === true) {
                    return redirect()->route('chat.create')->with('error', 'This message is inappropriate.');
                }
            }

            // Generate recipe
            $responseText = $this->generateResponse($inputText);
            $messages = [
                ['title' => 'Ingredient', 'content' => $inputText],
                ['title' => 'Recipe', 'content' => $responseText]
            ];

            // Generate image
            $image = $this->generateImage($responseText);

            return view('chat.create', compact('messages', 'image'));
        }
        return view('chat.create');
    }

    private function generateResponse($inputText)
    {
        $result = OpenAI::completions()->create([
            'model' => 'gpt-3.5-turbo-instruct',
            'prompt' => 'I tell you what ingredients I have in my refrigerator.' . $inputText . 'As a housewife who is a good cook, please share a delicious recipe in 5 sentences or less.',
            'temperature' => 0.8,
            'max_tokens' => 150,
        ]);
        return $result['choices'][0]['text'];
    }

    private function generateImage($responseText)
    {
        $response =  OpenAI::images()->create([
            'prompt' => $responseText,
            'n' => 1,
            'size' => '256x256',
            'response_format' => 'url',
        ]);
        return $response['data'][0]['url'];
    }
}
