<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class Hebahan extends Notification
{
    use Queueable;

    protected $timestamp;
    protected $matrik;
    protected $nama_pembaca;
    protected $tajuk;
    protected $huraian;
    protected $lokasi;
    protected $kumpulan_sasaran;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($timestamp, $matrik, $nama_pembaca, $tajuk, $huraian, $lokasi, $kumpulan_sasaran)
    {
        $this->timestamp = $timestamp;
        $this->matrik = $matrik;
        $this->nama_pembaca = $nama_pembaca;
        $this->tajuk = $tajuk;
        $this->huraian = $huraian;
        $this->lokasi = $lokasi;
        $this->kumpulan_sasaran = $kumpulan_sasaran;
   
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->greeting("Hello {$this->nama_pembaca} !")
                    ->line("You has published news at {$this->timestamp->format('g:i A, d F Y')} in eBuletin UKM.")
                    ->line("Berikut adalah perincian berita anda:")
                    ->line("Tajuk: {$this->tajuk}")
                    ->line("Huraian: {$this->huraian}")
                    ->line("Lokasi: {$this->lokasi}")
                    ->line("Kumpulan Sasaran Berita: {$this->kumpulan_sasaran}")
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
    
}
