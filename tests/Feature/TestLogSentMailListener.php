<?php

namespace Tests\Feature;

use App\Mail\QuoteEmail;
use Illuminate\Mail\Events\MessageSent;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class TestLogSentMailListener extends TestCase
{
    /** @test */
    public function it_adds_extra_data_to_the_event(): void
    {
        Mail::fake();
        Event::fake();

        Mail::to('noreply@ju5t.nl')
            ->send(new QuoteEmail());

        Event::assertDispatched(MessageSent::class);
    }
}
