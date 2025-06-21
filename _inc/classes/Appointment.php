<?php
class Appointment
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllAppointments(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM appointments ORDER BY date ASC, time ASC");
        return $stmt->fetchAll();
    }

    public function getAppointmentById($id)
    {
    $stmt = $this->pdo->prepare("SELECT * FROM appointments WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
    }

    public function deleteAppointment($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM appointments WHERE id = ?");
        return $stmt->execute([$id]);
    }
        public function createAppointment($name, $phone, $email, $date, $message)
    {
        $time = date('H:i:s');
        $stmt = $this->pdo->prepare("INSERT INTO appointments (full_name, phone, email, date, time, add_message) VALUES (?, ?, ?, ?, ?, ?)");
        return $stmt->execute([$name, $phone, $email, $date, $time, $message]);
    }

    public function updateAppointment($id, $name, $phone, $email, $date, $message)
    {
    $stmt = $this->pdo->prepare("UPDATE appointments SET full_name = ?, phone = ?, email = ?, date = ?, add_message = ? WHERE id = ?");
    return $stmt->execute([$name, $phone, $email, $date, $message, $id]);
    }
}
?>