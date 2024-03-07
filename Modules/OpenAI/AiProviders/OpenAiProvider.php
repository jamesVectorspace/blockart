<?php

namespace Modules\OpenAI\AiProviders;

use Modules\OpenAI\Contracts\Resources\ChatContract;
use Modules\OpenAI\AiProviders\OpenAiTraits\Chat;

class OpenAiProvider implements ChatContract
{
    use Chat;

    /** @var string */
    protected $prompt;

    /** @var array */
    protected $data = [];

    /**
     * Get the OpenAI API key from preferences.
     *
     * @return string
     */
    public function aiKey(): string
    {
        return preference('openai');
    }

    /**
     * Get the OpenAI client instance.
     * 
     * @return object
     */
    public function client(): object
    {
        return \OpenAI::client($this->aiKey());
    }

    /**
     * Get the model preference for the OpenAI provider.
     *
     * @return string
     */
    public function getModel(): string
    {
        return preference('long_article_model', 'gpt-3.5-turbo');
    }

    /**
     * Get the provider name.
     *
     * @return string
     */
    public function provider(): string
    {
        return 'OpenAi';
    }

    /**
     * Get the expense type for the OpenAI provider.
     *
     * @return string
     */
    public function expenseType(): string
    {
        return 'token';
    }
}
