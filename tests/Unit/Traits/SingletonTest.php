<?php

use AshleyHardy\Utilities\Traits\IsASingleton;

class TestSingleton
{
    use IsASingleton;

    public function getTestMessage(): string
    {
        return 'I\'m a test message.';
    }

    public string $message;

    public function setSpecialMessage(string $message): void
    {
        $this->message = $message;
    }

    public static function getSpecialMessage(): string
    {
        return self::instance()->message;
    }
}

test(
    'Can a singleton be retrieved?',
    function() {
        $instance = TestSingleton::instance();
        expect($instance)->toBeInstanceOf(TestSingleton::class);
    }
);

test(
    'Does a Singleton class always provide itself?',
    function() {
        $instance = TestSingleton::instance();
        $instance->setSpecialMessage('Three Little Birds');

        expect(TestSingleton::getSpecialMessage())->toEqual('Three Little Birds');
    }
);