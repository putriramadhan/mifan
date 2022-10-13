<?php

namespace App\Mail;
use App\Models\Transaksi;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TransaksiMail extends Mailable
{
    use Queueable, SerializesModels;

    public Transaksi $transaksi;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($transaksi)
    {
        $this->transaksi = $transaksi;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Konfirmasi Pemesanan Tiket')->view('mails.transaksi-mail');
    }
}
