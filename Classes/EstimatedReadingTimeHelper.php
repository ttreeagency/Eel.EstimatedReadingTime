<?php
declare(strict_types=1);

namespace Ttree\Eel\EstimatedReadingTime;

use Neos\Eel\Helper\StringHelper;
use Neos\Eel\ProtectedContextAwareInterface;
use Neos\Flow\Annotations as Flow;

class EstimatedReadingTimeHelper implements ProtectedContextAwareInterface
{
    /**
     * @var array
     * @Flow\InjectConfiguration(path="wordPerMinutes")
     */
    protected $wordPerMinutes;

    public function get(string $content, int $rate = null): int
    {
        $wordCount = (new StringHelper())->wordCount(\strip_tags($content));
        return (int) round($wordCount / ($rate ?? $this->wordPerMinutes['*']));
    }

    public function allowsCallOfMethod($methodName)
    {
        return true;
    }
}
