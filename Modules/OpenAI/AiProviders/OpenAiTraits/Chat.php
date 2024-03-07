<?php

namespace Modules\OpenAI\AiProviders\OpenAiTraits;

trait Chat
{
    /**
     * Prepare chat options for OpenAI request.
     *
     * @param array $options [Array containing prompt, message, and optional parameters]
     *
     * @return $this
     */
    public function prepareChatOptions(array $options)
    {
        $this->prompt = $options['prompt'];
        $this->data = [
            'model' => preference('long_article_model', 'gpt-3.5-turbo'),
            'messages' => $options['message'],
            "temperature" =>  1,
            "n" => $options['n'] ?? preference('n', 1),
            "max_tokens" => preference('max_token', 2046),
            "frequency_penalty" => preference('frequency_penalty', 0),
            "presence_penalty" => preference('presence_penalty', 0),
        ];
        return $this;
    }

    /**
     * Generate chat content based on specified method.
     *
     * @param array $options [Options for generating chat content]
     *
     * @return object
     */
    public function generateChatContent(array $options = []): object
    {
        return $this->{$options['method']}($options); 
    }

    /**
     * Create chat completion via OpenAI API call.
     *
     * @param array $options [Chat completion parameters required for OpenAI]
     *
     * @return object
     */
    public function createChatCompletion(array $options): object
    {
        return $this->client()->chat()->create($this->data);
    }

    /**
     * Create chat completion stream via OpenAI API call for streaming response.
     *
     * @param array $options [Chat completion parameters required for OpenAI]
     *
     * @return object
     */
    public function createChatCompletionStream(array $options): object
    {
        return $this->client()->chat()->createStreamed($this->data);
    }

    /**
     * Get the generated content from OpenAI provider and return after processing.
     *
     * @param object $result [OpenAI response]
     *
     * @return array
     */
    public function getChatContent(object $result): array
    {
        $data = [];
        $outputContents = [];

        if (isset($result->choices)) {

            if (count($result->choices) > 1) {
                $totalWords = 0;
                $totalCharacters = 0;
                foreach ($result->choices as $choice) {
                    $outputContents[] = $choice->message->content; 
                    $totalWords += countWords($choice->message->content);
                    $totalCharacters += strlen($choice->message->content);
                }
            } else {
                $outputContents = $result->choices[0]->message->content;
                $totalWords = countWords($result->choices[0]->message->content);
                $totalCharacters = strlen($result->choices[0]->message->content);
            }

            $data = [
                'outputContents' => $outputContents,
                'promptTokens' => $result->usage->promptTokens,
                'completionTokens' => $result->usage->completionTokens,
                'totalTokens' => $result->usage->totalTokens,
                'totalWords' => preference('word_count_method') == 'token' ? subscription('tokenToWord', $result->usage->completionTokens) : $totalWords,
                'totalCharacters' => $totalCharacters,
            ];
        }

        return $data;
    }

    /**
     * Get the content from stream response and return after processing.
     *
     * @param object $result [OpenAI stream response]
     *
     * @return string|null
     */
    public function getChatStreamContent(object $result): ?string
    {
        if (isset($result->choices)) {
            $content = $result->choices[0]->toArray();
            if (isset($content['delta']['content'])) {
                return $content['delta']['content'];
            }
        }
        return null;
    }
}
