<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NotifyEvent extends Notification
{
    use Queueable;

    protected $timestamp;
    protected $matrik;
    protected $nama_pengarang;
    protected $tajuk;
    protected $huraian;
    protected $first_date;
    protected $second_date;
    protected $duration;
    protected $lokasi;
    protected $tempoh;
    protected $max_peserta;
    protected $penganjur;
    protected $telephone;
    protected $kumpulan_sasaran;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($timestamp, $matrik, $nama_pengarang, $tajuk, $huraian, $first_date, $second_date, $duration, $lokasi, $max_peserta, $penganjur, $telephone, $kumpulan_sasaran)
    {
        $this->timestamp = $timestamp;
        $this->matrik = $matrik;
        $this->nama_pengarang = $nama_pengarang;
        $this->tajuk = $tajuk;
        $this->huraian = $huraian;
        $this->first_date = $first_date;
        $this->second_date = $second_date;
        $this->duration = $duration;
        $this->lokasi = $lokasi;
        $this->max_peserta = $max_peserta;
        $this->penganjur = $penganjur;
        $this->telephone = $telephone;
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
                    ->greeting("Hello {$this->nama_pengarang} !")
                    ->line("You has published event at {$this->timestamp->format('g:i A, d F Y')} in eBuletin UKM.")
                    ->line("Berikut adalah perincian acara anda:")
                    ->line("Tajuk: {$this->tajuk}")
                    ->line("Huraian: {$this->huraian}")
                    ->line("Mula: {$this->first_date->format('g:i A, d F Y')}")
                    ->line("Tamat: {$this->second_date->format('g:i A, d F Y')}")
                    ->line("Tempoh Acara: {$this->duration}")
                    ->line("Lokasi: {$this->lokasi}")
                    ->line("Kumpulan Sasaran Acara: {$this->kumpulan_sasaran}")
                    ->line("Jumlah Peserta: {$this->max_peserta}")
                    ->line("Penganjur: {$this->penganjur}")
                    ->line("Contact No: {$this->telephone}")
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
