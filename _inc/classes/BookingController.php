<?php
class BookingController
{
    private Appointment $appointment;

    public function __construct(Appointment $appointment)
    {
        $this->appointment = $appointment;
    }

    public function process($postData)
    {
        $name = $postData['name'] ?? '';
        $phone = $postData['phone'] ?? '';
        $email = $postData['email'] ?? '';
        $date = $postData['date'] ?? '';
        $message = $postData['message'] ?? '';
        
        return $this->appointment->createAppointment($name, $phone, $email, $date, $message);
    }
}