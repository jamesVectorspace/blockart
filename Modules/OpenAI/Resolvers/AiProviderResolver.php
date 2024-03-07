<?php

namespace Modules\OpenAI\Resolvers;

class AiProviderResolver
{
    /** @var object|null */
    public $resolver;

    /**
     * AiProviderResolver constructor.
     *
     * @param string $feature [Feature for which the AI provider is being resolved]
     */
    public function __construct(string $feature)
    {
        // Construct the fully qualified class name for the AI provider based on the feature
        $providerClass = 'Modules\OpenAI\AiProviders' . "\\" . preference($feature . '_provider') . "Provider";

        // Check if the class exists before resolving it
        if (class_exists($providerClass)) {
            // Resolve an instance of the specified AI provider class
            $this->resolver = resolve($providerClass);
        }
    }

    /**
     * Get the resolved AI provider instance.
     *
     * @return object|null
     */
    public function getResolver(): ?object
    {
        return $this->resolver;
    }
}
