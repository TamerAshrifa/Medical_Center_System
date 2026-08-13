<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class DoctorApologizeToPatientsMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public string $startDate;
    public string $endDate;
    public string $doctorFullname;

    public function __construct(string $startDate, string $endDate, string $doctorFullname)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->doctorFullname = $doctorFullname;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Doctor Apologize',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'DoctorApologizeToPatients',
        );
    }
    public function build()
    {
        return $this->subject('Doctor Apologize')->view('DoctorApologizeToPatients');
    }
    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
