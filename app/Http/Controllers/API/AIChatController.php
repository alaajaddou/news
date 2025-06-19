<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AIChatController extends Controller
{
	const HTTPS_AI_AJ_GROUP_PS_API_CHAT = 'https://ai.aj-group.ps/api/chat';

	public function proxy()
	{
		dd(request()->all());
		try {
			$validated = request()->validate([
				'message' => 'required|string',
			]);

			$message = $validated['message'];

			$messageBody = [
				'model' => 'mistral',
				'stream' => false,
				'messages' => [$this->preparePrompt($message)]
			];

			$response = Http::withHeaders([
				'Content-Type' => 'application/json',
			])->post(self::HTTPS_AI_AJ_GROUP_PS_API_CHAT, $messageBody);

			return response()->json($response->json(), $response->status());
		} catch (Exception $e) {
			return response()->json($e->getMessage(), $e->getCode());
		}
	}

	private function preparePrompt(string $message): array
	{
		$directions = $this->getDirections($message);
		$template = $this->getTemplate($message);
		$examples = $this->getExamples($message);

		return $this->buildPrompt($directions, $template, $examples, $message);
	}

	private function getDirections(string $message): string
	{
		// You could make this dynamic later, based on NLP or keywords
		return <<<TEXT
You are Planivator AI, an expert in helping users plan their daily schedules, events, or trips.
Always be clear, helpful, and structured in your response.
Use time-based breakdowns and include recommendations if needed.
TEXT;
	}

	private function getTemplate(string $message): string
	{
		return <<<TEXT
Given the user's planning request, structure your response using:
- A clear title
- A bullet list or time-based schedule
- Suggestions or important reminders if relevant
TEXT;
	}

	private function getExamples(string $message): string
	{
		return <<<TEXT
Example:
User: Plan my day for tomorrow.
AI:
**Plan for Tomorrow**
- 8:00 AM - Morning Routine
- 9:00 AM - Work on Project Alpha
- 12:00 PM - Lunch Break
- 1:00 PM - Team Meeting
- 3:00 PM - Exercise or short walk
- 5:00 PM - Review tasks and wrap up
- 7:00 PM - Dinner with Family
- 9:00 PM - Relax / Personal Time

Example:
User: Help me plan a trip to Tokyo
AI:
**Tokyo Trip Plan**
Day 1: Arrival & Shibuya Tour  
Day 2: Tsukiji Market, Tokyo Tower  
Day 3: Kyoto Day Trip
TEXT;
	}

	private function buildPrompt(string $directions, string $template, string $examples, string $userMessage): array
	{
		$finalPrompt = <<<PROMPT
$directions

$template

$examples

Now respond to this user message:
"$userMessage"
PROMPT;

		return [
			'role' => 'user',
			'content' => $finalPrompt,
		];
	}
}
