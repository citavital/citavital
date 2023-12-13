<?php

namespace App\Mail;

use App\Models\Cita;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CitaAgendada extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(
        protected Cita $cita,
        protected User $paciente,
        protected User $doctor)
    {
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: 'no-reply@citavital.com',
            subject: 'Cita Agendada',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.citas.agendada',
            with: [
                'id' => $this->cita->id,
                'fecha' => $this->cita->fecha,
                'hora' => $this->cita->hora,
                'paciente' => $this->paciente->name,
                'doctorNombre' => $this->doctor->name,
                'url' => route('citas.show', ['cita' => $this->cita->id])
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
