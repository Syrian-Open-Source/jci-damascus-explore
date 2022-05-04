<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendRegisteredEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $userData;
    private $tr;

    private $reporter = [
        [
            'name' => 'عبد الله سعود',
            'phone' => '٠٩٨٨٥٠٧٧٠٠',
        ],
        [
            'name' => 'ماريو توما',
            'phone' => '٠٩٣٨٠٤٢٢٣٩',
        ],
        [
            'name' => 'سارة محمد',
            'phone' => '٠٩٦٩٢٧٩٥٠٠',
        ],
        [
            'name' => 'جاد عصفورة',
            'phone' => '٠٩٣٧٥٣٦٥١٨',
        ],
        [
            'name' => 'معتز مزهر',
            'phone' => '٠٩٦٩٠٠٣٤٣٥',
        ],
        [
            'name' => 'إيهاب داود',
            'phone' => '٠٩٦٧٧٧٧١٠٦',
        ],
        [
            'name' => 'غارسيا مقعبري',
            'phone' => '٠٩٩٤٩٨٠٧١٧',
        ],
        [
            'name' => 'جهاد الهندي',
            'phone' => '0993370555',
        ],
    ];

    /**
     * Create a new message instance.
     *
     * @param  \App\Models\User  $userData
     */
    public function __construct(User $userData)
    {
        //
        $this->userData = $userData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $reporter = $this->reporter[$this->userData->local_room] ?? $this->reporter[0];

        return $this
            ->subject('Explore Damascus Registration')
            ->markdown('emails.registered',
                [
                    'data' => $this->userData,
                    'reporter' => $reporter,
                ]
            )->priority(1);
    }
}
