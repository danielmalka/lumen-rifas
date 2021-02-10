<?php

namespace App\Mail;

use App\Models\Participante;
use App\Models\Rifas;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ParticipanteRifa extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The order instance.
     *
     * @var \App\Models\Rifas
     */
    protected $rifa;

    /**
     * The order instance.
     *
     * @var \App\Models\Participante
     */
    protected $participante;

    /**
     * Create a new message instance.
     *
     * @param  \App\Models\Rifas $rifa
     * @param  \App\Models\Participante $participante
     * @return void
     */
    public function __construct(Rifas $rifa, Participante $participante)
    {
        $this->rifa = $rifa;
        $this->participante = $participante;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $valor = $this->participante->valor->valor_referente;
        return $this->view('emails.participante.participar')
            ->with([
                'rifaNome' => $this->rifa->nome,
                'participanteNome' => $this->participante->nome_completo,
                'valorRifa' => $valor,
            ]);
    }
}
