<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Http;
use Log;

class AIChatController extends Controller
{
	const HTTPS_AI_AJ_GROUP_PS_API_CHAT = 'https://ai.aj-group.ps/api/chat';

	public function proxy()
	{

		Log::info('AI Chat Proxy', request()->all());
		try {
			$validated = request()->validate([
				'message' => 'required|string',
			]);

			Log::info('AI Chat Proxy', [$validated]);

			$message = $validated['message'];

			Log::info('AI Chat Proxy', [$message]);

			$messageBody = [
				'model' => 'mistral',
				'stream' => false,
				'messages' => [$this->preparePrompt($message)]
			];

			Log::info('AI Chat Proxy', $messageBody);

			$response = Http::withHeaders([
				'Content-Type' => 'application/json',
			])
			->timeout(360) // seconds
			->post(self::HTTPS_AI_AJ_GROUP_PS_API_CHAT, $messageBody);

			Log::info('AI Chat Proxy', [$response]);
			return response()->json($response->json(), $response->status());
		} catch (Exception $e) {
			Log::error('AI Chat Proxy', [$e]);
			return response()->json($e->getMessage(), $e->getCode());
		}
	}

	private function preparePrompt(string $message): array
	{

		Log::info('AI Chat Proxy', [$message]);
		$directions = $this->getDirections($message);
		Log::info('Prompt Preparing Directions', [$directions]);
		$template = $this->getTemplate($message);
		Log::info('Prompt Preparing Template', [$template]);
		$examples = $this->getExamples($message);
		Log::info('Prompt Preparing Example', [$examples]);

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
