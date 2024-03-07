<?php 

namespace Modules\OpenAI\Contracts\Resources;

interface ChatContract
{
    public function generateChatContent(array $options = []): object;

    public function getChatContent(object $result): array;
}